<?php
namespace LSECitiesWPTheme\conference;
global $post;
$parent_conference_page = parent_conference_page($post->ID);
$obj = prepare_conference(get_post_meta($parent_conference_page['id'], 'pod_slug', TRUE));

if(count($obj['button_links'])) :
?>
<div class='conference-sidebar'>
  <nav class="section">
    <ul>
    <?php foreach($obj['button_links'] as $link) : ?>
      <li>
        <a href="<?php echo $link['guid'] ; ?>" title="<?php echo $link['post_title'] ; ?>">
          <?php echo $link['post_title'] ; ?>
        </a>
      </li>
    <?php endforeach ; ?>
    </ul>
  </nav><!-- .conferencemenu -->
  <nav class="content-type">
    <dl>
      <dt>Urban Age conferences</dt>
      <dd>
<?php
if(count($obj['conferences_menu_items'])) : ?>
<ul class="citieslist">
<?php foreach($obj['conferences_menu_items'] as $item) : ?>
    <li><a href="<?php echo $item['permalink']; ?>"><?php echo $item['title']; ?></a></li>
<?php endforeach; ?>
</ul>
<?php endif;
?>
      </dd>
    </dl>
  </nav>
</div>
<?php endif; ?>

