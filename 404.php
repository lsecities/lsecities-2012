<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package LSECities2012
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main" class="row">

			<article id="post-0" class="post error404 not-found ninecol">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Sorry, we could not find the content you are looking for.', 'lsecities-alexandria' ); ?></h1>
				</header>

				<div class="entry-content">
					<div class="widget">
          <p><?php _e( 'We are re sorry, but we cannot find the page that you are looking for. You might want to use the search form below to locate the content you are looking for. If you followed a link to our legacy Urban Age website from an external website, you might want to browse for archived content on <a href="http://v0.urban-age.net/">urban-age.net</a>. Otherwise, please <a href="' . esc_url(get_permalink(get_page_by_title('Contacts'))) . '">contact us</a>.', 'lsecities-alexandria' ); ?></p>

					<?php get_search_form(); ?>
          </div>
          
					<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>

					<?php // the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .entry-content -->
			</article><!-- #post-0 -->
      <div class="wireframe threecol last" id="navigationarea">
        <nav class="widget">
          <dl>
            <dt>News archive</dt>
            <dd>
              <dl class="accordion">
              <?php
              lsecities_get_archives(); ?>
              </dl>
            </dd>
            <dt class="widgettitle"><?php _e( 'News categories', 'lsecities' ); ?></dt>
            <dd>
              <ul>
              <?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10, 'hierarchical' => FALSE ) ); ?>
              </ul>
            </dd>
          </dl>
        </nav>

      </div><!-- .threecol.last -->
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
