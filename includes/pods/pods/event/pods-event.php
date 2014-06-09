<?php

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

function pods_prepare_event($pod_slug) {
  $pod = pods('event');
  $pod->find(array('where' => "t.slug = '" . $pod_slug . "'"));

  if(!$pod->total_found()) {
    redirect_to_404();
  }

  $pod->fetch();

  // for menus etc.
  global $this_pod;
  $this_pod = new LC\PodObject($pod, 'Events');

  // prepare array for return data structure
  $obj = array();

  lc_data('META_last_modified', $pod->field('modified'));

  var_trace('pod_slug: ' . $pod_slug, $TRACE_PREFIX);
  
  $obj['slug'] = $pod_slug;
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
  
  $obj['slider'] = $pod->field('slider');
  if(!$obj['slider']) {
    $obj['featured_image_uri'] = get_the_post_thumbnail(get_the_ID(), array(960,367));
  }

  // grab the image URI from the Pod
  $attachment_ID = $pod->field('heading_image.ID', TRUE);
  $obj['featured_image_uri'] = wp_get_attachment_url($attachment_ID);

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
  $event_date_start = new DateTime($pod->field('date_start'));
  $event_date_end = new DateTime($pod->field('date_end'));
  
  // populate variables for microdata output
  $event_dtstart = $event_date_start->format(DATE_ISO8601);
  $event_dtend = $event_date_end->format(DATE_ISO8601);
  
  // populate variables for iCal output
  $obj['event_dtstart'] = $event_date_start->format('Ymd').'T'.$event_date_start->format('His').'Z';
  $obj['event_dtend'] = $event_date_end->format('Ymd').'T'.$event_date_end->format('His').'Z';

  $datetime_now = new DateTime('now');
  $obj['is_future_event'] = ($event_date_start > $datetime_now) ? true : false;
  
  /**
   * if the free_form_event_date field is filled in and the event is a
   * future event, this means that the event is planned for some
   * approximate time in the future but an exact date/time hasn't been
   * set yet, we just use the value of this field as event_date_string
   */
  $free_form_event_date = $pod->field('free_form_event_date');
  if($free_form_event_date and $obj['is_future_event']) {
    $obj['event_date_string'] = $obj['free_form_event_data'] = $free_form_event_date;
  } else {
    // depending on whether event starts and ends on the
    // same day or on distinct days (see above), generate strings
    // for human-readable output, with microdata embedded in as appropriate
    if($event_date_start->format('Y-m-d') != $event_date_end->format('Y-m-d')) {
      $obj['event_date_string'] = '<time class="dt-start dtstart" itemprop="startDate" datetime="' . $event_dtstart . '">' . $event_date_start->format("l j F Y") . '</time>';
      $obj['event_date_string'] .= ' to ';
      $obj['event_date_string'] .= '<time class="dt-end dtend" itemprop="endDate" datetime="' . $event_dtend . '">' . $event_date_end->format("l j F Y") . '</time>';    
    } else {
      $obj['event_date_string'] = $event_date_start->format("l j F Y") . ' | ';
      $obj['event_date_string'] .= '<time class="dt-start dtstart" itemprop="startDate" datetime="' . $event_dtstart . '">' . $event_date_start->format("H:i") . '</time>';
      $obj['event_date_string'] .=  '-' . '<time class="dt-end dtend" itemprop="endDate" datetime="' . $event_dtend . '">' . $event_date_end->format("H:i") . '</time>';
    }
    
    // AddToCalendar URIs
    $obj['addtocal_uri_google'] = 'http://www.google.com/calendar/event?action=TEMPLATE&text='.
      $obj['title']
      .'&dates='.$obj['event_dtstart'].'/'.$obj['event_dtend']
      .'&details=&'
      .'location='.$obj['event_location']
      .'&trp=false&'
      .'sprop='.urlencode($obj['event_page_uri']).'&sprop=name:';
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
