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
   */
  const MAX_SLIDE_COUNT = 12;  // TECHNICAL_DEBT: remove once we can use Pods loop fields
  public $permalink;
  public $name;
  public $picasa_gallery_id;
  public $slides;
  
  private $pod;

  function __construct($permalink, $random_slide_order = FALSE) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);

    // If no such Pod is found, return false
    if(!$pod->exists()) {
      return FALSE;
    }

    $this->permalink = $pod->field('slug');
    $this->name = $pod->field('name');
    $this->picasa_gallery_id = $pod->field('picasa_gallery_id');

    // populate slides array; slide count starts from 1, not 0 (because content editors don't start counting from zero)
    foreach(range(1, self::MAX_SLIDE_COUNT) as $slide_index) {
      $slide = $pod->field(sprintf('slide%02d', $slide_index));
      
      echo '<!-- slide: ' . var_export($slide, TRUE) . ' -->';

      if($slide['ID']) {
        $this->slides[] = [
          'id' => $slide['ID'],
          'uri' => wp_get_attachment_url($slide['ID']),
          'slide' => $slide
        ];
        
        echo '<!-- slide: ' . var_export($slide, TRUE) . ' -->';
      }
    }
    
    echo '<!-- slides: ' . var_export($this->slides, TRUE) . ' -->';
  }
  
  function get_galleria_data() {
    return [
      'permalink' => $this->permalink,
      'class' => count($this->slides) == 1 ? 'single' : '',
      'slides' => $this->slides
    ];
  }
}

/**
 * Build data object to be used in templating
 * @param string $permalink The photo gallery's permalink
 * @param bool $random_slide_order Whether to shuffle slides randomly
 * @return array Data structure with the photo gallery's full data
 */
function photo_gallery_get_galleria_data($permalink, $random_slide_order = FALSE) {
  $photo_gallery = new PhotoGallery($permalink, TRUE);

  if(is_object($photo_gallery)) {
    return $photo_gallery->get_galleria_data();
  } else {
    return NULL;
  }
}
