<?php
$TRACE_PREFIX = 'nav-events';
$current_post_id = $post->ID;

global $IN_CONTENT_AREA;
global $HIDE_UPCOMING_EVENTS, $HIDE_PAST_EVENTS;
global $pod_slug;
$BASE_URI = PODS_BASEURI_EVENTS;

var_trace('HIDE_UPCOMING_EVENTS: '. $HIDE_UPCOMING_EVENTS, $TRACE_PREFIX);
var_trace('HIDE_PAST_EVENTS: '. $HIDE_PAST_EVENTS, $TRACE_PREFIX);

var_trace('post ID: ' . $current_post_id, $TRACE_PREFIX);
var_trace(var_export($pod, true), $TRACE_PREFIX);

$events_pod = pods('event');
$datetime_now = new DateTime('now');
var_trace('datetime_now: ' . $datetime_now->format(DATE_ATOM), $TRACE_PREFIX);

// prepare array with list of upcoming events
$upcoming_events = Array();
$events_pod->find(array(
  'where' => 't.date_end > NOW() AND event_calendar.permalink = "lse-cities-events-calendar"',
  'orderby' => 't.date_start ASC',
  'limit' => -1
));
while($events_pod->fetch()) {
  /**
   * if a provisional date is set (via the 'free_form_event_data' field)
   * then use this as date to be displayed, else use real date from
   * 'date_start' field; this only applies for future events,
   * as past events are supposed to have happened at a set time :)
   */
  $free_form_event_date = $events_pod->field('free_form_event_date');
  // first, create DateTime objects
  $event_date_start = new DateTime($events_pod->field('date_start'));
  $event_date_end = new DateTime($events_pod->field('date_end'));
  
  $display_date = ! empty($free_form_event_date) ?
    $free_form_event_date :
    ($event_date_start->format('Y-m-d') != $event_date_end->format('Y-m-d')) ?
      $event_date_start->format("j F") . '&mdash;' . $event_date_end->format("j F") :
      date('d F', strtotime($events_pod->field('date_start')));
  
  array_push($upcoming_events, array(
    'slug' => $events_pod->field('slug'),
    'name' => $events_pod->field('name'),
    'date' => $display_date
  ));
}

// prepare array with list of past events, split by year
$events = Array();
$current_year = date("Y");
$active_year = $current_year; // used to set initial active section for jQuery UI accordion

for($year = 2005; $year <= $current_year; $year++) {
  $events_pod->find(array(
    'where' => 'YEAR(t.date_start) = ' . $year . ' AND t.date_end < NOW() AND event_calendar.permalink = "lse-cities-events-calendar"',
    'orderby' => 'date_start DESC',
    'limit' => -1
  ));
  var_trace($events_pod->total_found(), $TRACE_PREFIX . " - event records found for year $year");
  while($events_pod->fetch()) {
    // if event is past, add it to array
    if($events_pod->field['date_end'] < $datetime_now) {
      if($pod_slug == $events_pod->field('slug')) {
        $active_year = $year;
      }
      var_trace(var_export($events_pod->field('event_calendar.permalink'), TRUE), 'event.event_calendars');
      $events[$year][] = Array(
        'slug' => $events_pod->field('slug'),
        'name' => $events_pod->field('name'),
        'date' => date('j F', strtotime($events_pod->field('date_start')))
      );
    }
  }
}

var_trace('events array: ' . var_export($events, true), $TRACE_PREFIX);

// sort by year, backwards from current year
krsort($events);
?>

<nav>
  <dl>
  <?php 
    if($IN_CONTENT_AREA) {
      if(!$HIDE_UPCOMING_EVENTS) {
        include 'nav-events-upcoming.php';
      }
      if(!$HIDE_PAST_EVENTS) {
        include 'nav-events-past.php';
      }
    } else {
      if(!$HIDE_PAST_EVENTS) {
        include 'nav-events-upcoming.php';
      }
      if(!$HIDE_UPCOMING_EVENTS) {
        include 'nav-events-past.php';
      }
    }
  ?>
  </dl>
</nav>
