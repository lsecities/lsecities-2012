<?php
namespace LSECitiesWPTheme\media_item;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Compile list of media items
 * @param string $query_string a query string for search filter
 * @return (bool|array) an array of media items, or false if no people are found
 */
function pods_prepare_media_item($query_string = '') {
  var_trace($query_string, 'media_archive_dev__search_string');

  // TODO: once cross-check of all media items is done, use media_item pod (rather than media_item_v0)
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

  return $media_items;
}

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
