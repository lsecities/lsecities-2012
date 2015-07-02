<?php
/**
 * Template Name: Pods - Main frontpages
 * Description: The template used for LSE Cities main frontpage and Urban Age sub-site frontpage
 *
 * @package LSECities2012
 */
?><?php
/**
 * Pods initialization
 * URI: TBD
 */
namespace LSECitiesWPTheme;

$TRACE_PREFIX = 'pods-main-frontpage';

$obj = get_object_vars(new SectionFront(get_post_meta($post->ID, 'pod_slug', true)));

?><?php get_header(); ?>

<div role="main">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('lc-article lc-section-front'); ?>>
	<div class=".entry-content">
		<div id="core" class="row">
			<?php \SemanticWP\Templating::get_template_part('lsecities/section-front/_slider', $obj); ?>
    	<div class="extra-content<?php if(count($obj['linked_events']) > 0): ?> multi-section<?php endif; ?>">
    	<?php
      	component_news($obj['news_categories'], '', $obj['linked_events']);
    	?>
      </div><!-- .extra-content -->
  	</div><!-- #core.row -->
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
