// jQuery regex filter (http://james.padolsey.com/javascript/regex-selector-for-jquery/)
jQuery.expr[':'].regex = function(elem, index, match) {
  var matchParams = match[3].split(','),
  validLabels = /^(data|css):/,
  attr = {
    method: matchParams[0].match(validLabels) ?
                matchParams[0].split(':')[0] : 'attr',
    property: matchParams.shift().replace(validLabels,'')
  },
  regexFlags = 'ig',
  regex = new RegExp(matchParams.join('').replace(/^\s+|\s+$/g,''), regexFlags);
  return regex.test(jQuery(elem)[attr.method](attr.property));
};

jQuery(document).ready(function($) {
  /**
   * UA10 banner
   */
  // if no ua10_bugmenot cookie is set, display banner
  if(! Cookies.get('ua10_bugmenot')) {
    $('.ua10-debates-banner').addClass('active');
  }
  // if visitor clicks on dismiss button, 
  $('.ua10-debates-banner .dismiss-banner').on('click', function() { Cookies.set('ua10_bugmenot', 'true', { expires: new Date(2025, 0, 1) }); $('.ua10-debates-banner').removeClass('active'); });
   
  /**
   * jQuery plugin to change element type (http://stackoverflow.com/questions/8584098/how-to-change-an-element-type-using-jquery)
   */
  (function($) {
    $.fn.changeElementType = function(newType) {
      var attrs = {};

      $.each(this[0].attributes, function(idx, attr) {
        attrs[attr.nodeName] = attr.nodeValue;
      });

      this.replaceWith(function() {
        return $("<" + newType + "/>", attrs).append($(this).contents());
      });
    };
  })(jQuery);

  Galleria.loadTheme('//lsecities.net/app/themes/lsecities-alexandria/assets/bower_components/galleria/src/themes/classic/galleria.classic.js');
    
  // enable Galleria for embedded slideshows
  try {
    if(jQuery('.lc-newspaper-article .lc-galleria').length > 0) {
      jQuery('.lc-newspaper-article .lc-galleria').galleria({responsive: true, height: 0.75, lightbox: true, _toggleInfo: false, preload: 'all', debug: $('body').hasClass('is_user_logged_in') ? 'true' : 'false' });
    }
  } catch(error) { }

  // enable Galleria for right-hand-side navbar slideshows
  try {
    if(jQuery('#navigationarea .lc-galleria').length > 0) {
      jQuery('#navigationarea .lc-galleria').galleria({responsive: true, height: 0.75, transition: 'fade', transitionSpeed: 600, carousel: false, thumbnails: false, autoplay: 5000, showInfo: false, preload: 'all', debug: $('body').hasClass('user_logged_in') ? 'true' : 'false' });
      jQuery('#navigationarea .lc-galleria.fullbleed .galleria-thumbnails-container').hide();
    }
  } catch(error) { }

  // enable Galleria for research/publication/event pages photo slider
  try {
    var selector = '.lc-research-project .lc-galleria, .lc-publication .lc-galleria, .lc-event .lc-galleria',
        fullbleed_selector = '.lc-research-project .lc-galleria.fullbleed .galleria-thumbnails-container, .lc-publication .lc-galleria .lc-galleria.fullbleed .galleria-thumbnails-container, .lc-event .lc-galleria.fullbleed .galleria-thumbnails-container';

    if(jQuery(selector).length > 0) {
      jQuery(selector).galleria({
        responsive: true,
        height: 0.4,
        transition: 'fade',
        transitionSpeed: 600,
        carousel: false,
        thumbnails: false,
        autoplay: 5000,
        showInfo: false,
        preload: 'all',
        wait: true,
        debug: $('body').hasClass('user_logged_in') ? 'true' : 'false'
      });
      jQuery(fullbleed_selector).hide();
    }
  } catch(error) { }

  // Run Galleria for galleria shortcodes
  try {
    $('.galleria-tag').each(function(index) {
      var galleria_options = {
        wait: true,
        debug: $(this).data('debug'),
        responsive: $(this).data('responsive'),
        height: $(this).data('height')
      };
      
      if($(this).data('allowFullscreen')) {
        galleria_options['extend'] = function() {
          var gallery = this;
          this.bind('image', function(e) {
            $(e.imageTarget).unbind('click').click(function() {
              gallery.toggleFullscreen();
            });
          });
        };
      }
      if($(this).data('picasaSelector')) {
        galleria_options['picasa'] = $(this).data('picasaSelector');
        galleria_options['picasaOptions'] = $(this).data('picasaOptions');
      }
      if($(this).data('flickrSelector')) {
        galleria_options['flickr'] = $(this).data('flickrSelector');
        galleria_options['flickrOptions'] = $(this).data('flickrOptions');
      }
    
      Galleria.run("#" + $(this).attr('id'), galleria_options);
    });
  } catch(error) {}
  
  try {
    if(jQuery('.lc-galleria.single .galleria-image-nav')) {
      jQuery('.lc-galleria.single .galleria-image-nav').hide();
    }
  } catch(error) {}

  $('.speaker-profile').hover(
    function () {
        $(this).children('.speaker-card').fadeIn();
    },
    function () {
        $(this).children('.speaker-card').fadeOut();
    }
  );

  $('.flexslider').each(function(index) {
    var
    base_flexslider_configuration = {
      animation: 'slide',
      slideshow: true,
      mousewheel: false,
      controlNav: false,
      directionNav: true,
      pauseOnHover: true
    },
    /**
     * First read data attribute as string (i.e. via $.attr() rather
     * than via $.data(), then replace single quotes with double quotes
     * so that the resulting string is valid JSON.
     * Unfortunately we can't avoid replacing double quotes with single
     * quotes in PHP and then single quotes with double quotes here, as
     * MtHAML outputs HTML attributes delimited by double quotes (it
     * may be possible to change that, but there doesn't seem to be any
     * per-template configuration option at least in the current
     * version of MtHAML.
     */
    flexslider_configuration_string = $(this).attr('data-flexslider-configuration'),
    flexslider_configuration = $.parseJSON(flexslider_configuration_string.replace(/'/g, '"'))
    
    $(this).flexslider($.extend(base_flexslider_configuration, flexslider_configuration));
  });
  
  $('.accordion').accordion({heightStyle: 'content', active: $(this).find('.active')});

  // enable tabs on #uiTabs and .uiTabs lists
  $('#uiTabs, .uiTabs').tabs();
  
  jQuery('.lc-index .controls ul li').click(function() {
    var selector = '[data-' + jQuery(this).closest('[data-toggle-on]').data('toggle-on') + '="' + jQuery(this).data('toggle') + '"]';
    var toggle_status = jQuery(this).attr('data-status') == 'disabled' ? 'enabled' : 'disabled';
    
    jQuery(this).attr(
      'data-status',
      toggle_status
    );
    
    console.log(toggle_status);
    
    jQuery(selector)
      .attr('data-status', toggle_status);
  });

  /**
   * If we are on an article page that contains a grid slideshow (reveal.js), trigger the
   * reveal.js initialization and start in overview mode
   * TECHNICAL_DEBT: allow configuration of Reveal via data- attributes, falling back to
   * defaults if no configuration is provided.
   */
  if($('.lc-newspaper-article .reveal').length) {
    var width = $(this).data('width') || 844;
    var height = $(this).data('height') || 700;

    Reveal.initialize({
      width: width,
      height: height,
      center: false,
      controls: true,
      progress: false,
      history: true,
      transition: 'slide',
      embedded: true
    });
    Reveal.toggleOverview();

    $('.reveal-link').click(function(){
      $('.top-content').addClass('inactive');
      $('.reveal,#toggle-revealjs-overview').removeClass('inactive');
    });

    $('.intro-link').click(function(){
      $('.top-content').removeClass('inactive');
      $('.reveal,#toggle-revealjs-overview').addClass('inactive');
    });

    $('#toggle-revealjs-overview').click(Reveal.toggleOverview);

    var navSize = 50;
    var navTrans = navSize/2;
    $(".navigate-left").css('top', height/2 - navTrans).css('left', 0);
    $(".navigate-right").css('top', height/2 - navTrans).css('right', 0);
    $(".navigate-up").css('top', 0).css('left', width/2 - navTrans);
    $(".navigate-down").css('bottom', '2rem').css('left', width/2 - navTrans);
  }

  // track clicks to binary files hosted in WordPress.
  // based on http://www.wduffy.co.uk/blog/tracking-google-goals-with-no-url-using-jquery/.
  // uses regex jQuery filter (http://james.padolsey.com/javascript/regex-selector-for-jquery/).
  if($('body').hasClass('is_user_logged_in')) {
    function addGAEventTracker(uri) {
      var re = /^(http:\/\/lsecities\.net)?(.*)$/gi;
      var originalhref = $(this).attr('href');
      var href = originalhref.replace(re, '$2');
      console.log("PDF download at URI %s tracked with event label '%s'", originalhref, href);
      _gaq.push(['_trackEvent', 'PDF', 'download', href]);
    }
    $(':regex(href,(http:\/\/lsecities\.net\/)?\/files\/.*.pdf)').click(function() {
      console.log('download');
    });
    $(':regex(href,(http:\/\/lsecities\.net\/)?\/files\/.*)').click(function() {
      var re = /^(http:\/\/lsecities\.net)?(.*\.(.*))$/gi;
      var originalhref = $(this).attr('href');
      var href = originalhref.replace(re, '$2');
      var extension = originalhref.match(/^.*(\..*)$/);
      console.log('Download (type: %s) at URI %s tracked with event label \'%s\'', extension, originalhref, href);
    });
  } else {

    $(':regex(href,(http:\/\/lsecities\.net\/)?\/files\/.*.pdf)').click(function() {
      var re = /^(http:\/\/lsecities\.net)?(.*)$/gi;
      var originalhref = $(this).attr('href');
      var href = originalhref.replace(re, '$2');
      console.log("PDF download at URI %s tracked with event label '%s'", originalhref, href);
      _gaq.push(['_trackEvent', 'PDF', 'download', href]);
    });
    $(':regex(href,(http:\/\/lsecities\.net\/)?\/files\/.*.xlsx?)').click(function() {
      var re = /^(http:\/\/lsecities\.net)?(.*)$/gi;
      var originalhref = $(this).attr('href');
      var href = originalhref.replace(re, '$2');
      console.log("Excel document download at URI %s tracked with event label '%s'", originalhref, href);
      _gaq.push(['_trackEvent', 'Excel document', 'download', href]);
    });
    $(':regex(href,(http:\/\/lsecities\.net\/)?\/files\/.*.docx?)').click(function() {
      var re = /^(http:\/\/lsecities\.net)?(.*)$/gi;
      var originalhref = $(this).attr('href');
      var href = originalhref.replace(re, '$2');
      console.log("Word document download at URI %s tracked with event label '%s'", originalhref, href);
      _gaq.push(['_trackEvent', 'Word document', 'download', href]);
    });
  }
});

/*!
 * JavaScript Cookie v2.0.4
 * https://github.com/js-cookie/js-cookie
 *
 * Copyright 2006, 2015 Klaus Hartl & Fagner Brack
 * Released under the MIT license
 */
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		define(factory);
	} else if (typeof exports === 'object') {
		module.exports = factory();
	} else {
		var _OldCookies = window.Cookies;
		var api = window.Cookies = factory();
		api.noConflict = function () {
			window.Cookies = _OldCookies;
			return api;
		};
	}
}(function () {
	function extend () {
		var i = 0;
		var result = {};
		for (; i < arguments.length; i++) {
			var attributes = arguments[ i ];
			for (var key in attributes) {
				result[key] = attributes[key];
			}
		}
		return result;
	}

	function init (converter) {
		function api (key, value, attributes) {
			var result;

			// Write

			if (arguments.length > 1) {
				attributes = extend({
					path: '/'
				}, api.defaults, attributes);

				if (typeof attributes.expires === 'number') {
					var expires = new Date();
					expires.setMilliseconds(expires.getMilliseconds() + attributes.expires * 864e+5);
					attributes.expires = expires;
				}

				try {
					result = JSON.stringify(value);
					if (/^[\{\[]/.test(result)) {
						value = result;
					}
				} catch (e) {}

				if (!converter.write) {
					value = encodeURIComponent(String(value))
						.replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent);
				} else {
					value = converter.write(value, key);
				}

				key = encodeURIComponent(String(key));
				key = key.replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent);
				key = key.replace(/[\(\)]/g, escape);

				return (document.cookie = [
					key, '=', value,
					attributes.expires && '; expires=' + attributes.expires.toUTCString(), // use expires attribute, max-age is not supported by IE
					attributes.path    && '; path=' + attributes.path,
					attributes.domain  && '; domain=' + attributes.domain,
					attributes.secure ? '; secure' : ''
				].join(''));
			}

			// Read

			if (!key) {
				result = {};
			}

			// To prevent the for loop in the first place assign an empty array
			// in case there are no cookies at all. Also prevents odd result when
			// calling "get()"
			var cookies = document.cookie ? document.cookie.split('; ') : [];
			var rdecode = /(%[0-9A-Z]{2})+/g;
			var i = 0;

			for (; i < cookies.length; i++) {
				var parts = cookies[i].split('=');
				var name = parts[0].replace(rdecode, decodeURIComponent);
				var cookie = parts.slice(1).join('=');

				if (cookie.charAt(0) === '"') {
					cookie = cookie.slice(1, -1);
				}

				try {
					cookie = converter.read ?
						converter.read(cookie, name) : converter(cookie, name) ||
						cookie.replace(rdecode, decodeURIComponent);

					if (this.json) {
						try {
							cookie = JSON.parse(cookie);
						} catch (e) {}
					}

					if (key === name) {
						result = cookie;
						break;
					}

					if (!key) {
						result[name] = cookie;
					}
				} catch (e) {}
			}

			return result;
		}

		api.get = api.set = api;
		api.getJSON = function () {
			return api.apply({
				json: true
			}, [].slice.call(arguments));
		};
		api.defaults = {};

		api.remove = function (key, attributes) {
			api(key, '', extend(attributes, {
				expires: -1
			}));
		};

		api.withConverter = init;

		return api;
	}

	return init(function () {});
}));
