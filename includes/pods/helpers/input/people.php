<?php
/**
 * Pods input helper - people
 *
 * Show people as FamilyName, FirstName
 */

$PODS_BASEURI_NEW_ITEM = '/wp-admin/admin.php?page=';
$people = pods('authors')->find(array('orderby' => 'family_name', 'limit' => -1));
?>

<!-- <div id="<?php echo $name; ?>" class="form pick <?php echo $name; ?> pods_field pods_field_<?php echo $name; ?> pods_coltype_pick"> -->
<div class="pods-pick-values pods-pick-checkbox">
  <ul>
    <?php while($people->fetch()) : ?>
      <?php
        // check to see if this is the chosen value
        $active = FALSE;
        $checked = '';
$position = $people->position() - 1;
$field_name = $options['name'];
$field_label = $options['label'];
$element_id = 'pods-form-ui-pods-field-' . $field_name . ($position + 1);
        if(in_array($people->field('id'), $value)) {
          $active = 'active';
          $checked = ' checked="CHECKED"';
        }
        
        // check to see if we have a full name
        $full_name = $people->field('name');
        if( $people->field('family_name') ) {
          $full_name = $people->field('family_name') . ', ' . $full_name;
        }
      ?>
      <li>
        <div class="pods-field pods-boolean">
          <input name="pods_field_<?php echo $field_name; ?>[<?php echo $position; ?>]" data-name-clean="pods-field-<?php echo $field_name; ?>" data-label="<?php echo $field_label; ?>" id="<?php echo $element_id; ?>" class="pods-form-ui-field-type-pick pods-form-ui-field-name-pods-field-<?php echo $field_name; ?> pods-dependent-multi" type="checkbox" value="<?php echo $people->field('id'); ?>"<?php echo $checked; ?>></input>
          <label class="pods-form-ui-label pods-form-ui-label-<?php echo $element_id; ?>" for="<?php echo $element_id; ?>"><?php echo $full_name; ?></label>
        </div>
      </li>
    <?php endwhile; ?>
  </ul>
</div>

<div>
  <p><a target="_blank" href="<?php echo $PODS_BASEURI_NEW_ITEM . 'pods-add-new-authors' ; ?>">Add a new person</a></p>
  <p>After adding a new person, save this document and refresh the page in order to see the updated list of people.</p>
</div>
