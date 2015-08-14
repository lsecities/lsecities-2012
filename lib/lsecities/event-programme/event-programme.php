<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * This class is currently a stub, until the code now in
 * includes/pods/pods/event-programme/pods-event-programme.php is properly
 * cleaned up and moved over to the EventProgramme class.
 * 
 * At the moment, the class is only used to manage translation strings
 * for the class, as currently used in the non-OO code.
 */
class EventProgramme extends PodsObject {
  const PODS_NAME = 'event_programme';

  const TRANSLATION_STRINGS = [
    'en-gb' => [
      'chair' => [
        'singular' => 'chair',
        'plural' => 'chairs'
       ],
       'respondent' => [
         'singular' => 'respondent',
         'plural' => 'respondents'
       ]
    ],
    'cmn-cn' => [
      'chair' => [
        'singular' => '主持',
        'plural' => '主持'
       ],
       'respondent' => [
         'singular' => '回应',
         'plural' => '回应'
       ]
    ],
    'pt-br' => [
      'chair' => [
        'singular' => 'coordenador de mesa',
        'plural' => 'coordenadores de mesa'
       ],
       'respondent' => [
         'singular' => 'respondent', // needs translation
         'plural' => 'respondents' //needs translation
       ]
    ],
    'es-mx' => [
      'chair' => [
        'singular' => 'presidente',
        'plural' => 'presidentes'
       ],
       'respondent' => [
         'singular' => 'respondent', // needs translation
         'plural' => 'respondents' // needs translation
       ]
    ],
    'de-de' => [
      'chair' => [
        'singular' => 'moderation', // this is what we used in Berlin, but doesn't map to the pattern of other languages
        'plural' => 'moderation'
       ],
       'respondent' => [
         'singular' => 'respondent', // needs translation
         'plural' => 'respondents' // needs translation
       ]
    ],
    'tr-tr' => [
      'chair' => [
        'singular' => 'oturum başkanı',
        'plural' => 'eş başkanlar'
       ],
       'respondent' => [
         'singular' => 'respondent', // needs translation
         'plural' => 'respondents' // needs translation
       ]
    ]
  ];

  private $pod;

  function __construct($permalink, $random_slide_order = FALSE) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);

    // If no such Pod is found, return false
    if(!$pod->exists()) {
      return FALSE;
    }
  }
}

