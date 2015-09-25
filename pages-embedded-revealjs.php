<?php
/**
 * Template Name: Embedded RevealJS
 * Description: In-page 2D navigation of content
 *
 * @package LSECities2012
 * @since 1.14
 */

namespace LSECitiesWPTheme;

$slideshow = new Slideshow(pods_v('last', 'url'));
$obj = $slideshow->to_var([ 'full_content' => TRUE ]);

wp_enqueue_script('revealjs', get_stylesheet_directory_uri() . '/javascripts/reveal.js', NULL, NULL, FALSE);
wp_enqueue_style('revealjs', get_stylesheet_directory_uri() . '/stylesheets/plugins/revealjs/reveal.css');
wp_enqueue_style('revealjs-theme-solarized', get_stylesheet_directory_uri() . '/stylesheets/plugins/revealjs/css/white.css');
get_header();
?>

<div role="main">

<?php if ( have_posts() ) : the_post(); endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('lc-article layout-2d-revealjs'); ?>>
  <?php \SemanticWP\Templating::get_template_part('lsecities/revealjs/_embedded_revealjs', $obj); ?>
</article>

<script>
Reveal.initialize({
  width: 1140,
  height: 400,
  center: false,
  controls: true,
  progress: true,
  history: true,
  transition: 'slide',
  embedded: true
});
</script>
<?php get_template_part('nav'); ?>

</div><!-- #contentarea -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
