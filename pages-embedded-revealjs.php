<?php
/**
 * Template Name: Embedded RevealJS
 * Description: In-page 2D navigation of content
 *
 * @package LSECities2012
 * @since 1.14
 */

namespace LSECitiesWPTheme;

$slideshow = new Slideshow(pods_v('url', 'last'));
$obj = $slideshow->to_var();

get_header();
?>

<div role="main">

<?php if ( have_posts() ) : the_post(); endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('lc-article lc-index layout-2d-revealjs'); ?>>
  <?php \SemanticWP\Templating::get_template_part('lsecities/revealjs/_embedded_revealjs', $obj); ?>
</article>

<?php get_template_part('nav'); ?>

</div><!-- #contentarea -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
