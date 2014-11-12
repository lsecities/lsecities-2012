          <section class="toc row" id="tableofcontents">
            <h1>Contents</h1>
            <div class="articles">
            <?php
            foreach($obj_sections['sections'] as $section) : ?>
              <section id="publication-section-<?php echo $section['id']; ?>">
              <?php if($section['title']) { ?><h1><?php echo $section['title']; ?></h1><?php }
              foreach($section['articles'] as $article) : ?>
                <div class="article">
                  <?php
                  /**
                   * if this is the ToC entry for an article part of a research-data publication (e.g.
                   * data section of a conference newspaper), we should have a cover image for each
                   * article, if this is provided, to be shown in ToC here.
                   */
                  if($article['cover_image_uri']): ?>
                  <div class='cover-image'>
                    <a href="<?php echo $article['uri']; ?>">
                      <img src='<?php echo $article['cover_image_uri']; ?>' />
                    </a>
                  </div>
                  <?php endif; // ($article['cover_image_uri']) ?>
                  <h1>
                    <a href="<?php echo $article['uri'] ; ?>"><?php echo $article['title']; ?></a>
                    <?php if($article['lang2_title'] and $article['lang2_uri']): ?>
                    | <a href="<?php echo $article['lang2_uri']; ?>"><?php echo $article['lang2_title']; ?></a>
                    <?php endif; // ($article['lang2_title'] and $article['lang2_uri']) ?>
                  </h1>
                  <?php if($article['authors']): ?>
                  <div class="authors">
                    <?php echo implode(', ', $article['authors']) ; ?>
                  </div>
                  <?php endif; ?>
                  <?php if(false and $article['abstract']): //disable until we can generate plain text only ?>
                  <div class="excerpt">
                    <?php echo shorten_string($article['abstract'], 30); ?><a href="<?php echo $article['uri']; ?>">...</a>
                  </div>
                  <?php endif; ?>
                </div><!-- .article -->
              <?php
              endforeach; ?>
              </section><!-- publication-section-<?php echo $section['title']; ?> -->
            <?php
            endforeach; ?>
            </div><!-- .articles -->
          </section><!-- .row -->
