<?php
namespace LSECitiesWPTheme;
/**
 * Template Name: Research report slideshow
 * Description: The template used for researc grid slideshows
 *
 * @package LSECities2012
 */
$TRACE_ENABLED = is_user_logged_in();

$obj = \LSECitiesWPTheme\pods_prepare_article(pods_v(-2, 'url'), pods_v('last', 'url'));

if(!empty($obj['grid_slideshow'])) {
  /**
   * If a grid slideshow is attached to this article, enqueue assets needed for the embedded revealjs
   * slideshow.
  */
  wp_enqueue_script('revealjs', get_stylesheet_directory_uri() . '/javascripts/reveal.js', NULL, NULL, FALSE);
  wp_enqueue_style('revealjs', get_stylesheet_directory_uri() . '/stylesheets/plugins/revealjs/reveal.css');
  wp_enqueue_style('revealjs-theme-white', get_stylesheet_directory_uri() . '/stylesheets/plugins/revealjs/css/white.css');
}

set_query_var('parent_publication_id', $obj['parent_publication']['id']);
set_query_var('page_obj', $obj);
set_query_var('body_class_extra', $obj['extra_body_class']);

?><?php get_header(); ?>

<div role="main">

<?php if ( have_posts() ) : the_post(); endif; ?>

<div id="post-<?php the_ID(); ?>" class='lc-article lc-newspaper-article<?php if(!empty($obj['grid_slideshow'])): ?> lc-grid-slideshow<?php endif;?>'>

<?php \SemanticWP\Templating::get_template_part('lsecities/articles/_article-grid-slideshow', $obj);  ?>

</div><!-- #post-<?php the_ID(); ?> -->

</div><!-- role="main" -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
