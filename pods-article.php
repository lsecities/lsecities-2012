<?php
namespace LSECitiesWPTheme;
/**
 * Template Name: Pods - Articles
 * Description: The template used for Article Pods
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

?><?php get_header(); ?>

<div role="main">

<?php if ( have_posts() ) : the_post(); endif; ?>

<div id="post-<?php the_ID(); ?>" class='lc-article lc-newspaper-article'>

          <div class='ninecol' id='contentarea'>
            <div class='top-content'>
              <?php if($obj['featured_image_uri']): ?>
              <header class="heading-image">
                <div class='photospread wireframe'>
                  <img src="<?php echo $obj['featured_image_uri']; ?>" alt="" />
                </div>
              </header>
              <?php endif; ?>

              <header class="entry-header row">
                <h1 class="entry-title article-title"><?php echo $obj['article_data']->title; ?></h1>
                <?php if($obj['article_data']->subtitle): ?>
                <h2><?php echo $obj['article_data']->subtitle; ?></h2>
                <?php endif; ?>
                <?php if($obj['article_data']->abstract): ?>
                <div class="entry-meta article-abstract"><?php echo $obj['article_data']->abstract; ?></div>
                <?php endif; ?>
              </header><!-- .entry-header -->

              <article class='wireframe'>
                <div class="entry-content">
                  <div class="article">

                    <?php
                    /**
                     * Display metadata in main article body,
                     * unless this is an article with an attached
                     * grid slideshow, in which case the metadata box
                     * should be displayed in the sidebar
                     */
                    if(empty($obj['grid_slideshow'])) {
                      \SemanticWP\Templating::get_template_part('lsecities/articles/_metadata', $obj);
                    }
                    ?>
                    <div class="entry-content article-text<?php if($obj['layout']) { echo ' ' . $obj['layout']; } ?>">
                    <?php if($obj['article_data']->text): ?>
                      <?php echo $obj['article_data']->text; ?>
                    <?php elseif($obj['article_data']->summary): ?>
                      <?php echo $obj['article_data']->summary; ?>
                    <?php endif; ?>
                    </div>
                    <?php \SemanticWP\Templating::get_template_part('lsecities/partials/_galleria', [ 'gallery' => $obj['data_gallery'] ]); ?>

                    <?php if($obj['article_data']->extra_content): ?>
                    <div class="extra-content"><?php echo $obj['article_data']->extra_content; ?></div>
                    <?php endif; ?>
                    <?php if($obj['article_data']->author_info): ?>
                    <div class="author-info">
                      <?php echo $obj['article_data']->author_info; ?>
                    </div>
                    <?php endif; // ($obj['article_data']->author_info)?>
                  </div>
                </div><!-- .entry-content -->
              </article>





            </div><!-- .top-content -->

            <?php \SemanticWP\Templating::get_template_part('lsecities/revealjs/_embedded_revealjs', $obj['grid_slideshow']); ?>
          </div><!-- #contentarea -->

          <?php get_template_part('nav'); ?>
          </div><!-- #navigationarea -->

</div><!-- #post-<?php the_ID(); ?> -->

</div><!-- role="main" -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
