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
require_fragment('/includes/autoloader.php' );

// Foundation functions and classes
require_fragment('/includes/theme_configuration.php' );
require_fragment('/includes/hooks.php' );
require_fragment('/includes/theme_initialization.php');
require_fragment('/includes/functions.php' );
require_fragment('/includes/utility_functions.php' );
require_fragment('/includes/templating.php' );
require_fragment('/includes/cf7-mailchimp.php' );

// Function files for WP partials go here
require_fragment('/includes/partials/header.php' );

// Plugin files go here
require_fragment('/includes/plugins/galleria/galleria.php' );

// Pages templates - data init functions
require_fragment('/includes/pages/newsletter/pages-newsletter.php' );
require_fragment('/includes/pages/people-list/pages-people-list.php' );

// Pods function files go below

// Pods UI
require_fragment('/includes/pods/ui/lsecities-pods-ui.php' );

// Pods document types
require_fragment('/includes/pods/pods/article/pods-article.php' );
require_fragment('/includes/pods/pods/conference/pods-conference.php' );
require_fragment('/includes/pods/pods/conference/pods-conference-live.php' );
require_fragment('/includes/pods/pods/event/pods-event.php' );
require_fragment('/includes/pods/pods/event-programme/pods-event-programme.php' );
require_fragment('/includes/pods/pods/list/pods-list.php' );
require_fragment('/includes/pods/pods/media-item/pods-media-item.php' );
require_fragment('/includes/pods/pods/publication/pods-publication.php' );
require_fragment('/includes/pods/pods/slider/pods-slider.php' );
require_fragment('/includes/pods/pods/research-project/pods-research-project.php' );

// Includes for microsites

// (none yet)
