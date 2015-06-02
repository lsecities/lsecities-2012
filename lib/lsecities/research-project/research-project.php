<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

if(!defined('RESEARCH_PROJECTS_PODS_NAME')) {
  define('RESEARCH_PROJECTS_PODS_NAME', 'research_project');
}

class ResearchProject extends PodsObject {
  const PODS_NAME = RESEARCH_PROJECTS_PODS_NAME;
  const PODS_PAGES_BASE_PATH = '/objects/research-projects';
  
  public $permalink;
  public $title;
  public $tagline;
  public $status;
  public $timespan;
  public $web_uri;
  public $summary;
  public $blurb;
  public $keywords;
  public $heading_gallery;
  public $research_programmes;
  public $research_strand;
  public $free_form_project_teams;
  // these are either people (coordinators, researchers) or organizations (partners, funders), so let's call them actants
  public $actants;
  public $featured_posts;
  public $photo_galleries;
  public $events_blurb;
  public $event_series;
  public $news_categories;
  public $data_visualization_collections;
  public $research_output_publications;
  public $research_outputs;
  
  private $pod;
  
  function __construct($permalink) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);
    
    // return if a Pod cannot be found
    if(!$pod->exists()) {
      return;
    }
    
    $this->permalink = $pod->field('slug');
    $this->title = $pod->field('name');
    $this->tagline = $pod->field('tagline');
    
    $this->status = $pod->field('status.name');
    
    // for timespan, store both raw start and end years...
    $this->timespan = [
      'start_year' => $pod->field('date_start'),
      'end_year' => $pod->field('date_end')
    ];
    // as well as string representation of the timespan
    $this->timespan['timespan'] = get_project_timespan();
    
    $this->web_uri = $pod->field('web_uri');
    
    $this->summary = $pod->field('summary');
    $this->blurb = $pod->field('blurb');
    $this->keywords = $pod->field('keywords');
    
    // If a heading photo gallery is provided, use it instead of the single featured image
    $heading_gallery_permalink = $pod->field('heading_gallery.slug');
    
    if($heading_gallery_permalink) {
      $this->heading_gallery = photo_gallery_get_galleria_data($heading_gallery_permalink, 'fullbleed');
    }
    
    $this->research_programmes = $pod->field('research_programmes');
    $this->research_strand = [
      'name' => $pod->field('research_strand.name'),
      'summary' => $pod->display('research_strand.summary')
    ];
    
    $this->free_form_project_teams = $pod->display('free_form_project_teams');
    
    $this->actants = [
      'coordinators' => get_project_actants('people', 'coordinators'),
      'researchers' => get_project_actants('people', 'researchers'),
      'partners' => get_project_actants('organizations', 'partners'),
      'funders' => get_project_actants('organizations', 'funders')
    ];
  }
  
  
  function get_project_actants($type, $role) {
    // build a list of all current members of staff
    $staff = pods('people_group', 'lsecities-staff');
    $all_staff = $staff->field('members.slug');

    $actants = $this->pod->field($role);

    // TECHNICAL_DEBT: unify people and organizations iterator function
    if('people' === $type) {
      return usort(
        array_map(
          function($item) use ($all_staff) {
            return [
              'slug' => $item['slug'],
              'name' => $item['name'],
              'family_name' => $item['family_name'],
              // TECHNICAL_DEBT: link to person detail page, drop all this
              // hardcoded nonsense to link to item within staff page.
              'uri' => array_search($item['slug'], $all_staff) ? '/' . get_page_uri(2177) . '#p-' . $item['slug'] : ''
            ];
          },
          $actants
        ),
        function($a, $b) {
          return strcmp($a["family_name"], $b["family_name"]);
        }
      );
    } elseif('organizations' === $type) {
      return usort(
        array_map(
          function($item) {
            return [
              'slug' => $item['slug'],
              'name' => $item['name'],
              'uri' => $item['web_uri']
            ];
          },
          $actants
        ),
        function($a, $b) {
          return strcmp($a["name"], $b["name"]);
        }
      );
    }
  }

  /**
   * Format string with project timespan
   * @return String A string representation of the project timespan,
   *   e.g. 2012-2015; for ongoing projects (end date not set),
   *   the string would be e.g. 2014-ongoing.
   *   If a 'free form' project duration is defined, that will be
   *   returned insted.
   */
  function get_project_timespan() {
    // project duration
    $project_duration = '';

    // get years from start and date fields
    try {
      if($this->start_date) {
        $project_start = new \DateTime($this->start_date . '-01-01');
        $project_start = $project_start->format('Y');
      }
    } catch (\Exception $e) {
      error_log('Project start year must be a 4-digit number, "' . $this->start_date . '" was provided.');
    }
    
    try {
      if($this->end_date) {
        $project_end = new \DateTime($this->end_date . '-12-31');
        $project_end = $project_end->format('Y');
      } else {
        $project_end = 'ongoing';
      }
    } catch (\Exception $e) {
      error_log('Project end year must be a 4-digit number, "' . $this->end_date . '" was provided.');
    }

    // get freeform duration text, if available
    $project_duration_freeform = $this->pod->field('duration');

    // if freeform duration is available, use this
    if($project_duration_freeform) {
      $project_duration = $project_duration_freeform;
    } elseif($project_start and $project_end) { // otherwise use start and end year
      // if start and end year are the same, just display the year, otherwise display the range
      if($project_start === $project_end) {
    $project_duration = $project_start;
      } else {
        $project_duration = $project_start . ' - ' . $project_end;
      }
    }
    
    return $project_duration;
  }
}
