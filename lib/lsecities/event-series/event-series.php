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
  
  /**
   * @var Array Data structure with event programme (includes:
   * sessions - and related media if available, speakers)
   */
  public $event_programme;
  
  public $datetime_start;
  public $datetime_end;
    
  private $pod;

  function __construct($permalink) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);
      
    // return if a Pod cannot be found
    if(!$pod->exists()) {
      return;
    }
    
    $this->is_event_series = TRUE;
    
    $this->permalink = $pod->field('permalink');
    $this->conference_title = $pod->field('name');
    $this->conference_tagline = $pod->field('tagline');

    $this->event_blurb = do_shortcode($pod->display('blurb'));
    
    $this->featured_image_uri = pods_image_url($pod->field('heading_image'), [1280,512]);
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
