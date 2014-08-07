<?php
$TRACE_ENABLED = is_user_logged_in();
$TRACE_PREFIX = 'nav.php -- ';
if($people_list):
?>
<nav id="whoswho-side-toc">
<dl class="in-page-navigation">
  <dt><?php echo get_the_title($post->ID); ?></dt>
  <dd>
    <?php echo $people_list['summary']; ?>
  </dd>
</dl>
</nav>
<?php elseif(lc_data('page_data')):

FoundootsWPTheme\Templating\foundoots_get_template_part('nav/_people-list', lc_data('page_data'));

endif; ?>
