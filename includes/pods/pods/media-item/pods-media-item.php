<?php
namespace LSECitiesWPTheme\media_item;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Compile list of media items
 * @param string $query_string a query string for search filter
 * @return (bool|array) an array of media items, or false if no people are found
 */
function pods_prepare_media_item($query_string = '', $options = []) {
  // set defaults
  if(!array_key_exists('shallow', $options)) {
    $options['shallow'] = FALSE;
  }
  
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
      $research_programmes = array_map(
        function($item) { return $item['permalink']; },
        $pod->field('session' . str_repeat('.parent_session', count($parent_sessions)) . '.parent_event_programme.for_conference.research_programmes'));
    } elseif($related_event['id']) {
      $parent_event = $related_event;
      $research_programmes = $related_event['research_programmes'];
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
      'research_programmes' => $research_programmes,
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
      'session_speakers' => FALSE == $options['shallow'] ? $speakers : \LSECitiesWPTheme\filter_items((array)$speakers, ['name', 'family_name']),
      'session_chairs' => FALSE == $options['shallow'] ? $pod->field('session.chairs') : \LSECitiesWPTheme\filter_items((array) $pod->field('session.chairs'), ['name', 'family_name']),
      'session_respondents' => FALSE == $options['shallow'] ? $pod->field('session.respondents') : \LSECitiesWPTheme\filter_items((array) $pod->field('session.respondents'), ['name', 'family_name']),
      'related_event' => array(
        'title' => $pod->field('event.name'),
        'series' => $pod->field('event.series')
      ),
      'event_speakers' => FALSE == $options['shallow'] ? $pod->field('event.speakers') : \LSECitiesWPTheme\filter_items((array) $pod->field('event.speakers'), ['name', 'family_name']),
      'event_chairs' => FALSE == $options['shallow'] ? $pod->field('event.chairs') : \LSECitiesWPTheme\filter_items((array) $pod->field('event.chairs'), ['name', 'family_name']),
      'event_respondents' => FALSE == $options['shallow'] ? $pod->field('event.respondents') : \LSECitiesWPTheme\filter_items((array) $pod->field('event.respondents'), ['name', 'family_name']),
      'event_moderators' => FALSE == $options['shallow'] ? $pod->field('event.moderators') : \LSECitiesWPTheme\filter_items((array) $pod->field('event.moderators'), ['name', 'family_name']),
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
