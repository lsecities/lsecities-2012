<?php
/**
 * Autoload stuff - vendor libraries and our own classes
 */
require_fragment('/vendor/autoload.php');

use MtHaml\Autoloader;
use MtHaml\Environment;

Twig_Autoloader::register();
Autoloader::register();

// Set up class autoloader for our own classes
// spl_autoload_register(function ($class) {
//  include 'lsecities/' . $class . '/' . $class . '.php';
// });
