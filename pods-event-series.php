<?php
/**
 * Template Name: Pods - Event series
 * Description: The template used for Event series Pods
 *
 * @package LSECities2012
 */
namespace LSECitiesWPTheme;

?><?php get_header(); 
/**
 * Pods initialization
 */

// get permalink of pod via pod_slug meta field
$pod_id = get_post_meta($post->ID, 'pod_slug', true);
// if none is set, template may not be triggered via a WP page but through
// a Pods page: try last fragment of URI
if(empty($pod_id)) {
  $pod_id = pods_v('last', 'url');
}

$event_series = new EventSeries($pod_id);
$event_series->fetch_events();

global $obj;
$obj = $event_series->to_var();

/**
 * Copy gallery object to own variable for compatibility with
 * gallery partial.
 */
$gallery = $obj['gallery'];

?>

<div role="main">

<?php if ( have_posts() ) : the_post(); endif; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('lc-article lc-conference-frontpage lc-event-series-frontpage'); ?>>

  <?php \SemanticWP\Templating::get_template_part('lsecities/_conference', $obj); ?>

  <?php \SemanticWP\Templating::get_template_part('lsecities/event-series/_nav', $obj); ?>

</div><!-- #post-<?php the_ID(); ?> -->
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
