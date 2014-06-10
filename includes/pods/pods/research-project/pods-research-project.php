<?php
/**
 * Data management for Research Projects
 *
 * @package LSECities2012
 */
namespace LSECitiesWPTheme\research_project;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

function pods_prepare_research_project($pod_slug) {
  $pod = pods('research_project');
  $pod->find(array('where' => "t.slug = '" . $pod_slug . "'"));

  if(!$pod->total_found()) {
    redirect_to_404();
  }

  $pod->fetch();

  // for menus etc.
  global $this_pod;
  $this_pod = new \LC\PodObject($pod, 'Research');

  // prepare array for return data structure
  $obj = array();

  lc_data('META_last_modified', $pod->field('modified'));

  var_trace('pod_slug: ' . $pod_slug);

  $obj['title'] = $pod->field('name');
  $obj['tagline'] = $pod->field('tagline');
  $obj['summary'] = do_shortcode($pod->display('summary'));
  $obj['blurb'] = do_shortcode($pod->display('blurb'));
  $obj['keywords'] = $pod->field('keywords');
  $obj['web_uri'] = $pod->field('web_uri');
  
  $obj['project_timespan'] = get_project_timespan($pod);

  list($obj['project_coordinators'], $obj['project_coordinators_string']) = get_project_people($pod, 'coordinators');
  list($obj['project_researchers'], $obj['project_researchers_string']) = get_project_people($pod, 'researchers');
  list($obj['project_partners'], $obj['project_partners_string']) = get_project_organizations($pod, 'partners');
  list($obj['project_funders'], $obj['project_funders_string']) = get_project_organizations($pod, 'funders');
  
  $obj['research_strand_title'] = $pod->field('research_strand.name');
  $obj['research_strand_summary'] = $pod->display('research_strand.summary');

  $obj['project_status'] = $pod->field('project_status.name');
  
  // featured post
  $featured_post['ID'] = $pod->field('featured_post.ID');
  if($featured_post['ID']) {
    $obj['featured_post']['permalink'] = get_permalink($featured_post['ID']);
    $obj['featured_post']['thumbnail_url'] = wp_get_attachment_url(get_post_thumbnail_id($featured_post['ID']));
    $obj['featured_post']['title'] = get_the_title($featured_post['ID']);
  }

  // hardcoded list of WP categories used to group research outputs linked to a research project
  $obj['research_output_categories'] = array('book', 'journal-article', 'book-chapter', 'research-report', 'conference-newspaper', 'conference-proceedings', 'conference-report', 'report', 'blog-post', 'interview', 'magazine-article');

  $obj['research_outputs'] = get_project_research_outputs($pod);
  
  // news
  $obj['project_news'] = get_project_news($pod);
  $obj['news_categories'] = news_categories($pod->field('news_categories'));
    
  // hardcoded list of WP categories used to group events linked to a research project
  $obj['research_event_categories'] = array('conference', 'presentation', 'public-lecture', 'workshop');

  // hardcoded list of WP categories used to group event calendars linked to a research project
  // (this variable is currently not used)
  $obj['event_calendar_categories'] = array('lse-cities-event');
  
  // events
  $obj['events_blurb'] = $pod->display('events_blurb');
  $obj['research_events'] = get_project_events($pod, $obj['research_event_categories'], $obj['research_outputs']);
  
  // prepare heading gallery
  $obj['gallery'] = galleria_prepare($pod, 'fullbleed wireframe');

  // if we have research photo galleries/photo essays, prepare them
  $obj['research_photo_galleries'] = galleria_prepare_multi($pod, 'fullbleed wireframe wait', 'photo_galleries');

  return $obj;
}

function get_project_timespan($pod) {
  // project duration
  $project_duration = '';

  // get years from start and date fields
  try {
    if($pod->field('date_start')) {
      $project_start = new \DateTime($pod->field('date_start') . '-01-01');
      $project_start = $project_start->format('Y');
    }
  } catch (\Exception $e) {
    error_log('Project start year must be a 4-digit number, "' . $pod-field('date_start') . '" was provided.');
  }
  
  try {
    if($pod->field('date_end')) {
      $project_end = new \DateTime($pod->field('date_end') . '-12-31');
      $project_end = $project_end->format('Y');
    }
  } catch (\Exception $e) {
    error_log('Project end year must be a 4-digit number, "' . $pod-field('date_start') . '" was provided.');
  }

  // get freeform duration text, if available
  $project_duration_freeform = $pod->field('duration');

  // if freeform duration is available, use this
  if($project_duration_freeform) {
    $project_duration = $project_duration_freeform;
  } elseif($project_start and $project_end) { // otherwise use start and end year
    $project_duration = $project_start . ' - ' . $project_end;
  }
  
  return $project_duration;
}

function get_project_people($pod, $role) {
  // build a list of all current members of staff
  $staff = pods('people_group', 'lsecities-staff');
  $all_staff = $staff->field('members.slug');

  $project_people_string = '';
  $project_people = array();
  
  $project_people_list = $pod->field($role);
  
  if(count($project_people_list)) {
    foreach($project_people_list as $project_person) {
      // add person to array
      $project_people[] = array(
        'slug' => $project_person['slug'],
        'name' => $project_person['name'],
        'family_name' => $project_person['family_name'],
        'uri' => '/' . get_page_uri(2177) . '#p-' . $project_person['slug']
      );
      
      // append person to string, adding link to staff profile if person is current member of staff
      if($project_person['slug'] and array_search($project_person['slug'], $all_staff) !== FALSE) {
        $project_people_string .= "\n" . '<a href="/' . get_page_uri(2177) . '#p-' . $project_person['slug'] . '">';
      }
      $project_people_string .= $project_person['name'] . ' ' . $project_person['family_name'];
      if($project_person['slug'] and array_search($project_person['slug'], $all_staff) !== FALSE) {
        $project_people_string .= '</a>';
      }
      $project_people_string .= ', ';
    }
  }
  $project_people_string = substr($project_people_string, 0, -2);
  return array($project_people, $project_people_string);
}

function get_project_organizations($pod, $role) {
  $project_organizations_string = '';
  $project_organizations = array();
  
  // generate list of organizations
  $project_organizations_list = sort_linked_field($pod->field($role), 'name', SORT_ASC);

  if(count($project_organizations_list)) {
    foreach($project_organizations_list as $project_organization) {
      $project_organizations[] = array(
        'name' => $project_organization['name'],
        'web_uri' => $project_organization['web_uri']
      );
      
      if($project_organization['web_uri'] and preg_match('/^https?:\/\//', $project_organization['web_uri'])) {
        $project_organizations_string .= '<a href="' . $project_organization['web_uri'] . '">' . $project_organization['name'] . '</a>, ';
      } else {
        $project_organizations_string .= $project_organization['name'] . ', ';
      }
    }
  }
  $project_organizations_string = substr($project_organizations_string, 0, -2);
  return array($project_organizations, $project_organizations_string);
}

function get_project_research_outputs($pod) {
  // initialize result array
  $research_outputs = array();
  
  /**
   * First add all the research outputs linked as 'research_outputs'
   * These are mostly publications for which a full 'publication' Pod
   * hasn't been created
   */
  $research_output_slugs = (array)$pod->field('research_outputs.slug');

  foreach($research_output_slugs as $research_output_slug) {
    $research_output = pods('research_output', $research_output_slug);

    if(!$research_output->exists()) {
      continue;
    }
    
    var_trace(var_export($research_output->field('category'), true), 'output category');

    $research_outputs[$research_output->field('category.slug')][] = array(
      'title' => $research_output->field('name'),
      'citation' => $research_output->field('citation'),
      'date' => date_string($research_output->field('date')),
      'uri' => $research_output->field('uri')
    );
  }

  /**
   * Now add to the research outputs found so far all the publications
   * from the publication_wrappers aka Publications pod
   */
  $publication_slugs = (array)$pod->field('research_output_publications.slug');

  foreach($publication_slugs as $publication_slug) {
    $research_output = pods('publication_wrappers', $publication_slug);

    if(!$research_output->exists()) {
      continue;
    }
    
    // get ID of WordPress page linked to this publication object
    $linked_wp_page_id = $research_output->field('publication_web_page.ID');

    var_trace(var_export($research_output->field('category'), true), 'output category');
    var_trace($linked_wp_page_id, 'publication_web_page.ID');

    // only add publication to list if publication has a linked WP page; otherwise emit warning
    if($linked_wp_page_id) {
      $research_outputs[$research_output->field('category.slug')][] = array(
        'title' => $research_output->field('name'),
        'citation' => $research_output->field('name'),
        'date' => date_string($research_output->field('publishing_date')),
        'uri' => get_permalink($linked_wp_page_id)
      );
    } else {
      trigger_error('No WordPress page linked to Publication with ID ' . $research_output->id(), E_USER_NOTICE);
    }
  }
  
  return $research_outputs;
}

function get_project_events($pod, $research_event_categories, $research_outputs) {
  // select events from the main LSE Cities calendar
  $research_events = array();

  if($pod->field('events')) {
    foreach($pod->field('events', array('orderby' => 'date_start DESC')) as $event) {
      $research_events[] = array(
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
        array_push($research_events, $event);
      }
    }
  }

  // and sort research events by date descending
  foreach($research_events as $key => $val) {
    $date[$key] = $val['date'];
  }
  array_multisort($date, SORT_DESC, $research_events);
  
  return $research_events;
}

function get_project_news($pod) {
  $project_news = array();
  
  $news_categories = $pod->field('news_categories');
  
  if(empty($news_categories)) {
    return array();
  }
  
  $more_news = new \WP_Query('posts_per_page=10' . \news_categories($news_categories));
  
  while ($more_news->have_posts()) {
    $more_news->the_post();
    $project_news[] = array(
      'permalink' => get_permalink(),
      'title' => get_the_title(),
      'date' => get_the_time('j M Y')
    );
  }
  
  var_trace(var_export($project_news, true), 'project_news');
  
  return $project_news;
}
