<?php
/**
 * Template Name: Pods - Course
 * Description: The template used for academic and executive courses
 *
 * @package LSECities2012
 */
namespace LSECitiesWPTheme;

$permalink = get_pod_permalink([ 'from_post_meta' => TRUE, 'from_uri' => TRUE, 'post_id' => $post->ID ]);

?><?php get_header();
?>

<div role="main">

<?php if ( have_posts() ) : the_post(); endif; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('lc-article lc-course'); ?>>

  <?php 
  lc_data('page_data', [ 
    'post_title' => get_the_title(),
    'course' => new Course($permalink)
  ]);
  \SemanticWP\Templating::get_template_part('lsecities/_course', lc_data('page_data'));
  ?>
  
  <?php get_template_part('templates/partials/socialmedia-share'); ?>


</div><!-- #post-<?php the_ID(); ?> -->
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
