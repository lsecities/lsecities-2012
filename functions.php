<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 *
 * WARNING: Please do not add functions, classes and any PHP code
 * other than requires to this file.
 */

/**
 * Wrapper to require
 * Just require theme function files
 *
 * @param string $file The function file to be required
 */
function require_fragment($file) {
  require_once(get_stylesheet_directory() . $file);
}

// Autoloader
require_fragment('/lib/autoloader.php' );

// Foundation functions and classes
require_fragment('/includes/theme_configuration.php' );
require_fragment('/includes/hooks.php' );
require_fragment('/includes/theme_initialization.php');
require_fragment('/includes/functions.php' );
require_fragment('/includes/utility_functions.php' );
require_fragment('/includes/cf7-mailchimp.php' );

// Function files for WP partials go here
require_fragment('/includes/partials/header.php' );

// Plugin files go here
require_fragment('/includes/plugins/galleria/galleria.php' );

// Pages templates - data init functions
require_fragment('/includes/pages/newsletter/pages-newsletter.php' );

// Pods function files go below

// Pods UI
require_fragment('/includes/pods/ui/lsecities-pods-ui.php' );

// Pods document types and classes
require_fragment('/lib/theme-functions.php');
require_fragment('/lib/pods-object.php');
require_fragment('/lib/lsecities/article/article.php');
require_fragment('/lib/lsecities/city/city.php');
require_fragment('/lib/lsecities/country/country.php');
require_fragment('/lib/lsecities/course/course.php');
require_fragment('/lib/lsecities/event/event.php');
require_fragment('/lib/lsecities/event-programme/event-programme.php');
require_fragment('/lib/lsecities/person/person.php');
require_fragment('/lib/lsecities/group/group.php');
require_fragment('/lib/lsecities/photo-gallery/photo-gallery.php');
require_fragment('/lib/lsecities/research-project/research-project.php');
require_fragment('/lib/lsecities/section-front/section-front.php');
require_fragment('/lib/lsecities/slideshow/slideshow.php');
require_fragment('/lib/lsecities/wp_page/wp_page.php');
require_fragment('/includes/pods/pods/article/pods-article.php' );
require_fragment('/includes/pods/pods/conference/pods-conference.php' );
require_fragment('/includes/pods/pods/event-programme/pods-event-programme.php' );
require_fragment('/includes/pods/pods/list/pods-list.php' );
require_fragment('/includes/pods/pods/media-item/pods-media-item.php' );
require_fragment('/includes/pods/pods/publication/pods-publication.php' );
require_fragment('/includes/pods/pods/research-project/pods-research-project.php' );

// Includes for microsites

// (none yet)
