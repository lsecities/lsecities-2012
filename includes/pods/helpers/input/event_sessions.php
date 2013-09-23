<?php
/**
 * Pods input helper - event_sessions
 *
 * List event sessions ordered by start time, add parent session's title to current session's title
 */

$sessions = pods('event_session')->find(array('orderby' => 'start ASC, sequence ASC', 'limit' => -1));
$session_items = array();
$pick_format_type = $options['pick_format_type'];
$active_items = $value;

while($sessions->fetch()) {
  // check to see if this row is selected
  $active = FALSE;
  $checked = '';
  $selected = '';
  $loop_position = $sessions->position() - 1;
  $field_name = $options['name'];
  $field_label = $options['label'];
  $element_id = 'pods-form-ui-pods-field-' . $field_name . ($loop_position + 1);
  if(in_array($sessions->field('id'), $active_items)) {
    $active = 'active';
    $checked = ' checked="CHECKED"';
    $selected = ' selected=""';
  }
  $full_session_name = $sessions->field('name');

  // get parent name
  $ancestor = $sessions->field('parent_session');
  if($ancestor) {
      $full_session_name = $ancestor['name'] . ' Â» ' . $full_session_name;
  }
  $full_session_name = $sessions->field('start') . ' Â» ' . $full_session_name;
  array_push($session_items, array(
    'id' => $sessions->field('id'),
    'active' => $active,
    'checked' => $checked,
    'selected' => $selected,
    'name' => $full_session_name,
    'field_name' => $field_name,
    'field_label' => $field_label,
    'position' => $loop_position,
    'element_id' => $element_id
  ));
}

?>
<?php if('multi' === $pick_format_type) : ?>

<div class="pods-pick-values pods-pick-checkbox">
  <ul>
<?php foreach($session_items as $session) : ?>
    <li>
      <div class="pods-field pods-boolean">
        <input name="pods_field_<?php echo $session['field_name']; ?>[<?php echo $session['position']; ?>]" data-name-clean="pods-field-<?php echo $session['field_name']; ?>" data-label="<?php echo $session['field_label']; ?>" id="<?php echo $session['element_id']; ?>" class="pods-form-ui-field-type-pick pods-form-ui-field-name-pods-field-<?php echo $session['field_name']; ?> pods-dependent-multi" type="checkbox" value="<?php echo $session['id']; ?>"<?php echo $session['checked']; ?>></input>                                                
        <label class="pods-form-ui-label pods-form-ui-label-<?php echo $session['element_id']; ?>" for="<?php echo $session['element_id']; ?>"><?php echo $session['name']; ?></label>
      </div>
    </li>
<?php endforeach; ?>
  </ul>
</div>

<?php else : ?>

<select name="pods_field_<?php echo $field_name; ?>" data-name-clean="pods-field-<?php echo $field_name; ?>" data-label="<?php echo $field_label; ?>" id="<?php echo $element_id; ?>" class="pods-form-ui-field-type-paragraph pods-form-ui-field-name-pods-field-<?php echo $field_name; ?>">
  <option value="">-- Select one --</option>
<?php foreach($session_items as $session) : ?>
  <option value="<?php echo $session['id']; ?>"<?php echo $session['selected']?>><?php echo $session['name']; ?></option>
<?php endforeach; ?>

</select>
<?php endif; ?> 
