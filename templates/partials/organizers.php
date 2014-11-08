<ul id="organizer-logos">
  <?php
    // TODO: use lists of organizations Pod when Pods supports loop fields with ordering
    if('ec2012' === lc_data('microsite_id')) {
      load_template(dirname(__FILE__) . '/organizers-common-dark-backgrounds.php', TRUE);
      load_template(dirname(__FILE__) . '/organizers-ec2012.php', TRUE);
    } elseif('rio2013' === lc_data('microsite_id') or 'delhi2014' === lc_data('microsite_id')) {
      load_template(dirname(__FILE__) . '/organizers-common-light-backgrounds.php', TRUE);
    } else {
      load_template(dirname(__FILE__) . '/organizers-common-dark-backgrounds.php', TRUE);
      if(lc_data('urban_age_section')) {
        load_template(dirname(__FILE__) . '/organizers-urban-age-dark-backgrounds.php', TRUE);
      }
    }
  ?>
</ul>
