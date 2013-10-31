<script>
  // set background image to one from a random pool
  var images = ['010', '020', '030', '040', '050', '060', '070', '080', '090', '100', '110', '120', '130', '140', '150', '160', '170', '180', '190', '200'];
  jQuery(function() {
    jQuery('.full-background-photo')
      .attr('src', '<?php echo lc_data('rio2013_background_image_prefix'); ?>' + images[Math.floor(Math.random() * images.length)] + '.jpg')
      .removeClass('loading')
      .addClass('just-loaded');
      
    setTimeout(function() {
      jQuery('.full-background-photo').removeClass('just-loaded');
    }, 3000);
  });
</script>
