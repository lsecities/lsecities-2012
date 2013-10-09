    <header id='header'>
      <div>
        <h1 id="rio2013title" class='row'><a href="/">City Transformations</a></h1>
        <span class="twitter-hashtag"><a href="https://twitter.com/search?q=%40lsecities&f=realtime">@lsecities</a></span>
        <div class='row' id='mainmenus'>
          <nav class='twelvecol section-ancestor-<?php echo $lc_toplevel_ancestor ; ?>' id='level2nav'>
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
