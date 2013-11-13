<?php
/**
 * Template Name: Newsletter - Theatrum Mundi
 * Description: Template used for Theatrum Mundi Newsletters
 * 
 * @package LSECities2012
 */
define('WP_USE_THEMES', false);

/**
 * As this is a Theatrum Mundi-branded newsletter, set the branding
 * query var.
 */
set_query_var('newsletter_branding', 'theatrum-mundi');

require(get_stylesheet_directory() . '/includes/pages/newsletter/pages-newsletter-common.php');
