<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

class Course extends PodsObject {
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
    $this->date_start = new \DateTime($this->date_start);
    $this->date_end = new \DateTime($this->date_end);
    $this->free_form_course_dates = $pod->field('free_form_dates');
    $this->heading_image = $pod->field('heading_image');
    $this->course_description = $pod->field('course_description');
    $this->external_uri = $pod->field('external_uri');
    $this->faculty = $pod->field('faculty');
  }
}

/**
 * Build data object to be used in templating
 * @param string $permalink The course's permalink
 * @return array Data structure with the course's full data
 */
function course_get_data($permalink) {
  $course = new Course($permalink);

  return $course;
}
