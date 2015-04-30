<?php
/**
 * Galleria for LSE Cities
 * 
 * Shortcode and base configuration for galleria.io integration with LSE Cities' WordPress theme.
*/

define(LC_GALLERIA_BASE_PATH, lc_data('theme_base_path') . '/assets/bower_components/galleria/src');

function galleria_shortcode($args) {
  ob_start();
  $gallery_uniqid = uniqid();
  ?>
  <div class="galleria-tag" id="galleria_<?php echo $gallery_uniqid; ?>" style="width: <?php echo ($args['container-width'] ? $args['container-width'] : '100%'); ?>;"
    data-debug="<?php echo is_user_logged_in() ? 'true' : 'false'; ?>"
    <?php if($args['picasa_album']): ?>
      data-picasa-selector="useralbum:<?php echo $args['picasa_album']; ?>"
      data-picasa-options="{ sort: 'date-posted-asc' }"
    <?php elseif($args['flickr_set_id']) : ?>
      data-flickr-selector="set:<?php echo $args['flickr_set_id'] ?>"
      data-flickr-options="{ sort: 'date-posted-asc' }"
    <?php endif ; ?>
    <?php if($args['responsive']): ?>
      data-responsive="<?php echo $args['responsive']; ?>"
      <?php else: ?>
      data-responsive="true"
    <?php endif; // ($args['responsive']) ?>
    <?php if($args['height']): ?>
      data-height="<?php echo $args['height']; ?>"
      <?php else: ?>
      data-height="0.6",
    <?php endif; ?>
    ></div>
  <?php
  $c = ob_get_contents();
  ob_end_clean();
  return $c;
}

function galleria_init() {
  wp_enqueue_script('galleria', LC_GALLERIA_BASE_PATH . '/galleria.js', 'jquery', false, true);
  wp_enqueue_script('galleria_picasa', LC_GALLERIA_BASE_PATH . '/plugins/picasa/galleria.picasa.js', 'galleria', false, true);
  wp_enqueue_script('galleria_theme_classic', LC_GALLERIA_BASE_PATH . '/themes/classic/galleria.classic.js', 'galleria', false, true);
  wp_enqueue_style('galleria_theme_classic', LC_GALLERIA_BASE_PATH . '/themes/classic/galleria.classic.css');
  wp_enqueue_style('galleria_theme_classic_lsecities', lc_data('theme_base_path') . '/stylesheets/plugins/galleria.io/galleria.classic.lsecities.css');
}

add_action('init', 'galleria_init' );
add_shortcode('galleria', 'galleria_shortcode');
