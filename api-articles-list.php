<?php
namespace LSECitiesWPTheme;
/**
 * Template Name: API/ArticlesList
 * Description: The template used to return a list of articles
 *
 * @package LSECities2012
 *
 * URI: /api/v0/articles/list
 */
header("Content-Type: application/json");
$obj = new ArticlesList();

echo $obj->to_json();
