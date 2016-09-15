<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

class Tile extends PodsObject {
  const PODS_NAME = 'tile';

  /**
   * @var String This is the human-friendly unique id of the object (e.g. 'rebel-cities')
   */
  public $permalink;

  private $pod;

  function __construct($permalink, $options = []) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);

    // return if a Pod cannot be found
    if(!$pod->exists()) {
      return;
    }

    $this->permalink = $pod->field('slug');
    $this->title = $pod->field('name');
  }
}

/**
 * Run through all the tiles used anywhere within the site
 * and return a list of these.
 * Tiles are currently used within Slides and within Research Summaries
 * (which are in turn used within Conferences).
 * Although it would be possible to cycle through all the Pods types
 * and check which ones include tiles, given the limited scope of this
 * function (enabling to confirm which tiles are in use - and which
 * are not, so that these can be manually deleted if desired), the Pods
 * types above are currently hardcoded here.
 *
 * @return Array list of active tiles
 */
function list_active_tiles() {
  $research_summary_pod = pods('research_summary', [ 'limit' => -1 ]);
  $active_tiles = [];

  // tiles used in research summaries
  while($research_summary_pod->fetch()) {
    $active_tiles[] = $research_summary_pod->display('visualization_tiles.slug');
  }

  $section_front_pod = pods('section_front', [ 'limit' => -1 ]);

  // tiles used in slides
  while($section_front_pod->fetch()) {
    $slides = $section_front_pod->field('slides');
    if(is_array($slides)) {
      foreach($slides as $slide) {
        $slide_pod = pods('slide', $slide['slug']);
        foreach(['00', '01', '02', '03', '04', '05', '06', '07'] as $tile_id) {
          $tile = $slide_pod->field('tile_' . $tile_id);
          if(is_array($tile)) {
            $active_tiles[] = $tile['slug'];
          }
        }
      }
    }
  }

 return array_unique($active_tiles, SORT_STRING);
}


/**
 * List all tiles that are not used in any slide which is itself used in a slider,
 * nor used in any Research Summary (see documentation of list_active_tiles()
 * function above for full details)
 *
 * @return Array list of inactive tiles
 */
function list_inactive_tiles() {
  $all_tiles_pod = pods('tile', [ 'limit' => -1 ]);
  $all_tiles = [];
  $active_tiles = list_active_tiles();

  while($all_tiles_pod->fetch()) {
    $all_tiles[] = $all_tiles_pod->field('slug');
  }

  return array_diff($all_tiles, $active_tiles);
}

