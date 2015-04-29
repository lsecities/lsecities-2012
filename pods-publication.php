<?php
namespace LSECitiesWPTheme\publication;
/**
 * Template Name: Pods - Publications - index
 * Description: The template used for Publications, showing publication info, listing available articles, etc.
 *
 * @package LSECities2012
 */

// Get Pod slug from post meta
$post_id = get_post_meta($post->ID, 'pod_slug', true);
// If this template is invoked via a Pods page, no post meta will
// be available: read slug from URI
if(empty($post_id)) {
  $post_id = pods_v('last', 'url');
}
$obj = pods_prepare_publication($post_id);
$obj_sections = pods_prepare_table_of_contents($post_id);

/**
 * assign list of sections to own variable, to be used by included template
 * TECHNICAL_DEBT: everything must be moved to Twig+HAML, and the included
 * template must be refactored to make it context-independent (no reliance
 * on variable names), as it is used both here and in the research projects
 * template.
 */
$publication_sections = $obj_sections['sections'];

$TRACE_PREFIX = 'pods-publications';

?><?php get_header(); ?>

<div role="main">
  <?php if ( have_posts() ) : the_post(); endif; ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class('lc-article lc-publication publication-category-' . $obj['publication_category']); ?>>
    <div class='fullwidth' id='contentarea'>
      <div class='top-content'>
        <?php if(count($obj['gallery']['slides'])) : ?>
        <div class='heading-image'>
          <?php \SemanticWP\Templating::get_template_part('lsecities/partials/_galleria', [ 'gallery' => $obj['gallery'] ]); ?>
        </div>
        <?php endif; // (count($obj['gallery']['slides'])) ?>

        <header class='entry-header'>
          
<h1><?php echo $obj['title']; ?></h1>
          <?php if($obj['subtitle']): ?><h2><?php echo $obj['subtitle']; ?></h2><?php endif ; ?>
        </header>

        <article class='wireframe ninecol row'>
          <div class='entry-content article-text'>
            <?php echo $obj['blurb']; ?>
          </div>
          <?php if($obj_sections['sections'] and 'research-data' !== $obj['publication_category']):
            include('templates/pods/publication/publication-toc.php');
          endif; // ($obj_sections['sections'] and 'research-data' !== $obj['publication_category']) ?>
          <!--
          <?php if(count($obj_sections['sections']) > 1): ?>
          <section class='publication-sections'>
            <h1>Browse content</h1>
            <ul>
              <?php foreach($obj_sections['sections'] as $index_section): ?>
              <li><a href="#publication-section-<?php echo $index_section['id']; ?>"><?php echo $index_section['title']; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </section>
          <?php endif; // (count($obj_sections['sections']) > 1)?>
          -->
        </article>
        <aside class='wireframe threecol last entry-meta' id='keyfacts'>
          <div>
            <?php if($obj['cover_image_uri']): ?>
            <div class='cover-thumbnail'><img src="<?php echo $obj['cover_image_uri']; ?>" /></div>
            <?php endif; ?>
            <ul>
              <?php if($obj['pdf']) : ?>
              <li><a class="downloadthis pdf button" href="<?php echo $obj['pdf']; ?>">Download PDF</a><?php if(!empty($obj['pdf_filesize'])) : ?> (<?php echo $obj['pdf_filesize']; ?>)<?php endif; ?></li>
              <?php endif; ?>
              <?php if($obj['pdf'] and $obj['alt_pdf']) : // do not bother displaying extra PDF if main is not available ?>
              <li><a class="downloadthis pdf button" href="<?php echo $obj['alt_pdf']; ?>"><?php echo $obj['alt_pdf_label']; ?></a><?php if(!empty($obj['alt_pdf_filesize'])) : ?> (<?php echo $obj['alt_pdf_filesize']; ?>)<?php endif; ?></li>
              <?php endif ; ?>
              <?php if($obj['issuu_uri']) : ?>
              <li><a class="readthis online issuu button" href="<?php echo $obj['issuu_uri']; ?>">Browse PDF online</a></li>
              <?php endif ; ?>
            </ul>
            <dl>
            <?php if($obj['publishing_date']): ?>
              <dt>Publication date</dt>
              <dd><?php echo $obj['publishing_date']; ?></dd>
            <?php endif; ?>
            <?php if($obj['publication_catalogue_data']): ?>
              <dt>Catalogue data</dt>
              <dd><?php echo $obj['publication_catalogue_data']; ?></dd>
            <?php endif; ?>
            </dl>
            <?php if('research-data' !== $obj['publication_category']) {
              include('templates/pods/publication/publication-metadata-people.php');
            } ?>
          </div>
          <?php get_template_part('templates/partials/socialmedia-share'); ?>
        </aside><!-- #keyfacts -->
      </div><!-- .top-content -->
      <div class='extra-content row'>
          <?php if(count($obj['wp_posts_reviews'])): ?>
          <section class="row" id="wp-posts-reviews">
            <header><h1>Reviews</h1></header>
              <dl class="posts">
              <?php
              foreach($obj['wp_posts_reviews'] as $post):
                setup_postdata($post); ?>
                <dt><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dt>
                <dd><?php the_date(); ?></dd>
              <?php endforeach; ?>
              </dl><!-- .posts -->
          </section><!-- #wp-posts-reviews -->
          <?php endif; //(count($obj['wp_posts_reviews'])) ?>
          <?php if($obj_sections['sections'] and 'research-data' === $obj['publication_category']):
            include('templates/pods/publication/publication-toc.php');
          endif; // ($obj_sections['sections'] and 'research-data' === $obj['publication_category']) ?>
          <?php if('research-data' === $obj['publication_category']): ?>
          <h2>Credits</h2>
          <?php  include('templates/pods/publication/publication-metadata-people.php'); ?>
          <?php endif; // ('research-data' === $obj['publication_category'])?>
      </div><!-- .extra-content -->
    </div><!-- #contentarea -->
  </div><!-- #post-<?php the_ID(); ?> -->


</div><!-- role='main'.row -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
