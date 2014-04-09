<?php
/**
 * Functions for the LSE Cities 2012 WordPress+Pods theme
 *
 * @package LSECities2012
 */

/* LSE Cities Twenty Twelve functions and constant definitions */
define('PODS_BASEURI_ARTICLES', '/media/objects/articles');
define('PODS_BASEURI_CONFERENCES', '/media/objects/conferences');
define('PODS_BASEURI_EVENTS', '/media/objects/events');
define('PODS_BASEURI_RESEARCH_PROJECTS', '/objects/research-projects');
define('TRACE_ENABLED', is_user_logged_in());
define('TRACE_PREFIX', __FILE__);

// log php errors
define('LSECITIES2012_LOG_FILE', '/srv/web/wordpress/www/tmp/lsecities-2012.log');

// dump error log info only if LSE Cities theme debugging is enabled in wp-config.php (LSECITIES_THEME_DEBUG)
if(LSECITIES_THEME_DEBUG) {
  @ini_set('log_errors', 'On'); // enable or disable php error logging (use 'On' or 'Off')
  @ini_set('display_errors', 'Off'); // enable or disable public display of errors (use 'On' or 'Off')
  @ini_set('error_log', LSECITIES2012_LOG_FILE); // path to server-writable log file
}

/**
 * tracing/debugging output
 *
 * This function can either return a formatted dump of the variable to
 * debug, or send the dump to the defined error_log. Ideally this
 * should be coupled with PHP INI settings to enable error log, to
 * disable error output on pages and to send logs to a specific
 * file instead
 *
 * @param mixed $var The variable to dump
 * @param string $prefix Text to prepend to the variable to be dumped
 * @param string $destination Whether to return a string ('page') or to
 *        send output to error_log ('error_log')
 * @return bool the tracing output if $destination == 'page' or the
 *         return value of error_log() if $destination == 'error_log'
 */
function var_trace($var, $prefix = 'pods', $destination = 'error_log') {
  /**
	 * If LSECITIES_THEME_DEBUG is set to 1 (only trace actions of logged-in users)
	 * or if LSECITIES_THEME_DEBUG is set to 2 (trace actions of any visitor), then log,
	 * otherwise do nothing.
	 */
	if((LSECITIES_THEME_DEBUG == 1 and is_user_logged_in()) or LSECITIES_THEME_DEBUG == 2) {
    $output_string = "tracing $prefix : " . var_export($var, true) . "\n\n";

    if($destination == 'page') {
      return "<!-- $output_string -->";
    } elseif($destination == 'error_log') {
      return error_log($output_string);
    }
  }
}

// global scope variables
lc_data('META_media_attr', array());

// define assets to load
$json_assets =
'[{
  "jquery.cookiecuttr": {
    "load": [ "logged-in": true, "not-logged-in": false, "admin-area": false ]
  }
}]';
include_once('asset_pipeline.php');
$asset_pipeline = new LC\AssetPipeline(json_decode($json_assets));

/* deal with WP's insane URI (mis)management - example from
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_get_attachment_url */
add_filter('wp_get_attachment_url', 'honor_ssl_for_attachments');
add_filter('the_content', 'honor_ssl_for_attachments' );
function honor_ssl_for_attachments($url) {
	$http = site_url(FALSE, 'http');
	$https = site_url(FALSE, 'https');
	if($_SERVER['HTTPS'] == 'on') {
    return str_ireplace($http, $https, $url);
  }
  else {
    return str_ireplace($https, $http, $url);
  }
}

add_filter('lc_do_shortcode', 'honor_ssl_for_attachments');

function do_https_shortcode($content) {
  $content = apply_filters('lc_do_shortcode', do_shortcode($content));
  return $content;
}

/**
 * enable uploads of file types we need
 */
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
    // add your extension to the mimes array as below
    $existing_mimes['zip'] = 'application/zip';
    $existing_mimes['svg'] = 'image/svg+xml';
    return $existing_mimes;
}

function admin_add_assets() {
  wp_enqueue_style('admin.jquery.ddslick', get_stylesheet_directory_uri() . '/stylesheets/admin/jquery.ddslick.css');
  wp_enqueue_script('admin.jquery.ddslick', get_stylesheet_directory_uri() . '/javascripts/vendor/jquery.ddslick.js', 'jquery', false, false);
}

add_action('admin_init', 'admin_add_assets');

/*  Returns the first $wordsreturned out of $string.  If string
contains fewer words than $wordsreturned, the entire string
is returned.
*/

function shorten_string($string, $wordsreturned) {
  $retval = $string;      //  Just in case of a problem
  $array = explode(" ", $string);
  if (count($array)<=$wordsreturned) { // Already short enough, return the whole thing
    $retval = $string;
  } else { //  Need to chop some words
    array_splice($array, $wordsreturned);
    $retval = implode(" ", $array);
  }
  return $retval;
}

/*
 * Set wp_title according to current Pod content
 */
include_once('pods/class.podobject.inc.php');
function set_pod_page_title($title, $sep, $seplocation) {
  global $this_pod;
  if(isset($this_pod) and $this_pod->page_title){
    $title = $this_pod->page_title;

    if($this_pod->page_section){
      $title .= " $sep " . $this_pod->page_section;
    }

    $title .= " $sep ";

    var_trace($title, 'page_title');
  }

  return $title;
}
add_filter('wp_title', 'set_pod_page_title', 5, 3);

// from http://webcheatsheet.com/php/get_current_page_url.php
function get_current_page_URI() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

/* attribution and license metadata support for media library
 * thanks to jvelez (http://stackoverflow.com/questions/11475741/word-press-saving-custom-field-to-database)
 *
 * To learn more:
 * http://net.tutsplus.com/tutorials/wordpress/creating-custom-fields-for-attachments-in-wordpress/
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/attachment_fields_to_save
 *
 * Weird Wordpress convention : Fields prefixed with an underscore
 * (_RevisionDate) will not be listed in the drop down of available custom fields on the post/page screen;
 * We only need the custom fields in the media library page
 */
function get_media_library_item_custom_form_fields($form_fields, $post) {
  $form_fields['attribution_name'] = array(
    'label' => 'Author',
    'input' => 'text',
    'value' => get_post_meta($post->ID, '_attribution_name', true),
    'helps' => 'Media author (or rights holder)'
  );

  $form_fields['attribution_uri'] = array(
    'label' => 'URI of original work',
    'input' => 'text',
    'value' => get_post_meta($post->ID, '_attribution_uri', true),
    'helps' => 'Link to original work for attribution purposes'
  );

  return $form_fields;
}

add_filter('attachment_fields_to_edit', "get_media_library_item_custom_form_fields", null, 2);

function save_media_library_item_custom_form_fields($post, $attachment) {
  if(isset($attachment['attribution_name'])) {
    update_post_meta($post['ID'], '_attribution_name', $attachment['attribution_name']);
  }
  if(isset($attachment['attribution_uri'])) {
    update_post_meta($post['ID'], '_attribution_uri', $attachment['attribution_uri']);
  }

  return $post;
}

add_filter('attachment_fields_to_save','save_media_library_item_custom_form_fields', 8, 2);

function push_media_attribution($attachment_ID) {
  $media_attributions = lc_data('META_media_attr');
  $attachment_metadata = wp_get_attachment_metadata($attachment_ID);
  $attribution_uri = get_post_meta($attachment_ID, '_attribution_uri', true);
  $attribution_name = get_post_meta($attachment_ID, '_attribution_name', true);

  $metadata = array(
    'title' => get_the_title($attachment_ID),
    'attribution_uri' => $attribution_uri,
    'author' => $attribution_name,
    'attribution_string' => format_media_attribution($attachment_ID)
  );

  // only append image attribution data to list if we have at least
  // title and author - otherwise it's useless (but emit a notice if so)
  if(!empty($metadata['title']) and !empty($metadata['author'])) {
    array_push($media_attributions, $metadata);
    lc_data('META_media_attr', $media_attributions);
  } else {
    trigger_error('No title or attribution metadata set for media item with ID ' . $attachment_ID, E_USER_NOTICE);
  }
}

/**
 * push to media attribution stack every time an image is used
 * (using filter wp_get_attachment_url)
 */
function auto_push_media_attribution($url, $id) {
  // automatically fetch attribution metadata and push it to the attribution list
  push_media_attribution($id);

  // pass through
  return $url;
}

/**
 * and connect to filter
 */
add_filter('wp_get_attachment_url', 'auto_push_media_attribution', 10, 2);

function format_media_attribution($media_item_id) {
    /**
     * Add image attribution metadata if present in media item
     */
    $image_attribution = '';
    $image_attribution_name = get_post_meta($media_item_id, '_attribution_name', true);
    $image_attribution_uri = get_post_meta($media_item_id, '_attribution_uri', true);
    if($image_attribution_name and $image_attribution_uri) {
      $image_attribution = 'Photo credits: ' . $image_attribution_name . ' - ' . $image_attribution_uri;
    } elseif($image_attribution_name or $image_attribution_uri) {
      // if either meta field is provided, just join both as only one will be output
      $image_attribution = 'Photo credits: ' . $image_attribution_name . $image_attribution_uri;
    }

    return $image_attribution;
}

function galleria_prepare($pod, $extra_classes = '', $gallery_field = 'gallery', $random_slide_order = false) {
  define(GALLERY_MAX_SLIDES_COUNT, 12);

  // if $gallery_field is provided AND it is empty, look up the
  // pod itself rather than a pick pod by using plain field names
  // in field(); otherwise, prepend $gallery_field . '.' to
  // perform lookup in pick pod
  if($gallery_field != '') {
    $gallery_field .= '.';
  }

  var_trace($gallery_field, 'gallery field');

  $gallery = array(
    'slug' => $pod->field($gallery_field . 'slug'),
    'extra_classes' => $extra_classes,
    'slides' => array()
  );

  // if picasa_gallery_id is set, add this to the object
  if($pod->field($gallery_field . 'picasa_gallery_id')) {
    $gallery['picasa_gallery_id'] = $pod->field($gallery_field . 'picasa_gallery_id');
  }
  // otherwise build the slides list
  else {
    for($i = 1; $i < (GALLERY_MAX_SLIDES_COUNT + 1); $i++) {
      $slide_id = $pod->field($gallery_field . sprintf('slide%02d', $i) . '.ID');
      var_trace($slide_id);
      if($slide_id) {
        array_push($gallery['slides'], array_shift(get_posts(array('post_type'=>'attachment', 'numberposts'=>1, 'p' => $slide_id))));
      }
    }
  }

  // shuffle order of slides randomly if requested by caller
  if($random_slide_order) {
    shuffle($gallery['slides']);
  }

  var_trace($gallery, 'gallery');

  return $gallery;
}

function galleria_prepare_multi($pod, $extra_classes, $gallery_field='galleries') {
  define(GALLERY_MAX_SLIDES_COUNT, 12);
  $gallery_array = array();

  $galleries = $pod->field($gallery_field);
  if(empty($galleries)) {
    error_log('No galleries found in pod field ' . $gallery_field);
    return $gallery_array;
  }

  foreach($galleries as $key => $gallery) {

    $gallery_object = array(
      'slug' => $gallery['slug'],
      'extra_classes' => $extra_classes,
      'slides' => array()
    );

    // if picasa_gallery_id is set, add this to the object
    if($gallery['picasa_gallery_id']) {
      $gallery_object['picasa_gallery_id'] = $gallery['picasa_gallery_id'];
      var_trace($gallery_object, 'gallery_object__picasaweb');
      array_push($gallery_array, $gallery_object);
    }
    // otherwise build the slides list
    else {
      for($i = 1; $i < (GALLERY_MAX_SLIDES_COUNT + 1); $i++) {
        $slide_id = $gallery[sprintf('slide%02d', $i) . '.ID'];
        var_trace($slide_id);
        if($slide_id) {
          array_push($gallery_object['slides'], array_shift(get_posts(array('post_type'=>'attachment', 'numberposts'=>1, 'p' => $slide_id))));
        }
      }
      var_trace($gallery_object, 'gallery_object__slides');
      array_push($gallery_array, $gallery_object);
    }
    var_trace($gallery_array, 'gallery_array');
  }
  return $gallery_array;
}

/**
 * Parse date and return it as a YYYY-MM-DD string, or YYYY-MM, or YYYY
 * month/day given as single digit are padded with zero to make
 * dates sortable with array_multisort
 *
 * @param $date The date
 * @param $format Output format (can be 'ISO' for YYYY-MM-DD or 'jFY'
 *   for DD Month YYYY; if day or day and month are missing, only output
 *   what is provided
 */
function date_string($date, $format = 'ISO') {
  if(!$date) {
    return false;
  }

  $match = array();

  if(!preg_match('/(\d{4})(\-(\d{1,2})(\-(\d{1,2}))?)?/', $date, $match)) {
    return false;
  }

  $date_array = array(
    'year' => $match[1],
    'month' => $match[3],
    'day' => $match[5]
  );

  var_trace(var_export($date_array, true), 'date_arraytime');


  $date_string = sprintf("%4d", $date_array['year']);
  if($date_array['month']) {
    $date_string .= "-" . sprintf("%02d", $date_array['month']);

    if($date_array['day']) {
      $date_string .= "-" . sprintf("%02d", $date_array['day']);
    }
  }

  // now that we have the date in ISO format, apply any further
  // formatting as requested, or return ISO date if no other
  // format has been requested

  // j F Y (DD Month YYYY) format
  if($format === 'jFY') {
    if(!$date_array['day'] and !$date_array['month']) {
      $format = 'Y';
    } elseif(!$date_array['day']) {
      $format = 'F Y';
    } else {
      $format = 'j F Y';
    }
    $date_string = date($format, strtotime($date_string));
  }

  var_trace($date_string, 'date_string');
  return $date_string;
}

function compose_project_list_by_strand($project_status) {
  // only accept known project statuses
  // $known_project_status = pods('project_status', $project_status);
  $known_project_status = pods('project_status', array('where' => 'slug = "' . $project_status . '"'));
  if(!$known_project_status->total_found()) {
    error_log('unknown project status requested: ' . $project_status);
    return;
  }

  // retrieve all projects with requested status
  // TODO: do we want to sort projects by start date?
  // some have an arbitrary start day so this might not work in practice
  $projects_pod = pods('research_project');
  $projects_pod->find(array(
    'where' => 'status.name = "' . $project_status . '"'
  ));

  // prepare research strands array
  // we want to display strands in a specific order, using strands' slugs for sorting (NNN-strand-slug)
  // where NNN is e.g. 010, 020, etc. for the first, second, etc. strand respectively
  $research_strands_pod = pods('research_stream', array('orderby' => 'slug'));

  $projects_by_strand = array();

  while($research_strands_pod->fetch()) {
    $projects_by_strand[$research_strands_pod->field('slug')] = array(
      'name' => $research_strands_pod->field('name'),
      'projects' => array()
    );
  }

  while($projects_pod->fetch()) {
    $projects_by_strand[$projects_pod->field('research_strand.slug')]['projects'][] = array(
      'slug' => $projects_pod->field('slug'),
      'name' => $projects_pod->field('name'),
      'strand' => $projects_pod->field('research_strand.name'),
      'strand_slug' => $projects_pod->field('research_strand.slug')
    );
  }

  foreach($projects_by_strand as $key => $value) {
    if(sizeof($projects_by_strand[$key]['projects']) == 0) {
      error_log('removing empty research strand "' . $key . '" from ' . $project_status . ' projects list');
      unset($projects_by_strand[$key]);
    }
  }

  ksort($projects_by_strand);
  return $projects_by_strand;
}

function news_categories($pod_news_categories) {
  var_trace(var_export($pod_news_categories, true), 'news_category_ids');
  $news_categories = '';
  if(is_array($pod_news_categories) and !empty($pod_news_categories)) {
    foreach($pod_news_categories as $category) {
      $news_categories .= $category['term_id'] . ',';
    }
    $news_categories = '&cat='. rtrim($news_categories, ',');
    var_trace($news_categories, 'news_categories');
  }
  return $news_categories;
}

/**
 * Loop shortcode
 * credits: http://digwp.com/2010/01/custom-query-shortcode/
 */
function custom_query_shortcode($atts) {

   // EXAMPLE USAGE:
   // [loop the_query="showposts=100&post_type=page&post_parent=453"]

   // Defaults
   extract(shortcode_atts(array(
      "the_query" => ''
   ), $atts));

   // de-funkify query
   $the_query = preg_replace('~&#x0*([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $the_query);
   $the_query = preg_replace('~&#0*([0-9]+);~e', 'chr(\\1)', $the_query);

   // query is made
   query_posts($the_query);

   // Reset and setup variables
   $output = '';
   $temp_title = '';
   $temp_link = '';

   // the loop
   if (have_posts()) : while (have_posts()) : the_post();

      $temp_title = get_the_title($post->ID);
      $temp_link = get_permalink($post->ID);

      // output all findings - CUSTOMIZE TO YOUR LIKING
      $output .= "<li><a href='$temp_link'>$temp_title</a></li>";

   endwhile; else:

      $output .= "nothing found.";

   endif;

   wp_reset_query();
   return $output;

}
add_shortcode("loop", "custom_query_shortcode");

/* components */
define(COMPONENTS_ROOT, 'templates/partials');

/**
 * News component
 *
 * This function outputs a News section or a combined
 * News/Events/Highlights section as used on Slider frontpages and
 * Research project pages.
 *
 * If only one or more news categories are provided, the template
 * used will be News only (three news items with title and blurb, up to
 * ten further news items with title only). If news/highlights are
 * passed in, the layout used will be combined News/Highlights.
 *
 * @param array $news_categories_slugs The list of categories slugs
 * @param string $news_prefix Any text to be displayed in the News heading
 * @param array $linked_events An array of Events pods
 * @return string The generated HTML code
 */
function component_news($news_categories_slugs, $news_prefix = '', $linked_events = '') {
  $output = '';
  var_trace(var_export($news_categories_slugs, true), 'news_categories_slugs');
  if(!is_array($news_categories_slugs)) return $output;

  if(is_array($news_categories_slugs) and !empty($news_categories_slugs)) {
    $news_categories = news_categories($news_categories_slugs);
  }

  var_trace(var_export($news_categories, true), 'news_categories');
  var_trace(count($news_categories_slug), 'count($news_categories_slugs)');
  var_trace($linked_events, 'linked_events');

  if(count($news_categories_slugs) > 0 and is_array($linked_events) and count($linked_events) >0) {
    $template = COMPONENTS_ROOT . '/news+highlights.inc.php';
  } elseif(count($news_categories_slugs) > 0) {
    $template = COMPONENTS_ROOT . '/news.inc.php';
  }
  if($template) {
    ob_start();
    include(abspath_to($template));
    $output = ob_end_flush();
  }
  return $output;
}

/**
 *
 */
/*
function lsecities_get_archives() {
  $current_year = date("Y");
  $archive_by_month = array();

  // look back until 2005
  for($year = $current_year; $year >= 2005; $year--) {
    $archive_by_month[$year] = wp_get_archives(array(
      'show_post_count' => TRUE,
      'echo' => FALSE
    ));

    // remove whole year if we have no news at all for the year
    if(empty($archive_by_month[$year])) {
      unset($archive_by_month[$year]);
    }
  }

  return $archive_by_month;
}
*/

function lsecities_get_archives_callback($item, $index, $currYear) {
    global $wp_locale;

    if ( $item['year'] == $currYear ) {
        $url = get_month_link( $item['year'], $item['month'] );
        // translators: 1: month name, 2: 4-digit year
        $text = sprintf(__('%1$s %2$d'), $wp_locale->get_month($item['month']), $item['year']);
        echo get_archives_link($url, $text);
    }
}

function lsecities_get_archives() {
    global $wpdb;

    $query = "SELECT YEAR(post_date) AS `year` FROM $wpdb->posts WHERE `post_type` = 'post' AND `post_status` = 'publish' GROUP BY `year` ORDER BY `year` DESC";
    $arcresults = $wpdb->get_results($query);
    $years = array();

    if ($arcresults) {
        foreach ( (array)$arcresults as $arcresult ) {
            array_push($years, $arcresult->year);
        }
    }

    $query = "SELECT YEAR(post_date) as `year`, MONTH(post_date) as `month` FROM $wpdb->posts WHERE `post_type` = 'post' AND `post_status` = 'publish' GROUP BY `year`, `month` ORDER BY `year` DESC, `month` ASC";
    $arcresults = $wpdb->get_results($query, ARRAY_A);
    $months = array();

    if ( $arcresults ) {
        foreach ($years as $year) {
            echo "\t<dt>$year</dt>\n\t<dd><ul>\n";
            array_walk($arcresults, "lsecities_get_archives_callback", $year);
            echo "\t</ul></dd>\n";
        }
    }
}

/**
 * replace post content with 'post-factum' content if a post-date is
 * defined and is in the past, and if 'post-factum' content is defined
 *
 * @param $post_object The WordPress post object
 */
function post_factum_text_for_posts($post_array) {
  var_trace(var_export($post_array, true), 'post_array');

  foreach($post_array as $post_object) {
    $pod = pods('post', $post_object->ID);

    $post_factum_content = $pod->display('post_factum_content');
    $show_post_factum_text_after = new DateTime($pod->field('show_post_factum_text_after'));
    $datetime_now = new DateTime('now');

    var_trace($show_post_factum_text_after);
    var_trace($post_factum_content);

    if(!empty($post_factum_content) and $show_post_factum_text_after < $datetime_now) {
      $post_object->post_content = $post_factum_content;
      var_trace(var_export($post_object, true), 'replaced post_content');
    }
  }
  
  return $post_array;
}

add_action('the_posts', 'post_factum_text_for_posts');

/**
 * keep hyperlinks in excerpts
 * from: http://lewayotte.com/2010/09/22/allowing-hyperlinks-in-your-wordpress-excerpts/
 */
function new_wp_trim_excerpt($text) {
    $raw_excerpt = $text;
    if ( '' == $text ) {
        $text = get_the_content('');

        $text = strip_shortcodes( $text );

        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
        $text = strip_tags($text, '<a>');
        $excerpt_length = apply_filters('excerpt_length', 55);

        $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
        $words = preg_split('/(<a.*?a>)|\n|\r|\t|\s/', $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE );
        if ( count($words) > $excerpt_length ) {
            array_pop($words);
            $text = implode(' ', $words);
            $text = $text . $excerpt_more;
        } else {
            $text = implode(' ', $words);
        }
    }
    return apply_filters('new_wp_trim_excerpt', $text, $raw_excerpt);

}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'new_wp_trim_excerpt');

/**
 * make 'read more' hellipsis in excerpts link to full post
 */
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">[&hellip;]</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
