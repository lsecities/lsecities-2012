/**
 * Urban Age TwentyFifteen microsite theme - JS companion
 */

/**
 * Add/remove sticky class to #header depending on whether page is scrolled past
 * its top.
 * From: http://www.webdesignerdepot.com/2014/05/how-to-create-an-animated-sticky-header-with-css3-and-jquery/
 * ToDo: check on window load
 */
jQuery(function($) {
  /**
   * check initial status (e.g. if page is scrolled, then reloaded
   * we need to set the sticky class without having to wait for a
   * window scroll
   */
  if($(this).scrollTop() > 1) {  
    $('#header').addClass("sticky");
  }
  
  $(window).scroll(function() {
    if($(this).scrollTop() > 1) {  
      $('#header').addClass("sticky");
    } else {
      $('#header').removeClass("sticky");
    }
  });
});
