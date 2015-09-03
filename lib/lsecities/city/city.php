<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

if(!defined('CITIES_PODS_NAME')) {
  define('CITIES_PODS_NAME', 'city');
}

class City extends PodsObject {
  const PODS_NAME = CITIES_PODS_NAME;
  const PODS_PAGES_BASE_PATH = '/objects/geo/cities';

  public $permalink;
  public $name;

  /**
   * @var Country name + City name (e.g. United Kingdom|London)
   */
  public $hierarchical_name;

  /**
   * @var Float City's country
   */
  public $country;

  /**
   * @var Float City's longitude
   */
  public $lon;
  /**
   * @var Float City's latitude
   */
  public $lat;

  /**
   * @var Object The Pod object for this City
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
    $this->lon = $pod->field('lon');
    $this->lat = $pod->field('lat');

    $_country_id = $pod->field('country.id');

    $this->country = new Country($_country_id);

    $this->hierarchical_name = $this->country ? $this->country->name . '|' . $this->name : NULL;
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
