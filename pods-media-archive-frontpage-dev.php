<?php
/**
 * Template Name: Pods - Media Archive search (dev)
 * Description: Media Archive search webapp (dev)
 *
 * @package LSECities2012
 */
?><?php
$TRACE_PREFIX = 'pods-media-archive-search';
$pods_toplevel_ancestor = 306;
wp_enqueue_script('angularjs', get_stylesheet_directory_uri() . '/assets/bower_components/angular/angular.min.js', '', '', TRUE);
wp_enqueue_script('wherejs', 'https://raw.githubusercontent.com/panbhag/wherejs/master/where.min.js', 'underscore', '', TRUE);
wp_enqueue_script('media_archive_app', get_stylesheet_directory_uri() . '/assets/js/media-archive-app/js/controllers.js', 'angularjs', '', TRUE);
?><?php get_header(); ?>

<div role="main" data-ng-app="mediaArchiveApp">
  <?php if ( have_posts() ) : the_post(); endif; ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class('lc-article lc-media-archive-search'); ?>>
    <div class='twelvecol' id='contentarea'>
      <div class='top-content'>
        <?php if(count($heading_slides)) : ?>
        <header class='heading-image'>
          <div class='flexslider wireframe'>
            <ul class='slides'>
              <?php foreach($heading_slides as $slide): ?>
              <li><img src='<?php echo $slide; ?>' /></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </header>
        <?php endif; ?>
        
        <article class="wireframe" data-ng-controller="MediaArchiveCtrl">
          <header class="entry-header">
            <h1 class="entry-title article-title">Search</h1>
          </header>
          
                <section class="clearfix queryarea">
                  <div class="row">
                    <form method="get" action="">
                      <div class="threecol">
                        <h3>Format</h3>
                        <ul>
                          <li>
                            <label>
                              <input type="checkbox" value="lecture" data-ng-model="talktypes.lecture">lecture</input>
                            </label>
                          </li>
                          <li>
                            <label>
                              <input type="checkbox" value="conference_session" data-ng-model="talktypes.conference_session">conference session</input>
                            </label>
                          </li>
                        </ul>
                      </div>
                      <div class="threecol">
                        <h3>Media</h3>
                        <ul>
                          <li>
                            <label>
                              <input type="checkbox" value="audio" data-ng-model="mediatypes.audio">audio</input>
                            </label>
                          </li>
                          <li>
                            <label>
                              <input type="checkbox" value="video" data-ng-model="mediatypes.video">video</input>
                            </label>
                          </li>
                        </ul>
                      </div>
                      <div class="keywords sixcol last">
                      <h3>Search by topic/name/keyword</h3>
                      <input data-ng-model="query" class="twelvecol last" type="text" placeholder="free text search: enter topic/speaker names/keywords here" name="search" id="query" value="<?php echo((isset($_GET["search"])) ? htmlspecialchars($_GET["search"]) : ""); ?>">
                      </div>
                    </form>
                  </div>
                  
                  <div class="mapsearch">
                    <h3>Search by city</h3>
                    <iframe width='100%' height='350px' frameBorder='0' src='http://a.tiles.mapbox.com/v3/lsecities.i6knp3n1/attribution,zoompan,geocoder,share.html'></iframe>
                  </div>
                  
                </section>

                <section class="ngapp">
                  <h1>Search results</h1>
                  <section class="results audio-video-items" id="audio-video-items-results">
                    <h2>Audio and video</h2>
                    <ul>
                      <li data-ng-repeat="item in audio_video_items | filter:query | mediatypefilter:mediatypes | talkTypeFilter:talktypes">
                        <h3>{{item.title}}</h3>
                        <h4 data-ng-show="item.parent_sessions">Event session: <span data-ng-repeat="session in item.parent_sessions">{{session.name}}<span data-ng-show=" ! $last "> &raquo; </span></span></h4>
                        <h4 data-ng-show="item.parent_event">Event: <a href="/media/objects/events/{{item.parent_event.slug}}">{{item.parent_event.name}}</a></h4>
                        <div class="people">
                          <span data-ng-show="item.session_speakers">
                            <ul class="run-in comma-separated">
                              Speakers: 
                              <li data-ng-repeat="speaker in item.session_speakers">{{speaker.name}} {{speaker.family_name}}</li>
                            </ul>
                          </span>
                        </div>
                        <div class="media">
                          <span data-ng-show="item.youtube_uri or item.audio_uri">
                            <span class="video-thumbnail" data-ng-show="item.youtube_uri" >
                              <div class="opacity-overlay"></div>
                              <img src="//i1.ytimg.com/vi/{{item.youtube_uri}}/mqdefault.jpg">
                            </span>
                            <span data-ng-show="item.youtube_uri" class="action"><a href="http://youtu.be/{{item.youtube_uri}}">Watch</a></span>
                            <span data-ng-show="item.audio_uri" class="action"><a href="{{item.audio_uri}}">Listen</a></span>
                          </span>
                        </div>
                      </li>
                    </ul>
                  </section>
                  <section class="results articles">
                    <h2 id="articles-results">Articles</h2>
                    <ul>
                      <li data-ng-repeat="article in articles | filter:query">
                        <h3>{{article.title}}</h3>
                        <div class="people">
                          <span data-ng-show="article.article_authors">
                            Authors: 
                            <ul class="run-in comma-separated">
                              <li data-ng-repeat="author in article.article_authors">{{author.name}} {{author.family_name}}</li>
                            </ul>
                          </span>
                        </div>
                        <div class="article-link">
                          <p><a href="/media/objects/articles/{{article.permalink}}">Read the article</a></p>
                        </div>
                      </li>
                    </ul>
                  </section>             
                </section>
              </article>
              
              
        <aside class='wireframe fourcol last entry-meta' id='keyfacts'>
          &nbsp;
        </aside><!-- #keyfacts -->
      </div><!-- .top-content -->
      <div class='extra-content twelvecol'>
      </div><!-- .extra-content -->
    </div><!-- #contentarea -->
  </div><!-- #post-<?php the_ID(); ?> -->
</div><!-- role='main'.row -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
