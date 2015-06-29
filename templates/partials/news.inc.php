              <?php if($news_categories): ?>
              <section id='news-area'>
                <header>
                  <h1><?php if($news_prefix) { echo $news_prefix . '  | '; } ?>News</h1>
                </header>
                <div class='clearfix row'>
                  <?php $latest_news = new WP_Query('posts_per_page=2' . $news_categories);
                    while ($latest_news->have_posts()) :
                      $latest_news->the_post();
                      $do_not_duplicate = $post->ID;
                    ?>
                  <div class='fourcol<?php echo $class_extra; ?>'>
                    <div class="feature-info">
                      <div class="feature-date">
                        <div class="month"><?php the_time('M'); ?></div>
                        <div class="day"><?php the_time('j'); ?></div>
                      </div>
                      <header>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      </header>
                    </div>
                    <?php the_excerpt(); ?>
                  </div>
                  <?php endwhile;
                    wp_reset_postdata();
                  ?>
                  <div class='fourcol last'>
                                <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/LSECities" data-widget-id="615509596153753600">Tweets by @LSECities</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                  </div>
                </div><!--.clearfix.row -->
                <?php $more_news = new WP_Query('posts_per_page=10' . $news_categories);
                  if($more_news->found_posts > 2) :
                ?>
                <ul>
                <?php
                    while ($more_news->have_posts()) :
                      $more_news->the_post();
                      if ($more_news->current_post > 1) :
                ?>
                  <li><a href="<?php the_permalink(); ?>"><?php the_time('j M Y'); ?> | <?php the_title() ?></a></li>
                <?php endif;
                    endwhile;
                ?>
                </ul>
                <?php
                  endif;
                ?>
              </section><!-- #news_area -->
              <?php endif; ?>
