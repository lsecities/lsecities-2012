<?php
namespace LSECitiesWPTheme;
/**
 * Template Name: Pods - Inactive tiles
 * Description: List of inactive tiles
 *
 * @package LSECities2012
 */
header('Content-type: text/plain; charset=utf-8');
$inactive_tiles = list_inactive_tiles();

foreach($inactive_tiles as $tile) {
  $pod = pods('tile', $tile);
  echo $pod->field('slug') . "... deleting:" . $pod->delete() . "\n";
}
