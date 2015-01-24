<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

class Course extends PodsObject {
  use ObjectWithTimespan {
    ObjectWithTimespan::__construct as private __ObjectWithTimespanConstructor;
  }
  
  const PODS_NAME = 'course';

  public $permalink;
  public $title;
  public $tagline;
  public $partner_organizations;
  public $date_start;
  public $date_end;
  public $free_form_course_dates;
  public $heading_image;
  public $course_description;
  public $external_uri;
  public $faculty;

  private $pod;

  function __construct($permalink) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);

    $this->permalink = $pod->field('permalink');
    $this->title = $pod->field('name');
    $this->tagline = $pod->field('tagline');
    $this->date_start = $pod->field('date_start');
    $this->date_end = $pod->field('date_end');
    $this->free_form_course_dates = $pod->field('free_form_dates');
    
    $this->__ObjectWithTimespanConstructor($this->date_start, $this->date_end, $this->free_form_course_dates);
    
    $this->heading_image = $pod->field('heading_image');
    $this->course_description = wpautop($pod->field('course_description'));
    $this->external_uri = $pod->field('external_uri');
    $this->faculty = $pod->field('faculty');
  }
}
