<script>
  // set background image to one from a random pool
  var images = [ <?php foreach($lc_conference_obj['conference_data']['microsite_background_photos'] as $background_photo) {
    echo "{ uri: '" . $background_photo['uri'] . "',
            title: '" . $background_photo['title'] . "',
            attribution_name: '" . $background_photo['attribution_name'] . "',
            description: '" . $background_photo['description'] . "' },\n "; } ?> ];
</script>

<div id="background-photo-explorer">
  <div class="caption"></div>
  <div class="trigger">Show background photo</div>
</div>
