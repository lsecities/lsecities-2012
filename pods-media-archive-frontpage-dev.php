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
                    <iframe width='100%' height='350px' frameBorder='0' src='http://a.tiles.mapbox.com/v3/lsecities.i6knp3n1/attribution,zoompan,zoomwheel,geocoder,share.html'></iframe>
                  </div>
                  
                </section>
                <section class="clearfix">
                  <div class="resultsarea">
                    <h1>Search results</h1>
                    <div id="searchresults"></div>
                    <div class="search-result-summary" data-ng-show="(audio_video_items | filter:query | mediatypefilter:mediatypes | talkTypeFilter:talktypes).length or (articles | filter:query).length">
                      <p><span><a href="#articles-results">{{(audio_video_items | filter:query | mediatypefilter:mediatypes | talkTypeFilter:talktypes).length}} audio/video items</a></span> and <span><a href="#articles-results">{{(articles | filter:query).length}} articles</a></span> found.</p>
                    </div>
                  </div>
                </section>
                <section class="ngapp">
                  <h2 id="audio-video-items-results">Audio and video</h2>
                  <ul class="results audio-video-items">
                    <li data-ng-repeat="item in (audio_video_items | filter:query | mediatypefilter:mediatypes | talkTypeFilter:talktypes)" class="clearfix">
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
                      <div class="media clearfix">
                        <span data-ng-show="item.youtube_uri">
                          <a href="http://youtu.be/{{item.youtube_uri}}">
                            <img src="//i1.ytimg.com/vi/{{item.youtube_uri}}/mqdefault.jpg">
                            <span class="action">Watch</span>
                          </a>
                        </span>
                        <span data-ng-show="item.audio_uri"><a href="{{item.audio_uri}}"><span class="action">Listen</a></span>
                      </div>
                    </li>
                  </ul>
                  <h2 id="articles-results">Articles</h2>
                   <ul class="results articles">
                    <li data-ng-repeat="article in articles | filter:query" class="clearfix">
                      <h3>{{article.article_title}}</h3>
                      <div class="people">
                        <span data-ng-show="article.article_authors">
                          <ul class="run-in comma-separated">
                            Authors: 
                            <li data-ng-repeat="author in article.article_authors">{{author.name}} {{author.family_name}}</li>
                          </ul>
                        </span>
                      </div>
                      <div>
                        <p><a href="/media/objects/articles/{{article.permalink}}">Read the article</a></p>
                      </div>
                    </li>
                  </ul>                 
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
