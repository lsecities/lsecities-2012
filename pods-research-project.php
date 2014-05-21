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



$featured_post['ID'] = $pod->field('featured_post.ID');
if($featured_post['ID']) {
  $featured_post['permalink'] = get_permalink($featured_post['ID']);
  $featured_post['thumbnail_url'] = wp_get_attachment_url(get_post_thumbnail_id($featured_post['ID']));
  $featured_post['title'] = get_the_title($featured_post['ID']);
}

$research_output_categories = array('book', 'journal-article', 'book-chapter', 'research-report', 'conference-newspaper', 'conference-proceedings', 'conference-report', 'report', 'blog-post', 'interview', 'magazine-article');
$research_event_categories = array('conference', 'presentation', 'public-lecture', 'workshop');
$event_calendar_categories = array('lse-cities-event');

$research_output_publications_pod_slugs = (array)$pod->field('research_outputs_publications.slug');
var_trace(var_export($research_output_publications_pod_slugs, true), 'research_output_publications_pod_slugs');

$research_output_pod_slugs = (array)$pod->field('research_outputs.slug');
var_trace(var_export($research_output_pod_slugs, true), 'research_output_pod_slugs');
$research_outputs = array();
foreach($research_output_pod_slugs as $research_output_pod_slug) {
  $research_output_pod = pods('research_output', $research_output_pod_slug);

  var_trace(var_export($research_output_pod->field('category'), true), 'output category');

  $research_outputs[$research_output_pod->field('category.slug')][] = array(
    'title' => $research_output_pod->field('name'),
    'citation' => $research_output_pod->field('citation'),
    'date' => date_string($research_output_pod->field('date')),
    'uri' => $research_output_pod->field('uri')
  );
}

// now add publications from the publication_wrappers aka Publications pod
$research_output_publications_pod_slugs = (array)$pod->field('research_output_publications.slug');
var_trace(var_export($research_output_publications_pod_slugs, true), 'research_output_publications_pod_slugs');
foreach($research_output_publications_pod_slugs as $tmp_slug) {
  $research_output_publication_pod = pods('publication_wrappers', $tmp_slug);

  // get ID of WordPress page linked to this publication object
  $linked_wp_page_id = $research_output_publication_pod->field('publication_web_page.ID');

  var_trace(var_export($research_output_publication_pod->field('category'), true), 'output category');
  var_trace($linked_wp_page_id, 'publication_web_page.ID');

  // only add publication to list if publication has a linked WP page; otherwise emit warning
  if($linked_wp_page_id) {
    $research_outputs[$research_output_publication_pod->field('category.slug')][] = array(
      'title' => $research_output_publication_pod->field('name'),
      'citation' => $research_output_publication_pod->field('name'),
      'date' => date_string($research_output_publication_pod->field('publishing_date')),
      'uri' => get_permalink($linked_wp_page_id)
    );
  } else {
    trigger_error('No WordPress page linked to Publication with ID ' . $research_output_publication_pod->id(), E_USER_NOTICE);
  }
}

// select events from the main LSE Cities calendar
$events = array();
if($pod->field('events')) {
  foreach($pod->field('events', array('orderby' => 'date_start DESC')) as $event) {
    $events[] = array(
      'title' => $event['name'],
      'citation' => $event['name'],
      'date' => $event['date_start'],
      'uri' => PODS_BASEURI_EVENTS . '/' . $event['slug']
    );
  }
}

// now create a single array with all the research events
$research_events = array();
foreach($research_event_categories as $category_slug) {
  if(is_array($research_outputs[$category_slug])) {
    foreach($research_outputs[$category_slug] as $event) {
      array_push($research_events, $event);
    }
  }
}

// and sort research events by date descending
foreach($research_events as $key => $val) {
  $date[$key] = $val['date'];
}
array_multisort($date, SORT_DESC, $research_events);

var_trace($research_outputs, 'research_outputs');

foreach($research_output_categories as $category) {
  if(count($research_outputs[$category])) {
    $project_has_research_outputs = true;
  }
}

// prepare heading gallery
$gallery = galleria_prepare($pod, 'fullbleed wireframe');

// if we have research photo galleries/photo essays, prepare them
$research_photo_galleries = galleria_prepare_multi($pod, 'fullbleed wireframe wait', 'photo_galleries');

$news_categories = news_categories($pod->field('news_categories'));

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

            <?php if((is_array($pod->field('news_categories')) and count($pod->field('news_categories')) > 0) or count($events) or count($research_photo_galleries)): ?>
            <!--[if gt IE 8]><!-->
            <script>jQuery(function($) {
              $("article").organicTabs();
            });
            </script>
            <!--<![endif]-->
            <ul class="nav organictabs row">
              <li class="threecol"><a class="current" href="#t-project-info">Profile</a></li>
              <?php if(count($events)): ?>
              <li class="threecol"><a href="#t-events">Events</a></li>
              <?php endif; // (count($events))?>
              <?php if((is_array($pod->field('news_categories')) and count($pod->field('news_categories')) > 0) or count($research_events)): ?>
              <li class="threecol"><a href="#t-news">News</a></li>
              <?php endif; ?>
              <?php if($project_has_research_outputs): ?>
              <li class="threecol"><a href="#t-publications">Publications</a></li>
              <?php endif; ?>
              <?php if(count($research_photo_galleries)): ?>
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
              if(count($events)):
            ?>
            <section id="t-events" class="hide">
              <header><h1>Events</h1></header>
              <?php if($obj['events_blurb']): ?>
              <div><?php echo $obj['events_blurb']; ?></div>
              <?php endif; // ($obj['events_blurb']) ?>
              <ul>
              <?php
              foreach($events as $event): ?>
              <li>
                <?php if($event['uri']): ?><a href="<?php echo $event['uri']; ?>"><?php endif; ?>
                <?php echo date_string($event['date'], 'jFY') . ' | ';
                      echo $event['citation'] ? $event['citation'] : $event['title']; ?>
                <?php if($event['uri']): ?></a><?php endif; ?>
              </li>
              <?php endforeach; // ($events as $event) ?>
              </ul>
            </section>
            <?php endif; // (count($events)) ?>
            <?php
              if($project_has_research_events or (is_array($pod->field('news_categories')) and count($pod->field('news_categories')) > 0)):
              // latest news in categories defined for this research project
              $more_news = new WP_Query('posts_per_page=10' . news_categories($pod->field('news_categories'))); ?>
              <section id="t-news" class="hide">
                <?php if(is_array($pod->field('news_categories')) and count($pod->field('news_categories')) > 0): ?>
                <header><h1>Project news</h1></header>
                <ul>
                <?php
                    while ($more_news->have_posts()) :
                      $more_news->the_post();
                ?>
                  <li><a href="<?php the_permalink(); ?>"><?php the_time('j M Y'); ?> | <?php the_title() ?></a></li>
                <?php
                    endwhile;
                ?>
                </ul>
                <?php endif; // (is_array($pod->field('news_categories')) and count($pod->field('news_categories')) > 0) ?>
                <?php if(count($research_events)): ?>
                <header><h1>Conferences</h1></header>
                <ul>
                <?php
                foreach($research_events as $event): ?>
                <li>
                  <?php if($event['uri']): ?><a href="<?php echo $event['uri']; ?>"><?php endif; ?>
                  <?php echo date_string($event['date'], 'jFY') . ' | ';
                        echo $event['citation'] ? $event['citation'] : $event['title']; ?>
                  <?php if($event['uri']): ?></a><?php endif; ?>
                </li>
                <?php endforeach; // ($research_events as $event) ?>
                </ul>
                <?php endif; // (count($research_events)) ?>
              </section> <!-- #news_area -->
            <?php
             endif; // ($pod->field('news_categories')) and count($pod->field('news_categories')) > 0 or count($events))
            // publications
            if($project_has_research_outputs): ?>
            <section id="t-publications" class="hide">
              <header><h1>Publications</h1></header>
              <dl>
                <?php
                  foreach($research_output_categories as $category_slug):
                    if(count($research_outputs[$category_slug])):
                  ?>
                  <dt><?php $category_object = get_category_by_slug($category_slug); echo $category_object->cat_name; ?></dt>
                  <dd>
                    <ul>
                    <?php foreach($research_outputs[$category_slug] as $publication): ?>
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
                    endif; // (count($research_outputs[$category_slug]))
                  endforeach; // ($research_output_categories as $category) ?>

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
            if(count($research_photo_galleries)):
              var_trace($research_photo_galleries, 'research_photo_galleries');
              ?>
            <section id="t-galleries" class="hide later">
              <header><h1>Photo essays</h1></header>
              <?php
              foreach($research_photo_galleries as $key => $gallery): ?>
                <div class="sixcol<?php if((($key + 1) % 2) == 0): ?> last<?php endif; ?>">
                <?php
                include('templates/partials/galleria.inc.php'); ?>
                </div>
                <?php
              endforeach; // ($research_photo_galleries as $key => $gallery) ?>
            </section>
            <?php
            endif; // (count($research_photo_galleries)) ?>
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
          <?php if($featured_post['ID']): ?>
            <dt>Highlights</dt>
            <dd class="highlights">
              <a href="<?php echo $featured_post['permalink']; ?>" title="">
                <?php if($featured_post['thumbnail_url']): ?>
                <img src="<?php echo $featured_post['thumbnail_url']; ?>" />
                <?php endif; // ($featured_post['thumbnail_url']) ?>
                <?php if($featured_post['title']): ?>
                <h1 style=""><?php echo $featured_post['title']; ?></h1>
                <?php endif; // ($featured_post['title']) ?>
              </a>
            </dd>
          <?php endif; // ($featured_post['ID'])?>
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
