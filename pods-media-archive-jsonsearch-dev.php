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

$media_items = pods_prepare_media_item();
$articles = \pods_prepare_article_list('plain');
$data_articles = \pods_prepare_article_list('data');

header("Content-Type: application/json");
echo json_encode(array('audio_video_items' => $media_items, 'articles' => $articles, 'data_articles' => $data_articles));
?>
