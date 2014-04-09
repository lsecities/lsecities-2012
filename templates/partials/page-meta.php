<?php
  $media_attributions = lc_data('META_media_attr'); 
  var_trace(var_export($media_attributions, TRUE), 'media_attributions_data_structure'); ?>
<div id="hiddenmeta" style="display: none;">
  <?php if(is_user_logged_in()):
    if(lc_data('META_last_modified')): ?>
    <span class="updated" title="<?php echo lc_data('META_last_modified'); ?>">Last modified: <?php echo lc_data('META_last_modified'); ?></span>
    <?php endif; // (lc_data('META_last_modified'))
  endif; // is_user_logged_in() ?>
  <?php if(count($media_attributions)): ?>
    <h4>Media sources</h4>
    <ul>
  <?php
    foreach($media_attributions as $key => $item):
      if($item['author'] and $item['attribution_uri']): ?>
      <li><?php echo $item['title']; ?> by <a href="<?php echo $item['attribution_uri']; ?>"><?php echo $item['author']; ?></a></li>
  <?php
      elseif($item['author']): ?>
      <li><?php echo $item['title']; ?> by <?php echo $item['author']; ?></li>
  <?php
      endif;
    endforeach; ?>
    </ul>
  <?php
  endif; // count($media_attributions)
  ?>
</div>
