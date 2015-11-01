    <img class="full-background-photo loading" src="data:image/gif;base64,R0lGODdhAQABAIAAAP///////ywAAAAAAQABAAACAkQBADs=" /> <!-- start with white pixel gif; if js is on, load random image from pool -->
    <header id='header'>
      <div>
        <h1 class='conference-title row'><a href="/">City Transformations</a></h1>
        <span class="twitter-hashtag"><a href="<?php echo $lc_conference_obj['conference_data']['twitter_hashtag_uri']; ?>"><?php echo $lc_conference_obj['conference_data']['twitter_hashtag']; ?></a></span>
        <div class='row' id='mainmenus'>
          <nav class='twelvecol top-navigation section-ancestor-<?php echo $lc_toplevel_ancestor ; ?>' id='level2nav'>
            <ul>
            <?php if($lc_toplevel_ancestor and $lc_level2nav): ?>
              <?php echo $lc_level2nav ; ?>
            <?php else: ?>
              <li>&nbsp;</li>
            <?php endif; ?>
            </ul>
          </nav>
        </div><!-- #mainmenus -->
      </div>
    </header><!-- #header -->
