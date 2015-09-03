<?php
namespace LSECitiesWPTheme;
/**
 * Template Name: API/Article
 * Description: The template used to return a JSON view of an Article
 *
 * @package LSECities2012
 *
 * URI: /api/v0/articles/*
 */
header("Content-Type: application/json");
$obj = new Article(pods_v('last', 'url'));
echo $obj->to_json();
