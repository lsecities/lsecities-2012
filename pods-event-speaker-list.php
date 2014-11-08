<?php
namespace LSECitiesWPTheme\event_programme;
/**
 * Template Name: Pods - Event speakers
 * Description: Lists of event speakers
 *
 * This is basically a different 'view' of an event programme,
 * generating a list of speakers appearing in a programme rather
 * than the event programme itself.
 * 
 * @package LSECities2012
 */

$obj = pods_prepare_event_programme(get_post_meta($post->ID, 'pod_slug', true));

?>

<?php get_header(); ?>

<div role="main" class="row">

<article id="post-<?php the_ID(); ?>" <?php post_class('ninecol lc-article lc-event-speaker-list'); ?>>
  <header class="entry-header">
    <h1 class="entry-title"><?php echo $obj['title']; ?></h1>
    <?php if($obj['subtitle']) : ?>
    <h2><?php echo $obj['subtitle']; ?></h2>
    <?php endif ; ?>
  </header><!-- .entry-header -->
	<div class="entry-content">
    <div id="contentarea">
    <h1><?php the_title(); ?></h1>

    <?php if($obj['lang2_slug']): ?>
    <div class='inline-language-switch'>
      <ul>
        <li<?php if($obj['request_language'] != $obj['lang2_slug']):?> class='active'<?php endif; ?>><a href='<?php echo '?lang='; ?>'>English</a></li>
        <li<?php if($obj['request_language'] == $obj['lang2_slug']):?> class='active'<?php endif; ?>><a href='<?php echo '?lang=' . $obj['lang2_slug']; ?>'><?php echo $obj['lang2_name']; ?></a></li>
      </ul>
    </div>
    <?php endif; // ($obj['lang2_slug']) ?>
    <?php if(is_array($obj['all_speakers'])) : ?>
      <div class="article">
        <?php
        $index = 0;
        foreach($obj['all_speakers'] as $key => $speaker): ?>
        <div id="speaker-profile-<?php echo $key; ?>" class="speaker-profile twocol<?php if((($index + 1) % 6) == 0) : ?> last<?php endif ; ?>">
          <div>
            <div class="sameheight-box">
              <div>
                <?php if($speaker['photo_uri']) : ?>
                  <img src="<?php echo $speaker['photo_uri']; ?>" />
                <?php endif; // ($speaker['photo_uri']) ?>
              </div>
            </div>
            <strong><?php echo $speaker['name'] . ' ' . $speaker['family_name']; ?><?php if($speaker['to-be-confirmed']): ?> <span class="to-be-confirmed">(to be confirmed)</span><?php endif; ?></strong>
          </div>
          <div style="display:none;" class="speaker-card" id="speaker-card-<?php echo $key; ?>">
            <h1><?php echo $speaker['name'] . ' ' . $speaker['family_name']; ?></h1>
            <?php if($speaker['affiliation']): ?><p><em><?php echo $speaker['affiliation']; ?></em></p><?php endif; ?>
            <?php if($speaker['blurb']): ?><p><?php echo $speaker['blurb']; ?></p><?php endif; ?>
            <ul>
              <?php foreach($speaker['speaker_in'] as $speaker_session): ?>
              <li><a href="/programme/#<?php echo $speaker_session[0]; ?>"><?php echo $speaker_session[1]; ?></a><?php if($speaker_session[2]): ?> (to be confirmed)<?php endif; ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <?php 
        if((($index + 1) % 6) == 0) : ?>
          <span class="clearline">&nbsp;</span>
        <?php
        elseif((($index + 1) % 3) == 0) : ?>
          <span class="clearline halfway">&nbsp;</span>
        <?php
        endif; // ((($index + 1) % 6) == 0)
        $index++; 
        endforeach; // ($all_speakers as $speaker) ?>
        <script>
          jQuery(function(){
          });
        </script>
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
