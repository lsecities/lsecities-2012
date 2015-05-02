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
?>

<?php get_header(); ?>

<div role="main">

<?php if ( have_posts() ) : the_post(); endif; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('lc-article lc-event h-event vevent'); ?>>
  <?php \SemanticWP\Templating::get_template_part('lsecities/_event', get_object_vars($obj)); ?>
</div>

<?php get_template_part('nav'); ?>
          
</div><!-- #contentarea -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
