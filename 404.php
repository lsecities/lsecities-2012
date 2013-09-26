<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package LSECities2012
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Sorry, we could not find the content you are looking for.', 'lsecities-2012' ); ?></h1>
				</header>

				<div class="entry-content">
					<div class="widget">
          <p><?php _e( 'We are re sorry, but we cannot find the page that you are looking for. You might want to use the search form below to locate the content you are looking for. If you followed a link to our legacy Urban Age website from an external website, you might want to browser for archived content on <a href="http://v0.urban-age.net/">urban-age.net</a>. Otherwise, please <a href="' . esc_url(get_permalink(get_page_by_title('Contacts'))) . '">contact us</a>.', 'lsecities-2012' ); ?></p>

					<?php get_search_form(); ?>
          </div>
          
					<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>

					<div class="widget">
						<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'twentyeleven' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>

					<?php
					$archive_content = '<p>' . _e( 'Try looking in the monthly archives.', 'lsecities-2012' ) . '</p>';
					the_widget( 'WP_Widget_Archives', array('count' => 0 , 'dropdown' => 1 ), array( 'after_title' => '</h2>'.$archive_content ) );
					?>

					<?php // the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
