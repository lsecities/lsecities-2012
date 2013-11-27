<?php
namespace LSECitiesWPTheme\publication;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

function pods_prepare_publication($pod_slug) {
  // empty stub, for the moment
  return;
}

/**
 * Prepare the ToC of a publication, to be used
 * in side navigation (article pod) or publication pages
 * @param string $pod_slug the slug of the publication Pod
 * @return array data structure with publication ToC data (articles
 * grouped by section, if applicable)
 */
function pods_prepare_table_of_contents($pod_slug) {
  // retrieve pod by slug
  $pod = pods('publication_wrappers', $pod_slug);
  
  // return if no such pod was found
  if(!$pod->exists()) {
    return;
  }
  
  // initialize output array
  $obj = array();
  
  $obj['title'] = $pod->field('name');
  
  if(count($pod->field('articles'))) {
    $sections = array();
    foreach(preg_split("/\n/", $pod->field('sections')) as $section_line) {
      preg_match("/^(\d+)?\s?(.*)$/", $section_line, $matches);
      array_push($sections, array( 'id' => $matches[1], 'title' => $matches[2]));
    }
    
    if(!count($sections)) {
      $sections = array("010" => "");
    }
    
    foreach($sections as $section) {
      $articles = array();
      
      foreach($pod->field('articles', array('orderby' => 'sequence ASC')) as $article) {
        if(preg_match("/^" . $section['id'] . "/", $article['sequence'])) {
          $article_uri = PODS_BASEURI_ARTICLES . '/' . $article['slug'] . '/en-gb/';
          $article_title = $article['name'];
          if(!empty($article['language']['name'])) {
            $article_lang2_uri = PODS_BASEURI_ARTICLES . '/' . $article['slug'] . '/' . strtolower($article['language']['language_code']) . '/';
            $article_lang2_title = $article['title_lang2'];
            $article_lang2_langname = $article['language']['name'];
          }
          
          $authors = array();
          
          var_trace(var_export($article['authors'], true), 'PUBLICATION_AUTHORS');
          
          foreach($article['authors'] as $author) {
            $authors[] = $author['name'] . ' ' . $author['family_name'];
          }
          
          /**
           * TODO:
           * add fields:
           * heading_image
           */
          $articles[] = array(
            'title' => $article_title,
            'uri' => $article_uri,
            'authors' => $authors,
            'heading_image' => pods_image_url($article['heading_image'], 'original'),
            'lang2_title' => $article_lang2_title,
            'lang2_uri' => $article_lang2_uri,
            'lang2_langname' => $article_lang2_langname
          );
        }
        
        /**
         * TODO:
         * add fields:
         * heading_image
         * authors
         */
        $articles[] = array(
          'title' => $article_title,
          'uri' => $article_uri,
          'lang2_title' => $article_lang2_title,
          'lang2_uri' => $article_lang2_uri,
          'lang2_langname' => $article_lang2_langname
        );
      }
      
      $obj['sections'][] = array(
        'id' => $section['id'],
        'title' => $section['title'],
        'articles' => $articles
      );
    }
  }
  
  return $obj;
}
