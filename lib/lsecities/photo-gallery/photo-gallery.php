<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

class PhotoGallery extends PodsObject {
  const PODS_NAME = 'gallery';

  /**
   * @var string $permalink The object's permalink
   * @var string $name The photo gallery's name
   * @var string $picasa_gallery_id If the gallery is stored in PicasaWeb, this is the Picasa gallery id
   * @var array $slides An array of slides (photos from WordPress' media library)
   * @var bool $allow_fullscreen Whether galleria should trigger fullscreen mode on click
   */
  const MAX_SLIDE_COUNT = 12;  // TECHNICAL_DEBT: remove once we can use Pods loop fields
  public $permalink;
  public $name;
  public $picasa_gallery_id;
  public $slides;
  public $allow_fullscreen;
  
  private $pod;

  function __construct($permalink, $allow_fullscreen = FALSE, $random_slide_order = FALSE) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);

    // If no such Pod is found, return false
    if(!$pod->exists()) {
      return FALSE;
    }

    $this->permalink = $pod->field('slug');
    $this->name = $pod->field('name');
    $this->picasa_gallery_id = $pod->field('picasa_gallery_id');
    $this->allow_fullscreen = $allow_fullscreen;

    // populate slides array; slide count starts from 1, not 0 (because content editors don't start counting from zero)
    foreach(range(1, self::MAX_SLIDE_COUNT) as $slide_index) {
      /*
       * TECHNICAL_DEBT: either make each Pod field single-value
       * (and remove the following array slicing on return value)
       * or handle multi-value fields here (migrating older data)
       * and remove slide02+ Pod fields
       */
      $slide = $pod->field(sprintf('slide%02d', $slide_index))[0];
      
      if($slide['ID']) {
        $this->slides[] = [
          'id' => $slide['ID'],
          'uri' => wp_get_attachment_url($slide['ID']),
          'slide' => $slide
        ];
      }
    }
  }
  
  function get_galleria_data($class) {
    $class = count($this->slides) == 1 ? $class . ' single' : $class;
      
    return [
      'permalink' => $this->permalink,
      'class' => $class,
      'slides' => $this->slides,
      'picasa_gallery_id' => $this->picasa_gallery_id,
      'allow_fullscreen' => $this->allow_fullscreen
    ];
  }
}

/**
 * Build data object to be used in templating
 * @param string $permalink The photo gallery's permalink
 * @param string $extra_classes Any extra classes to use for the gallery
 * @param bool $allow_fullscreen Whether to allow toggling galleria to fullscreen
 * @param bool $random_slide_order Whether to shuffle slides randomly
 * @return array Data structure with the photo gallery's full data
 */
function photo_gallery_get_galleria_data($permalink, $extra_classes = '', $allow_fullscreen = FALSE, $random_slide_order = FALSE) {
  $photo_gallery = new PhotoGallery($permalink, $allow_fullscreen, $random_slide_order);

  if(is_object($photo_gallery)) {
    $gallery = $photo_gallery->get_galleria_data($extra_classes);
    
    return $gallery;
  } else {
    return NULL;
  }
}
