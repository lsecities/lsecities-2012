<script>
  // set background image to one from a random pool
  var images = [ <?php foreach($lc_conference_obj['conference_data']['microsite_background_photos'] as $background_photo) {
    echo "{ uri: '" . $background_photo['uri'] . "', title: '" . $background_photo['title'] . "' } , "; } ?> ];
  jQuery(function() {
    var image = images[Math.floor(Math.random() * images.length)];
    jQuery('.full-background-photo')
      .attr('src', image.uri)
      .attr('title', image.title)
      .removeClass('loading')
      .addClass('just-loaded');
      
    setTimeout(function() {
      jQuery('.full-background-photo').removeClass('just-loaded');
    }, 3000);
  });
</script>
