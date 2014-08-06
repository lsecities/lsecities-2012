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
  public $photo_uri;
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
      $this->photo_uri = pods_image_url($photo_id);
      push_media_attribution($photo_id);
    }

    // if no media library photo is associated to this person,
    // and legacy photo URI is set, use this
    if(empty($this->photo_uri) and $pod->field('photo_legacy')) {
      $this->photo_uri = self::LEGACY_PHOTO_URI_PREFIX . '/' . $pod->field('photo_legacy');
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

    $this->research_projects = research_project_involvement($pod, [ 'research_projects' ]);
    $this->projects_coordinated = research_project_involvement($pod, [ 'projects_coordinated' ]);
    $this->all_research_projects = research_project_involvement($pod, [ 'research_projects', 'projects_coordinated' ]);
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
      $pod_project_list[] = $pod->field($field) ? $pod->field($field) : [];
    }
    // initialize full project list
    $projects_list = [];

    // merge the project lists
    foreach(array_merge($pod_project_list) as $project) {
      $projects_list[$project['slug']] = array (
        'slug' => $project['slug'],
        'name' => $project['name']
      );
    }
    // sort merged list by project name
    uasort($projects_list, function($a, $b) { return ($a['name'] < $b['name']) ? -1 : 1; });

    return array_map($projects_list, function($project) { return [ $project['slug'], $project['name'] ]; });
  }
}
