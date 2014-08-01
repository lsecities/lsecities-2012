<?php
namespace \LSECitiesWPTheme;

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
  public $members;
  public $active_members;
  public $sub_groups;
  public $people_list;

  private $pod;

  function __construct($permalink) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);

    $this->name = $pod->field('name');
    $this->label = $pod->field('label');

    $this->members = initialize_related_object($pod, 'members');

    $this->sub_groups = initialize_related_object($pod, 'sub_groups');

    $this->active_members = array_filter($this->members, [$this, 'is_member_active']);
  }

  /**
   * Given a timestamp (or the current time if none is provided),
   * check if the given member of the group is currently active.
   *
   * @param string $member_permalink The member to check
   * @param string $timestamp The timestamp against which to check
   *   if the member is active
   * @return bool Whether the member is active at the given time
   */
  function is_member_active($member, $timestamp = 'now') {
    // Initialize start/end timestamps
    $display_after = new DateTime($member['display_after'] . 'T00:00:00.0');
    $display_until = new DateTime($member['display_until'] . 'T23:59:59.0');

    // Initialize timestamp against which to test
    $datetime_requested = new DateTime($timestamp);

    // Test if member is active at given timestamp
    return $display_after <= $datetime_now and $datetime_now <= $display_until;
  }
}
