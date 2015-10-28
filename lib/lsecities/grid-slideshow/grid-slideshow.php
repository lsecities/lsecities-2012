<?php
/**
 * EventSeries class
 * 
 * @package LSECities2012
 */
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

class GridSlideshow extends PodsObject {
  const PODS_NAME = 'grid_slideshow';

  public $permalink;
  
  public $title;
  
  /**
   * @var String HTML content of the slideshow
   * TECHNICAL_DEBT: This should really be structured content,
   * not a single WYSIWYG area with <sections> nested in it according
   * to what is needed for Reveal.js. But since doing so without
   * loop fields in Pods would require extensive ad-hoc bending of
   * WP's features (e.g. using nested pages, or a fixed amount
   * of WYSIWYG fields in the GridSlideshow Pod), and we initially only
   * need this for a single article, this will have to wait until
   * loop fields are stable in Pods - and even then, if we really need
   * something reusable rather than one-off as when this is being built.
   */
   
  public $content;
    
  private $pod;

  function __construct($permalink) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);
      
    // return if a Pod cannot be found
    if(!$pod->exists()) {
      return;
    }
    
    $this->permalink = $permalink;
    $this->title = $pod->field('name');
    $this->content = $pod->field('slides');
    
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
