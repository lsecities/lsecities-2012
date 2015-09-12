<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme configuration variables
 * 
 * Please avoid scattering configuration data across local or global
 * variables in PHP files - use the One True Global Variable below
 * through the getter/setter function lc_data.
 * Please avoid global variables altogether when possible, and surely
 * avoid more than one global variable (use the One True Global Variable
 * for any globals needed).
 * 
 * This setup is an improved version of the 'Working with the variable'
 * example here: http://betterwp.net/8-using-global-variables-in-wordpress/
 */

/**
 * The One True Global Variable
 * 
 * Please don't access this directly - use the getter/setter function
 * lc_data() instead.
 */
$LSECITIES_CONFIGURATION_DATA = array();

/**
 * get or set items from global configuration variable
 * 
 * 
 * If called with the $key parameter only works as getter,
 * if called with both $key and $value parameters works as setter
 * 
 * @param string $key The item's key
 * @param mixed $value The item's new value
 * @return mixed The value of the item requested (getter) or updated/set
 *         (setter)
 */
function lc_data($key, $value = false) {
  global $LSECITIES_CONFIGURATION_DATA;
  if($value !== false) {
    $LSECITIES_CONFIGURATION_DATA[$key] = $value;
  }
  return $LSECITIES_CONFIGURATION_DATA[$key];
}

/**
 * add configuration constants here
 */
 
/**
 * MtHAML templating
 */
lc_data('template_root', get_stylesheet_directory() . '/templates');

/**
 * Maximum number of custom fields names displayed in field name
 * dropdown lists; increasing this number beyond the default 30
 * is useful when using Pods, which adds a number of field names.
 */
lc_data('ui_custom_fields_limit', 180);

/**
 * Filename for the template used for conference frontpage WP Pages.
 * This is used in id_of_parent_conference(). If the name of the
 * template file is changed, update the following constant.
 * We throw a warning in any case if a file with this name is not found
 * at this stage, but someone will have to notice that warning :)
 */
lc_data('pods_conference__wp_page_template', 'pods-conference-frontpage.php');
if('' === locate_template(array(lc_data('pods_conference__wp_page_template')))) {
  trigger_error('pods_conference__wp_page_template set to ' . lc_data('pods_conference__wp_page_template') . ' but no such template file exists in theme. Please set pods_conference__wp_page_template to new name of Conference page template', E_USER_WARNING);
}

/**
 * meta description
 */
lc_data('meta_description', 'LSE Cities is an international centre at the London School of Economics and Political Science that studies how people and cities interact in a rapidly urbanising world, focussing on how the design of cities impacts on society, culture and the environment. Through research, conferences, teaching and projects, the centre aims to shape new thinking and practice on how to make cities fairer and more sustainable for the next generation of urban dwellers, who will make up some 70 per cent of the global population by 2050.');
/**
 * (protocol-relative) base URI of theme and absolute filesystem path
 */
lc_data('theme_base_path', '//' . $_SERVER['SERVER_NAME'] . '/app/themes/lsecities-alexandria/');
lc_data('theme_filesystem_abspath', dirname(__DIR__));

/**
 * Mapping from URIs (later: Pods types) to data to be used
 * in Pods index template
 */
lc_data('pods_routes', [
  '/research/' => [
    'title' => 'Research',
    'pod' => 'research_project',
    'factory_function' => '\LSECitiesWPTheme\research_project_pods',
    'template' => 'lsecities/research_projects/_index',
    'sections' => [
      [
        'title' => 'Cities, space and society',
        'labels' => [
          'show-status--completed-only'
        ],
        'pods_params' => [
          'limit' => -1,
          'where' => 'research_strand.slug="010-cities-space-and-society"',
          'orderby' => 'status.name ASC, name ASC'
        ],
        'params' => [
          'orderby' => 'project_activity_score'
        ]
      ],
      [
        'title' => 'Cities, environment and climate change',
        'labels' => [
          'show-status--completed-only'
        ],
        'pods_params' => [
          'limit' => -1,
          'where' => 'research_strand.slug="020-cities-environment-and-climate-change"',
          'orderby' => 'status.name ASC, name ASC'
        ],
        'params' => [
          'orderby' => 'project_activity_score'
        ]
      ],
      [
        'title' => 'Urban governance',
        'labels' => [
          'show-status--completed-only'
        ],
        'pods_params' => [
          'limit' => -1,
          'where' => 'research_strand.slug="030-urban-governance"',
          'orderby' => 'status.name ASC, name ASC'
        ],
        'params' => [
          'orderby' => 'project_activity_score'
        ]
      ],
    ]
  ],
  '/research/strands/' => [
    'title' => 'Research',
    'pod' => 'research_project',
    'factory_function' => '\LSECitiesWPTheme\research_project_pods',
    'template' => 'lsecities/research_projects/_index',
    'sections' => [
      [
        'title' => 'Cities, space and society',
        'labels' => [
          'show-status'
        ],
        'pods_params' => [
          'limit' => -1,
          'where' => 'research_strand.slug="010-cities-space-and-society"',
          'orderby' => 'status.name ASC, name ASC'
        ],
        'params' => [
          'orderby' => 'project_activity_score'
        ]
      ],
      [
        'title' => 'Cities, environment and climate change',
        'labels' => [
          'show-status'
        ],
        'pods_params' => [
          'limit' => -1,
          'where' => 'research_strand.slug="020-cities-environment-and-climate-change"',
          'orderby' => 'status.name ASC, name ASC'
        ],
        'params' => [
          'orderby' => 'project_activity_score'
        ]
      ],
      [
        'title' => 'Urban governance',
        'labels' => [
          'show-status'
        ],
        'pods_params' => [
          'limit' => -1,
          'where' => 'research_strand.slug="030-urban-governance"',
          'orderby' => 'status.name ASC, name ASC'
        ],
        'params' => [
          'orderby' => 'project_activity_score'
        ]
      ]
    ]
  ]
]);

/**
 * Template configuration
 */
lc_data('template_filename_page_tab', 'pages-section.php');

/**
 * Conference microsites configuration map
 */
 
lc_data('conference_microsites', [
  [
    'x-site-id' => 'ec2012',
    'body_class_extra' => 'ec2012',
    'conference_pod_slug' => '2012-london',
    'appcache_manifest' => NULL // no appcache manifest for this microsite
  ],
  [
    'x-site-id' => 'rio2013',
    'body_class_extra' => 'urban-age-twentyfifteen',
    'conference_pod_slug' => '2013-rio',
    'theme_js' => [
      'handle' => 'urban-age-twentyfifteen',
      'src' => get_stylesheet_directory_uri() . '/javascripts/themes/urban-age-twentyfifteen/urban-age-twentyfifteen.js',
      'deps' => [ 'jquery' ],
      'in_footer' => TRUE
    ],
    'appcache_manifest' => NULL // no appcache manifest for this microsite
  ],
  [
    'x-site-id' => 'delhi2014',
    'body_class_extra' => 'urban-age-twentyfifteen',
    'conference_pod_slug' => '2014-delhi',
    'theme_js' => [
      'handle' => 'urban-age-twentyfifteen',
      'src' => get_stylesheet_directory_uri() . '/javascripts/themes/urban-age-twentyfifteen/urban-age-twentyfifteen.js',
      'deps' => [ 'jquery' ],
      'in_footer' => TRUE
    ],
    'appcache_manifest' => NULL // no appcache manifest for this microsite
  ]
]);

/**
 * rio2013 microsite configuration
 */

lc_data('rio2013_background_image_prefix', 'http://files.lsecities.net/files/2013/10/rio2013_');
