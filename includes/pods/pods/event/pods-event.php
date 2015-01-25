<?php

namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

function people_list($people, $heading_singular, $heading_plural) {
  $output = '';
  $people_count = 0;
  $people_with_blurb_count = 0;
  
  if(is_array($people)) {
    if(count($people) > 1) {
      $output .= "<dt>$heading_plural</dt>\n";
    } else {
      $output .= "<dt>$heading_singular</dt>\n";
    }
    $output .= "<dd>\n";
    
    foreach($people as $person) {
      var_trace($person, 'people_list:$person');
      $people_count++;
      if($person['profile_text']) {
        $output .= '<a href="#person-profile-' . $person['slug'] . '">' . $person['name'] . ' ' . $person['family_name'] . "</a>, \n";
        $people_with_blurb_count++;
      } else {
        $output .= $person['name'] . '  ' . $person['family_name'] . ", \n";
      }
    }
    $output = substr($output, 0, -3);
    $output .= "</dd>\n";
  }
  
  return array('count' => $people_count, 'with_blurb' => $people_with_blurb_count, 'output' => $output, 'trace' => var_export($people, true));
}

function orgs_list($organizations) {
  $output = '';
  $org_count = count($organizations);
  
  $last_item = $organizations[$org_count - 1];
  
  foreach($organizations as $key => $org) {
    if($key == ($org_count - 1) and $org_count > 1) {
      $output .= " and ";
    }
    if($org['web_uri']) {
      $output .= '<a href=' . $org['web_uri'] . '>';
    }
    $output .= $org['name'];
    if($org['web_uri']) {
      $output .= '</a>';
    }
    // add comma up to the second to last element
    if($key < ($org_count - 2)) {
      $output .= ", ";
    }
  }
  
  return $output;
}

function pods_prepare_event($permalink) {
  $pod = pods('event', $permalink);
  
  if(!$pod->exists()) {
    redirect_to_404();
  }

  $event_object = new Event($permalink); // used to bring in stuff from OO-style Event, which will eventually replace this whole function
  
  // for menus etc.
  global $this_pod;
  $this_pod = new \LC\PodObject($pod, 'Events');

  // prepare array for return data structure
  $obj = array();

  lc_data('META_last_modified', $pod->field('modified'));

  $obj['slug'] = $permalink;
  $obj['title'] = $pod->field('name');
  
  $event_speakers = sort_linked_field($pod->field('speakers'), 'family_name', SORT_ASC);
  $event_respondents = sort_linked_field($pod->field('respondents'), 'family_name', SORT_ASC);
  $event_chairs = sort_linked_field($pod->field('chairs'), 'family_name', SORT_ASC);
  $event_moderators = sort_linked_field($pod->field('moderators'), 'family_name', SORT_ASC);
  $obj['event_all_the_people'] = array_merge((array)$event_speakers, (array)$event_respondents, (array)$event_chairs, (array)$event_moderators);
  var_trace($event_all_the_people, $TRACE_PREFIX);
  $obj['event_hashtag'] = ltrim($pod->field('hashtag'), '#');
  $obj['event_story_id'] = $pod->field('storify_id');

  $obj['speakers_output'] = people_list($event_speakers, "Speaker", "Speakers");
  $obj['respondents_output'] = people_list($event_respondents, "Respondent", "Respondents");
  $obj['chairs_output'] = people_list($event_chairs, "Chair", "Chairs");
  $obj['moderators_output'] = people_list($event_moderators, "Moderator", "Moderators");

  $obj['people_with_blurb'] = $obj['speakers_output']['with_blurb'] + $obj['respondents_output']['with_blurb'] + $obj['chairs_output']['with_blurb'] + $obj['moderators_output']['with_blurb'];

  $obj['event_blurb'] = do_https_shortcode($pod->display('blurb'));
  $obj['event_blurb_after_event'] = do_https_shortcode($pod->display('blurb_after_event'));
  var_trace($obj['event_blurb_after_event'], $TRACE_PREFIX . 'blurb_after_event');
  $obj['event_contact_info'] = do_shortcode($pod->display('contact_info'));

  $event_media_items = $pod->field('media_attachments');
  
  if(is_array($event_media_items)) {
    foreach($event_media_items as $item) {
      $item_pod = pods('media_item_v0', $item['id']);
      $slides_pdf_id = $item_pod->field('slides_pdf.ID', TRUE);
      if($slides_pdf_id) {
        $item['slides_uri'] = wp_get_attachment_url($slides_pdf_id);
      }
      $obj['event_media'][] = $item;
    }
  }
  
  // Set featured image, forcing 960px width and 2.5:1 ratio
  $obj['featured_image_uri'] = pods_image_url($pod->field('heading_image'), [960,384]);

  /**
   * event start and end
   * We only support a single timespan (i.e. an event with a session
   * per day for three days cannot be represented with this data:
   * we can only set the initial timestamp and final timestamp).
   * Events starting and ending on the same day will display
   * start and end date and time; events spanning over multiple
   * days will only show start date and end date.
   * We also output microdata attributes for machine parsing of pages
   * and better output on search engines supporting this.
   */
  
  // first, create DateTime objects
  $timezone = new \DateTimeZone('Europe/London'); // TODO: add timezone handling in Events pod
  $event_date_start = new \DateTime($pod->field('date_start'), $timezone);
  $event_date_start_ical = clone $event_date_start;
  $event_date_start_ical->setTimezone(new \DateTimeZone('UTC'));
  $event_date_end = new \DateTime($pod->field('date_end'), $timezone);
  $event_date_end_ical = clone $event_date_end;
  $event_date_end_ical->setTimezone(new \DateTimeZone('UTC'));
  
  // populate variables for microdata output
  $event_dtstart = $event_date_start_ical->format(DATE_ISO8601);
  $event_dtend = $event_date_end_ical->format(DATE_ISO8601);
  
  // populate variables for iCal output
  $obj['event_dtstart'] = $event_object->event_dtstart; // uses new Event class: obsolete once Events are switched to OO
  $obj['event_dtend'] = $event_object->event_dtend; // uses new Event class: obsolete once Events are switched to OO

  $datetime_now = new \DateTime('now');
  $obj['is_future_event'] = $event_object->is_future_event; // uses new Event class: obsolete once Events are switched to OO
  
  $obj['free_form_dates'] = $event_object->event_free_form_dates; // uses new Event class: obsolete once Events are switched to OO
  $obj['event_date_string'] = $event_object->event_date_string; // uses new Event class: obsolete once Events are switched to OO
  
  // uses new Event class: obsolete once Events are switched to OO
  if(empty($event_object->event_free_form_dates) or !$event_object->is_future_event) {
    $obj['addtocal_uri_google'] = $event_object->addtocal_uri_google;
  }
  
  $obj['event_location'] = $pod->field('venue.name');

  $event_type = $pod->field('event_type.name');
  $event_series = $pod->field('event_series.name');
  $event_host_organizations = orgs_list((array) $pod->field('hosted_by'));
  $event_partner_organizations = orgs_list((array) $pod->field('partners'));

  $obj['event_info'] = '';
  if($event_type) {
    $obj['event_info'] .= '<em>' . ucfirst($event_type) . '</em> ';
  } else {
    $obj['event_info'] .= 'An event ';
  }
  if($event_series) {
    $obj['event_info'] .= 'of the <em>' . $event_series . '</em> event series ';
  }
  if($event_host_organizations) {
    $obj['event_info'] .= 'hosted by ' . $event_host_organizations . ' ';
  } else {
    $obj['event_info'] .= 'hosted by LSE Cities ';
  }
  if($event_partner_organizations) {
    $obj['event_info'] .= 'in partnership with ' . $event_partner_organizations;
  }

  $poster_pdf = $pod->field('poster_pdf');
  $obj['poster_pdf'] = wp_get_attachment_url($poster_pdf[0]['ID']);
  
  $obj['event_page_uri'] = $_SERVER['SERVER_NAME'].PODS_BASEURI_EVENTS."/".$obj['slug'];
  
  $obj['picasa_gallery_id'] = $pod->field('picasa_gallery_id');
  $obj['photo_gallery_credits'] = $pod->field('photo_gallery_credits');
  
  return $obj;
}
