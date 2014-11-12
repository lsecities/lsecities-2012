<?php
$current_post_id = $post->ID;

// prepare Table of Contents
$obj_sections = LSECitiesWPTheme\publication\pods_prepare_table_of_contents($parent_publication_id);

var_trace(var_export($obj_sections, true), 'toc_for_nav');

?>
<?php 
$http_req_headers = apache_request_headers();
if(lc_data('x-site-id') === 'ec2012' or lc_data('body_class_extra') ===  'urban-age-twentyfifteen'): ?>
<img class="show" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB8AAAAeCAYAAADU8sWcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OTAyRDZFQUJFOEVFMTFFMDg2NkJGNDlCNjE5NENEMzIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OTAyRDZFQUNFOEVFMTFFMDg2NkJGNDlCNjE5NENEMzIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo5MDJENkVBOUU4RUUxMUUwODY2QkY0OUI2MTk0Q0QzMiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo5MDJENkVBQUU4RUUxMUUwODY2QkY0OUI2MTk0Q0QzMiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pprl4SwAAAIcSURBVHjazFfNasJAEI6ptiIGBCUQbfAWxWu96EUfwAY8tg+gD1A8F+99gfoA9ijoA9he9GKvIt5EMRJyEFKKDQidlaSIyW5iYkgHhiyZzX4zk/nbEOWAJpNJGh4V4DudGYttn8Bz4EGxWJw7OTfkALQBXKPOIwTeASXeXYEDcEMH9kLIG21QYu0IHECRS1+BBeoypAI3rX4F7TMwpcdHF86uEsF9AD6mZ1BAsHQ7CJ7g8WB3wmazia1Wq7imaWHjXSaTUbPZrOpAAQn4EX6B+geuR3Wf9NVisWBGo9HtdruNWckjkci+UCjI5XJ5baMAyoLOMfgLPKq43cPhkJ/NZqwT3yYSie96vT6PRqN7QgCKyHpat/ps4FwuR7VaLdN+5JleryfsdrsrQgDWjICrkFzt1OJTBcbjcZqw5d4ArxIKDec2tJHSoMQ1RiygtKZxqYU+lGWZ8ZJb0+k0RRALNKZJUMvlkvGa2JIkxUngYWxNVNUbYy2KokmeSqUObCWDlKQURbGtfDQVIGEtZxjmx1j3++b6g1ItmUxaypw2HFpPehPxPK96tYzjuC9Sz6f1xm9VqTSWZT0pAOVWsQPHThtQAiW3wPl8XkYG4IAP5RUWH7gDUKdCh5wLjOp7qVQiNZhB4I3FAEdVrhtISw10mDhSoOvjGGUaJE8rXBOXeheg9ukEG+jo/L8uDRe8Lr0B6MD1Xc3vi+KvAAMAMUEG36eXLzcAAAAASUVORK5CYII=" alt="">
<img class="hide" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB8AAAAeCAYAAADU8sWcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OTAyRDZFQUZFOEVFMTFFMDg2NkJGNDlCNjE5NENEMzIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OTAyRDZFQjBFOEVFMTFFMDg2NkJGNDlCNjE5NENEMzIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo5MDJENkVBREU4RUUxMUUwODY2QkY0OUI2MTk0Q0QzMiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo5MDJENkVBRUU4RUUxMUUwODY2QkY0OUI2MTk0Q0QzMiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PlXiDkoAAAIdSURBVHjaxFfNasJAEN6sSkUIBOLBFktF0Junek+96wOU3tt76716tw/Q3msfQO8a8GhP3iKIpdJ6MBAIiEWE7shaos1m18SfD4ZFd2a/mc3szqyEBNHtdq/IAJKlsgmDSjufz7dF1pQESG/JcE1ERuL4JtIgTrz4IiekEN0TkVPkH+BEhTjx7jaJGcQlMtQDEiNq/0zX40dOFR/R7lElO9Bgku+ReIWyMxklB/EZGV55iTWbzUL9fl+xbftk9Z8syz+ZTMaKRqMLDrlN5IY48AU/wo6Jey9iINV1/XwwGKhu851OB6XTaVPTtE8PJ2TKU/6LnER9CYnBIh6Px7Fms5mdz+ch3r5GIpFFsVg0EonE1EPtDk7AKttLuyAGgB7og52HWsl51DSWVqvVuhAldjoAdh4qSz5Mt9z1W/d6PdWyrJiftAY7sGd9e+DFjHt6ieFwqAQ5Vxz7LPbK8NFoFIicYy+HRRaJx+NIVVVhUtM00WQy4ephdEQIRQ5RiESyLTC98lyRTCatIItz7G1Muw9XpFKpQOQcewPTQu8afS6XMxVFmfohBjuwZ0XtvF511iKFQuED7uttiEEf7DxUdGe2N1haUCCgUIg6IFhY6pv1vEa7U18lFSBQUhHtbstHbyYkl968tsd7Za2PW7vhaH9VPQQxs2/fQyP5j5j3aIA6X9nBo+GBEBtBnkulLZ2AxHrz/Vw6xEPxV4ABAB9p/+75XTbuAAAAAElFTkSuQmCC" alt="">

<script>
jQuery(document).ready(function($) {
  jQuery('#navigationarea .show').click(function () {
    jQuery('#publication-side-toc').fadeIn(); jQuery('.show').fadeOut(); jQuery('.hide').fadeIn();
  });
  jQuery('#navigationarea .hide').click(function () {
    jQuery('#publication-side-toc').fadeOut(); jQuery('.show').fadeIn(); jQuery('.hide').fadeOut();
  });
});
</script>
<?php endif; // (lc_data('x-site-id') === 'ec2012' or lc_data('x-site-id') === 'rio2013') ?>
<nav id="publication-side-toc">
<?php if(count($obj_sections['sections'])) : ?>
  <div>
    <h1><?php echo $obj_sections['title']; ?></h1>
    <ul>
    <?php
    foreach($obj_sections['sections'] as $section) : ?>
      <?php if($section['title']) { ?><h2><?php echo $section['title']; ?></h2><?php }
      foreach($section['articles'] as $article) : ?>
      <li>
        <a href="<?php echo $article['uri'] ; ?>"><?php echo $article['title']; ?></a>
        <?php if($article['lang2_title'] and $article['lang2_uri']): ?>
        | <a href="<?php echo $article['lang2_uri']; ?>"><?php echo $article['lang2_title']; ?></a>
        <?php endif; // ($article['lang2_title'] and $article['lang2_uri']) ?>
      </li>
      <?php
      endforeach; // ($section['articles'] as $article) 
    endforeach; // ($obj_sections as $section) ?>
    </ul>
  </div>
<?php endif; // (count($obj_sections['sections']))?></nav>
