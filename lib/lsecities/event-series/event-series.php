<?php
/**
 * EventSeries class
 * 
 * @package LSECities2012
 */
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

class EventSeries extends PodsObject {
  use ObjectWithTimespan {
    ObjectWithTimespan::__construct as private __ObjectWithTimespanConstructor;
  }
  
  const PODS_NAME = 'event_series';

  public $permalink;
  public $link_to_self;
  
  /**
   * @var Bool While we use the same template as conferences, setting
   * this variable to TRUE for event series allows us to apply any
   * page customizations that may be needed for event series.
   */
  public $is_event_series;
  public $conference_title;
  public $conference_tagline;
  
  public $event_series_hashtag;

  /**
   * @var Array The events part of this series
   */
  public $events;
  
  public $event_blurb;
  public $contact_info;
  public $event_media;
  public $featured_image_uri;
  public $heading_gallery;
  
  public $display_timespan;
  
  public $hide_full_event_calendar_in_sidebars;
  
  /**
   * @var Array Data structure with event programme (includes:
   * sessions - and related media if available, speakers)
   */
  public $event_programme;
  
  public $date_start;
  public $date_end;
  public $date_span;
    
  private $pod;

  function __construct($permalink) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);
      
    // return if a Pod cannot be found
    if(!$pod->exists()) {
      return;
    }
    
    $this->is_event_series = TRUE;
    
    $this->permalink = $pod->field('permalink');

    $this->link_to_self = '/ua/events/s/global-debates';

    $this->conference_title = $pod->field('name');
    $this->conference_tagline = $pod->field('tagline');

    $this->event_blurb = do_shortcode($pod->display('blurb'));
    
    $this->featured_image_uri = pods_image_url($pod->field('heading_image'), [1280,512]);
    
    $this->display_timespan = $pod->field('display_timespan');
    $this->hide_full_event_calendar_in_sidebars = $pod->field('hide_full_event_calendar_in_sidebars');
  }


  /**
   * Fetch list of linked events
   * This is not done in __construct() to avoid circular loops (we build
   * an EventSeries object from Events that are part of an events series)
   */
  function fetch_events() {
    // Get list of ids of all linked events
    $__event_ids = $this->pod->field('events.id');
    
    /**
     * Some event series may not have any events linked to them yet:
     * if so, just set the member function accordingly and avoid
     * any further processing.
     */
    if(!is_array($__event_ids)) {
      $this->events = [];
    } else {
      /**
       * If event series contains events, add them to the object
       * and also infer start date and end date from first and
       * last event in the series
       */
      $__pods = pods('event',
        [
          'orderby' => 'date_start ASC',
          'where' => 'id IN (' . implode(',', $__event_ids) . ')'
        ]
      );
      
      $__sorted_event_ids = [];
      while($__pods->fetch()) {
        $__sorted_event_ids[] = $__pods->id();
      }
      
      $this->events = array_map(
        function($id) { $__pod = new Event($id, [ 'child_object' => TRUE]); return $__pod->to_var(); },
        $__sorted_event_ids
      );
      
      /**
       * now that we have linked events to the event series, we can
       * work out the date span of the series
       */
      $this->fetch_series_date_span();
    }
  }
  
  /**
   * Calculate and store start and end dates of event series
   */
  function fetch_series_date_span() {
    try {
      /**
       * fetch event of first and last event in the series,
       * check the year (used later to avoid adding year in start date
       * within timespan) and store string representation in relevant
       * member variables.
       */
      $__date_start = $this->date_of_event(0);
      $__date_start_year = $__date_start->format('Y');
      $__date_end = $this->date_of_event(-1);
      $__date_end_year = $__date_end->format('Y');

      $this->date_start = $__date_start->format('j F Y');
      $this->date_end = $__date_end->format('j F Y');


      /**
       * just return now if we are not supposed to show the event
       * series'  timespan anywhere - we just don't store it in the
       * date_timespan member variable.
       */
      if(!$this->display_timespan) {
        return;
      }
      
      /**
       * If start and end date of event series fall within the same year
       * only add year to end date, in timespan
       */
      if($__date_start_year === $__date_end_year) {
        $this->date_span = $this->date_start === $this->date_end ? $this->date_start : $__date_start->format('j F') . '—' . $this->date_end;
      } else {
        $this->date_span = $this->date_start === $this->date_end ? $this->date_start : $this->date_start . '—' . $this->date_end;
      }
    } catch (Exception $e) {
      $this->date_span = NULL;
    }
  }
  
  /**
   * Return date of Nth event of the series
   * @param Integer $index Index of event within the series; this is
   * used as a PHP array index, so -1 would be the last, etc.; by
   * default, date of the first event of the series is returned
   * @return DateTime|NULL DateTime object with event (start) date;
   * if no event with such index can be found, an exception will
   * be thrown
   */
  function date_of_event($index = 0) {
    // Check if requested index is either 0 or -1, throw exception otherwise
    if(0 !== $index and -1 !== $index) {
      throw new Exception("I was asked to find an event whose index is neither 0 (first) nor -1 (last): giving up.");
    }
    if(0 === $index) {
      $__requested_event = $this->events[0];
    } elseif(-1 === $index) {
      $__requested_event = $this->events[array_pop(array_keys($this->events))];
    }
    
    if(is_array($__requested_event)) {
      return new \DateTime($__requested_event['datetime_start']);
    } else {
      throw new Exception("I was asked to find an event with index $index (or i assumed so if no explicit index was given) but no event with such index can be found.");
    }
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
