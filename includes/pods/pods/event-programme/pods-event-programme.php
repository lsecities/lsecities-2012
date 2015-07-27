<?php
namespace LSECitiesWPTheme\event_programme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

function pods_prepare_event_programme($pod_slug) {
  $pod = pods('event_programme', $pod_slug);
  
  $obj = array();
  
  /**
   * Handle second language
   */
  $obj['request_language'] = rtrim(strtolower(pods_url_variable('lang', 'get')), '/');
  // save current path (used to generate links to translation of article, if available)
  $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
  $obj['current_page_uri'] = $uri_parts[0];
  $obj['lang2_slug'] = $pod->field('lang2.slug');
  $obj['lang2_name'] = $pod->field('lang2.name');
  
  $is_lang2 = (!empty($obj['request_language']) && $obj['request_language'] == $obj['lang2_slug']) ? TRUE : FALSE;
  
  if($is_lang2) {
    $obj['pod_title'] = $pod->field('name');
    $obj['pod_subtitle'] = $pod->field('programme_subtitle');
  } else {
    $obj['pod_title'] = $pod->field('name_lang2');
    $obj['pod_subtitle'] = $pod->field('programme_subtitle_lang2');
  }
  $subsessions = sort_linked_field($pod->field('sessions'), 'sequence', SORT_ASC);

  
  $subsession_slugs = array();
  foreach($subsessions as $subsession) {
    $subsession_slugs[] = $subsession['slug'];
  }
  
  /**
   * If we use special fields from the speakers objects to generate
   * speaker blurb and affiliation information for the programme.
   * The following field will be set and contain the prefix for the
   * fields to use in the people pod.
   * e.g. if the special_ec2012 prefix is provided, we expect to
   * fetch speaker blurb and affiliation from the following fields
   * in the people pod:
   * - special_ec2012_blurb
   * - special_ec2012_affiliation
  */
  $special_fields_prefix = $pod->field('special_author_fields');
  
  $for_conference = $pod->field('for_conference.slug');
  $for_event = $pod->field('for_event.slug');
  
  $obj['is_programme_tentative'] = $pod->field('is_programme_tentative');
  $obj['timezone_notice'] = $pod->field('timezone_notice');
  
  $all_speakers = array();
  
  $obj['page_title'] = !empty($for_conference) ? "Conference programme" : "Event programme";
  
  foreach($subsession_slugs as $session_slug) {
    $obj['sessions'][] = process_session($session_slug, $special_fields_prefix, $is_lang2, $all_speakers);
  }
  
  $obj['programme_pdf'] = wp_get_attachment_url($pod->field('programme_pdf.ID'));
  
  if($pod->field('lang2.name')) {
    $obj['programme_pdf_lang2'] = wp_get_attachment_url($pod->field('programme_pdf_lang2.ID'));
    $obj['lang2'] = $pod->field('lang2.name');
  }
  
  // sort speakers by family name
  $family_names = array();
  foreach ($all_speakers as $key => $row) {
    $family_names[$key]  = $row['family_name'];
  }
  array_multisort($family_names, SORT_ASC, $all_speakers);
  $obj['all_speakers'] = $all_speakers;
  
  return $obj;
}

function process_session($session_slug, $special_fields_prefix, $is_lang2 = FALSE, &$all_speakers) {
  global $TRACE_ENABLED;
  
  /**
   * If second language is requested, append suitable suffix to all
   * field names available in lang2.
   */
  if($is_lang2) {
    $lang_suffix = '_lang2';
  }
  
  $pod = pods('event_session', $session_slug);
  $session_id = $pod->field('slug');
  $session_title = $pod->field('name' . $lang_suffix);
  $session_parent_session = $pod->field('parent_session');
  $session_is_tbc = $pod->field('is_session_tbc');
  $session_speakers = $pod->field('speakers');
  $session_chairs = $pod->field('chairs');
  $session_respondents = $pod->field('respondents');
  $session_start_datetime = new \DateTime($pod->field('start'));
  $session_end_datetime = $pod->field('end') === '0000-00-00 00:00:00' ? null : new \DateTime($pod->field('end'));
  $session_type = $session_type_slug = $pod->field('session_type.slug');
  if($session_type != 'session') { $session_type = "session $session_type"; }

  // get link to PDF of slides: try pick field of file type first
  $session_slides = wp_get_attachment_url($pod->field('media_items.slides_pdf.ID', TRUE));
  // if no file is linked, try the plain text field for an URI
  if(!$session_slides and $pod->field('media_items.slides_uri')) {
    $session_slides = 'http://downloads0.cloud.lsecities.net/' . $pod->field('media_items.slides_uri');
  }
  
  if(is_array($session_speakers)) {
    $all_speakers = add_speakers_to_stash($special_fields_prefix, $is_lang2, $all_speakers, $session_speakers, $session_id, $session_title, $session_is_tbc, $session_type_slug, $session_parent_session);
  }
  if(is_array($session_chairs)) {
    $all_speakers = add_speakers_to_stash($special_fields_prefix, $is_lang2, $all_speakers, $session_chairs, $session_id, $session_title, $session_is_tbc, $session_type_slug, $session_parent_session);
  }
  
  /**
   * Recursively process subsessions. HSL.
   */
  var_trace($pod->field('sessions'), 'event programme - sessions');
  var_trace(count($pod->field('sessions')), 'count of sessions');
  
  $session_fields = sort_linked_field($pod->field('sessions'), 'sequence', SORT_ASC);
  if($session_fields) {
    foreach($session_fields as $session_field) {
      $sessions[] = $session_field['slug'];
    }
  }
  
  var_trace(count($subsessions), 'session count');
  var_trace(var_export($subsessions, true), 'sessions');

  if(count($sessions) > 0) {
    foreach($sessions as $session) {
      $sessions_data[] = process_session($session, $special_fields_prefix, $is_lang2, $all_speakers);
    }
  }
  
  $_audio_file_uri = wp_get_attachment_url($pod->field('media_items.audio_file.ID', TRUE));

  $obj = array(  
    'id' => $session_id,
    'title' => $session_title,
    'subtitle' => $pod->field('sub_title'),
    'blurb' => $pod->field('extra_session_blurb'),
    'is_session_tbc' => $pod->field('is_session_tbc'),
    'show_times' => $pod->field('show_times'),
    'start_datetime' => $session_start_datetime->format('H:i'),
    'end_datetime' => is_null($session_end_datetime) ? NULL : $session_end_datetime->format('H:i'),
    'hide_title' => $pod->field('hide_title'),
    'type' => $session_type,
    'speakers_blurb' => !is_array($session_speakers) ? NULL : generate_session_people_blurb($pod, 'speakers_blurb', $special_fields_prefix, $is_lang2, $session_speakers),
    'chairs_label' => count($session_chairs) > 1 ? "Chairs" : "Chair",
    'chairs_blurb' => !is_array($session_chairs) ? NULL : generate_session_people_blurb($pod, 'chairs_blurb', $special_fields_prefix, $is_lang2, $session_chairs),
    'respondents_label' => count($session_respondents) > 1 ? "Respondents" : "Respondent",
    'respondents_blurb' => !is_array($session_respondents) ? NULL : generate_session_people_blurb($pod, 'respondents_blurb', $special_fields_prefix, $is_lang2, $session_respondents),
    'youtube_video' => $pod->field('media_items.youtube_uri'),
    'audio_uri' => !empty($_audio_file_uri) ? $_audio_file_uri : $pod->field('media_items.audio_uri'),
    'slides' => $session_slides,
    'sessions' => $sessions_data
  );

  return $obj;
}

function process_session_templates($sessions) {
  if(!is_array($sessions)) return false;
  foreach($sessions as $session) {
    include(lc_data('theme_filesystem_abspath') . '/templates/pods/event-programme/event-programme-session.php');
  }
}

function generate_session_people_blurb($pod, $blurb_field, $special_fields_prefix, $is_lang2 = FALSE, $session_people) {
  $ALLOWED_TAGS_IN_BLURBS = '<strong><em>';
  
  if(!isset($pod)) {
    error_log('No pod object provided');
    return;
  }
  if(!isset($blurb_field)) {
    error_log('No blurb field name provided');
    return;
  }
  if(!is_array($session_people) or count($session_people) === 0) {
    error_log('No people list provided');
    return;
  }

  /**
   * If second language is requested, append suitable suffix to all
   * field names available in lang2.
   */
  if($is_lang2) {
    $lang_suffix = '_lang2';
  }
    
  $session_people_blurb = '';

  /* If we have event-specific author info, use this */
  if($special_fields_prefix) {
    foreach($session_people as $this_person) {
      $affiliation = '';
      $session_people_blurb .= '<strong>' . $this_person['name'] . ' ' . $this_person['family_name'] . '</strong>';
      $affiliation = $this_person[$special_fields_prefix . '_affiliation' . $lang_suffix];
      
      /* if no event-specific blurb is available for person, fetch
       * generic person role and affiliation information from their
       * record */
      if(!$affiliation) { 
        $this_person_role = $this_person['role'];
        $this_person_organization = $this_person['organization'];
        var_trace($this_person_role, 'this_person_role');
        var_trace($this_person_organization, 'this_person_organization');
        if($this_person_role and $this_person_organization) {
          $affiliation = $this_person_role . ', ' . $this_person_organization;
        } elseif($this_person_organization) {
          $affiliation = $this_person_organization;
        }
      }
      
      /* if any blurb is available, add it to the session people blurb */
      if($affiliation) {
        $session_people_blurb .= ', ' . $affiliation;
      }
      
      /* add separator semicolon */
      $session_people_blurb .= '; ';
    }
    
    /* remove trailing semicolon */
    $session_people_blurb = preg_replace('/; $/', '', $session_people_blurb);
  } elseif($pod->field($blurb_field)) { /* otherwise, if per-session blurb is available, use this */
    $session_people_blurb = strip_tags($pod->field($blurb_field), $ALLOWED_TAGS_IN_BLURBS);
  }
  
  return $session_people_blurb;
}

function add_speakers_to_stash($special_fields_prefix, $is_lang2 = FALSE, $all_speakers, $session_speakers, $session_id, $session_title, $session_is_tbc = FALSE, $session_type_slug = '', $parent_session = null) {
  if(!is_array($session_speakers)) return $all_speakers;
  
  foreach($session_speakers as $session_speaker) {
    // Process speaker whether they are already in list or not as
    // we need to list all the sessions they are taking part in.
    $this_speaker = pods('authors', $session_speaker['slug']);
    $speaker_blurb_and_affiliation = generate_speaker_card_data($special_fields_prefix, $is_lang2, $session_speaker['slug']);

    // if speaker is to be confirmed on any sessions, mark them as to-be-confirmed
    $all_speakers[$session_speaker['slug']]['to-be-confirmed'] = $session_is_tbc;

    $all_speakers[$session_speaker['slug']]['name'] = $session_speaker['name'];
    $all_speakers[$session_speaker['slug']]['family_name'] = $session_speaker['family_name'];
    $all_speakers[$session_speaker['slug']]['blurb'] = $speaker_blurb_and_affiliation['blurb'];
    if($this_speaker->field('photo')) {
      $all_speakers[$session_speaker['slug']]['photo_uri'] = pods_image_url($this_speaker->field('photo'));
    } elseif($session_speaker['photo_legacy']) {
      $all_speakers[$session_speaker['slug']]['photo_uri'] = 'http://v0.urban-age.net' . $session_speaker['photo_legacy'];
    }
    $all_speakers[$session_speaker['slug']]['affiliation'] = $speaker_blurb_and_affiliation['affiliation'];

    // if session is a panel discussion ($session_type_slug == 'sessiontype-panel', include parent name session in session title to clarify
    // for which session this speaker is a panellist
    if('sessiontype-panel' === $session_type_slug and !empty($parent_session['name'])) {
      $this_session_title = $parent_session['name'] . ' - ' . $session_title;
    } else {
      $this_session_title = $session_title;
    }
    $all_speakers[$session_speaker['slug']]['speaker_in'][] = array($session_id, $this_session_title, $session_is_tbc);
  }
  
  return $all_speakers;
}

function generate_speaker_card_data($special_fields_prefix, $is_lang2 = FALSE, $person_slug) {
  $pod = pods('authors', $person_slug);
  
  /**
   * If second language is requested, append suitable suffix to all
   * field names available in lang2.
   */
  if($is_lang2) {
    $lang_suffix = '_lang2';
  }
    
  if($special_fields_prefix) {
    $affiliation = $pod->field($special_fields_prefix . '_affiliation' . $lang_suffix);
    $blurb = $pod->field($special_fields_prefix . '_blurb' . $lang_suffix);
  } else {
    $role = $pod->field('role');
    $organization = $pod->field('organization');
    
    if($role and $organization) {
      $affiliation = $role . ', ' . $organization;
    } elseif($organization) {
      $affiliation = $organization;
    }
    $blurb = $pod->field('profile_text');
  }
  
  return array(
    'blurb' => $blurb,
    'affiliation' => $affiliation
  );
}
