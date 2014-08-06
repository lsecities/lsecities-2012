<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

class Group extends PodsObject {
  const PODS_NAME = 'people_group';

  /**
   * @var string $permalink The object's permalink
   * @var string $name The group's name
   * @var string $label The group's label (to be used in generated lists)
   * @var array $members All the members of the group
   * @var array $active_members If start/end dates for members are defined,
   *   only the currently active among the members are listed here
   * @var array $sub_groups Sub-groups of this group
   * @var array $people_list The list of people, grouped by section,
   *   to be used in templates
   */

  public $permalink;
  public $name;
  public $label;
  public $use_start_end_dates;
  public $members;
  public $active_members;
  public $sub_groups;
  public $people_list;

  private $pod;

  function __construct($permalink) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);

    // If no such Pod is found, return false
    if(!$pod->exists()) {
      return FALSE;
    }

    $this->permalink = $pod->field('slug');
    $this->name = $pod->field('name');
    $label = $pod->field('section_label');
    $this->label = $label ? $label : $this->name;
    
    echo '<!-- label: ' . var_export($pod->field('section_label'), TRUE) . ' -->';
    $this->use_start_end_dates = $pod->field('use_start_end_dates');

    $this->members = self::initialize_related_object($pod, 'members');

    uasort($this->members, function($a, $b) { return ($a['family_name'] < $b['family_name']) ? -1 : 1; });

    $this->sub_groups = parent::initialize_related_object($pod, 'sub_groups');

    $this->active_members = array_filter($this->members, [$this, 'is_member_active']);

    self::split_members_into_groups();
  }

  /**
   * Given a timestamp (or the current time if none is provided),
   * check if the given member of the group is currently active.
   * Checking active members is only done if the group's
   * 'use_start_end_dates' flag is set, otherwise this function
   * does nothing.
   * This is mainly useful for staff members, as we use start/end dates
   * to automatically display/hide staff according to start/end dates.
   *
   * @param string $member_permalink The member to check
   * @param string $timestamp The timestamp against which to check
   *   if the member is active
   * @return bool Whether the member is active at the given time
   */
  function is_member_active($member, $timestamp = 'now') {
    // Only perform the check if the group's 'use_start_end_dates' flag is set
    if(! $this->use_start_end_dates) {
      return true;
    }

    // Initialize start/end timestamps
    $display_after = new DateTime($member['display_after'] . 'T00:00:00.0');
    $display_until = new DateTime($member['display_until'] . 'T23:59:59.0');

    // Initialize timestamp against which to test
    $datetime_requested = new DateTime($timestamp);

    // Test if member is active at given timestamp
    return $display_after <= $datetime_now and $datetime_now <= $display_until;
  }

  /**
   * Given the group's list of all members and its sub-groups, prepare
   * a data structure to be used in templates:
   * * if the group doesn't have any sub-groups or only has one, all
   *   members will be listed under a single group
   *   * if no sub-groups are defined, use the group's *label* as group title;
   *   * if a single sub-group is defined, use the sub-group's *label*
   *     as group title
   * * if the group has two or more sub-groups:
   *   * create a group for each sub-group using the sub-group's *label*
   *     as title;
   *   * starting with the first group, populate each group with all
   *     the related sub-group's members, except those who are in
   *     a group already processed
   *   * finally, if there are any group members left who weren't included
   *     in any of the sub-groups, create a further group using the group's
   *     *label* as group title, then add all the remaining group members
   *     to this group.
   */
  function split_members_into_groups() {
    $tmp_groups = [];

    foreach($this->sub_groups as $sub_group) {
      $tmp_groups[] = populate_group($sub_group);
    }

    $this->people_list = $tmp_groups;
  }

  function populate_group($sub_group) {
    // TECHNICAL DEBT: deal with possible infinite recursion
    // (this would only happen if data is incorrectly entered
    // in Pods, by making a group a sub-group of itself)
    $sub_group_object = new Group($sub_group['slug']);

    // Start building result data structure
    $group['name'] = $sub_group['label'];

    foreach($sub_group_object->members as $member) {
      $group['members'][] = $member;
    }
  }
}

/**
 * Build data object to be used in templating
 * @param string $permalink The group's permalink
 * @return array Data structure with the group's full data
 */
function group_get_data($permalink) {
  $group = new Group($permalink);
  return $group->people_list;
}
