<?php
/**
 * Pods input helper: tile
 *
 * Used to display lists of available tiles when building slides
 */

$PODS_BASEURI_NEW_ITEM = '/wp-admin/admin.php?page=';

// read first value of associative array
reset($value);
$active_tile_id = $value[key($value)];

$data_label = $options['label'];
$data_name_clean = str_replace('_', '-', $name);
$element_id = 'pods-form-ui-' . $data_name_clean;
?>
<script>
// let ddslick dropdowns at bottom of page display in full
jQuery(function($) { $('.pods_form').css({overflow: 'visible'}); });
</script>

<div id="<?php echo $name; ?>_container">
<select name="<?php echo $name; ?>" id="<?php echo $element_id; ?>" data-name-clean="<?php echo $data_name_clean; ?>" data-label="<?php echo $data_label; ?>" class="pods-form-ui-field-type-pick pods-form-ui-field-name-<?php echo $pods_name_clean; ?> pods-validate pods-validate-required">
  <option value="">-- Select one --</option>
  <?php if ( is_array( $options['data'] ) ) : ?>

    <?php foreach ($options['data'] as $key => $val) : ?>
      <?php
        if(empty($key)) { continue; }
        // check to see if this is the chosen value
        $active = ($key === $active_tile_id) ? ' active' : false;
        $tile_pod = pods('tile', $key);

        $tile_title = $tile_pod->field('name');
        $tile_layout = $tile_pod->field('tile_layout.name');
        $description = $tile_title . ' (' . $tile_layout . ')';
        $tile_image_src = wp_get_attachment_image_src( $tile_pod->field('image.ID', TRUE), array(32,32), false);
      ?>
      <option value="<?php echo $key; ?>" class="option<?php echo $active ?>" data-description="<?php echo $description; ?>"<?php if($tile_image_src) { echo ' data-imagesrc="' . $tile_image_src[0] . '"'; }  if($active) { echo ' selected="selected"'; }?>><?php echo $description; ?></option>
    <?php endforeach; ?>
  <?php endif; ?>
</select>
</div>
<script>
jQuery(function($) {
  $('#<?php echo $element_id; ?>').ddslick({
    width: '100%',
    selectText: 'Select a tile...',
    onSelected: function(data){
        //$('[name="<?php echo $name; ?>"]').val(selectedData.selectedIndex);
        console.log(this.id + ': ' + data.selectedData.value);
    }
  });
});
</script>
