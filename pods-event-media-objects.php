<?php
/**
 * Template Name: Pods - Media Objects for Event (CVS)
 * Description: List all media objects associated with an event to sync to YouTube
 *
 * @package LSECities2012
 */
?>

<?php
  /* URI: TBD */
  $TRACE_ENABLED = is_user_logged_in();
  $TRACE_PREFIX = 'pods-event-media-objects.php -- ';
  $pod_slug = get_post_meta($post->ID, 'pod_slug', true);
  if($TRACE_ENABLED) { error_log($TRACE_PREFIX . 'pod_slug: ' . var_export($pod_slug, true)); }
  $pod = pods('event_programme', $pod_slug);
  $subsessions = $pod->field('sessions.slug');
  if(count($subsessions) == 1) { $subsessions = array(0 => $subsessions); }
  
  $for_conference = $pod->field('for_conference.slug');
  $for_event = $pod->field('for_event.slug');
   
  if($TRACE_ENABLED) { error_log($TRACE_PREFIX . 'sessions: ' . var_export($subsessions, true)); }
  
function process_session($session_slug) {
  global $TRACE_ENABLED;
   
  $pod = pods('event_session', $session_slug);

  $session_youtube_video = $pod->field('media_items.youtube_uri');
  $session_media_item_title = $pod->field('media_items.name');
  
  $subsessions = $pod->field('sessions.slug');
  if($subsessions and count($subsessions) == 1) { $subsessions = array(0 => $subsessions); }

  if($session_youtube_video and $session_media_item_title) {
    echo "$session_youtube_video|$session_media_item_title\n";
  }
  if($subsessions) {
    foreach($subsessions as $session) {
      process_session($session);
    }
  }
}

  if(!empty($pod->data)) {
    foreach($subsessions as $session) {
      process_session($session);
    }
  }
?>
