<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

class Person extends PodsObject {
  const PODS_NAME = 'authors';

  const LEGACY_PHOTO_URI_PREFIX = 'http://v0.urban-age.net';

  public $permalink;
  public $name;
  public $family_name;
  public $title;
  public $email_address;
  public $phone_number;
  public $photo;
  public $profile_text;
  public $staff_profile_text;
  public $extended_blurb;
  public $primary_organization;
  public $primary_role;
  public $primary_affiliation;
  public $additional_affiliations;
  public $all_roles;
  public $qualifications;
  public $bibliography_uri;
  public $office_location;
  public $groups;
  public $projects_coordinated;
  public $research_projects;
  public $all_research_projects;

  protected $display_after;
  protected $display_until;

  private $pod;

  function __construct($permalink) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);

    $this->name = $pod->field('name');
    $this->family_name = $pod->field('family_name');
    $this->full_name = trim($this->name . ' ' . $this->family_name);

    $this->title = $pod->field('title');

    /*
     * $fullname_for_heading = $fullname;
    if($title) {
      $fullname_for_heading .= " ($title)";
    }
    if($extra_title) {
      $fullname_for_heading .= ' ' . $extra_title;
    }
    */

    $qualifications = $pod->field('qualifications');
    $this->qualifications = $qualifications ? array_map(function($string) { return trim($string); }, explode("\n", $qualifications)) : NULL;

    $this->bibliography_uri = $pod->field('lse_research_online_uri');

    // get photo and related attribution, push attribution to attribution list
    if($photo_id = $pod->field('photo.ID', TRUE)) {
      $this->photo['uri'] = pods_image_url($photo_id);
      push_media_attribution($photo_id);
    }

    // if no media library photo is associated to this person,
    // and legacy photo URI is set, use this
    if(empty($this->photo['uri']) and $pod->field('photo_legacy')) {
      $this->photo['uri'] = self::LEGACY_PHOTO_URI_PREFIX . '/' . $pod->field('photo_legacy');
    }

    $this->email_address = $pod->field('email_address');
    $this->phone_number = $pod->field('phone_number');
    $this->staff_profile_text = $pod->display('staff_pages_blurb');
    $this->primary_organization = $pod->field('organization');
    $this->role = $pod->field('role');
    if(!empty($this->role) and !empty($this->organization)) {
      $this->primary_affiliation = $this->role . ', ' . $this->organization;
    } elseif(!empty($this->organization)) {
      $this->primary_affiliation = $this->organization;
    } elseif(!empty($this->role)) {
      $this->primary_affiliation = $this->role;
    }

    // Add the primary affiliation to the all_roles member
    $this->all_roles = [ $this->primary_affiliation ];

    // If additional affiliations are defined, add these to the all_roles member
    $additional_affiliations_string = $pod->field('additional_affiliations');
    if(!empty($additional_affiliations_string)) {
      $additional_affiliations = explode('\n', $additional_affiliations_string);
      foreach($additional_affiliations as $additional_affiliation) {
        $this->all_roles[] = $additional_affiliation;
      }
    }

    $this->research_projects = self::research_project_involvement($pod, [ 'research_projects' ]);
    $this->projects_coordinated = self::research_project_involvement($pod, [ 'projects_coordinated' ]);
    $this->all_research_projects = self::research_project_involvement($pod, [ 'research_projects', 'projects_coordinated' ]);
  }


  /**
   * Compile list of projects a person is involved in
   *
   * @param Object $pod The Pod object
   * @param array $fields The name of fields in which to look up project involvement
   * @return array The list of projects in which the person is involved
   */
  function research_project_involvement($pod, $fields = []) {
    // fetch list of projects on which this person is a researcher
    foreach($fields as $field) {
      $pod_project_list[] = $pod->field($field) ? $pod->field($field) : NULL;
    }
    // initialize full project list
    $all_projects = [];

    // merge the project lists
    foreach($pod_project_list as $project_list) {
      foreach($project_list as $project) {
        $all_projects[$project['slug']] = array (
          'slug' => $project['slug'],
          'name' => $project['name']
        );
      }
    }
    // sort merged list by project name
    uasort($projects_list, function($a, $b) { return ($a['name'] < $b['name']) ? -1 : 1; });

    return array_map(function($project) { return [ $project['slug'], $project['name'] ]; }, $projects_list);
  }
  
  /**
   * Given a timestamp (or the current time if none is provided),
   * check if the person is currently active.
   * This is mainly useful for staff members, as we use start/end dates
   * to automatically display/hide staff according to start/end dates.
   *
   * @param string $timestamp The timestamp against which to check
   *   if the person is active
   * @return bool Whether the person is active at the given time
   */
  function is_active($timestamp = 'now') {
    // Initialize start/end timestamps
    $display_after = new \DateTime($this->display_after . 'T00:00:00.0');
    $display_until = new \DateTime($this->display_until . 'T23:59:59.0');

    // Initialize timestamp against which to test
    $datetime_requested = new \DateTime($timestamp);

    // Test if member is active at given timestamp
    return $display_after <= $datetime_now and $datetime_now <= $display_until;
  }
}
