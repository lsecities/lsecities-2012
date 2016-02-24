<?php
/**
 * The Template for displaying all single posts.
 *
 * @package lsecities-theme
 * @subpackage lsecities-2012
 * @since Twenty Twelve 1.5
 */

get_header(); ?>

	<div id="primary" class="site-content ninecol">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'More posts from the LSE Cities blog:', 'twentytwelve' ); ?></h3>
					<p class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></p>
					<p class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></p>
				</nav><!-- .nav-single -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

  <?php get_template_part('nav'); ?>
  
<?php get_sidebar(); ?>
<?php get_footer(); ?>
