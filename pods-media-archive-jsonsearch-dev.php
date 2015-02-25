<?php
namespace LSECitiesWPTheme\media_item;
/**
 * Template Name: Media Archive item (JSON) (dev)
 * Description: The template used to return a JSON view of a Media Archive object's metadata (dev)
 *
 * @package LSECities2012
 */
/**
 * Pods initialization
 * URI: /media/search/?search=<search_string>
 */
$PODS_BASEURI_MEDIA_ARCHIVE_SEARCH = '/media/search/';

$media_items = pods_prepare_media_item('', [ 'shallow' => TRUE ]);
$articles = \pods_prepare_article_list([ 'type' => 'plain', 'shallow' => TRUE]);
$data_articles = \pods_prepare_article_list(['type' => 'data', 'shallow' => TRUE]);

header("Content-Type: application/json");
echo json_encode(array('audio_video_items' => $media_items, 'articles' => $articles, 'data_articles' => $data_articles));
?>
