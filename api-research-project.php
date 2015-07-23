<?php
namespace LSECitiesWPTheme;
/**
 * Template Name: API/ResearchProject
 * Description: The template used to return a JSON view of a ResearchProject
 *
 * @package LSECities2012
 *
 * URI: /api/v0/research_projects/*
 */
header("Content-Type: application/json");
echo new ResearchProject(pods_v('last', 'url'))->to_json();
