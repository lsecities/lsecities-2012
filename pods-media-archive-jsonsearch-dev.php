<?php
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

function get_media_item_event_info($media_item_pod, $parent_sessions = array()) {
  
  $parent_sessions_count = count($parent_sessions);
  $field_name = str_repeat('.parent_session', $parent_sessions_count > 0 ? $parent_sessions_count : 0);

  // first test whether there is a parent session
  $parent_session = $media_item_pod->field('session' . $field_name . '.parent_session');
  if($parent_session['id']) {
    array_unshift($parent_sessions, $parent_session);
    // call ourselves recursively to add any parent sessions further up the hierarchy
    $parent_sessions = get_media_item_event_info($media_item_pod, $parent_sessions);
  } else {
    // else, test whether a parent event programme is defined (aka the current event session is 'top level')
    $parent_sessions_count = count($parent_sessions);
    $field_name = str_repeat('.parent_session', $parent_sessions_count > 0 ? $parent_sessions_count - 1 : 0);
    $parent_event_programme = $media_item_pod->field('session' . $field_name . '.parent_event_programme');
    if($parent_event_programme['id']) {
      // array_unshift($parent_sessions, $parent_event_programme);
      $parent_event = $media_item_pod->field('session' . $field_name . '.parent_event_programme.for_event');
      $parent_conference = $media_item_pod->field('session' . $field_name . '.parent_event_programme.for_conference');
      if($parent_event['id']) {
        array_unshift($parent_sessions, $parent_event);
      } elseif($parent_conference['id']) {
        array_unshift($parent_sessions, $parent_conference);
      }
    }
  }
  
  return $parent_sessions;
}

// setting search string from post meta is used in WP pages with hardcoded queries
$search = get_post_meta($post->ID, 'pod_slug', true);

// otherwise we expect the search string as a GET parameter
if(!$search) {
  $search = pods_url_variable('search', 'get');
}

var_trace($pod_slug, 'media_archive_dev__pod_slug');
var_trace($search, 'media_archive_dev__search_string');

$pod = pods('media_item_v0', array('limit' => -1, 'where' => 'slug IS NOT NULL'));

$media_items = array();

while($pod->fetch()) {
  // fetch parent sessions up to container event, if applicable
  // initialise array
  $parent_sessions = array();
  $parent_event = null;
  // first, check if this media item is linked to an event session
  $related_session = $pod->field('session');
  $related_event = $pod->field('event');
  // if so, add process parent sessions
  if($related_session['id']) {
    $parent_sessions = get_media_item_event_info($pod);
  } elseif($related_event['id']) {
    $parent_event = $related_event;
  }
  
  $speakers = $pod->field('session.speakers');
  if(isset($speakers['id'])) {
    $speakers = array( $speakers );
  }
  
  // if there are no session speakers listed, try event speakers
  if(!count($speakers)) {
    $speakers = $pod->field('event.speakers');
      if(isset($speakers['id'])) {
      $speakers = array( $speakers );
    }
  }
  
  $media_item = array (
    'id' => $pod->field('slug'),
    'title' => $pod->field('name'),
    'date' => $pod->field('date'),
    'youtube_uri' => $pod->field('youtube_uri'),
    'video_uri' => $pod->field('video_uri'),
    'audio_uri' => $pod->field('audio_uri'),
    'presentation_uri' => $pod->field('presentation_uri'),
    'tags' => $pod->field('tag.name'),
    'geotags' => $pod->field('geotags.name'),
    'related_session' => array(
      'title' => $pod->field('session.name'),
      'start' => $pod->field('session.start')
    ),
    'parent_sessions' => $parent_sessions,
    'parent_event' => $parent_event,
    'session_speakers' => $speakers,
    'session_chairs' => $pod->field('session.chairs'),
    'session_respondents' => $pod->field('session.respondents'),
    'related_event' => array(
      'title' => $pod->field('event.name'),
      'series' => $pod->field('event.series')
    ),
    'event_speakers' => $pod->field('event.speakers'),
    'event_chairs' => $pod->field('event.chairs'),
    'event_respondents' => $pod->field('event.respondents'),
    'event_moderators' => $pod->field('event.moderators')
  );
  array_push($media_items, $media_item);
}

echo json_encode(array('items' => $media_items));
?>
