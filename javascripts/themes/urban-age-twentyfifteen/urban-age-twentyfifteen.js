/**
 * Urban Age TwentyFifteen microsite theme - JS companion
 */

jQuery(function($) {
  var image,
      caption;

  /**
   * Add/remove sticky class to #header depending on whether page is scrolled past
   * its top.
   * From: http://www.webdesignerdepot.com/2014/05/how-to-create-an-animated-sticky-header-with-css3-and-jquery/
   */
  $(window).scroll(function() {
    if($(this).scrollTop() > 1) {  
      $('#header').addClass("sticky");
    } else {
      $('#header').removeClass("sticky");
    }
  });

  /**
   * check initial status (e.g. if page is scrolled, then reloaded
   * we need to set the sticky class without having to wait for a
   * window scroll
   */
  if($(this).scrollTop() > 1) {  
    $('#header').addClass("sticky");
  }

  if(images) {
    image = images[Math.floor(Math.random() * images.length)];
    // Create photo caption; include attribution if available
    caption = image.description || '';
    if(image.attribution_name) {
      // do not add separator if there is no image.description
      if(caption.length > 0) caption += ' - ';
      caption += 'Photo by ' + image.attribution_name + '.';
    }
    // Add link to full size photo
    if(caption.length > 0) caption += ' ';
    caption += '(<a href="' + image.uri + '" target="_blank">View full size</a>)';

    $('.full-background-photo')
      .attr('src', image.uri)
      .removeClass('loading')
      .addClass('just-loaded');

    $('#background-photo-explorer .caption').html(caption);
  }

  setTimeout(function() {
    $('.full-background-photo').removeClass('just-loaded');
  }, 3000);

  /**
   * Show background photo details (author/description) on hover
   * on background photo explorer button
   */
  $('#background-photo-explorer .trigger')
    .click(function(e) {
      e.stopPropagation();
      $('.full-background-photo').toggleClass('foreground');
    });

  /**
   * Return from full-screen photos to normal layout when
   * the background photo is clicked while in full-screen mode
   */
/*  $('.full-background-photo.foreground').click(function(event) { 
      event.preventDefault();
      $('.full-background-photo').removeClass('foreground'); 
  });
*/
});
