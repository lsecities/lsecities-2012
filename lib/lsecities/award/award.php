<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

if(!defined('AWARDS_PODS_NAME')) {
  define('AWARDS_PODS_NAME', 'award');
}

class Award extends PodsObject {
  const PODS_NAME = AWARDS_PODS_NAME;
  const PODS_PAGES_BASE_PATH = '/ua/db-ua-award';
  
  public $permalink;
  public $title;
  public $city;
  public $year;
  public $web_uri;
  public $photo;
  public $blurb;
    
  /**
   * @var Object The Pod object for this Award
   */
  private $pod;
  
  function __construct($permalink) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);
    
    // return if a Pod cannot be found
    if(!$pod->exists()) {
      return;
    }
    
    $this->permalink = $pod->field('slug');
    $this->title = $pod->field('name');
    
    $this->city = $pod->field('city');
    $this->year = $pod->field('year');
    $this->web_uri = $pod->field('web_uri');
    $this->photo = wp_get_attachment_url($pod->field('heading_photo.ID'));
    $this->blurb = $pod->field('blurb');    
  }
  
  /**
   * Serialize object vars to JSON
   * @return string A JSON serialization of the object
   */
  function to_json() {
    $vars = get_object_vars($this);
    unset($vars['pod']);
    return json_encode($vars);
  }
}

/**
 * Given an array of params corresponding to those accepted by
 * pods() ($id parameter), return an array of Award objects
 * 
 * @param Array $pods_params An array of parameters to pass on to the
 *   pods() function (see Pods documentation - http://pods.io/docs/code/pods/).
 * @param Array $params An array of parameters to specify how the
 *   award objects should be handled (e.g. post-Pods sorting
 *   based on other data, etc.).
 * @return Array|Bool An array of award objects, if any
 *   are found, or FALSE if none is found.
 */
function award_pods($pods_params = [], $params = []) {
  $pods = pods(AWARDS_PODS_NAME, $pods_params);
  
  $objects = [];
  
  if($pods->total_found() > 0) {
    while($pods->fetch()) {
      $objects[] = new Award($pods->field('slug'));
    }
    
    return $objects;
  } else {
    return FALSE;
  }
}
