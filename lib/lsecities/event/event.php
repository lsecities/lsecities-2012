<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

class Event extends PodsObject {
  use ObjectWithTimespan {
    ObjectWithTimespan::__construct as private __ObjectWithTimespanConstructor;
  }
  
  const PODS_NAME = 'event';

  public $datetime_start;
  public $datetime_end;
  public $free_form_event_dates;

  private $pod;

  function __construct($permalink) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);
    $this->datetime_start = $pod->field('date_start');
    $this->datetime_end = $pod->field('date_end');
    $this->free_form_event_dates = $pod->field('free_form_dates');

    $this->__ObjectWithTimespanConstructor($this->datetime_start, $this->datetime_end, $this->free_form_event_dates);
  }
}
