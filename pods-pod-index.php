<?php
/**
 * Template Name: Pods - List of Pods objects (new template)
 * Description: Index pages for (potentially) any Pod type
 *
 * @package LSECities2012
 * @since 1.13
 */
 
namespace LSECitiesWPTheme;

/**
 * TECHNICAL_DEBT
 * In this first version, we detect which Pod type to use
 * based on request URI, according to an hardcoded 'router'.
 * As Pods Pages have a configuration option to associate
 * a Pod to the Pod Page (Associated Pod), if that could
 * be used (no documentation exists on this, apparently)
 * then we wouldn't need to hardcode anything.
 */

/**
 * Fetch metadata for index generation based on request URI
 */
// first make sure path ends in '/' (should be done by HTTP server, but still)
$uri_path = trailingslashit(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$pod_index_configuration = lc_data('pods_routes')[$uri_path];

$objs = array_map(
  function($item) use ($pod_index_configuration) {
    return [
      'title' => $item['title'],
      'labels' => $item['labels'],
      'research_projects' => call_user_func($pod_index_configuration['factory_function'], $item['pods_params'], $item['params'])
    ];
  },
  $pod_index_configuration['sections']
);

 /**
  * If no configuration is found it either doesn't exist for this URI,
  * or the URI is not supposed to be a Pod index page - so do a 404.
  * Likewise, if the factory function is not defined, do a 404.
  */
/*
if(!is_array($pod_index_configuration) or !defined($pod_index_configuration['factory_function'])) {
  redirect_to_404();
}
*/

get_header();
?>

<div role="main">

<?php if ( have_posts() ) : the_post(); endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('lc-article lc-index lc-index-for-pod-' . $pod_index_configuration['pod']); ?>>
  <?php \SemanticWP\Templating::get_template_part($pod_index_configuration['template'], [ 'title' => $pod_index_configuration['title'], 'sections' => $objs ]); ?>
</article>

<?php get_template_part('nav'); ?>
          
</div><!-- #contentarea -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
