<?php
/**
 * Pods UI functions for the LSE Cities theme
 */

/**
 * Hide WP Page editor box when we are editing a WP Page with a Pods
 * template that doesn't grab content from the WP Page itself
 */
function hide_editor_box_when_editing_pods_pages($hook) {
    if($hook === 'post.php' or $hook === 'post-new.php') {
      wp_enqueue_script('hide_editor_box', lc_data('theme_base_path') . '/javascripts/lsecities-pods-ui.js');
    }
}
add_action('admin_enqueue_scripts', 'hide_editor_box_when_editing_pods_pages');

/* event pod */
function pods_ui_events() {
  $icon = '';
  add_object_page('Events', 'Events', 'pods_add_event', 'events', '', $icon);
  add_submenu_page('events', 'All Events', 'All Events', 'pods_add_event', 'events', 'event_page');
  add_submenu_page('events', 'Add New', 'Add New', 'pods_add_event', 'events', 'event_page');
}

function event_page() {
  $object = pods('event');
  $object->ui = array(
    'title'   => 'Event',
    'columns' => array(
      'name'         => 'Title',
      'date_start'   => 'Date',
      'event_type'   => 'Event type',
      'event_series' => 'Event series',
      'venue'        => 'Venue',
      'speakers'     => 'Speakers',
      'hosted_by'    => 'Hosted by',
      'partners'     => 'Event partners',
      'created'      => 'Date Created',
      'modified'     => 'Last Modified'
    ),
    'sort'    => 'date_start'
  );
  pods_ui_manage($object);
}

// add_action('admin_menu','pods_ui_events');

/* event_session pod */
function pods_ui_event_session() {
  $icon = '';
  add_object_page('Event session', 'Event session', 'pods_add_event_session', 'event_session', '', $icon);
  add_submenu_page('event_session', 'Event session', 'Event session', 'pods_add_event_session', 'event_session', 'event_session_page');
}

function event_session_page() {
  $object = pods('event_session');
  $object->ui = array(
    'title'   => 'Event session',
    'sort' => 'start',
    'columns' => array(
      'name'         => 'Title',
      'session_type' => 'Session type',
      'sequence'     => 'Sequence',
      'start'        => 'Start',
      'created'      => 'Date Created',
      'modified'     => 'Last Modified'
    )
  );
  pods_ui_manage($object);
}

// add_action('admin_menu','pods_ui_event_session');

/* people (aka authors) pod */
function pods_ui_people() {
  $icon = '';
  add_object_page('People', 'People', 'pods_add_authors', 'people', '', $icon);
  add_submenu_page('people', 'People', 'People', 'pods_add_authors', 'people', 'person_page');
}

function person_page() {
  $object = pods('authors');
  $add_fields = $edit_fields = array(
    'slug',
    'name',
    'family_name',
    'title',
    'email_address',
    'photo',
    'photo_legacy',
    'profile_text',
    'organization',
    'role',
    'additional_affiliations',
    'qualifications',
    'staff_pages_blurb',
    'office_location',
    'display_after',
    'display_until',
    'extended_blurb',
    'groups',
    'research_projects',
    'special_2013rio_blurb',
    'special_2013rio_affiliation',
    'special_2013rio_blurb_lang2',
    'special_2013rio_affiliation_lang2',);
  $object->ui = array(
    'title'   => 'Person',
    'sort'    => 't.family_name ASC',
    'columns' => array(
      'name'         => 'Name',
      'family_name'  => 'Family name',
      'organization' => 'Organization',
      'created'      => 'Date Created',
      'modified'     => 'Last Modified'
    ),
    'add_fields'  => $add_fields,
    'edit_fields' => $edit_fields
  );
  pods_ui_manage($object);
}

add_action('admin_menu','pods_ui_people');

/* tile pod */
function pods_ui_tiles() {
  $icon = '';
  add_object_page('Tiles', 'Tiles', 'pods_add_tile', 'tiles', '', $icon);
  add_submenu_page('tiles', 'Tiles', 'Tiles', 'pods_add_tile', 'tiles', 'tile_page');
  add_submenu_page('tiles', 'Active tiles', 'Active tiles', 'pods_add_tile', 'active_tiles', 'active_tile_page');
}

function tile_page() {
  $object = pods('tile');
  $add_fields = $edit_fields = array(
    'slug',
    'name',
    'display_title',
    'tagline',
    'blurb',
    'tile_layout',
    'class',
    'target_page',
    'target_post',
    'target_uri',
    'target_event',
    'target_research_project',
    'image',
    'posts_category',
    'plain_content');
  $object->ui = array(
    'title'   => 'Tile',
    'reorder' => 'displayorder',
    'reorder_columns' => array(
      'name' => 'Title',
      'tagline'      => 'Subtitle',
      'tile_layout'  => 'Layout'
    ),
    'columns' => array(
      'name'         => 'Title',
      'tagline'      => 'Subtitle',
      'tile_layout'  => 'Layout',
      'used_in_slides' => 'Used in slides',
      'class'        => 'Extra classes',
      'created'      => 'Date Created',
      'modified'     => 'Last Modified'
    ),
    'add_fields'  => $add_fields,
    'edit_fields' => $edit_fields
  );
  pods_ui_manage($object);
}

function active_tile_page() {
  $object = pods('tile');
  $object->ui = array(
    'title'   => 'Tile',
    'reorder' => 'displayorder',
    'reorder_columns' => array(
      'name' => 'Title',
      'tagline'      => 'Subtitle',
      'tile_layout'  => 'Layout'
    ),
    'columns' => array(
      'name'         => 'Title',
      'tagline'      => 'Subtitle',
      'tile_layout'  => 'Layout',
      'used_in_slides' => 'Used in slides',
      'class'        => 'Extra classes',
      'created'      => 'Date Created',
      'modified'     => 'Last Modified'
    ),
    'where' => 'used_in_slides.slug <> ""'
  );
  pods_ui_manage($object);
}

add_action('admin_menu','pods_ui_tiles');

/* Research project pod */
function pods_ui_research_projects() {
  $icon = '';
  add_object_page('Research projects', 'Research projects', 'pods_add_research_project', 'research_projects', '', $icon);
  add_submenu_page('research_projects', 'Research projects', 'Research projects', 'pods_add_research_project', 'research_projects', 'research_project_page');
}

function research_project_page() {
  $object = pods('research_project');
  $object->ui = array(
    'title'   => 'Research project',
    'columns' => array(
      'name'         => 'Title',
      'status'       => 'Status',
      'research_stream' => 'Research stream',
      'date_start'   => 'Start date',
      'date_end'     => 'End date'
    )
  );
  pods_ui_manage($object);
}

// add_action('admin_menu','pods_ui_research_projects');

/* slides pod */
function pods_ui_slide() {
  $icon = '';
  add_object_page('Slides', 'Slides', 'pods_add_slide', 'slide', '', $icon);
  add_submenu_page('slide', 'Slides', 'Slides', 'pods_add_slide', 'slide', 'slide_page');
}

function slide_page() {
  $object = pods('slide');
  $object->ui = array(
    'title'   => 'Slide',
    'sort' => 'displayorder',
    'reorder' => 'displayorder',
    'reorder_columns' => array(
      'name' => 'Title',
      'slide_layout'      => 'Layout',
      'tiles'  => 'Tiles'
    ),
  );
  pods_ui($object);
}

// add_action('admin_menu','pods_ui_slide');

?>
