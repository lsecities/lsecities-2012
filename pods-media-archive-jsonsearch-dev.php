<?php
namespace LSECitiesWPTheme\media_item;
/**
 * Template Name: Media Archive item (JSON) (dev)
 * Description: The template used to return a JSON view of a Media Archive object's metadata (dev)
 *
 * @package LSECities2012
 */
?><?php
/**
 * Pods initialization
 * URI: /media/search/?search=<search_string>
 */
$PODS_BASEURI_MEDIA_ARCHIVE_SEARCH = '/media/search/';

$media_items = pods_prepare_media_item();

echo json_encode(array('items' => $media_items));
?>
