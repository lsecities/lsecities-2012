<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

class WPPage extends PodsObject {
  const PODS_NAME = 'page';
  const PODS_PAGES_BASE_PATH = '/objects/research-projects';
  
  public $id;
  public $permalink;
  public $post_class;
  public $main_content_class;
  public $title;
  public $main_content;
  public $extra_content;
  public $featured_image;
  public $tabs;
  
  private $pod;
  
  function __construct($id) {
    // check if a page with given $id really exists
    if(FALSE === get_post_status($id)) {
      return NULL;
    }
    
    $this->id = $id;
    $this->pod = pods('page', $id);
    $this->title = get_the_title($this->id);
    $this->main_content = do_shortcode(wpautop(get_the_content($this->id)));
    $this->extra_content = honor_ssl_for_attachments(do_shortcode($this->pod->get_field('extra_content')));
    
    $__post_thumbnail_id = get_post_thumbnail_id($this->id);
    
    $this->featured_image = [
      'id' => $__post_thumbnail_id,
      'uri' => wp_get_attachment_url($__post_thumbnail_id)
    ];

    $this->post_class = get_post_class($this->id);
    $this->main_content_class = empty($this->extra_content) ? 'twelvecol' : 'eightcol';  // TECH_DEBT: this won't be needed when we move away from 1140px css grid (legacy cssgrid.net)
    
  }
}
