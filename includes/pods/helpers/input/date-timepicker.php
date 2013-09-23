<?php
/**
 * Pods input helper - date/timepicker
 *
 * Use jQuery UI timepicker addon
 * Obsoleted by Pods v2.x, which includes this helper in stock install
 */
    $coltype = 'date-timepicker';
    if (empty($coltype_exists[$coltype])) {
        // Load JS
        if (!wp_script_is('jquery-ui-core', 'queue') && !wp_script_is('jquery-ui-core', 'to_do') && !wp_script_is('jquery-ui-core', 'done'))
            wp_print_scripts('jquery-ui-core');
        if (!wp_script_is('jquery-ui-mouse', 'queue') && !wp_script_is('jquery-ui-mouse', 'to_do') && !wp_script_is('jquery-ui-mouse', 'done'))
            wp_print_scripts('jquery-ui-mouse');
        if (!wp_script_is('jquery-ui-slider', 'queue') && !wp_script_is('jquery-ui-slider', 'to_do') && !wp_script_is('jquery-ui-slider', 'done')) {
            if (!wp_script_is('jquery-ui-slider', 'registered'))
                wp_register_script('jquery-ui-slider', 'http://jquery-ui.googlecode.com/svn/tags/1.8.14/ui/minified/jquery.ui.slider.min.js');
            wp_print_scripts('jquery-ui-slider');
        }
        if (!wp_script_is('jquery-ui-datepicker', 'queue') && !wp_script_is('jquery-ui-datepicker', 'to_do') && !wp_script_is('jquery-ui-datepicker', 'done')) {
            if (!wp_script_is('jquery-ui-datepicker', 'registered'))
                wp_register_script('jquery-ui-datepicker', 'http://jquery-ui.googlecode.com/svn/tags/1.8.14/ui/minified/jquery.ui.datepicker.min.js');
            wp_print_scripts('jquery-ui-datepicker');
        }
        if (!wp_script_is('jquery-ui-timepicker', 'queue') && !wp_script_is('jquery-ui-timepicker', 'to_do') && !wp_script_is('jquery-ui-timepicker', 'done')) {
            if (!wp_script_is('jquery-ui-timepicker', 'registered'))
                wp_register_script('jquery-ui-timepicker', get_stylesheet_directory_uri() . '/components/jquery-timepicker-addon/dist/jquery-ui-timepicker-addon.js');
            wp_print_scripts('jquery-ui-timepicker');
        }
        // Load CSS
        if (!wp_style_is('jquery-ui', 'queue') && !wp_style_is('jquery-ui', 'to_do') && !wp_style_is('jquery-ui', 'done')) {
            if (!wp_style_is('jquery-ui', 'registered'))
                wp_register_style('jquery-ui', 'https://jquery-ui.googlecode.com/svn/tags/1.8.14/themes/ui-lightness/jquery-ui.css');
            wp_print_styles('jquery-ui');
        }
        if (!wp_style_is('jquery-ui-slider', 'queue') && !wp_style_is('jquery-ui-slider', 'to_do') && !wp_style_is('jquery-ui-slider', 'done')) {
            if (!wp_style_is('jquery-ui-slider', 'registered'))
                wp_register_style('jquery-ui-slider', 'https://jquery-ui.googlecode.com/svn/tags/1.8.14/themes/ui-lightness/jquery.ui.slider.css');
            wp_print_styles('jquery-ui-slider');
        }
        if (!wp_style_is('jquery-ui-datepicker', 'queue') && !wp_style_is('jquery-ui-datepicker', 'to_do') && !wp_style_is('jquery-ui-datepicker', 'done')) {
            if (!wp_style_is('jquery-ui-datepicker', 'registered'))
                wp_register_style('jquery-ui-slider', 'httsp://jquery-ui.googlecode.com/svn/tags/1.8.14/themes/ui-lightness/jquery.ui.datepicker.css');
            wp_print_styles('jquery-ui-datepicker');
        }
        if (!wp_style_is('jquery-ui-timepicker', 'queue') && !wp_style_is('jquery-ui-timepicker', 'to_do') && !wp_style_is('jquery-ui-timepicker', 'done')) {
            if (!wp_style_is('jquery-ui-timepicker', 'registered'))
                wp_register_style('jquery-ui-slider', get_stylesheet_directory_uri() . '/components/jquery-timepicker-addon/dist/jquery-ui-timepicker-addon.css');
            wp_print_styles('jquery-ui-timepicker');
        }
?>
<script type="text/javascript">
jQuery(function() {
    jQuery.datepicker.setDefaults({dateFormat: 'MM d, yy'});
    jQuery.datepicker.setDefaults(jQuery.datepicker.regional['en']);
    jQuery(".pods_form input.<?php echo $coltype; ?>").datetimepicker({
        timeFormat: 'HH:mm'
    });
});
</script>
<?php
    }
    $value = empty($value) ? date_i18n("F j, Y h:ia") : date_i18n("F j, Y h:ia", strtotime($value));
?>
    <input name="<?php echo esc_attr($name); ?>" type="text" class="<?php echo esc_attr(str_replace(' date ', ' ' . $coltype . ' ', $css_classes)); ?>" id="<?php echo esc_attr($css_id); ?>" value="<?php echo esc_attr($value); ?>" />
