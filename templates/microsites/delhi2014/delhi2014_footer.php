<script>
  // set background image to one from a random pool
  var images = [ <?php foreach($lc_conference_obj['conference_data']['microsite_background_photos'] as $background_photo) {
    echo "{ uri: " . json_encode($background_photo['uri']) . ",
            title: " . json_encode($background_photo['title']) . ",
            attribution_name: " . json_encode($background_photo['attribution_name']) . ",
            description: " . json_encode($background_photo['description']) . " },\n "; } ?> ];
</script>

<div id="background-photo-explorer">
  <div class="caption"></div>
  <div class="trigger"><a class="icon-resize-full-alt" title="Full screen"></a></div>
</div>
