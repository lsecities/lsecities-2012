<?php
namespace LSECitiesWPTheme;
/**
 * The template used for displaying page content in page.php
 *
 * @package LSECities2012
 */

$wp_page = new WPPage(get_the_ID());

lc_data('page_data', [
  'post_title' => $wp_page->title,
  'page' => $wp_page
]);
\SemanticWP\Templating::get_template_part('lsecities/_wp_page', lc_data('page_data'));

?>
