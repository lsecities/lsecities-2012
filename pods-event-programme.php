<?php
namespace LSECitiesWPTheme\event_programme;
/**
 * Template Name: Pods - Event programme
 * Description: The template used for event programmes
 *
 * @package LSECities2012
 */

$obj = pods_prepare_event_programme(get_post_meta($post->ID, 'pod_slug', true));

?><?php get_header(); ?>

<div role="main" class="row">

<article id="post-<?php the_ID(); ?>" <?php post_class('ninecol lc-article lc-event-programme'); ?>>
  <header class="entry-header">
    <h1 class="entry-title"><?php echo $obj['pod_title']; ?></h1>
    <?php if($obj['pod_subtitle']) : ?>
    <h2><?php echo $obj['pod_subtitle']; ?></h2>
    <?php endif ; ?>
  </header><!-- .entry-header -->
	<div class="entry-content">
    <div id="contentarea">
    <h1><?php echo $obj['page_title']; ?></h1>

    <?php if($obj['lang2_slug']): ?>
    <div class='inline-language-switch'>
      <ul>
        <li<?php if($obj['request_language'] != $obj['lang2_slug']):?> class='active'<?php endif; ?>><a href='<?php echo '?lang='; ?>'>English</a></li>
        <li<?php if($obj['request_language'] == $obj['lang2_slug']):?> class='active'<?php endif; ?>><a href='<?php echo '?lang=' . $obj['lang2_slug']; ?>'><?php echo $obj['lang2_name']; ?></a></li>
      </ul>
    </div>
    <?php endif; // ($obj['lang2_slug']) ?>
    
    <?php if(!empty($obj['sessions'])) : ?>
      <div class="article row">
        <div class="ninecol event-programme">
        <?php process_session_templates($obj['sessions']); ?>
        </div>
        <div class="threecol last">
          <?php if($obj['is_programme_tentative']): ?>
          <p>This programme is subject to change; not all participants are confirmed/included.</p>
          <?php endif; // ($obj['is_programme_tentative']) ?>
          <?php if($obj['timezone_notice']): ?>
          <dl>
            <dt>Timezone</dt>
            <dd><?php echo $obj['timezone_notice']; ?></dd>
          </dl>
          <?php endif; // ($obj['timezone_notice']) ?>
          <?php if($obj['programme_pdf']): ?>
          <dl>
            <dt>Full programme</dt>
            <dd><a href="<?php echo $obj['programme_pdf']; ?>">Download as PDF</a></dd>
            <?php if($obj['lang2'] and $obj['programme_pdf_lang2']): ?>
            <dt>Full programme - <?php echo $obj['lang2']; ?></dt>
            <dd><a href="<?php echo $obj['programme_pdf_lang2']; ?>">Download as PDF</a></dd>
            <?php endif; // ($obj['lang2'] and $obj['programme_pdf_lang2']) ?>
          </dl>
          <?php endif; // ($obj['programme_pdf']) ?>
        </div>
      </div>
    <?php endif ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
    </div><!-- #contentarea -->
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php get_template_part('nav'); ?>

</div><!-- role='main'.row -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
