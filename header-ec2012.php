<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package LSECities2012
 */
?><?php
$TRACE_ENABLED = is_user_logged_in();
var_trace('header.php starting for post with ID' . $post->ID);
$ancestors = get_ancestors($post->ID, 'page');
array_unshift($ancestors, $post->ID);
global $pods_toplevel_ancestor;
$toplevel_ancestor = array_pop($ancestors);

$http_req_headers = getallheaders();
var_trace($http_req_headers["X-Site-Id"], 'X-Site-Id');

if($_GET["siteid"] == 'ec2012') { // we are being called via the ec2012 microsite
  $body_class_extra = 'ec2012';
  $_GLOBALS['lsecities']['microsite_id'] = 'ec2012';
} elseif($_GET["siteid"] == 'cc') { // we are being called via the Cities and the crisis microsite
  $body_class_extra = 'site-cc';
  $_GLOBALS['lsecities']['microsite_id'] = 'cc';
}

// If we are on the root frontpage ('/', page ID 393), set ancestor to nil
if($toplevel_ancestor == 393) { $toplevel_ancestor = ''; }

// If we are processing a Pods page for the Article pod, manually set our current position
if($pods_toplevel_ancestor) { $toplevel_ancestor = $pods_toplevel_ancestor; }

var_trace(var_export($ancestors, true), 'ancestors (array)');
var_trace($ancestors[0], 'ancestor[0]');
var_trace($toplevel_ancestor, 'toplevel_ancestor');

$level2nav = wp_list_pages('child_of=' . $toplevel_ancestor . '&depth=1&sort_column=menu_order&title_li=&echo=0');

// check if we are in the Urban Age section
$GLOBALS['urban_age_section'] = ($toplevel_ancestor == 94) ? true : false;
$logo_element_id = $GLOBALS['urban_age_section'] ? 'ualogo' : 'logo';

if($_GLOBALS['lsecities']['microsite_id'] == 'cc') { // Labs -> Cities and the crisis
  // If we are navigating the Cities and the crisis minisite via reverse proxy, display appropriate menu
  $level1nav = '<li><a href="/" title="Home">Cities and the Crisis</a></li>';
  $level2nav = wp_list_pages('echo=0&depth=1&sort_column=menu_order&title_li=&child_of=' . 2481);
  // And strip prefix
  $level2nav = preg_replace('/https?:\/\/lsecities\.net\/labs\/cities-and-the-crisis/', '', $level2nav);
  $GLOBALS['site-cc'] = true;
} elseif($_GLOBALS['lsecities']['microsite_id'] == 'ec2012') { // Electric City conference minisite
  // If we are navigating the EC2012 minisite via reverse proxy, display appropriate menu
  $level1nav = '';
  $class_for_current_page = $post->ID == 2701 ? ' current_page_item' : '';
  if(!is_user_logged_in()) {
    $only_include_top_pages_ids = '&include=2714,2716,3098';
  } else {
    $only_include_top_pages_ids = '&child_of=2701';
  }
  $level2nav = '<li class="page-item page-item-2701' . $class_for_current_page . '"><a href="/">Home</a></li>' . wp_list_pages('echo=0&depth=1&sort_column=menu_order&title_li=' . $only_include_top_pages_ids);
  // And strip prefix
  $level2nav = preg_replace('/https?:\/\/lsecities\.net\/ua\/conferences\/2012-london\/site/', '', $level2nav);
  var_trace($level2nav, 'header_level2nav', true);
  /*
  $level2nav = '<li class="page-item page-item-2701 current_page_item"><a href="/">Home</a></li><li class="page_item page-item-2714"><a href="/programme/">Programme</a></li>
<li class="page_item page-item-2716"><a href="/speakers/">Speakers</a></li>'; */
  // $appcache_manifest = '/appcache-manifests/ec2012.appcache';
  $GLOBALS['site-ec2012'] = true;
} else {
  $level1nav = '<li><a href="/" title="Home">Home</a></li>' . wp_list_pages('echo=0&depth=1&sort_column=menu_order&title_li=&exclude=393,395,562,1074,2032,2476');
}
?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?><?php if($appcache_manifest): ?> manifest="<?php echo $appcache_manifest; ?>"<?php endif; ?>> <!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	// if the page title is set from within a Pods template, use this -
	// otherwise use wp_title
	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<script type="text/javascript" src="https://use.typekit.com/ftd3lpp.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<link href="https://cloud.webtype.com/css/9044dce3-7052-4e0e-9dbb-377978412ca7.css" rel="stylesheet" type="text/css" />
<?php if(false): // redundant until we switch to PT Sans ?><link href="//fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic|PT+Serif:400,700,700italic,400italic|Sorts+Mill+Goudy:400,400italic&amp;subset=latin,latin-ext" media="screen" rel="stylesheet" type="text/css" /><?php endif; ?>
<?php
  wp_enqueue_style('font-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,800,300italic,400italic,800italic');

  wp_enqueue_style('jquery.flexslider', get_stylesheet_directory_uri() . '/stylesheets/flexslider/flexslider.css');
  wp_enqueue_script('jquery.flexslider', get_stylesheet_directory_uri() . '/javascripts/jquery.flexslider.min.js', 'jquery', false, true);
?>

<?php wp_enqueue_script('jquery-ui-core', '', '', '', true); ?>
<?php wp_enqueue_script('jquery-ui-accordion', '', '', '', true); ?>
<?php wp_enqueue_script('jquery-ui-tabs', '', '', '', true); ?>
<?php wp_enqueue_script('jquery-sticky', get_stylesheet_directory_uri() . '/javascripts/jquery.sticky.min.js', 'jquery', false, true); ?>
<?php wp_enqueue_script('jquery-organictabs', get_stylesheet_directory_uri() . '/javascripts/jquery.organictabs.js', 'jquery', false, true); ?>
<?php wp_enqueue_script('jquery-mediaelement', get_stylesheet_directory_uri() . '/javascripts/mediaelement-and-player.js', 'jquery', '2.9.2', false); ?>
<?php // wp_enqueue_script('jquery-hovercard', get_stylesheet_directory_uri() . '/javascripts/jquery.hovercard.min.js', 'jquery', false, true); ?>
<!-- <script async="async" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script> -->
<?php wp_enqueue_script('cookie-control', plugins_url() . '/cookie-control/js/cookieControl-5.1.min.js', 'jquery', false, true); ?>
<?php wp_enqueue_style('jquery-mediaelement', get_stylesheet_directory_uri() .'/stylesheets/mediaelement/mediaelementplayer.css'); ?>
<?php wp_enqueue_style('font-theovandoegsburg', get_stylesheet_directory_uri() . '/stylesheets/fonts/theovand/stylesheet.css'); ?>
<?php wp_enqueue_style('font-fontello', get_stylesheet_directory_uri() . '/stylesheets/fonts/fontello/stylesheet.css'); ?>
<?php
/* tabzilla */
wp_enqueue_style('module-tabzilla', get_stylesheet_directory_uri() . '/stylesheets/modules/tabzilla/tabzilla.css');
wp_enqueue_script('module-tabzilla', get_stylesheet_directory_uri() . '/javascripts/modules/tabzilla/tabzilla.js', 'jquery', false, true);
?>

<!--[if IE 7]>
<?php wp_enqueue_style('font-fontello', get_stylesheet_directory_uri() . '/stylesheets/fonts/fontello/css/fontello-ie7.css'); ?>
<!--[endif]-->
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

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory') ?>/stylesheets/cssgrid.net/1140.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />

<script type='text/javascript'>
/* <![CDATA[ */
var usernoiseButton = {"text":"Feedback","style":"background-color: #ff0000; color: #FFFFFF; opacity: 0.7;","class":"un-left","windowUrl":"http:\/\/lsecities.net\/wp-admin\/admin-ajax.php?action=un_load_window","showButton":"1"};
/* ]]> */
</script>
</head>

<body <?php body_class($body_class_extra); ?>>

    <!--[if lt IE 9 ]>
      <p class='flash top chromeframe'>
        You are using an outdated browser.
        <a href="http://browsehappy.com/">Upgrade your browser today</a> or
        <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a>
        to better experience this site.
      </p>
    <![endif]-->

	<div class='container' id='container'> <!-- ## grid -->
		<header id='header'>
      <h1 id="ec2012title" class='row'><a href="/">The Electric City</a></h1>
      <span class="twitter-hashtag"><a href="https://twitter.com/search/realtime?q=%23UAelectric">#UAelectric</a></span>
			<div class='row' id='mainmenus'>
				<nav class='twelvecol section-ancestor-<?php echo $toplevel_ancestor ; ?>' id='level2nav'>
					<ul>
					<?php if($toplevel_ancestor and $level2nav): ?>
						<?php echo $level2nav ; ?>
					<?php else: ?>
						<li>&nbsp;</li>
					<?php endif; ?>
					</ul>
				</nav>
			</div><!-- #mainmenus -->
	</header><!-- #branding -->

	<div id="main" class="row">
