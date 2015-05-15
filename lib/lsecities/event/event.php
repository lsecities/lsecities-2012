<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

class Event extends PodsObject {
  use ObjectWithTimespan {
    ObjectWithTimespan::__construct as private __ObjectWithTimespanConstructor;
  }
  
  const PODS_NAME = 'event';

  public $permalink;
  public $title;
  public $event_hashtag;
  public $event_story_id;
  // these are either people (speakers, chairs, etc.) or organizations, so let's call them actants
  public $actants;
  public $all_actants;
  public $blurb;
  public $contact_info;
  public $event_media;
  public $featured_image_uri;
  public $heading_gallery;
  
  public $datetime_start;
  public $datetime_end;
  public $free_form_event_dates;

  public $event_location;
  public $event_info;
  public $poster_pdf;
  public $event_page_uri;
  public $picasa_gallery_id;
  public $photo_gallery_credits;
    
  private $pod;

  function __construct($permalink) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);
      
    // return if a Pod cannot be found
    if(!$pod->exists()) {
      return;
    }
    
    $this->permalink = $pod->field('slug');
    $this->title = $pod->field('name');
    
    $this->event_hashtag = ltrim($pod->field('hashtag'), '#');
    $this->event_story_id = $pod->field('storify_id');
  
    /**
     * Let's deal with event actants. That is, speakers, respondents,
     * chairs, moderators. They can be either people or organizations.
     * And their participation may be unconfirmed yet.
     */
    $event_speakers = \sort_linked_field($pod->field('speakers'), 'family_name', SORT_ASC);
    $event_respondents = \sort_linked_field($pod->field('respondents'), 'family_name', SORT_ASC);
    $event_chairs = \sort_linked_field($pod->field('chairs'), 'family_name', SORT_ASC);
    $event_moderators = \sort_linked_field($pod->field('moderators'), 'family_name', SORT_ASC);
  
    $this->all_actants = array_map([$this, 'event_speaker_profile_wpautop_fn'], array_merge((array)$event_speakers, (array)$event_respondents, (array)$event_chairs, (array)$event_moderators));
  
    $this->actants['speakers'] = [
      'list' => $event_speakers,
      'output' => people_list($event_speakers, "Speaker", "Speakers")
    ];
    $this->actants['respondents'] = [
      'list' => $event_respondents,
      'output' => people_list($event_respondents, "Respondent", "Respondents")
    ];
    $this->actants['chairs'] = [
      'list' => $event_chairs,
      'output' => people_list($event_chairs, "Chair", "Chairs")
    ];
    $this->actants['moderators'] = [
      'list' => $event_moderators,
      'output' => people_list($event_moderators, "Moderator", "Moderators")
    ];
    
    $this->actants['people_with_blurb'] = $this->actants['speakers']['output']['with_blurb'] + $this->actants['respondents']['output']['with_blurb'] + $this->actants['chairs']['output']['with_blurb'] + $this->actants['moderators']['output']['with_blurb'];
    
    $this->datetime_start = $pod->field('date_start');
    $this->datetime_end = $pod->field('date_end');
    $this->free_form_event_dates = $pod->field('free_form_dates');

    $this->__ObjectWithTimespanConstructor($this->datetime_start, $this->datetime_end, $this->free_form_event_dates);
    
    $event_blurb = do_https_shortcode($pod->display('blurb'));
    $event_blurb_after_event = do_https_shortcode($pod->display('blurb_after_event'));
    
    if($this->is_future_event or empty($event_blurb_after_event)) {
      $this->blurb = $event_blurb;
    } elseif(!empty($event_blurb_after_event)) {
      $this->blurb = $event_blurb_after_event;
    }
    
    $this->contact_info = do_shortcode($pod->display('contact_info'));
    
    $event_media_items = $pod->field('media_attachments');
  
    if(is_array($event_media_items)) {
      foreach($event_media_items as $item) {
        $item_pod = pods('media_item_v0', $item['id']);
        $slides_pdf_id = $item_pod->field('slides_pdf.ID', TRUE);
        if($slides_pdf_id) {
          $item['slides_uri'] = wp_get_attachment_url($slides_pdf_id);
        }
        $this->event_media[] = $item;
      }
    }
    
    // Set featured image, forcing 960px width and 2.5:1 ratio
    $this->featured_image_uri = pods_image_url($pod->field('heading_image'), [960,384]);
    
    // If a heading photo gallery is provided, use it instead of the single featured image
    $heading_gallery_permalink = $pod->field('heading_gallery.slug');
    
    if($heading_gallery_permalink) {
      $this->heading_gallery = photo_gallery_get_galleria_data($heading_gallery_permalink, 'fullbleed');
    }
    
    $this->event_location = $pod->field('venue.name');

    $event_type = $pod->field('event_type.name');
    $event_series = $pod->field('event_series.name');
    $event_host_organizations = orgs_list((array) $pod->field('hosted_by'));
    $event_partner_organizations = orgs_list((array) $pod->field('partners'));

    $this->event_info = '';
    if($event_type) {
      $this->event_info .= '<em>' . ucfirst($event_type) . '</em> ';
    } else {
      $this->event_info .= 'An event ';
    }
    if($event_series) {
      $this->event_info .= 'of the <em>' . $event_series . '</em> event series ';
    }
    if($event_host_organizations) {
      $this->event_info .= 'hosted by ' . $event_host_organizations . ' ';
    } else {
      $this->event_info .= 'hosted by LSE Cities ';
    }
    if($event_partner_organizations) {
      $this->event_info .= 'in partnership with ' . $event_partner_organizations;
    }

    $poster_pdf = $pod->field('poster_pdf');
    $this->poster_pdf = wp_get_attachment_url($poster_pdf[0]['ID']);
    
    $this->event_page_uri = $_SERVER['SERVER_NAME'].PODS_BASEURI_EVENTS."/".$this->permalink;
    
    $this->picasa_gallery_id = $pod->field('picasa_gallery_id');
    $this->photo_gallery_credits = $pod->field('photo_gallery_credits');
  }
  
  /**
   * Apply do_https_shortcode() and wpautop() to profile_text field of
   * person profile; to be used via array_map.
   * @param Array $person The person data structure
   * @return Array The person data structure with filters applied to
   *   its profile_text field
   */
  function event_speaker_profile_wpautop_fn($person) {
    // NOOP if no data is passed in
    if(!is_array($person)) {
      return;
    }
    
    $person['profile_text'] = \do_https_shortcode(\wpautop($person['profile_text']));
    return $person;
  }
  
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
}

function event_get_data($permalink) {
}
