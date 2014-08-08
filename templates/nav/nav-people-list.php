<?php
if(lc_data('page_data')) {
  SemanticWP\Templating::get_template_part('lsecities/nav/_people-list', lc_data('page_data'));
} ?>
