<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template Name: People list - summary layout
 * Description: The template used for lists of people (staff, advisors, etc.)
 *
 * @package LSECities2012
 */
?><?php
$TRACE_ENABLED = is_user_logged_in();
$TRACE_PREFIX = 'pages-people-list';

$people_list = pages_prepare_people_list(get_post_meta($post->ID, 'pod_slug', true));

/**
 * Set query var with our data - this is used by the nav template
 */
set_query_var('people_list', $people_list);

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
          
          <?php 
          lc_data('page_data', [ 
            'post_title' => get_the_title(),
            'people_list' => LSECitiesWPTheme\group_get_data(get_post_meta($post->ID, 'pod_slug', true))
          ]);
          FoundootsWPTheme\Templating\foundoots_get_template_part('_people-list-summary', lc_data('page_data'));
          // Reset lc_data('page_data') to suppress navbar output
          lc_data('page_data', NULL);
          ?>
        
          <?php get_template_part('templates/partials/socialmedia-share'); ?>
        </article>
      </div><!-- .top-content -->
    </div><!-- #contentarea -->
  </div><!-- #post-<?php the_ID(); ?> -->
<?php get_template_part('nav'); ?>

</div><!-- role='main'.row -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
