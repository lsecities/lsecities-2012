<?php
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
  
  $obj['events_blurb'] = $pod->display('events_blurb');
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

    if($pod->field('date_end')) {
      $project_end = new \DateTime($pod->field('date_end') . '-12-31');
      $project_end = $project_end->format('Y');
    }
  } catch (Exception $e) {}

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
