<?php
/**
 * Navigation for articles
 * The actual layout depends on article type.
 * Generally, we display only the ToC of the article's parent publication
 * in the sidebar navigation; however, self-standing articles such as
 * the initial Super diverse streets survey grid slideshow - and articles
 * with a grid slideshow attached, in general - move their metadata box
 * to the sidebar and add there in-page navigation (to switch between
 * main content and revealjs area) and a call to action to toggle between
 * overview/panorama and individual slide mode when showing the revealjs
 * div.
 */

$current_post_id = $post->ID;

// prepare Table of Contents
$obj_sections = LSECitiesWPTheme\publication\pods_prepare_table_of_contents($parent_publication_id);
?>
<nav id="publication-side-toc">
<?php if(count($obj_sections['sections'])) : ?>
  <div>
    <h1><?php echo $obj_sections['title']; ?></h1>
    <ul>
    <?php
    foreach($obj_sections['sections'] as $section) : ?>
      <?php if($section['title']) { ?><h2><?php echo $section['title']; ?></h2><?php }
      foreach($section['articles'] as $article) : ?>
      <li>
        <a href="<?php echo $article['uri'] ; ?>"><?php echo $article['title']; ?></a>
        <?php if($article['lang2_title'] and $article['lang2_uri']): ?>
        | <a href="<?php echo $article['lang2_uri']; ?>"><?php echo $article['lang2_title']; ?></a>
        <?php endif; // ($article['lang2_title'] and $article['lang2_uri']) ?>
      </li>
      <?php
      endforeach; // ($section['articles'] as $article)
    endforeach; // ($obj_sections as $section) ?>
    </ul>
  </div>
<?php endif; // (count($obj_sections['sections']))?></nav>
<?php if(!empty($page_obj['grid_slideshow'])) {
  \SemanticWP\Templating::get_template_part('lsecities/articles/_nav-grid-slideshow', $page_obj);
  \SemanticWP\Templating::get_template_part('lsecities/articles/_metadata', $page_obj);
} ?>
