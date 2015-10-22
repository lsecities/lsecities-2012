<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package LSECities2012
 */
namespace LSECitiesWPTheme\page_header;

$obj = prepare_header($post);

?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?><?php if($appcache_manifest): ?> manifest="<?php echo $appcache_manifest; ?>"<?php endif; ?>> <!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=0.5" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	// if the page title is set from within a Pods template, use this -
	// otherwise use wp_title
	wp_title( '|', true, 'right' );

	// Add the blog name.
	// bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>

<meta name="description" content="<?php echo esc_html(lc_data('meta_description')); ?>">

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href='<?php echo get_stylesheet_directory_uri(); ?>/images/icons/favicon.png' rel='icon'>
<link href="https://cloud.webtype.com/css/9044dce3-7052-4e0e-9dbb-377978412ca7.css" rel="stylesheet" type="text/css" />
<?php
  // enqueue styles first
  wp_enqueue_style('font-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,800,300italic,400italic,800italic');
  wp_enqueue_style('jquery.flexslider', get_stylesheet_directory_uri() . '/stylesheets/flexslider/flexslider.css');
  wp_enqueue_style('jquery-mediaelement', get_stylesheet_directory_uri() .'/stylesheets/mediaelement/mediaelementplayer.css');
  wp_enqueue_style('font-theovandoegsburg', get_stylesheet_directory_uri() . '/stylesheets/fonts/theovand/stylesheet.css');
  wp_enqueue_style('font-fontello', get_stylesheet_directory_uri() . '/stylesheets/fonts/fontello/css/fontello.css');

  if(is_user_logged_in()) {
    wp_enqueue_style('font-neue-haas-unica', '//fast.fonts.net/cssapi/2798ec56-50e4-42fc-b9ca-7525414ae7ce.css');
  } 
?>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/stylesheets/cssgrid.net/1140.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/stylesheets/style.css" />

<?php
  // enqueue scripts after styles (with flag to have them put in footer, whenever possible)
  wp_enqueue_script('jquery', '', 'json2', '', true);
  wp_enqueue_script('jquery.flexslider', get_stylesheet_directory_uri() . '/javascripts/jquery.flexslider.min.js', 'jquery', false, true);
  wp_enqueue_script('jquery-ui-core', '', 'jquery', '', true);
  wp_enqueue_script('jquery-ui-accordion', '', 'jquery', '', true);
  wp_enqueue_script('jquery-ui-tabs', '', 'jquery', '', true);
  wp_enqueue_script('jquery-organictabs', get_stylesheet_directory_uri() . '/javascripts/jquery.organictabs.js', 'jquery', false, true);
  wp_enqueue_script('jquery-mediaelement', get_stylesheet_directory_uri() . '/javascripts/mediaelement-and-player.js', 'jquery', '2.9.2', true);
  wp_enqueue_script('cookie-control', get_stylesheet_directory_uri() . '/javascripts/civicuk.com/cookieControl-5.1.min.js', 'jquery', false, true);
 
  /**
   * Finally enqueue our own app.js
   */
  wp_enqueue_script('app-js', get_stylesheet_directory_uri() . '/assets/js/app.js', 'jquery', false, true); // TECHNICAL_DEBT: preprocess via gulp, put in /stylesheets, enqueue from there
  
  /**
   * if we have a subtheme-specific JS, enqueue it now
   */
  if(is_array($obj['theme_js'])) {
    wp_enqueue_script($obj['theme_js']['handle'], $obj['theme_js']['src'], $obj['theme_js']['deps'], $obj['theme_js']['ver'], $obj['theme_js']['in_footer']);
  }
 ?>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<script type='text/javascript'>
/* <![CDATA[ */
var usernoiseButton = {"text":"Feedback","style":"background-color: #ff0000; color: #FFFFFF; opacity: 0.7;","class":"un-left","windowUrl":"http:\/\/lsecities.net\/wp-admin\/admin-ajax.php?action=un_load_window","showButton":"1"};
/* ]]> */
</script>
</head>

<body <?php body_class($obj['body_class_extra']); ?>>

    <!--[if lt IE 9 ]>
      <p class='flash top chromeframe'>
        You are using an outdated browser.
        <a href="http://browsehappy.com/">Upgrade your browser today</a>
        to better experience this site.
      </p>
    <![endif]-->

<?php
  // for rio2013 microsite, we need a full-frame header: outside of #container
  if(lc_data('x-site-id') === 'rio2013') {
    locate_template('templates/partials/header/header-rio2013.php', true, true);
  } elseif(lc_data('x-site-id') === 'delhi2014') {
    locate_template('templates/partials/header/header-delhi2014.php', true, true);
  }
?>

	<div class='container' id='container'> <!-- ## grid -->
    <?php
      // include site-specific header fragment
      if(lc_data('x-site-id') === 'ec2012') {
        locate_template('templates/partials/header/header-ec2012.php', true, true);
      } elseif(lc_data('x-site-id') == NULL) {
        locate_template('templates/partials/header/header-default.php', true, true);
      }
    ?>

	<div id="main" class="row">
