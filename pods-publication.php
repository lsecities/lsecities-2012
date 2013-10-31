<?php
/**
 * Template Name: Pods - Publications - index
 * Description: The template used for Publications, showing publication info, listing available articles, etc.
 *
 * @package LSECities2012
 */
?><?php
$TRACE_ENABLED = is_user_logged_in();
$TRACE_PREFIX = 'pods-publications';

$publication_slug = get_post_meta($post->ID, 'pod_slug', true);
var_trace('pod_slug: ' . $publication_slug);
$pod = pods('publication_wrappers', $publication_slug);
$publication_pod = $pod; // TODO refactor code and move generation of list of articles to sub used both in pods-articles and pods-publication
$pod_title = $pod->field('name');
$pod_subtitle = $pod->field('publication_subtitle');
$pod_issuu_uri = $pod->field('issuu_uri');
$pod_cover = pods_image_url($pod->field('snapshot'), 'original');
$pod_abstract = do_shortcode($pod->field('abstract'));

$publication_category = $pod->field('category.slug');

// get tiles for heading slider
$heading_slides = array();
var_trace($pod->field('heading_slides.slug'), $TRACE_PREFIX . '--heading_slides.slug');
$slider_pod = pods('slide', $pod->field('heading_slides.slug'));
foreach((array)$slider_pod->field('tiles.slug') as $tile_slug) {
  var_trace($tile_slug, $TRACE_PREFIX. '--tiles.slug');
  $tile = pods('tile', $tile_slug);
  if($tile) {
    array_push($heading_slides, pods_image_url($tile->field('image'), 'original'));
  }
}

/**
 * Fetch data for English language publication PDF and extra ('alt') publication PDF
 */
$pod_pdf = $pod->field('publication_pdf.guid') ? wp_get_attachment_url($pod->field('publication_pdf.ID', TRUE)) : $pod->field('publication_pdf_uri');
$pod_pdf_filesize = $pod->field('publication_pdf.guid') ? sprintf("%0.1f MB", filesize(get_attached_file($pod->field('publication_pdf.ID', TRUE))) / 1e+6 ) : '';
$pod_alt_pdf = $pod->field('publication_alt_pdf.guid') ? wp_get_attachment_url($pod->field('publication_alt_pdf.ID', TRUE)) : $pod->field('publication_alt_pdf_uri');
$pod_alt_pdf_filesize = $pod->field('publication_alt_pdf.guid') ? sprintf("%0.1f MB", filesize(get_attached_file($pod->field('publication_alt_pdf.ID', TRUE))) / 1e+6 ) : '';
$pod_alt_pdf_label = $pod->field('publication_alt_pdf.guid') && $pod->field('publication_alt_pdf_label') ? $pod->field('publication_alt_pdf_label') : 'Download extra content';

/**
 * Fetch data for 2nd language publication PDF and extra ('alt') publication PDF
 */
$pod_pdf_lang2 = $pod->field('publication_pdf_lang2.guid') ? wp_get_attachment_url($pod->field('publication_pdf_lang2.ID', TRUE)) : $pod->field('publication_pdf_lang2_uri');
$pod_pdf_filesize_lang2 = $pod->field('publication_pdf_lang2.guid') ? sprintf("%0.1f MB", filesize(get_attached_file($pod->field('publication_pdf_lang2.ID', TRUE))) / 1e+6 ) : '';
$pod_alt_pdf_lang2 = $pod->field('publication_alt_pdf_lang2.guid') ? wp_get_attachment_url($pod->field('publication_alt_pdf_lang2.ID', TRUE)) : $pod->field('publication_alt_pdf_lang2_uri');
$pod_alt_pdf_filesize_lang2 = $pod->field('publication_alt_pdf_lang2.guid') ? sprintf("%0.1f MB", filesize(get_attached_file($pod->field('publication_alt_pdf_lang2.ID', TRUE))) / 1e+6 ) : '';
$pod_alt_pdf_label_lang2 = $pod->field('publication_alt_pdf_label_lang2');

$extra_publication_metadata = $pod->field('extra_publication_metadata');

if(is_array($publication_authors_list)) {
  $publication_authors_list = sort_linked_field($pod->field('authors'), 'family_name', SORT_ASC);
  foreach($publication_authors_list as $publication_author) {
    $publication_authors .= $publication_author['name'] . ' ' . $publication_author['family_name'] . ', ';
  }
  $publication_authors = substr($publication_authors, 0, -2);
}

if(is_array($publication_editors_list)) {
  $publication_editors_list = sort_linked_field($pod->field('editors'), 'family_name', SORT_ASC);
  foreach($publication_editors_list as $publication_editor) {
    $publication_editors .= $publication_editor['name'] . ' ' . $publication_editor['family_name'] . ', ';
  }
  $publication_editors = substr($publication_editors, 0, -2);
}

if(is_array($publication_contributors_list)) {
  $publication_contributors_list = sort_linked_field($pod->field('contributors'), 'family_name', SORT_ASC);
  foreach($publication_contributors_list as $publication_contributor) {
    $publication_contributors .= $publication_contributor['name'] . ' ' . $publication_contributor['family_name'] . ', ';
  }
  $publication_contributors = substr($publication_contributors, 0, -2);
}

$publication_partners_list = sort_linked_field($pod->field('partner_organizations'), 'name', SORT_ASC);
if(is_array($publication_partners_list)) {
  foreach($publication_partners_list as $publication_partner) {
    if($publication_partner['web_uri']) {
      $publication_partners .= '<a href="' . $publication_partner['web_uri'] . '">' . $publication_partner['name'] . '</a>, ';
    } else {
      $publication_partners .= $publication_partner['name'] . ', ';
    }
  }
  $publication_partners = substr($publication_partners, 0, -2);
}

$publication_catalogue_data = $pod->field('catalogue_data');
$publishing_date = $pod->field('publishing_date');

$articles_pods = pods('article');
$search_params = array();
$search_params['where'] = 'in_publication.id = ' .$pod->field('id');
$search_params['orderby'] = 't.sequence ASC';
$search_params['limit'] = -1;
$articles_pods->find($search_params);

// get list of publication sections
$publication_sections = array();
foreach(preg_split("/\n/", $publication_pod->field('sections')) as $section_line) {
  preg_match("/^(\d+)?\s?(.*)$/", $section_line, $matches);
  if($matches[1]) {
    array_push($publication_sections, array( 'id' => $matches[1], 'title' => $matches[2]));
  }
}
var_trace('sections: ' . var_export($publication_sections, true));
              
$gallery = galleria_prepare($pod, 'fullbleed wireframe');
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
            <h1><?php echo $pod_title; ?></h1>
            <?php if($pod_subtitle): ?><h2><?php echo $pod_subtitle; ?></h2><?php endif ; ?>
          </header>
          <div class='entry-content article-text'>
            <?php echo $pod->display('blurb'); ?>
          </div>
          <!--
          <?php if(count($publication_sections) > 1): ?>
          <section class='publication-sections'>
            <h1>Browse content</h1>
            <ul>
              <?php foreach($publication_sections as $section): ?>
              <li><a href="#publication-section-<?php echo $section['id']; ?>"><?php echo $section['title']; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </section>
          <?php endif; // (count($publication_sections) > 1)?>
          -->
          <?php get_template_part('templates/partials/socialmedia-share'); ?>
        </article>
        <aside class='wireframe fourcol last entry-meta' id='keyfacts'>
          <div>
            <?php if($pod_cover): ?>
            <div class='cover-thumbnail'><img src="<?php echo $pod_cover; ?>" /></div>
            <?php endif; ?>
            <ul>
              <?php if($pod_pdf) : ?>
              <li><a class="downloadthis pdf button" href="<?php echo $pod_pdf; ?>">Download PDF</a><?php if(!empty($pod_pdf_filesize)) : ?> (<?php echo $pod_pdf_filesize; ?>)<?php endif; ?></li>
              <?php endif ; ?>
              <?php if($pod_pdf and $pod_alt_pdf) : // do not bother displaying extra PDF if main is not available ?>
              <li><a class="downloadthis pdf button" href="<?php echo $pod_alt_pdf; ?>"><?php echo $pod_alt_pdf_label; ?></a><?php if(!empty($pod_alt_pdf_filesize)) : ?> (<?php echo $pod_alt_pdf_filesize; ?>)<?php endif; ?></li>
              <?php endif ; ?>
              <?php if($pod_issuu_uri) : ?>
              <li><a class="readthis online issuu button" href="<?php echo $pod_issuu_uri; ?>">Online browser</a></li>
              <?php endif ; ?>
            </ul>
            <dl>
            <?php if(!$extra_publication_metadata): // switching to only display $extra_publication_metadata if available, until Pods can sort pick items ?>
            <?php if($publication_authors): ?>
              <dt>Authors</dt>
              <dd><?php echo $publication_authors; ?></dd>
            <?php endif; ?>
            <?php if($publication_editors): ?>
              <dt>Editors</dt>
              <dd><?php echo $publication_editors; ?></dd>
            <?php endif; ?>
            <?php if($publication_contributors): ?>
              <dt>Contributors</dt>
              <dd><?php echo $publication_contributors; ?></dd>
            <?php endif; ?>
            <?php endif; // (!$extra_publication_metadata) ?>
            <?php if($extra_publication_metadata): ?>
            <?php echo $extra_publication_metadata; ?>
            <?php endif; ?>
            <?php if($publication_partners): ?>
              <dt>Partners</dt>
              <dd></dd><?php echo $publication_partners; ?></dd>
            <?php endif; ?>
            <?php if($publishing_date): ?>
              <dt>Publication date</dt>
              <dd><?php echo $publishing_date; ?></dd>
            <?php endif; ?>
            <?php if($publication_catalogue_data): ?>
              <dt>Catalogue data</dt>
              <dd><?php echo $publication_catalogue_data; ?></dd>
            <?php endif; ?>         
            </dl>
          </div>
        </aside><!-- #keyfacts -->
      </div><!-- .top-content -->
      <div class='extra-content row'>
          <?php var_trace(var_export($pod->field('reviews_category.term_id'), true)); ?>
          <?php if($pod->field('reviews_category.term_id')):
                  $wp_posts_reviews = get_posts(array('category' => $pod->field('reviews_category.term_id'), 'numberposts' => 10));
                  if(count($wp_posts_reviews)): ?>
          <section class="row" id="wp-posts-reviews">
            <header><h1>Reviews</h1></header>
              <dl class="posts">
              <?php
              foreach($wp_posts_reviews as $post):
                setup_postdata($post); ?>
                <dt><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dt>
                <dd><?php the_date(); ?></dd>
              <?php endforeach; ?>
              </dl><!-- .posts -->
          </section><!-- #wp-posts-reviews -->
            <?php endif; ?>
          <?php endif; ?>
          <?php if($articles_pods->total_found()) : ?>
          <section class="row publication-category-<?php echo $publication_category; ?>" id="tableofcontents">
            <header><h1>Articles</h1></header>
            <div class="eightcol">
              <?php if($articles_pods->total_found()) : ?>
              <div class="articles">
              <?php
              if(!count($publication_sections)) {
                $publication_sections = array("010" => "");
              }
              foreach($publication_sections as $section) : ?>
                <section id="publication-section-<?php echo $section['id']; ?>">
                <?php if($section['title']) { ?><h1><?php echo $section['title']; ?></h1><?php }

                $articles_pods->reset();
                while($articles_pods->fetch()) :
                  if(preg_match("/^" . $section['id'] . "/", $articles_pods->field('sequence'))) :
                    $article_authors = $articles_pods->field('authors');
                    $author_names = '';
                    foreach($article_authors as $author) {
                      $author_names = $author_names . $author['name'] . ' ' . $author['family_name'] . ', ';
                    }
                    // remove trailing comma
                    $author_names = substr($author_names, 0, -2);
                    $article_title = $articles_pods->field('name');
                    $article_title_lang2 = $articles_pods->field('title_lang2');
                    $lang2_language_code = $articles_pods->field('language.language_code');
                    ?>
                    <div class="article">
                      <?php if($publication_category == 'research-data' and $articles_pods->field('heading_image')): ?>
                      <a href="<?php echo PODS_BASEURI_ARTICLES . '/' . $articles_pods->field('slug'); ?>">
                      <img class='heading-image' src='<?php echo pods_image_url($articles_pods->field('heading_image'), 'original'); ?>' />
                      </a>
                      <?php endif; ?>
                      <h1>
                        <a href="<?php echo PODS_BASEURI_ARTICLES . '/' . $articles_pods->field('slug') . '/en-gb/' ; ?>"><?php echo $article_title; ?></a>
                        <?php if($article_title_lang2 and $lang2_language_code): ?>
                        | <a href="<?php echo PODS_BASEURI_ARTICLES . '/' . $articles_pods->field('slug') . '/' . strtolower($lang2_language_code) . '/'; ?>"><?php echo $article_title_lang2; ?></a>
                        <?php endif; // ($article_title_lang2 and $lang2_language_code) ?>
                      </h1>
                      <?php if($author_names): ?>
                      <div class="authors">
                        <?php echo $author_names ; ?>
                      </div>
                      <?php endif; ?>
                      <?php if(false and $articles_pods->field('abstract')): //disable until we can generate plain text only ?>
                      <div class="excerpt">
                        <?php echo shorten_string($articles_pods->field('abstract'), 30); ?><a href="<?php echo PODS_BASEURI_ARTICLES . '/' . $articles_pods->field('slug'); ?>">...</a>
                      </div>
                      <?php endif; ?>
                    </div><!-- .article -->
                <?php
                  endif;
                endwhile; ?>
                </section><!-- publication-section-<?php echo $section['title']; ?> -->
              <?php  
              endforeach; ?>
              </div><!-- .articles -->
              <?php endif; ?>
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
