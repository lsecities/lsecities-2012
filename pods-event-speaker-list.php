<?php
/**
 * Template Name: Pods - Event speakers
 * Description: Lists of event speakers
 *
 * @package LSECities2012
 */
?>

<?php
/* URI: NA */
$TRACE_ENABLED = is_user_logged_in();
$TRACE_PREFIX = __FILE__ . ' -- ';
$pod_slug = get_post_meta($post->ID, 'pod_slug', true);
$pod = new Pod('event_programme', $pod_slug);
$pod_title = $pod->get_field('name');
$subsessions = $pod->get_field('sessions.slug');
if(count($subsessions) == 1) { $subsessions = array(0 => $subsessions); }

$for_conference = $pod->get_field('for_conference.slug');
$for_event = $pod->get_field('for_event.slug');

var_trace(var_export($subsessions, true), 'sessions');

$all_speakers = array();

foreach($subsessions as $session) {
  process_session($session);
}

// sort speakers by family name
foreach ($all_speakers as $key => $row) {
    $family_name[$key]  = $row['family_name'];
}
array_multisort($family_name, SORT_DESC, $all_speakers);

var_trace($all_speakers, 'all_speakers');

  
function process_session($session_slug) {
  global $TRACE_ENABLED, $all_speakers;
  $ALLOWED_TAGS_IN_BLURBS = '<strong><em>';
  
  $pod = new Pod('event_session', $session_slug);
  
  $session_id = $pod->get_field('slug');
  $session_title = $pod->get_field('name');
  $session_subtitle = $pod->get_field('session_subtitle');
  $show_times = $pod->get_field('show_times');
  $session_start = new DateTime($pod->get_field('start'));
  $session_start = $session_start->format('H:i');
  $session_end = new DateTime($pod->get_field('end'));
  $session_end = $pod->get_field('end') == '0000-00-00 00:00:00' ? null : $session_end->format('H:i');
  if($pod->get_field('show_times')) {
    $session_times = is_null($session_end) ? "$session_start&#160;&#160;&#160;" : "$session_start &#8212; $session_end&#160;&#160;&#160;";
  }
  $hide_title = $pod->get_field('hide_title');
  $session_type = $pod->get_field('session_type.slug');
  if($session_type != 'session') { $session_type = "session $session_type"; }
  $session_speakers = $pod->get_field('speakers');
  $session_speakers_blurb = strip_tags($pod->get_field('speakers_blurb'), $ALLOWED_TAGS_IN_BLURBS);
  $session_chairs = $pod->get_field('chairs');
  $session_chairs_blurb = strip_tags($pod->get_field('chairs_blurb'), $ALLOWED_TAGS_IN_BLURBS);
  $session_respondents = $pod->get_field('respondents');
  $session_respondents_blurb = strip_tags($pod->get_field('respondents_blurb'), $ALLOWED_TAGS_IN_BLURBS);

  $subsessions = $pod->get_field('sessions.slug');
  if($subsessions and count($subsessions) == 1) { $subsessions = array(0 => $subsessions); }

  var_trace(count($subsessions), 'session count');
  var_trace(var_export($subsessions, true), 'sessions');
  
  foreach($session_speakers as $session_speaker) {
    var_trace(var_export($session_speaker, true), 'speaker');
    $all_speakers[$session_speaker['slug']]['name'] = $session_speaker['name'];
    $all_speakers[$session_speaker['slug']]['family_name'] = $session_speaker['family_name'];
    $all_speakers[$session_speaker['slug']]['blurb'] = $session_speaker['profile_text'];
    $all_speakers[$session_speaker['slug']]['photo_uri'] = wp_get_attachment_url($session_speaker['photo.ID']);
    $all_speakers[$session_speaker['slug']]['speaker_in'][] = array($session_id, $session_title);
  }

  if($subsessions) {
    foreach($subsessions as $session) {
      process_session($session);
    }
  }
}
?>

<?php get_header(); ?>

<div role="main" class="row">

<article id="post-<?php the_ID(); ?>" <?php post_class('ninecol lc-article lc-event-speaker-list'); ?>>
  <header class="entry-header">
    <h1 class="entry-title"><?php echo $pod_title; ?></h1>
    <?php if($pod_subtitle) : ?>
    <h2><?php echo $pod_subtitle; ?></h2>
    <?php endif ; ?>
  </header><!-- .entry-header -->
	<div class="entry-content">
    <div id="contentarea">
    <h1><?php the_title(); ?></h1>

    <?php if(!empty($pod->data)) : ?>
      <div class="article row">
        <?php foreach($all_speakers as $index => $speaker): ?>
        <div class="fourcol">
          <img href="<?php echo $speaker['photo_uri']; ?>" />
          <strong><?php echo $speaker['name'] . ' ' . $speaker['family_name']; ?></strong>
        </div>
        <?php endforeach; // ($all_speakers as $speaker)?>
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
