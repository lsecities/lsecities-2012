<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Class for basic page data (page here is meant the
 * main HTML document of an HTTP response)
 */
class Page {
  /**
   * @var String The full URI of the current HTML page
   */
  public $uri;

  /**
   * @var String The (HTML) <title> of the current page
   */
  public $title;

  /**
   * @var String A title suitable for social media sharing (includes site name)
   */
  public $title_for_citations;

  function __construct() {
    //$this->uri = preg_replace('/\?siteid=.*$/', '', get_current_page_URI());
    $this->uri = [
      'plain' => get_current_page_URI(),
      'urlencoded' => urlencode(get_current_page_URI())
    ];
    $this->title = wp_title( '|', FALSE, 'right' );
    $this->title_for_citations = $this->title . ' — ' . get_bloginfo( 'name' );
  }

  /**
   * Return object variables
   */
  function to_var() {
    return get_object_vars($this);
  }
}
