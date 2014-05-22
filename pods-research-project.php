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

$pod = pods('research_project', $pod_slug);

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

        <article class='wireframe eightcol row'>
          <header class='entry-header'>
            <h1><?php echo $obj['title']; ?></h1>
            <?php if($obj['tagline']): ?><h2><?php echo $obj['tagline']; ?></h2><?php endif ; ?>
            <?php if($obj['summary']): ?>
            <div class="abstract"><?php echo $obj['summary']; ?></div>
            <?php endif; // ($obj['summary'])?>

            <?php if((is_array($pod->field('news_categories')) and count($pod->field('news_categories')) > 0) or count($events) or count($obj['research_photo_galleries']) or count($obj['research_outputs'])): ?>
            <!--[if gt IE 8]><!-->
            <script>jQuery(function($) {
              $("article").organicTabs();
            });
            </script>
            <!--<![endif]-->
            <ul class="nav organictabs row">
              <li class="threecol"><a class="current" href="#t-project-info">Profile</a></li>
              <?php if(count($obj['research_events'])): ?>
              <li class="threecol"><a href="#t-events">Events</a></li>
              <?php endif; // (count($events))?>
              <?php if((is_array($pod->field('news_categories')) and count($pod->field('news_categories')) > 0)): ?>
              <li class="threecol"><a href="#t-news">News</a></li>
              <?php endif; ?>
              <?php if(count($obj['research_outputs'])): ?>
              <li class="threecol"><a href="#t-publications">Publications</a></li>
              <?php endif; ?>
              <?php if(count($obj['research_photo_galleries'])): ?>
              <li class="threecol"><a href="#t-galleries">Galleries</a></li>
              <?php endif; ?>
            </ul>
            <?php endif; ?>
          </header>
          <div class='entry-content article-text list-wrap'>
            <section id="t-project-info">
              <?php echo $obj['blurb']; ?>
            </section>
            <?php
              if(count($obj['research_events'])):
            ?>
            <section id="t-events" class="hide">
              <header><h1>Events</h1></header>
              <?php if($obj['events_blurb']): ?>
              <div><?php echo $obj['events_blurb']; ?></div>
              <?php endif; // ($obj['events_blurb']) ?>
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
            <?php endif; // (count($obj['research_events'])) ?>
            <?php
              if(count($obj['project_news'])):
              ?>
              <section id="t-news" class="hide">
                <header><h1>Project news</h1></header>
                <ul>
                <?php foreach($obj['project_news'] as $news_item) : ?>
                  <li><a href="<?php echo $news_item['permalink'] ?>"><?php echo $news_item['date']; ?> | <?php echo $news_item['title'] ?></a></li>
                <?php endforeach; // ($obj['project_news'] as $news_item)?>
                </ul>
              </section> <!-- #news_area -->
            <?php
             endif; // (count($obj['project_news']))
             
            // publications
            if(count($obj['research_outputs'])): ?>
            <section id="t-publications" class="hide">
              <header><h1>Publications</h1></header>
              <dl>
                <?php
                  foreach($obj['research_output_categories'] as $category_slug):
                    if(count($obj['research_outputs'][$category_slug])):
                  ?>
                  <dt><?php $category_object = get_category_by_slug($category_slug); echo $category_object->cat_name; ?></dt>
                  <dd>
                    <ul>
                    <?php foreach($obj['research_outputs'][$category_slug] as $publication): ?>
                      <li>
                        <?php if($publication['uri']): ?><a href="<?php echo $publication['uri']; ?>"><?php endif; ?>
                        <?php echo $publication['citation']; ?>
                        <?php if($publication['uri']): ?></a><?php endif; ?>
                      </li>
                    <?php
                    endforeach; // ($publication_list as $publication) ?>
                    </ul>
                  </dd>
                <?php
                    endif; // (count($obj['research_outputs'][$category_slug]))
                  endforeach; // ($obj['research_output_categories'] as $category) ?>

                <?php if(FALSE): // TODO: check legacy code below and either update it or remove it ?>
                <?php foreach($publications as $publications_in_category): ?>
                <dt></dt>
                <dd>
                  <ul>
                  <?php foreach($publications_in_category as $publication): ?>
                    <li><?php echo $publication['authors']; ?> - <?php echo $publication['title']; ?> <!-- - <? echo $publication['date']; ?> --> [<?php echo $publication['category']; ?>]</li>
                  <?php endforeach; // ($publication_list as $publication) ?>
                  </ul>
                </dd>
                <?php endforeach; // ($publications as $publication_category) ?>
                <?php endif; // (FALSE) ?>

              </dl>
            </section>
            <?php
            endif; // ($project_has_research_outputs)
            // photo galleries
            if(count($obj['research_photo_galleries'])):
              var_trace($obj['research_photo_galleries'], 'research_photo_galleries');
              ?>
            <section id="t-galleries" class="hide later">
              <header><h1>Photo essays</h1></header>
              <?php
              foreach($obj['research_photo_galleries'] as $key => $gallery): ?>
                <div class="sixcol<?php if((($key + 1) % 2) == 0): ?> last<?php endif; ?>">
                <?php
                include('templates/partials/galleria.inc.php'); ?>
                </div>
                <?php
              endforeach; // ($obj['research_photo_galleries'] as $key => $gallery) ?>
            </section>
            <?php
            endif; // (count($obj['research_photo_galleries'])) ?>
          </div> <!-- .entry-content.article-text -->
        </article>
        <aside class='wireframe fourcol last entry-meta' id='keyfacts'>
          <dl>
          <?php if($obj['web_uri']): ?>
            <dt>Website</dt>
            <dd><a href="<?php echo $obj['web_uri']; ?>"><?php echo $obj['web_uri']; ?></a></dd>
          <?php endif; ?>
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
      </div><!-- .top-content -->
      <div class='extra-content twelvecol'>
      </div><!-- .extra-content -->
    </div><!-- #contentarea -->
    <?php
      $IN_CONTENT_AREA = false;
      if($project_status == 'active') {
        $HIDE_CURRENT_PROJECTS = false;
        $HIDE_PAST_PROJECTS = true;
      } else {
        $HIDE_CURRENT_PROJECTS = true;
        $HIDE_PAST_PROJECTS = false;
      }
      get_template_part('nav'); ?>
  </div><!-- #post-<?php the_ID(); ?> -->

</div><!-- role='main'.row -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
