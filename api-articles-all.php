<?php
namespace LSECitiesWPTheme;
/**
 * Template Name: API/ArticlesAll
 * Description: The template used to return all articles
 *
 * @package LSECities2012
 *
 * URI: /api/v0/articles/all
 */
header("Content-Type: application/json");
$obj = new ArticlesList();

if($_REQUEST['shallow'] === 'true') {
  $options = [ 'shallow' => TRUE ];
}

$options['full_content'] = TRUE;

echo $obj->to_json($options);
