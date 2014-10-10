<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template Name: People list - grid layout
 * Description: The template used for lists of people, displayed as a grid of photos (e.g. provisional conference speakers)
 *
 * @package LSECities2012
 */
?><?php get_header(); ?>

<div role="main">
  <?php if ( have_posts() ) : the_post(); endif; ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class('lc-article lc-people-list grid'); ?>>
    <div class='ninecol' id='contentarea'>
      <div class='top-content'>
        <article class='wireframe row'>
          <header class='entry-header'>
            <h1><?php the_title(); ?></h1>
          </header>
          
          <?php 
          lc_data('page_data', [ 
            'post_title' => get_the_title(),
            'people_list' => LSECitiesWPTheme\group_get_data(get_post_meta($post->ID, 'pod_slug', true))
          ]);
          SemanticWP\Templating::get_template_part('lsecities/_people-list-grid', lc_data('page_data'));
          // Reset lc_data('page_data') to suppress navbar output
          lc_data('page_data', NULL);
          ?>
        
          <?php get_template_part('templates/partials/socialmedia-share'); ?>
        </article>
      </div><!-- .top-content -->
    </div><!-- #contentarea -->
    <?php get_template_part('nav'); ?>
  </div><!-- #post-<?php the_ID(); ?> -->

</div><!-- role='main'.row -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
