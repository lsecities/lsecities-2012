<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

class Event extends PodsObject {
  use ObjectWithTimespan {
    ObjectWithTimespan::__construct as private __ObjectWithTimespanConstructor;
  }

  const PODS_NAME = 'event';
  const BASE_URI = '/media/objects/events';

  /**
   * @var String This is the human-friendly unique id of the object (e.g. 'rebel-cities')
   */
  public $permalink;

  /**
   * @var String This is the canonical (relative) URI for the page of this event:
   * basically the BASE_URI for this class + the permalink
   */
  public $link_to_self;

  public $title;
  public $tagline;

  /**
   * @var String HTML embed code for live streaming
   * @var String HTML embed code for Twitter embedded timeline
   */
  public $live_streaming_video_embedcode;
  public $twitter_embedded_timeline_code;


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

  /**
   * @var Array Data structure with event programme (includes:
   * sessions - and related media if available, speakers)
   */
  public $event_programme;

  /**
   * @var Array The array_vars of the event series of which this event
   * is part, if any
   */
  public $event_series;

  public $datetime_start;
  public $datetime_end;
  public $is_live_now;

  /**
   * @var string Only day of month and month to be used in lists
   * in section navigation
   */
  public $event_date_for_navigation;
  public $free_form_event_dates;

  public $event_location;
  public $event_info;
  public $poster_pdf;
  public $event_page_uri;
  public $picasa_gallery_id;
  public $photo_gallery_credits;

  private $pod;

  function __construct($permalink, $options = []) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);

    // return if a Pod cannot be found
    if(!$pod->exists()) {
      return;
    }

    $this->permalink = $pod->field('slug');
    $this->link_to_self = self::BASE_URI . '/' . $this->permalink;
    $this->title = $pod->field('name');
    $this->tagline = $pod->field('tagline');

    $this->event_page_uri = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . PODS_BASEURI_EVENTS . "/" . $this->permalink;

    $this->event_hashtag = ltrim($pod->field('hashtag'), '#');
    $this->event_story_id = $pod->field('storify_id');

    $this->live_streaming_video_embedcode = $pod->field('live_streaming_video_embedcode');
    $this->twitter_embedded_timeline_code = $pod->field('twitter_embedded_timeline_code');

    /**
     * Event programme
     * If we have an Event programme associated to the event, use
     * that to generate list of programme sessions and speakers lists;
     * otherwise, use the Event's field (speakers/respondents/chairs/
     * moderators) for these.
     */
    $__event_programme_id = $pod->field('event_programme.id');

    if($__event_programme_id and FALSE) {
      $__event_programme = new EventProgramme($__event_programme_id);
      $this->event_programme = $__event_programme->to_var();
    } else {
      /**
       * Let's deal with event actants. That is, speakers, respondents,
       * chairs, moderators. They can be either people or organizations.
       * And their participation may be unconfirmed yet.
       */
      $event_speakers = \sort_linked_field($pod->field('speakers'), 'family_name', SORT_ASC);
      $event_respondents = \sort_linked_field($pod->field('respondents'), 'family_name', SORT_ASC);
      $event_chairs = \sort_linked_field($pod->field('chairs'), 'family_name', SORT_ASC);
      $event_moderators = \sort_linked_field($pod->field('moderators'), 'family_name', SORT_ASC);
      $event_panelists = \sort_linked_field($pod->field('panelists'), 'family_name', SORT_ASC);

      $this->all_actants = array_map([$this, 'event_speaker_profile_wpautop_fn'], array_merge((array)$event_speakers, (array)$event_respondents, (array)$event_chairs, (array)$event_moderators, (array)$event_panelists));

      /** TECHNICAL_DEBT: assemble the four arrays before in a sensible
       * way - requires either incorporating the code above in
       * people_list() or cleaning up anyways the way these lists are
       * generated
       */
      $this->actants['speakers'] = array_merge(
        [ 'list' => $event_speakers ],
        $this->people_list($event_speakers, "Speaker", "Speakers")
      );

      $this->actants['respondents'] = array_merge(
        [ 'list' => $event_respondents ],
        $this->people_list($event_respondents, "Respondent", "Respondents")
      );

      $this->actants['panelists'] = array_merge(
        [ 'list' => $event_panelists ],
        $this->people_list($event_panelists, "Panelist", "Panelists")
      );

      $this->actants['chairs'] = array_merge(
        [ 'list' => $event_chairs ],
        $this->people_list($event_chairs, "Chair", "Chairs")
      );

      $this->actants['moderators'] = array_merge(
        [ 'list' => $event_moderators ],
        $this->people_list($event_moderators, "Moderator", "Moderators")
      );

      $this->actants['people_with_blurb'] =
        $this->actants['speakers']['with_blurb'] +
        $this->actants['respondents']['with_blurb'] +
        $this->actants['chairs']['with_blurb'] +
        $this->actants['moderators']['with_blurb'] +
        $this->actants['panelists']['with_blurb'];
    }

    $this->datetime_start = $pod->field('date_start');
    $this->datetime_end = $pod->field('date_end');
    $this->free_form_event_dates = $pod->field('free_form_dates');

    $this->event_location = $pod->field('venue.name');

    $this->__ObjectWithTimespanConstructor($this->datetime_start, $this->datetime_end, $this->free_form_event_dates);

    $this->event_date_for_navigation = $this->event_start->format('j F Y');


    $event_type = $pod->field('event_type.name');
    $event_series = $pod->field('event_series.name');
    $event_host_organizations = $this->orgs_list((array) $pod->field('hosted_by'));
    $event_partner_organizations = $this->orgs_list((array) $pod->field('partners'));

    $this->event_info = '';
    if($event_type) {
      $this->event_info .= '<em>' . ucfirst($event_type) . '</em> ';
    } else {
      $this->event_info .= 'An event ';
    }
    if($event_series) {
      $this->event_info .= 'of the <em>' . $event_series . '</em> series ';
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


    $this->picasa_gallery_id = $pod->field('picasa_gallery_id');
    $this->photo_gallery_credits = $pod->field('photo_gallery_credits');


    if($this->is_live([30,-30])) {
      $this->is_live_now = TRUE;
    }

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

    if(!$options['child_object']) {
      // Set featured image, forcing 960px width and 2.5:1 ratio
      $this->featured_image_uri = pods_image_url($pod->field('heading_image'), [960,384]);

      // If a heading photo gallery is provided, use it instead of the single featured image
      $heading_gallery_permalink = $pod->field('heading_gallery.slug');

      if($heading_gallery_permalink) {
        $this->heading_gallery = photo_gallery_get_galleria_data($heading_gallery_permalink, 'fullbleed');
      }
    }
  }

  /**
   * Fetch parent event series, if any
   * This is not done in __construct() to avoid circular loops (we build
   * a Event objects in the parent EventSeries)
   */
  function fetch_events_series() {
    $__event_series_id = $this->pod->field('event_series.id');

    if(!empty($__event_series_id)) {
      $__event_series = new EventSeries($__event_series_id);
      $this->event_series = get_object_vars($__event_series);
    }
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

    /**
     * in order to retrieve a person's photo, we need to get the
     * person's full Pod as the photo field is a linked field
     * and doesn't get captured via the relationship from parent (speakers, chairs, etc.)
     */
    $pod = pods('authors', $person['slug']);
    $person['photo_uri'] = \pods_image_url($pod->field('photo'), [150,150]);

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

  /**
   * Serialize object vars to JSON
   * @param Array $options An associative array of options:
   *   'shallow' (bool) default: FALSE - If false, most details of linked
   *      objects (if any) will be added to the returned data
   *      structure; otherwise, only basic data from linked objects will
   *      be added (e.g. people names only)
   * @return String A JSON serialization of the object
   */
  function to_json($options) {
    return json_encode($this->to_var($options),  JSON_PRETTY_PRINT);
  }

  function to_var($options) {
    // set defaults
    if(!array_key_exists('shallow', $options)) {
      $options['shallow'] = FALSE;
    }
    if(!array_key_exists('full_content', $options)) {
      $options['full_content'] = TRUE;
    }

    if($options['full_content']) {
      $vars = get_object_vars($this);
      unset($vars['pod']);

      return $vars;
    } else {
      return $this->permalink;
    }
  }
}

function event_get_data($permalink) {
}
