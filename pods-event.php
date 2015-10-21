<?php
/**
 * Template Name: Pods - Event
 * Description: The template used for Event Pods
 *
 * @package LSECities2012
 *
 * Pods initialization
 * URI: /media/objects/events/
 */
 
namespace LSECitiesWPTheme;

lc_data('pods_toplevel_ancestor', 311);

$obj = new Event(get_pod_permalink([ 'from_uri' => TRUE, 'uri_var_position' => 3 ]));
$obj->fetch_events_series();
$post_class = 'lc-article lc-event h-event vevent';
if(!empty($obj->event_series['permalink'])) {
  $post_class .= ' lc-event-of-event-series';
}
?>

<?php get_header(); ?>

<div role="main">

<?php if ( have_posts() ) : the_post(); endif; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
  <?php \SemanticWP\Templating::get_template_part('lsecities/_event', get_object_vars($obj)); ?>

<?php
/**
 * starting transition of nav to HAML, from events that are part
 * of an events series and therefore need an ad-hoc menu anyways;
 * make sure event series is not empty as in that case displaying an
 * empty sidebar wouldn't make sense.
 */
if(!empty($obj->event_series['permalink'])) {
  $event_series = new EventSeries($obj->event_series['permalink']);
  $event_series->fetch_events();
  
  if(!empty($event_series->events)) {
    \SemanticWP\Templating::get_template_part('lsecities/event-series/_nav', $event_series->to_var());
  }
}  
/**
 * By default, events part of an event series show the series'
 * navigation in the sidebar, followed by the full events calendar,
 * *unless* this has been set to be hidden within the event series.
 */
 
if(!is_object($event_series) or !$event_series->hide_full_event_calendar_in_sidebars) {
   get_template_part('nav');
}
?>

</div>

</div><!-- #contentarea -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
