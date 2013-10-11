<ul id="organizer-logos">
  <li>
    <a href="http://www.lse.ac.uk/" target="_blank">
      <img alt="LSE" src="<?php bloginfo('stylesheet_directory'); ?>/images/lse_logo_white.gif" />
    </a>
  </li>
  <?php if(lc_data('urban_age_section')): ?>
  <li>
    <a href="http://www.alfred-herrhausen-gesellschaft.de/en/" target="_blank">
      <img alt="Alfred Herrhausen Gesellschaft" src="<?php bloginfo('stylesheet_directory'); ?>/images/ahs_logo_white.gif" />
    </a>
  </li>
  <?php endif; ?>
  <?php //MONKEYPATCH_BEGIN
  if('ec2012' === lc_data('microsite_id')): ?>
  <li>
    <a href="http://www.london.gov.uk/" target="_blank">
      <img alt="Supported by Mayor of London" src="http://lsecities.net/files/2012/11/logo_mayor-of-london_white.gif" />
    </a>
  </li>
  <?php endif; //MONKEYPATCH_END ?>
</ul>
