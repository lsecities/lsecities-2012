<?php
/**
 * Twig and MtHaml integration
 */

namespace LSECitiesWPTheme\Templating;

/**
 * Load and render a Twig+MtHaml template
 * @param string $template_file path to the HAML template file (relative
 *        to the theme's root)
 * @param mixed $template_data data structure to pass to the template
 *        renderer
 * @return string the rendered page
 */
function render_template($template_file, $template_data) {
  $loader = new \Twig_Loader_String();
  $twig = new \Twig_Environment($loader);
  $twig->addExtension(new \MtHaml\Support\Twig\Extension());

  $haml = new \MtHaml\Environment('twig', array('enable_escaper' => false));

  $template = get_stylesheet_directory() . '/' . $template_file;
  $compiled = $haml->compileString(file_get_contents($template), $template);

  return $twig->render($compiled, $template_data);
}
