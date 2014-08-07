<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template Name: People list - default layout
 * Description: The template used for lists of people (staff, advisors, etc.)
 *
 * @package LSECities2012
 */
?><?php get_header(); ?>

<div role="main">
  <?php if ( have_posts() ) : the_post(); endif; ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class('lc-article lc-people-list'); ?>>
    <div class='ninecol' id='contentarea'>
      <div class='top-content'>
        <article class='wireframe row'>
          <header class='entry-header'>
            <h1><?php the_title(); ?></h1>
          </header>
          <div class='entry-content article-text'>
            
          <?php 
          lc_data('page_data', LSECitiesWPTheme\group_get_data(get_post_meta($post->ID, 'pod_slug', true)));
          FoundootsWPTheme\Templating\foundoots_get_template_part('_staff-list-full', lc_data('page_data')); ?>
          
          </div>
          <?php get_template_part('templates/partials/socialmedia-share'); ?>
        </article>
      </div><!-- .top-content -->
    </div><!-- #contentarea -->
  </div><!-- #post-<?php the_ID(); ?> -->
<?php get_template_part('nav'); ?>

</div><!-- role='main'.row -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
