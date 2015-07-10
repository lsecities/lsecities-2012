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
  
  /**
   * Content associated to research project (events, publications,
   * posts, data visualizations, other outputs...)
   */
  /**
   * @var Array Events associated to a research project
   */
  public $linked_events;
  
  public $linked_posts;
  public $featured_posts;
  public $photo_galleries;
  public $events_blurb;
  public $event_series;
  public $news_categories;
  public $project_news;
  public $data_visualization_collections;
  public $research_output_publications;
  public $research_output_categories;
  public $research_outputs;
  
  /**
   * @var int This is a number meant to represent how 'active' a
   * research project is; the way this is calculated is deterministic
   * but somewhat arbitrary as different people may have different
   * opinions on what counts as a sign of activity and what the weight
   * of each sign may be. The gist is that each research output,
   * event and so on adds something to the score: number of items
   * associated with a research project as well as their 'freshness'
   * contribute to the score.
   */
  public $project_activity_score;
  public $latest_update;
    
  /**
   * @var Object The Pod object for this ResearchProject
   */
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
        
    $timespan = $this->get_project_timespan();
    
    // for timespan, store both raw start and end years,
    // as well as a string representation of the timespan
    $this->timespan = [
      'start' => $timespan['start'],
      'end' => $timespan['end'],
      'text' => $timespan['text']
    ];

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
    
    /*
    $this->actants = [
      'coordinators' => $this->get_project_actants('people', 'coordinators'),
      'researchers' => $this->get_project_actants('people', 'researchers'),
      'partners' => $this->get_project_actants('organizations', 'partners'),
      'funders' => $this->get_project_actants('organizations', 'funders')
    ];
    */
    
    // Populate lists of linked content
    $this->linked_events = $this->get_project_events(TRUE, ['conference', 'presentation', 'public-lecture', 'workshop']);
    
    // Populate lists of research outputs (publications, visualizations, etc.)
    // hardcoded list of WP categories used to group research outputs linked to a research project
    // TECHNICAL_DEBT: get this list via get_categories(); and of course this doesn't belong in the ResearchProject class to start with
    $this->research_output_categories = ['book', 'journal-article', 'book-chapter', 'research-data', 'research-report', 'conference-newspaper', 'conference-proceedings', 'conference-report', 'report', 'blog-post', 'interview', 'magazine-article', 'essay', 'book-review'];
    $this->research_outputs = $this->get_project_research_outputs();
    
    // Populate lists of linked news/posts
    $this->project_news = $this->get_project_news();
    $this->news_categories = \news_categories($pod->field('news_categories'));
    
    // Once all linked content has been populated, calculate project activity score
    $this->project_activity_score = $this->get_project_activity_score();
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
    $project_start_year = NULL;
    $project_end_year = NULL;
    
    // get years from start and date fields
    try {
      if($this->start_date) {
        $project_start = new \DateTime($this->start_date . '-01-01');
        $project_start = $project_start_year = $project_start->format('Y');
      }
    } catch (\Exception $e) {
      error_log('Project start year must be a 4-digit number, but "' . $this->start_date . '" was provided.');
    }
    
    try {
      if($this->end_date) {
        $project_end = new \DateTime($this->end_date . '-12-31');
        $project_end = $project_end_year = $project_end->format('Y');
      } else {
        $project_end = 'ongoing';
      }
    } catch (\Exception $e) {
      error_log('Project end year must be a 4-digit number, but "' . $this->end_date . '" was provided.');
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
    
    return [ 'start' => $project_start_year , 'end' => $project_end_year, 'text' => $project_duration ];
  }
  
  /**
   * Fetch lists of events associated to the project, grouped by category
   * Events from the main LSE Events calendar and events defined as
   * Research outputs can be fetched here.
   * 
   * @param bool $include_events_from_main_calendar Whether to fetch any
   *    associated events from the main events calendar (Events pod)
   * @param array $research_event_categories An array of slugs of
   *    WP categories under which additional events are grouped
   * @param array $research_outputs A list of research outputs associated
   *    to the project, from which events are selected
   * @return array The list of events associated to the project, grouped
   *    by category
   */
  function get_project_events(
    $include_events_from_main_calendar = FALSE,
    $research_event_categories = [],
    $research_outputs = []
  ) {
    $research_events = [];

    // Only include events from the main calendar if asked to do so
    if($include_events_from_main_calendar and $this->pod->field('events')) {
      foreach($this->pod->field('events', array('orderby' => 'date_start DESC')) as $event) {
        $research_events[0][] = array(
          'title' => $event['name'],
          'citation' => $event['name'],
          'date' => $event['date_start'],
          'uri' => PODS_BASEURI_EVENTS . '/' . $event['slug']
        );
      }
    }

    foreach($research_event_categories as $category_slug) {
      if(is_array($research_outputs[$category_slug])) {
        foreach($research_outputs[$category_slug] as $event) {
          $research_events[$category_slug][] = $event;
        }
      }
    }

    // Now sort events within each category, by date
    foreach($research_events as $category => $evs) {
      foreach($evs as $key => $value) {
        $ev_date[$key] = $value['date'];
      }
      
      array_multisort($ev_date, SORT_DESC, $evs);
      
      $sorted_research_events[$category] = $evs;
    }
      
    return $sorted_research_events;
  }
  
  /**
   * Calculate a project activity score based on number, type and
   * 'freshness' of linked content.
   * 
   * This calculation is somewhat arbitrary, but it's a way for us to
   * have a feel of active/recently updated projects if we want to sort
   * projects by some measure of their activity levels.
   * 
   * @return int The project's activity score
   */
  function get_project_activity_score() {
    $activity_score = [];
    
    // Activity score for events
    $activity_score['events'] = array_map(
      function($event_category) {
        return array_map(function($item) {
          $event_date = new \DateTime($item['date']);
          $current_date = new \DateTime('now');
          $date_diff = $current_date->diff($event_date);
          $days_to_event = $date_diff->days * ($date_diff->invert ? -1 : 1);
          if($days_to_event > -7) {
            return 1;
          } elseif($days_to_event > -30 and -7 >= $days_to_event) {
            return 0.75;
          } elseif($days_to_event > -365 and -30 >= $days_to_event) {
            return 0.25;
          } else {
            return 0.11;
          }
        },
        $event_category
        );
      },
      $this->linked_events
    );
    
    $activity_score['research_outputs'] = array_map(
      function($output_category) {
        /**
         * Each category has a corresponding weight, expressed as
         * 1/(index of category in category list).
         * E.g. if the first item within category list is book, the
         * weight of book category is 1/1 = 1; if the 5th item of the
         * list is research_report, its weight is 1/5 = 0.2, etc.
         * Aka these weights are arbitrary but somewhat related to the
         * ordering of research output categories, which in the original
         * intention was compiled starting from the most important
         * output types.
         */
        $category_weight = 1 / (array_search($output_category, $this->research_output_categories) + 1);
        
        return array_map(function($item) use ($category_weight) {
          return $category_weight;
        },
        $this->research_outputs[$output_category]
        );
      },
      array_keys($this->research_outputs)
    );
    
    $activity_score['project_news'][0] = array_map(
      function($item) {
        $event_date = new \DateTime($item['date']);
        $current_date = new \DateTime('now');
        $date_diff = $current_date->diff($event_date);
        $days_to_event = $date_diff->days * ($date_diff->invert ? -1 : 1);
        if($days_to_event > -7) {
          return 1;
        } elseif($days_to_event > -30 and -7 >= $days_to_event) {
          return 0.75;
        } elseif($days_to_event > -365 and -30 >= $days_to_event) {
          return 0.25;
        } else {
          return 0.11;
        }
      },
      $this->project_news
    );
    
    $score = array_sum(
      array_map(
        function($category) use ($activity_score) {
          return array_reduce(
            array_merge(
              array_values($activity_score[$category]
            )
          )[0],
          function($carry, $item) {
            return $carry + $item;
          });
        },
        array_keys($activity_score)
      )
    );
    
    return $score;
  }
  
  /**
   * Compile list of research outputs
   * 
   * @return Array Data structure with research outputs split by
   *   category.
   */
  function get_project_research_outputs() {
    // initialize result array
    $research_outputs = [];
    
    /**
     * First add all the research outputs linked as 'research_outputs'
     * These are mostly publications for which a full 'publication' Pod
     * hasn't been created
     */
    $linked_publications = $this->pod->field('research_outputs');
    
    if(is_array($linked_publications)) {
      foreach($linked_publications as $publication) {
        $research_output = pods('research_output', $publication['slug']);

        if(!$research_output->exists()) {
          continue;
        }

        $research_outputs[$research_output->field('category.slug')][] = array(
          'slug' => 'research_outputs__' . $research_output->field('slug'),
          'title' => $research_output->field('name'),
          'citation' => $research_output->field('citation'),
          'date' => date_string($research_output->field('date')),
          'uri' => $research_output->field('uri')
        );
      }
    }

    /**
     * Now add to the research outputs found so far all the publications
     * from the publication_wrappers aka Publications pod
     */
    $linked_publications = $this->pod->field('research_output_publications');
    
    if(is_array($linked_publications)) {
      foreach($linked_publications as $publication) {
        $research_output = pods('publication_wrappers', $publication['slug']);

        if(!$research_output->exists()) {
          continue;
        }
        
        // get ID of WordPress page linked to this publication object
        $linked_wp_page_id = $research_output->field('publication_web_page.ID');
        
        var_trace(var_export($research_output->field('category'), true), 'output category');
        var_trace($linked_wp_page_id, 'publication_web_page.ID');

        $__publication_pdf = $research_output->field('publication_pdf');
        $pdf_uri = $__publication_pdf ? wp_get_attachment_url($__publication_pdf['ID']) : '';
        $pdf_filesize = $__publication_pdf ? sprintf("%0.1f MB", filesize(get_attached_file($__publication_pdf['ID'], TRUE)) / 1e+6 ) : '';
          
        // only add publication to list if publication has a linked WP page; otherwise emit warning
        if($linked_wp_page_id) {
          $research_outputs[$research_output->field('category.slug')][] = array(
            'slug' => $research_output->field('category.slug') . '__' . $research_output->field('slug'),
            'title' => $research_output->field('name'),
            'citation' => $research_output->field('name'),
            'date' => date_string($research_output->field('publishing_date')),
            'uri' => get_permalink($linked_wp_page_id),
            'pdf_uri' => $pdf_uri,
            'pdf_filesize' => $pdf_filesize
          );
        } else {
          trigger_error('No WordPress page linked to Publication with ID ' . $research_output->id(), E_USER_NOTICE);
        }
      }
    }
    
    // Now sort publications within each category, by date first, then by title
    foreach($research_outputs as $category => $ros) {
      foreach($ros as $key => $value) {
        $ro_date[$key] = $value['date'];
        $ro_title[$key] = $value['title'];
      }
      
      array_multisort($ro_date, SORT_DESC, $ro_title, SORT_ASC, $ros);
      
      $sorted_research_outputs[$category] = $ros;
    }

    return $sorted_research_outputs;
  }
  
  /**
   * Get list of WP Posts associated to this project.
   * Originally this was done by associating one or more WP Post
   * Categories to a research project and then adding any relevant
   * news item to any of the linked categories.
   * In practice though we would alywas only use one category per
   * research project, so the extra layer of indirection ended up being
   * just an usability hindrance.
   * Since 1.13, this function supports news items linked directly
   * from research projects.
   * 
   * @return Array List of posts associated to the project
   */
  function get_project_news() {
    $project_news = [];
    
    // try linked_posts first
    $linked_posts = $this->pod->field([ 'name' => 'linked_posts.ID', 'orderby' => 'post_date DESC']);
    
    if(!empty($linked_posts)) {
      foreach($linked_posts as $post) {
        $project_news[] = [
          'permalink' => get_permalink($post),
          'title' => get_the_title($post),
          'date' => get_post_time('j M Y', FALSE, $post)
        ];
      }
      
      return $project_news;
    }
    
    return NULL;
  }
}

/**
 * Given an array of params corresponding to those accepted by
 * pods() ($id parameter), return an array of ResearchProject objects
 * 
 * @param Array $pods_params An array of parameters to pass on to the
 *   pods() function (see Pods documentation - http://pods.io/docs/code/pods/).
 * @param Array $params An array of parameters to specify how the
 *   research project objects should be handled (e.g. post-Pods sorting
 *   based on research project score, etc.).
 * @return Array|Bool An array of research project objects, if any
 *   are found, or FALSE if none is found.
 */
function research_project_pods($pods_params = [], $params = []) {
  $pods = pods(RESEARCH_PROJECTS_PODS_NAME, $pods_params);
  
  $objects = [];
  
  if($pods->total_found() > 0) {
    while($pods->fetch()) {
      $objects[] = new ResearchProject($pods->field('slug'));
    }
    
    if('project_activity_score' === $params['orderby']) {
      usort($objects, function($a, $b) { return $a->project_activity_score < $b->project_activity_score; });
    }
    return $objects;
  } else {
    return FALSE;
  }
}
