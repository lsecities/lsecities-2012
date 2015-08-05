		<header id='header'>
			<div class='row'>
				
          <?php if('ec2012' === lc_data('microsite_id')): ?>
          <a href="/">
            <div class='threecol' id='lclogo'>
              <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logos/logo_lsecities_full_white.png" alt="LSE Cities logo">
            </div>
          </a>
          <?php elseif(lc_data('site-labs')): ?>
          <a href="/labs/eumm/">
            <div class='sixcol' id='labs-logo'>
              <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo_eumm.png" alt="European Metromonitor">
            </div>
          </a>
          <?php else: ?>
          <a href="/">
            <div class='threecol' id='lclogo'>
              <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo_lsecities_fullred.png" alt="LSE Cities logo">
            </div>
          </a>
          <?php endif; // ('ec2012' === lc_data('microsite_id')) ?>
        <?php
          if(lc_data('urban_age_section')):
            if('ec2012' === lc_data('microsite_id')): ?>
              <a href="/ua/">
                <div class='threecol' id='ualogo'><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logos/logo_urbanage_nostrapline_white.png" alt="Urban Age logo"></div>
              </a>
            <?php else: ?>
              <a href="/ua/">
                <div class='threecol' id='ualogo'><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo_urbanage_nostrapline.gif" alt="Urban Age logo"></div>
              </a>
        <?php
          endif; // ('ec2012' === lc_data('microsite_id')) ?>
        <?php elseif(lc_data('site-labs')): ?>
				<?php else: ?>
        <span class='threecol'>&nbsp;</span>
        <?php endif; // (lc_data('urban_age_section')) ?>
				<div class='sixcol last' id='toolbox'>
					<div id="searchbox" class="clearfix">
						<form method="get" id="search-box" action="https://www.google.com/search">
							<div class="hiddenFields">
								<input type="hidden" value="lsecities.net" name="domains" />
								<input type="hidden" value="lsecities.net" name="sitesearch" />
								<div id="queryfield">
									<input type="text" placeholder="Search LSE Cities" name="q" />
									<button><i class="icon-right-open"></i></button>
								</div>
							</div>
             </form>
						<span id="socialbuttons">
							<ul>
								<li>
									<a title="Follow us on Twitter" href="https://twitter.com/#!/LSECities">
										<i class="icon-twitter in-circle"></i>
									</a>
								</li>
								<li>
									<a title="Follow us on Facebook" href="https://facebook.com/lsecities">
										<i class="icon-facebook in-circle"></i>
									</a>
								</li>
								<li>
									<a title="Follow us on YouTube" href="https://youtube.com/urbanage">
										<i class="icon-youtube-play in-circle"></i>
									</a>
								</li>
								<li>
									<a title="Follow us on LinkedIn" href="https://linkedin.com/company/lse-cities">
										<i class="icon-linkedin in-circle"></i>
									</a>
								</li>
								<li>
									<a title="News feed" href="http://lsecities.net/feed/">
										<i class="icon-rss"></i>
									</a>
								</li>
								<li>
									<a title="Subscribe to email updates" href="http://eepurl.com/bjuwIP">
										<i class="icon-mail-alt"></i>
									</a>
								</li>
              </ul>
						</span>
					</div>
				</div><!-- #toolbox -->
				<nav id='level1nav'>
					<ul>
					<?php echo $lc_level1nav; ?>
					</ul>
				</nav><!-- #level1nav -->
			</div><!-- row -->
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
    </header><!-- #header -->
