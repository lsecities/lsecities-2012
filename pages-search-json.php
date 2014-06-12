<?php
/**
 * Return list of Pods objects based on URL parameter
 * /search/<pod>
 * 
 * @package LSECities2012
 */

/**
 * Pods initialization
 * URI: /search
 */
 
$pod_type = pods_v( 'last', 'uri' );

if ( 'audio-video-items' === $pod_type ) {
  $obj = LSECitiesWPTheme\media_item\pods_prepare_media_item();
} elseif ( 'articles' === $pod_type ) {
  $obj = \pods_prepare_article_list();
}

echo json_encode( array( 'items' => $obj ) );
?>
