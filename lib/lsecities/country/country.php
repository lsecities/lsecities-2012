<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

if(!defined('COUNTRIES_PODS_NAME')) {
  define('COUNTRIES_PODS_NAME', 'country');
}

class Country extends PodsObject {
  const PODS_NAME = COUNTRIES_PODS_NAME;
  const PODS_PAGES_BASE_PATH = '/objects/geo/countries';

  public $permalink;
  public $name;

  /**
   * @var Object The Pod object for this Country
   */
  private $pod;

  function __construct($permalink) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);

    // return if a Pod cannot be found
    if(!$pod->exists()) {
      return;
    }

    $this->permalink = $pod->field('permalink');
    $this->name = $pod->field('name');
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
