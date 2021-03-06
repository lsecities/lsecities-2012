<?php
/**
 * Template Name: Pods - List of Pods objects (legacy template)
 * Description: The template used to list Pods objects
 *
 * @package LSECities2012
 */
?>
<?php
/**
 * TODO: For now, list types are hardcoded - make this flexible ASAP
 */
$BASE_URI = PODS_BASEURI_EVENTS;
$TRACE_ENABLED = is_user_logged_in();
$TRACE_PREFIX = 'pods-list-of-pods-objects';
global $IN_CONTENT_AREA;

$pod_type = get_post_meta(get_the_ID(), 'list_pods', true);
// set toplevel ancestor explicitly as we are outside of WP's hierarchy
global $pods_toplevel_ancestor;
switch($pod_type) {
  case 'upcoming_events':
  case 'past_events':
    $pods_toplevel_ancestor = 311;
    break;
  case 'research_projects':
  case 'past_research_projects':
    $pods_toplevel_ancestor = 306;
    break;
}
?>
<?php get_header(); ?>
<div role="main">
<?php if ( have_posts() ) : the_post(); endif; ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('lc-article lc-list-of-pods-objects'); ?>>
<?php var_trace($pod_type, $TRACE_PREFIX); ?>
          <div class='ninecol' id='contentarea'>
            <div class='top-content'>
              <article class='wireframe row'>
                <header>
                  <h1><?php the_title(); ?></h1>
                </header>
                <?php switch($pod_type):
                  case 'upcoming_events':
                    $HIDE_UPCOMING_EVENTS = false;
                    $HIDE_PAST_EVENTS = true;
                    $BASE_URI = PODS_BASEURI_EVENTS;
                    $IN_CONTENT_AREA = true;
                ?>
                <?php get_template_part( 'templates/nav/nav', 'events' ); ?>
                <?php break;
                  case 'past_events':
                    $HIDE_UPCOMING_EVENTS = true;
                    $HIDE_PAST_EVENTS = false;
                    $BASE_URI = PODS_BASEURI_EVENTS;
                    $IN_CONTENT_AREA = true;
                ?>
                <?php get_template_part( 'templates/nav/nav', 'events' ); ?>                
                <?php break;
                  case 'research_projects':
                    $HIDE_PAST_PROJECTS = true;
                    $IN_CONTENT_AREA = true;
                    $BASE_URI = PODS_BASEURI_RESEARCH_PROJECTS;
                    $IN_CONTENT_AREA = true;
                ?>
                <?php get_template_part( 'templates/nav/nav', 'research' ); ?>               
                <?php break;
                  case 'past_research_projects':
                    $HIDE_CURRENT_PROJECTS = true;
                    $IN_CONTENT_AREA = true;
                    $BASE_URI = PODS_BASEURI_RESEARCH_PROJECTS;
                    $IN_CONTENT_AREA = true;
                ?>
                <?php get_template_part( 'templates/nav/nav', 'research' ); ?>            
                <?php break; ?>
                <?php endswitch; ?>
              </article>
            </div><!-- .top-content -->
          </div>

          <?php $IN_CONTENT_AREA = false; 
                get_template_part('nav'); ?>
</div><!-- #contentarea -->
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
