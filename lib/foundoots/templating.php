<?php
/**
 * Twig and MtHaml integration
 */

namespace FoundootsWPTheme\Templating;

/**
 * Load and render a Twig+MtHaml template
 * @param string $template_root The full path to template root
 * @param string $template_file Path to the HAML template file (relative
 *        to the theme's root)
 * @param mixed $template_data Data structure to pass to the template
 *        renderer
 * @return string The rendered template
 */
function render_template($template_root, $template_file, $template_data) {
  $haml = new \MtHaml\Environment('twig', [ 'enable_escaper' => false ]);

  $loader = new \Twig_Loader_Filesystem([
    $template_root
  ]);
  
  $hamlLoader = new \MtHaml\Support\Twig\Loader($haml, $loader);
  
  $twig = new \Twig_Environment($hamlLoader);
  
  $twig->addExtension(new \MtHaml\Support\Twig\Extension($haml));

  return $twig->render($template_file, $template_data);
}

/**
 * Thin wrapper for Foundoots' Twig+MtHaml templating, meant to be
 * an almost-drop-in replacement for WordPress' get_template_part()
 *
 * TODO: look for templates up the starter theme chain (e.g. final
 * theme, foundoots, roots)
 */
function foundoots_get_template_part($template_file, $data) {
  // echo '<!-- ' . var_export($data, TRUE) . ' -->';

  echo render_template(lc_data('template_root'), $template_file . '.haml', $data);
}
