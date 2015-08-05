<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package LSECities2012
 */
?>
    <div class="reset-layout">&#160;</div>
    
    <?php include_once('templates/partials/page-meta.php'); ?>

	</div><!-- #main -->

	<footer id="footer">
    <nav id="footerSitemap">
      <div class="row">
        <div class="threecol">
          <h1>About</h1>
          <ul>
            <?php wp_list_pages('title_li=&depth=1&child_of=617&sort_column=menu_order&sort_order=ASC&echo=1'); ?>
          </ul>
          <h1>Who's who</h1>
          <ul>
            <?php wp_list_pages('title_li=&depth=1&child_of=421&sort_column=menu_order&sort_order=ASC&echo=1'); ?>
          </ul>
        </div>
        <div class="threecol">
          <h1>Research</h1>
          <ul>
            <?php wp_list_pages('title_li=&depth=2&child_of=306&sort_column=menu_order&sort_order=ASC&echo=1'); ?>
          </ul>
        </div>
        <div class="threecol">
          <h1>Publications</h1>
          <ul>
            <?php wp_list_pages('title_li=&depth=1&child_of=309&sort_column=menu_order&sort_order=ASC&echo=1'); ?>
          </ul>
          <h1>Events</h1>
          <ul>
            <?php wp_list_pages('title_li=&depth=1&child_of=311&sort_column=menu_order&sort_order=ASC&echo=1'); ?>
          </ul>
        </div>
        <div class="threecol last">
          <h1>Urban Age</h1>
          <ul>
            <?php wp_list_pages('title_li=&depth=1&child_of=94&sort_column=menu_order&sort_order=ASC&echo=1'); ?>
          </ul>
          <?php if(lc_data('microsite_id') === 'ec2012' or lc_data('microsite_id') === 'rio2013'): ?>
          <h1>Conferences</h1>
          <ul>
            <?php wp_list_pages('title_li=&depth=1&child_of=96&sort_column=menu_order&sort_order=ASC&echo=1'); ?>
          </ul>
          <?php endif; // (lc_data('microsite_id') === 'ec2012' or lc_data('microsite_id') === 'rio2013') ?>
        </div>
      </div>
      <div class="row">
        <div class="threecol">
          <h1>Subscribe to our updates</h1>
          <?php SemanticWP\Templating::get_template_part('lsecities/partials/_mailchimp-embed-signup', []); ?>
        </div>
        <div class="threecol">
          <h1>Keep in touch</h1>
          <ul>
            <li><a href="https://twitter.com/#!/LSECities">Twitter</a></li>
            <li><a href="https://facebook.com/lsecities">Facebook</a></li>
            <li><a href="https://youtube.com/urbanage">Youtube</a></li>
            <li><a href="https://linkedin.com/company/lse-cities">LinkedIn</a></li>
            <li><a href="https://lsecities.net/feed/">News feed</a></li>
          </ul>
        </div>
        <div class="threecol">
          <?php get_template_part('templates/partials/colophon'); ?>
        </div>
        <div class="twocol">
          <?php get_template_part('templates/partials/organizers'); ?>
        </div>
        <div class="onecol last">&nbsp;</div>
      </div>
    </nav>
  </footer><!-- #footer -->
</div><!-- ## grid # container -->

<?php wp_footer(); ?>

<?php if(!is_user_logged_in()): ?>
<script type="text/javascript">//<![CDATA[
  cookieControl({
      introText:'<p>This site uses some unobtrusive cookies to store information on your computer.</p>',
      fullText:'<p>Some cookies on this site are essential, and the site won\'t work as expected without them. These cookies are set when you submit a form, login or interact with the site by doing something that goes beyond clicking on simple links.</p><p>We also use some non-essential cookies to anonymously track visitors or enhance your experience of the site. If you\'re not happy with this, we won\'t set these cookies but some nice features of the site may be unavailable.</p><p>By using our site you accept the terms of our <a href="http://lsecities.net/info/privacy-policy/">Privacy Policy</a>.</p>',
      position:'right', // left or right
      shape:'triangle', // triangle or diamond
      theme:'light', // light or dark
      startOpen:false,
      autoHide:6000,
      subdomains:false,
      onCookiesNotAllowed:function(){},
      countries:'United Kingdom' // Or supply a list ['United Kingdom', 'Greece']
  });
   //]]>
</script>
<?php endif; ?>

<script>

</script>
<?php
/**
 * run microsite-specific footer code, if it exists,
 * as <microsite_id>_footer()
 */
if(lc_data('microsite_id')) {
  locate_template('templates/microsites/' . lc_data('microsite_id') . '/' . lc_data('microsite_id') . '_footer.php', TRUE, TRUE);
}
?>
</body>
</html>
