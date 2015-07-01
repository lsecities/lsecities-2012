<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

if(!defined('SECTION_FRONTS_PODS_NAME')) {
  define('SECTION_FRONTS_PODS_NAME', 'section_front');
}

class SectionFront extends PodsObject {
  const PODS_NAME = SECTION_FRONTS_PODS_NAME;
  
  // TECHNICAL_DEBT: this shouldn't be hardcode here; moreover this
  // way of managing tiles is going to disappear as part of #102
  const TILES_PER_COLUMN = 2;
  
  public $permalink;
  
  /**
   * Content associated to research project (events, publications,
   * posts, data visualizations, other outputs...)
   */
  /**
   * @var Array Events associated to a research project
   */
  public $linked_events;
  
  /**
   * @var String Twitter timeline ID - used to generate a Twitter
   *   widget HTML fragment based on the timeline ID associated to
   *   a Twitter timeline (https://dev.twitter.com/web/embedded-timelines/search)
   */
  public $twitter_embedded_timeline_id;
  
  public $news_categories;
  public $flexslider_configuration;
  public $slides;
  
  public $latest_update;
    
  /**
   * @var Object The Pod object for this SectionFront
   */
  private $pod;
  
  function __construct($permalink) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);
    
    // return if a Pod cannot be found
    if(!$pod->exists()) {
      return;
    }

    $this->permalink = $permalink;
    
    // TECHNICAL_DEBT: do we still need this? (backported from non-OO code)
    // TECHNICAL_DEBT: moreover, we shouldn't mix global state in here
    // for menus etc.
    global $this_pod;
    $this_pod = new \LC\PodObject($pod, 'Frontpage');
  
    // TECHNICAL_DEBT: we should avoid mixing global state in object constructor
    $this->latest_update = lc_data('META_last_modified', $pod->field('modified'));
    
    $this->twitter_embedded_timeline_id = $pod->field('twitter_embedded_timeline_id');
    
    $this->news_categories = $pod->field('news_categories.slug');
    
    /**
     * Read any jquery options and set global variable accordingly; these
     * options are used in the footer.php template.
     * These options need to be stored as valid JSON; as this JSON
     * fragment is ultimately used in an HTML5 data attribute and then
     * parsed by jQuery.data() via jQuery.parseJSON(), but MtHAML outputs
     * HTML attributes delimited by double quotes ("), we need to first
     * replace here all the JSON double quotes with single quotes so that
     * JSON is 'correctly' stored as data attribute, then in the JS code
     * we replace back all single quotes with double quotes before
     * loading the JSON fragment...
     * Twisted, but that's the only way i can think of.
     */
    $this->flexslider_configuration = str_replace('"', "'", $pod->field('flexslider_configuration'));
    
    $slides = sort_linked_field($pod->field('slides'), 'displayorder', SORT_ASC);
    
    if(is_array($slides)) {
      foreach($slides as $slide) {
        $this->slides[] = $this->compose_slide($slide['slug']);
      }
    }

    $this->linked_events = sort_linked_field($pod->field('linked_events'), 'date_start', SORT_DESC);
  }
  
  function get_tile_classes($tile_layout) {
    $element_classes = '';

    $xcount = substr($tile_layout, 0, 1);
    $ycount = substr($tile_layout, -1);

    switch($xcount) {
      case '1':
        $element_classes .= 'onetile';
        break;
      case '2':
        $element_classes .= 'twotiles';
        break;
      case '3':
        $element_classes .= 'threetiles';
        break;
      case '4':
        $element_classes .= 'fourtiles';
        break;
      case '5':
        $element_classes .= 'fivetiles';
        break;
    }

    switch($ycount) {
      case '2':
        $element_classes .= ' tall';
        break;
    }

    return $element_classes;
  }

  function compose_slide($slide_slug) {
    $current_slide_pod = pods('slide', $slide_slug);
    $slide_layout = $current_slide_pod->field('slide_layout.slug');

    /**
     * build array of slides for this tile by reading in sequence
     * all the tile_NN fields of the slide Pod (initially these are 8)
     */
    $tiles = array();
    foreach(array(0, 1, 2, 3, 4, 5, 6, 7) as $tile_counter) {
      $this_tile_slug = $current_slide_pod->field('tile_' . sprintf('%02d', $tile_counter) . '.slug');
      array_push($tiles, array('slug' => $this_tile_slug));
    }

    var_trace('tiles: ' . var_export($tiles, true), $TRACE_PREFIX);
    var_trace('slide_layout: ' . var_export($slide_layout, true), $TRACE_PREFIX);

    switch($slide_layout) {
      case 'two-two-one':
        $slide_content = $this->compose_slide_content([2, 2, 1], $tiles);
        var_trace(var_export($slide_content, true), 'slide_content_array');
        break;
      case 'four-one':
        $slide_content = $this->compose_slide_content([4, 1], $tiles);
        var_trace(var_export($slide_content, true), 'slide_content_array');
        break;
      case 'five':
        $slide_content = $this->compose_slide_content([5], $tiles);
        var_trace(var_export($slide_content, true), 'slide_content_array');
        break;
      default:
        break;
    }

    return $slide_content;
  }

  function compose_slide_content($column_spans, $tiles) {
    var_trace(var_export($tiles, true), 'compose_slide|tiles');

    $slide_content = [ 'columns' => [] ];
    $tile_index = 0;
    $total_tiles = count($tiles);

    var_trace('column_spans: ' . var_export($column_spans, true), $TRACE_PREFIX);

    foreach($column_spans as $key => $column_span) {
      $tile_count = $column_span * self::TILES_PER_COLUMN;

      // add .last class if this is the last column
      if($key == (count($column_spans) - 1)) { $last_class = ' last'; }

      $slide_column = [ 'layout' => 'col' . $column_span . $last_class, 'tiles' => [] ];
      
      while($tile_count > 0 and $tile_index <= $total_tiles) {
        var_trace(var_export($tiles[$tile_index]['slug'], true), 'tile[slug]');
        $tile = pods('tile', $tiles[$tile_index++]['slug']);
        $tile_layout = $tile->field('tile_layout.name');
        var_trace(var_export($tile_layout, true), 'tile[layout]');
        $this_tile_count = preg_replace('/x/', '*', $tile_layout);
        var_trace(var_export($this_tile_count, true), 'this_tile_count');
        eval('$this_tile_count = ' . $this_tile_count . ';');
        $tile_count -= $this_tile_count;
        var_trace(var_export($tile_count, true), 'tile_countdown');

        unset($target_event_month, $target_event_day, $target_uri);

        if($tile->field('target_event.date_start')) {
          $target_event_date = new \DateTime($tile->field('target_event.date_start'));
          var_trace('target_event_date: ' . var_export($target_event_date, true), $TRACE_PREFIX);
          $target_event_month = $target_event_date->format('M');
          $target_event_day = $target_event_date->format('j');
          $target_event_slug = $tile->field('target_event.slug');
        }

        if($tile->field('target_event.slug')) {
          $target_uri = PODS_BASEURI_EVENTS . '/' . $tile->field('target_event.slug');
        } elseif($tile->field('target_research_project')) {
          $target_uri = PODS_BASEURI_RESEARCH_PROJECTS . '/' . $tile->field('target_research_project.slug');
        } elseif($tile->field('target_uri')) {
          $target_uri = $tile->field('target_uri');
        } elseif($tile->field('target_page.ID')) {
          $target_uri = get_permalink($tile->field('target_page.ID'));
        } elseif($tile->field('target_post.ID')) {
          $target_uri = get_permalink($tile->field('target_post.ID'));
        } else {
          $target_uri = null;
        }

        /**
         * Add image attribution metadata if present in media item
         */
        $image_attribution = format_media_attribution(get_media_attribution($tile->field('image.id')));

        // Read tile title, subtitle (tagline) and blurb
        $tile_title = $tile->field('name');
        $tile_tagline = $tile->field('tagline');
        $tile_blurb = $tile->field('blurb');
      
        // If no blurb is set, set relevant tile property to be used in element classes
        $noblurb_class = empty($tile_blurb) ? 'noblurb' : '';

        $slide_column['tiles'][] = [
          'id' => $tile->field('slug'),
          'element_class' => rtrim($this->get_tile_classes($tile_layout) . ' ' . $tile->field('class'), ' '),
          'noblurb_class' => $noblurb_class,
          'title' => $tile_title,
          'display_title' => $tile->field('display_title'),
          'subtitle' => $tile_tagline,
          'blurb' => $tile_blurb,
          'plain_content' => wpautop($tile->field('plain_content')),
          'posts_category' => $tile->field('posts_category.term_id'),
          'target_uri' => $target_uri,
          'image' => pods_image_url($tile->field('image.ID'), 'original'),
          'image_attribution' => $image_attribution,
          'target_event' => [
            'month' => $target_event_month,
            'day' => $target_event_day
          ]
        ];
      }
      
      $slide_content['columns'][] = $slide_column;
    }
    
    return $slide_content;
  }
}
