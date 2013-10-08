<?php
/**
 * Template Name: Media Archive item (JSON)
 * Description: The template used to return a JSON view of a Media Archive object's metadata
 *
 * @package LSECities2012
 */
?><?php
/**
 * Pods initialization
 * URI: /media/search/?search=<search_string>
 */
$TRACE_ENABLED = is_user_logged_in();
$PODS_BASEURI_MEDIA_ARCHIVE_SEARCH = '/media/search/';

// setting search string from post meta is used in WP pages with hardcoded queries
$search = get_post_meta($post->ID, 'pod_slug', true);

// otherwise we expect the search string as a GET parameter
if(!$search) {
  $search = pods_url_variable('search', 'get');
}

if($TRACE_ENABLED) { error_log('pod_slug: ' . $pod_slug); }
if($TRACE_ENABLED) { error_log('search: ' . $search); }

$params = array(
  'where' => 't.name LIKE "%' . $search . '%" OR session.speakers.family_name LIKE "%' . $search . '%" OR event.speakers.family_name LIKE "%' . $search . '%"'
);
$pod = pods('media_item_v0', $params);

$media_items = array();

while($pod->fetch()) {
  $media_item = array (
    'id' => $pod->field('slug'),
    'title' => $pod->field('name'),
    'date' => $pod->field('date'),
    'youtube_uri' => $pod->field('youtube_uri'),
    'video_uri' => $pod->field('video_uri'),
    'audio_uri' => $pod->field('audio_uri'),
    'presentation_uri' => $pod->field('presentation_uri'),
    'tags' => $pod->field('tag.name'),
    'geotags' => $pod->field('geotags.name')
  );
  array_push($media_items, $media_item);
}

echo json_encode(array('items' => $media_items));
?>
