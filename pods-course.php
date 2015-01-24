<?php
/**
 * Template Name: Pods - Course
 * Description: The template used for academic and executive courses
 *
 * @package LSECities2012
 */
namespace LSECitiesWPTheme;

?><?php get_header();
?>

<div role="main">

<?php if ( have_posts() ) : the_post(); endif; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('lc-article lc-course'); ?>>

  <?php 
  lc_data('page_data', [ 
    'post_title' => get_the_title(),
    'course' => new Course(get_post_meta($post->ID, 'pod_slug', true))
  ]);
  \SemanticWP\Templating::get_template_part('lsecities/_course', lc_data('page_data'));
  ?>
  
  <?php get_template_part('templates/partials/socialmedia-share'); ?>


</div><!-- #post-<?php the_ID(); ?> -->
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
