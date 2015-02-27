<?php
namespace LSECitiesWPTheme\research_project;
/**
 * Template Name: Pods - Research project
 * Description: The template used for Research projects
 *
 * @package LSECities2012
 */
?><?php
/* URI: /objects/research-projects */
$BASE_URI = PODS_BASEURI_RESEARCH_PROJECTS;
global $IN_CONTENT_AREA, $HIDE_CURRENT_PROJECTS, $HIDE_PAST_PROJECTS;
lc_data('pods_toplevel_ancestor', 306);

$pod_slug = get_post_meta($post->ID, 'pod_slug', true);
if($pod_slug) {
  $pod_from_page = true;
} else {
  $pod_slug = pods_url_variable(2);
}

if(!$pod_from_page) {
  // set toplevel ancestor explicitly as we are outside of WP's hierarchy
  lc_data('pods_toplevel_ancestor', 306);
}

$obj = pods_prepare_research_project($pod_slug);

// we need - for now - this data in a variable called $gallery in order
// for the galleria.inc.php include to see the gallery data
$gallery = $obj['gallery'];

?><?php get_header(); ?>

<div role="main">
  <?php if ( have_posts() ) : the_post(); endif; ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class('lc-article lc-research-project'); ?>>
    <div class='ninecol' id='contentarea'>
      <div class='top-content'>
        <?php if(count($gallery['slides'])) : ?>
        <header class='heading-image'>
          <?php include('templates/partials/galleria.inc.php'); ?>
        </header>
        <?php endif; ?>

        <article class='wireframe twelvecol row'>
          <header class='entry-header'>
            <h1><?php echo $obj['title']; ?></h1>
            <?php if($obj['tagline']): ?><h2><?php echo $obj['tagline']; ?></h2><?php endif ; ?>
            <?php if($obj['summary']): ?>
            <div class="abstract"><?php echo $obj['summary']; ?></div>
            <?php endif; // ($obj['summary'])?>

            <?php if(count($obj['project_news']) or count($obj['research_events']) or count($obj['research_external_events']) or count($obj['research_photo_galleries']) or count($obj['research_outputs']) or count($obj['data_visualization_collections'])): ?>
            <!--[if gt IE 8]><!-->
            <script>jQuery(function($) {
              $("article").organicTabs();
            });
            </script>
            <!--<![endif]-->
            <ul class="nav organictabs row">
              <li><a class="current" href="#t-project-info">Profile</a></li>
              <?php if(count($obj['research_events']) or count($obj['research_external_events'])): ?>
              <li><a href="#t-events">Events</a></li>
              <?php endif; // (count($obj['research_events']) or count($obj['research_external_events']))?>
              <?php if(count($obj['project_news'])): ?>
              <li><a href="#t-news">News</a></li>
              <?php endif; ?>
              <?php if(count($obj['research_outputs'])): ?>
              <li><a href="#t-publications">Publications</a></li>
              <?php endif; ?>
              <?php if(count($obj['data_visualization_collections'])): ?>
              <li><a href="#t-dataviz">Data</a></li>
              <?php endif; ?>
              <?php if(count($obj['research_photo_galleries'])): ?>
              <li><a href="#t-galleries">Galleries</a></li>
              <?php endif; ?>
            </ul>
            <?php endif; // (count($obj['project_news']) or count($obj['research_events']) or count($obj['research_photo_galleries']) or count($obj['research_outputs']) or count($obj['data_visualization_collections'])) ?>
            
          </header>
          <div class='entry-content article-text list-wrap'>
            <section id="t-project-info" class="project-tab row">
              <div class="eightcol">
              <?php echo $obj['blurb']; ?>
              </div>
              <aside class='wireframe fourcol last entry-meta' id='keyfacts'>
                <dl>
                <?php if($obj['web_uri']): ?>
                  <dt>Website</dt>
                  <dd><a href="<?php echo $obj['web_uri']; ?>"><?php echo $obj['web_uri']; ?></a></dd>
                <?php endif; ?>
                <?php if(!empty($obj['free_form_project_teams'])) {
                  echo $obj['free_form_project_teams']; 
                } ?>
                <?php if(count($obj['project_coordinators'])): ?>
                  <dt>Project <?php echo count($obj['project_coordinators']) > 1 ?'coordinators' : 'coordinator'; ?></dt>
                  <dd><?php echo $obj['project_coordinators_string']; ?></dd>
                <?php endif; ?>
                <?php if(count($obj['project_researchers'])): ?>
                  <dt><?php echo count($obj['project_researchers']) > 1 ? 'Researchers' : 'Researcher'; ?></dt>
                  <dd><?php echo $obj['project_researchers_string']; ?></dd>
                <?php endif; ?>
                <?php if(count($obj['project_partners'])): ?>
                  <dt>Project <?php echo count($obj['project_partners']) > 1 ? 'partners' : 'partner'; ?></dt>
                  <dd><?php echo $obj['project_partners_string']; ?></dd>
                <?php endif; ?>
                <?php if(count($obj['project_funders'])): ?>
                  <dt>Project <?php echo count($obj['project_funders']) > 1 ? 'funders' : 'funder'; ?></dt>
                  <dd><?php echo $obj['project_funders_string']; ?></dd>
                <?php endif; ?>
                <?php if($obj['research_strand_title']): ?>
                  <dt>Research strand</dt>
                  <dd><?php echo $obj['research_strand_title']; ?></dd>
                <?php endif; ?>
                <?php if($obj['project_timespan']): ?>
                  <dt>Duration</dt>
                  <dd><?php echo $obj['project_timespan']; ?></dd>
                <?php endif; ?>
                <?php if($obj['keywords']): ?>
                  <dt>Keywords</dt>
                  <dd><?php echo $obj['keywords']; ?></dd>
                <?php endif; ?>
                <?php if($obj['featured_post']): ?>
                  <dt>Highlights</dt>
                  <dd class="highlights">
                    <a href="<?php echo $obj['featured_post']['permalink']; ?>" title="">
                      <?php if($obj['featured_post']['thumbnail_url']): ?>
                      <img src="<?php echo $obj['featured_post']['thumbnail_url']; ?>" />
                      <?php endif; // ($obj['featured_post']['thumbnail_url']) ?>
                      <?php if($obj['featured_post']['title']): ?>
                      <h1 style=""><?php echo $obj['featured_post']['title']; ?></h1>
                      <?php endif; // ($obj['featured_post']['title']) ?>
                    </a>
                  </dd>
                <?php endif; // ($obj['featured_post'])?>
                </dl>
              </aside><!-- #keyfacts -->
            </section>
            
            <?php if(count($obj['research_events']) or count($obj['research_external_events'])): ?>
            <section id="t-events" class="project-tab hide">
              <?php if($obj['events_blurb']): ?>
              <div><?php echo $obj['events_blurb']; ?></div>
              <?php endif; // ($obj['events_blurb']) ?>
              <dl>
                <?php if(count($obj['research_events'])) : ?>
                <dt><?php if(count($obj['research_external_events'])): ?>LSE Cities events<?php endif; ?></dt>
                <dd>
                  <ul>
                  <?php foreach($obj['research_events'] as $event): ?>
                    <li>
                    <?php if($event['uri']): ?><a href="<?php echo $event['uri']; ?>"><?php endif; ?>
                      <?php echo date_string($event['date'], 'jFY') . ' | ';
                        echo $event['title']; ?>
                    <?php if($event['uri']): ?></a><?php endif; ?>
                  </li>
                  <?php endforeach; // ($obj['research_events']) ?>
                  </ul>
                </dd>
                <?php endif; // (count($obj['research_events'])) ?>
                <?php
                  foreach($obj['research_external_events'] as $event_category_slug => $category_events):
                    if(count($category_events)):
                  ?>
                  <dt><?php $event_category_object = get_category_by_slug($event_category_slug); echo $event_category_object->cat_name; ?></dt>
                  <dd>
                    <ul>
              <?php
              foreach($category_events as $event): ?>
              <li>
                <?php if($event['uri']): ?><a href="<?php echo $event['uri']; ?>"><?php endif; ?>
                <?php echo date_string($event['date'], 'jFY') . ' | ';
                      echo $event['citation'] ? $event['citation'] : $event['title']; ?>
                <?php if($event['uri']): ?></a><?php endif; ?>
              </li>
              <?php endforeach; // ($category_events as $event) ?>
              </ul>
                  </dd>
                <?php
                    endif; // (count($category_events))
                  endforeach; // ($obj['research_external_events'] as $event_category_slug => $category_events) ?>
              </dl>
              <?php if(FALSE) : // legacy code - check and remove ?>
                <header><h1>Conferences</h1></header>
                <ul>
                <?php
                foreach($obj['research_events'] as $event): ?>
                <li>
                  <?php if($event['uri']): ?><a href="<?php echo $event['uri']; ?>"><?php endif; ?>
                  <?php echo date_string($event['date'], 'jFY') . ' | ';
                        echo $event['citation'] ? $event['citation'] : $event['title']; ?>
                  <?php if($event['uri']): ?></a><?php endif; ?>
                </li>
                <?php endforeach; // ($obj['research_events'] as $event) ?>
                </ul>
                <?php endif; // (FALSE) ?>
            </section>
            <?php endif; // (count($obj['research_events']) or count($obj['research_external_events'])) ?>
            
            
            <?php if(count($obj['project_news'])): ?>
              <section id="t-news" class="project-tab hide">
                <ul>
                <?php foreach($obj['project_news'] as $news_item) : ?>
                  <li><a href="<?php echo $news_item['permalink'] ?>"><?php echo $news_item['date']; ?> | <?php echo $news_item['title'] ?></a></li>
                <?php endforeach; // ($obj['project_news'] as $news_item)?>
                </ul>
              </section> <!-- #news_area -->
            <?php endif; // (count($obj['project_news'])) ?>
             
            <?php // publications
            if(count($obj['research_outputs'])): ?>
            <section id="t-publications" class="project-tab hide">
              <dl>
                <?php
                  foreach($obj['research_output_categories'] as $category_slug):
                    if(count($obj['research_outputs'][$category_slug])):
                  ?>
                  <dt><?php $category_object = get_category_by_slug($category_slug); echo $category_object->cat_name; ?></dt>
                  <dd>
                    <ul>
                    <?php foreach($obj['research_outputs'][$category_slug] as $publication): ?>
                      <li class='<?php echo $publication['slug']; ?>'>
                        <?php if($publication['uri'] and empty($publication['pdf_uri'])): ?><a href="<?php echo $publication['uri']; ?>"><?php endif; ?>
                        <?php echo $publication['citation']; ?>
                        <?php if($publication['uri'] and empty($publication['pdf_uri'])): ?></a><?php endif; ?>
                        <?php if($publication['uri'] and $publication['pdf_uri']): ?>
                        &mdash; <a href="<?php echo $publication['uri']; ?>">publication details</a> | <a href="<?php echo $publication['pdf_uri']; ?>">download full PDF</a> (<?php echo $publication['pdf_filesize']; ?>)
                        <?php endif; // ($publication['uri'] and $publication['pdf_uri']) ?>
                      </li>
                    <?php
                    endforeach; // ($publication_list as $publication) ?>
                    </ul>
                  </dd>
                <?php
                    endif; // (count($obj['research_outputs'][$category_slug]))
                  endforeach; // ($obj['research_output_categories'] as $category) ?>
              </dl>
            </section>
            <?php endif; // (count($obj['research_outputs'])) ?>
            
            <?php
            // data visualization collections
            if(count($obj['data_visualization_collections'])): ?>
            <section id="t-dataviz" class="project-tab hide later">
              <?php
              foreach($obj['data_visualization_collections'] as $data_visualization_collection): ?>
                <?php \SemanticWP\Templating::get_template_part('lsecities/publications/_heading-with-download', $data_visualization_collection); ?>
                <?php 
                  $publication_sections = $data_visualization_collection['publication_sections']['sections'];
                  include('templates/pods/publication/publication-toc.php'); ?>
                <?php
              endforeach; // ($obj['data_visualization_collections'] as $data_visualization_collection) ?>
            </section>
            <?php endif; // (count($obj['data_visualization_collections'])) ?>
            
            <?php
            // photo galleries
            if(count($obj['research_photo_galleries'])): ?>
            <section id="t-galleries" class="project-tab hide later">
              <?php
              foreach($obj['research_photo_galleries'] as $key => $gallery): ?>
                <div class="sixcol photo-essay">
                <?php
                include('templates/partials/galleria.inc.php'); ?>
                </div>
                <?php
              endforeach; // ($obj['research_photo_galleries'] as $key => $gallery) ?>
            </section>
            <?php endif; // (count($obj['research_photo_galleries'])) ?>
          </div> <!-- .entry-content.article-text -->
        </article>
      </div><!-- .top-content -->
      <div class='extra-content twelvecol'>
      </div><!-- .extra-content -->
    </div><!-- #contentarea -->
    <?php
      $IN_CONTENT_AREA = FALSE;
      $HIDE_CURRENT_PROJECTS = TRUE;
      $HIDE_PAST_PROJECTS = TRUE;
      get_template_part('nav'); ?>
  </div><!-- #post-<?php the_ID(); ?> -->

</div><!-- role='main'.row -->

<?php get_footer(); ?>
