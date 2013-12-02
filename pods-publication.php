<?php
namespace LSECitiesWPTheme\publication;
/**
 * Template Name: Pods - Publications - index
 * Description: The template used for Publications, showing publication info, listing available articles, etc.
 *
 * @package LSECities2012
 */

$post_id = get_post_meta($post->ID, 'pod_slug', true);
$obj = pods_prepare_publication($post_id);
$obj_sections = pods_prepare_table_of_contents($post_id);

$TRACE_PREFIX = 'pods-publications';

// the galleria partial expects to find its data in a $gallery variable
$gallery = $obj['gallery'];

?><?php get_header(); ?>

<div role="main">
  <?php if ( have_posts() ) : the_post(); endif; ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class('lc-article lc-publication'); ?>>
    <div class='ninecol' id='contentarea'>
      <div class='top-content'>
        <?php if(count($gallery['slides'])) : ?>
        <header class='heading-image'>
          <?php include('templates/partials/galleria.inc.php'); ?>
        </header>
        <?php endif; ?>

        <article class='wireframe eightcol row'>
          <header class='entry-header'>
            <h1><?php echo $obj['title']; ?></h1>
            <?php if($obj['subtitle']): ?><h2><?php echo $obj['subtitle']; ?></h2><?php endif ; ?>
          </header>
          <div class='entry-content article-text'>
            <?php echo $obj['blurb']; ?>
          </div>
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
          <?php get_template_part('templates/partials/socialmedia-share'); ?>
        </article>
        <aside class='wireframe fourcol last entry-meta' id='keyfacts'>
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
            <?php if(!$obj['extra_publication_metadata']): // switching to only display $obj['extra_publication_metadata'] if available, until Pods can sort pick items ?>
            <?php if($obj['publication_authors']['string']): ?>
              <dt>Authors</dt>
              <dd><?php echo $obj['publication_authors']['string']; ?></dd>
            <?php endif; ?>
            <?php if($obj['publication_editors']['string']): ?>
              <dt>Editors</dt>
              <dd><?php echo $obj['publication_editors']['string']; ?></dd>
            <?php endif; ?>
            <?php if($obj['publication_editors']['string']): ?>
              <dt>Contributors</dt>
              <dd><?php echo $obj['publication_editors']['string']; ?></dd>
            <?php endif; ?>
            <?php else: // (!$obj['extra_publication_metadata']) ?>
            <?php echo $obj['extra_publication_metadata']; ?>
            <?php endif; // (!$obj['extra_publication_metadata']) ?>
            <?php if($obj['publication_partners']['string']): ?>
              <dt>Partners</dt>
              <dd></dd><?php echo $obj['publication_partners']['string']; ?></dd>
            <?php endif; ?>
            <?php if($obj['publishing_date']): ?>
              <dt>Publication date</dt>
              <dd><?php echo $obj['publishing_date']; ?></dd>
            <?php endif; ?>
            <?php if($obj['publication_catalogue_data']): ?>
              <dt>Catalogue data</dt>
              <dd><?php echo $obj['publication_catalogue_data']; ?></dd>
            <?php endif; ?>
            </dl>
          </div>
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
          <?php if($obj_sections['sections']) : ?>
          <section class="row publication-category-<?php echo $obj['publication_category']; ?>" id="tableofcontents">
            <header><h1>Articles</h1></header>
            <div class="eightcol">
              <div class="articles">
              <?php
              foreach($obj_sections['sections'] as $section) : ?>
                <section id="publication-section-<?php echo $section['id']; ?>">
                <?php if($section['title']) { ?><h1><?php echo $section['title']; ?></h1><?php }
                foreach($section['articles'] as $article) : ?>
                  <div class="article">
                    <?php
                    /**
                     * if this is the ToC entry for an article part of a research-data publication (e.g.
                     * data section of a conference newspaper), show heading image as article teaser.
                     */
                    if($obj['publication_category'] == 'research-data' and $article['heading_image']): ?>
                    <a href="<?php echo $article['uri']; ?>">
                    <img class='heading-image' src='<?php echo $article['heading_image']; ?>' />
                    </a>
                    <?php endif; // ($obj['publication_category'] == 'research-data' and $article['heading_image']) ?>
                    <h1>
                      <a href="<?php echo $article['uri'] ; ?>"><?php echo $article['title']; ?></a>
                      <?php if($article['lang2_title'] and $article['lang2_uri']): ?>
                      | <a href="<?php echo $article['lang2_uri']; ?>"><?php echo $article['lang2_title']; ?></a>
                      <?php endif; // ($article['lang2_title'] and $article['lang2_uri']) ?>
                    </h1>
                    <?php if($article['authors']): ?>
                    <div class="authors">
                      <?php echo implode(', ', $article['authors']) ; ?>
                    </div>
                    <?php endif; ?>
                    <?php if(false and $article['abstract']): //disable until we can generate plain text only ?>
                    <div class="excerpt">
                      <?php echo shorten_string($article['abstract'], 30); ?><a href="<?php echo $article['uri']; ?>">...</a>
                    </div>
                    <?php endif; ?>
                  </div><!-- .article -->
                <?php
                endforeach; ?>
                </section><!-- publication-section-<?php echo $section['title']; ?> -->
              <?php
              endforeach; ?>
              </div><!-- .articles -->
            </div><!-- .eightcol -->
            <div class="fourcol last">
            </div><!-- .fourcol.last -->
          </section><!-- .row -->
        <?php endif ?>
      </div><!-- .extra-content -->
    </div><!-- #contentarea -->
  </div><!-- #post-<?php the_ID(); ?> -->
<?php get_template_part('nav'); ?>

</div><!-- role='main'.row -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
