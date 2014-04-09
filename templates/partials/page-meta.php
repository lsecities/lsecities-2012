<?php
  $media_attributions = lc_data('META_media_attr'); ?>
<div id="page-meta">
  <?php if(count($media_attributions)): ?>
    <h1>Media sources</h1>
    <ul>
  <?php
    foreach($media_attributions as $key => $item):
      if($item['author'] and $item['attribution_uri']): ?>
      <li><em><?php echo $item['title']; ?></em> by <a href="<?php echo $item['attribution_uri']; ?>"><?php echo $item['author']; ?></a></li>
  <?php
      elseif($item['author']): ?>
      <li><em><?php echo $item['title']; ?></em> by <?php echo $item['author']; ?></li>
  <?php
      endif;
    endforeach; ?>
    </ul>
  <?php
  endif; // count($media_attributions)
  ?>
  <?php if(is_user_logged_in()):
    if(lc_data('META_last_modified')): ?>
    <span class="updated" title="<?php echo lc_data('META_last_modified'); ?>">Page last modified: <?php echo lc_data('META_last_modified'); ?></span>
    <?php endif; // (lc_data('META_last_modified'))
  endif; // is_user_logged_in() ?>
</div>
