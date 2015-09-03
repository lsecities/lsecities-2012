<?php
namespace LSECitiesWPTheme;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

if(!defined('ARTICLES_PODS_NAME')) {
  define('ARTICLES_PODS_NAME', 'article');
}

class ArticleData {
  public $title;
  public $subtitle;
  public $abstract;
  public $summary;
  public $text;
  public $extra_content;
  public $author_info;
  public $pdf_uri;

  function __construct($pod, $is_lang2 = FALSE) {
    if($is_lang2) {
      $lang_suffix = '_lang2';
    }
    $this->title = $pod->field('name' . $lang_suffix);
    $this->subtitle = $pod->field('article_subtitle' . $lang_suffix);
    $this->abstract = do_shortcode($pod->display('abstract' . $lang_suffix));
    $this->summary = do_shortcode($pod->display('summary' . $lang_suffix));
    $this->text = do_shortcode($pod->display('text' . $lang_suffix));
    $this->extra_content = do_shortcode($pod->display('extra_content' . $lang_suffix));
    $this->author_info = do_shortcode($pod->display('author_info' . $lang_suffix));
    $this->pdf_uri = wp_get_attachment_url($pod->field('article_pdf' . $lang_suffix . '.ID', TRUE));
    if(empty($obj['pdf_uri'])) {
      $this->pdf_uri = $pod->field('article_pdf_uri' . $lang_suffix);
    }
  }
}

class Article extends PodsObject {
  const PODS_NAME = ARTICLES_PODS_NAME;
  const PODS_PAGES_BASE_PATH = '/media/objects/articles';

  const PREFIX_ISTANBUL2009_NEWSPAPER_DOWNLOADS = 'http://v0.urban-age.net/publications/newspapers/';
  const PREFIX_OTHER_PUBLICATIONS_DOWNLOADS = 'http://v0.urban-age.net/0_downloads/';

  public $permalink;
  public $title;

  public $lang2;

  public $article_data;
  public $article_data_lang2;

  public $parent_publication_id;

  public $authors;

  public $tags;
  public $topics;
  public $themes;
  public $about_cities;
  public $about_countries;

  public $layout;
  
  /**
   * @var Array List of permalinks of research programmes associated to this
   * article (e.g. Urban Age, Mellon Programme, etc.)
   */
  public $research_programmes;

  public $featured_image_uri;
  public $toc_image_uri;

  public $publishing_date;

  public $attachments;

  public $data_gallery;

  /**
   * @var Object The Pod object for this ResearchProject
   */
  private $pod;

  /**
   * Construct article object
   *
   * @param String|Integer $permalink The permalink or id for this object
   */
  function __construct($permalink) {
    $this->pod = $pod = pods(self::PODS_NAME, $permalink);

    // return if a Pod cannot be found
    if(!$pod->exists()) {
      return;
    }

    $this->permalink = $pod->field('permalink');
    $this->title = $pod->field('name');

    // TODO: check, move
    global $this_pod;
    $this_pod = new \LC\PodObject($pod, 'Articles');

    // TODO: check, move
    lc_data('pods_toplevel_ancestor', 309);
    global $nav_show_conferences;
    $nav_show_conferences = $pod_from_page;

    // TODO: check, move
    // trim trailing slash (may be added by Varnish)
    $obj['request_language'] = strtolower(pods_var(4, 'url'));//rtrim(strtolower(pods_url_variable('lang', 'get')), '/');

    // TODO: check, move
    // save current path (used to generate links to translation of article, if available)
    $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
    $obj['current_page_uri'] = $uri_parts[0];

    $__lang2_slug = $pod->field('language.slug');
    if($__lang2_slug)
    $this->lang2['slug'] = $__lang2_slug;
    $this->lang2['name'] = $pod->field('language.name');

    $this->layout = $pod->field('layout');

    $this->parent_publication_id = $pod->field('in_publication.id');
    $__publication_pod = pods('publication_wrappers', $this->parent_publication_id);
    lc_data('publication_pod', $__publication_pod);

    // research programmes
    $this->research_programmes = array_map(function($item) { return $item['permalink']; }, $pod->field('research_programmes'));

    // grab the featured image URI
    $this->featured_image_uri = pods_image_url($pod->field('heading_image'), 'original');

    // grab the ToC image URI
    $this->toc_image_uri = pods_image_url($pod->field('cover_image'), 'original');

    $article_data = new ArticleData($pod, FALSE);
    if($this->lang2['slug']) {
      $article_data_lang2 = new ArticleData($pod, TRUE);
    }

    // prepend base URI
    if(!preg_match('/^https?:\/\//i', $obj['pdf_uri']) && !empty($obj['pdf_uri'])) {
      // Istanbul newspaper follows different URI template
      if($pod->field('in_publication.slug') == 'istanbul-city-of-intersections') {
        $obj['pdf_uri'] = PREFIX_ISTANBUL2009_NEWSPAPER_DOWNLOADS . $obj['pdf_uri'];
      } else {
        $obj['pdf_uri'] = PREFIX_OTHER_PUBLICATIONS_DOWNLOADS . $obj['pdf_uri'];
      }
    }

    $this->publishing_date = $pod->field('publishing_date');
    if(!$this->publishing_date) {
      $this->publishing_date = $__publication_pod->field('publishing_date');
    }

    $this->tags = $pod->field('tags');
    $this->themes = array_map(function($item) { return [ 'permalink' => $item['slug'], 'name' => $item['name'] ]; }, $pod->field('themes'));
    $this->topics = array_map(function($item) { return [ 'permalink' => $item['slug'], 'name' => $item['name'] ]; }, $pod->field('topics'));
    $this->about_cities = array_map(function($item) { $country_pod = pods('country', $item['country.id']); $country_name = $country_pod->field('name'); return [ 'permalink' => $item['permalink'], 'name' => $item['name'], 'hierarchical_name' => $country_name . '|' . $item['name'], 'country' => $country_name ]; }, $pod->field('about_cities'));
    $this->about_countries = array_map(function($item) { return [ 'permalink' => $item['permalink'], 'name' => $item['name'] ]; }, $pod->field('about_countries'));

    $this->authors = $pod->field('authors');

    // TODO: check, move
    /*
    if($options['shallow'] and is_array($__article_authors)) {
      // if preparing a shallow object, filter out the array items we don't need
      $obj['article_authors'] = \LSECitiesWPTheme\filter_items($__article_authors, ['name', 'family_name']);
    } elseif(is_array($__article_authors)) {
      // otherwise, just add the set of full linked objects
      $obj['article_authors'] = $__article_authors;
    } else {
      $obj['article_authors'] = NULL;
    }
    */

    // fetch any attachments, replace hostname until we switch to WP+Pods for the whole website
    $this->attachments = $pod->field('attachments');

    $__data_gallery_permalink = $pod->field('gallery.slug');
    $this->data_gallery = \LSECitiesWPTheme\photo_gallery_get_galleria_data($__data_gallery_permalink);
  }

  /**
   * Serialize object vars to JSON
   * @param Array $options An associative array of options:
   *   'shallow' (bool) default: FALSE - If false, most details of linked
   *      objects (people details, etc.) will be added to the returned data
   *      structure; otherwise, only basic data from linked objects will
   *      be added (e.g. people names only)
   * @return String A JSON serialization of the object
   */
  function to_json($options) {
    // set defaults
    if(!array_key_exists('shallow', $options)) {
      $options['shallow'] = FALSE;
    }

    // TODO: port
    if($options['shallow'] and is_array($__article_authors)) {
      // if preparing a shallow object, filter out the array items we don't need
      $obj['article_authors'] = \LSECitiesWPTheme\filter_items($__article_authors, ['name', 'family_name']);
    } elseif(is_array($__article_authors)) {
      // otherwise, just add the set of full linked objects
      $obj['article_authors'] = $__article_authors;
    } else {
      $obj['article_authors'] = NULL;
    }


    $vars = get_object_vars($this);
    unset($vars['pod']);
    $vars['article_data'] = get_object_vars($this->article_data);
    if($this->lang2) {
      $vars['article_data_lang2'] = get_object_vars($this->article_data_lang2);
    }
    return json_encode($vars);
  }
}

function pods_prepare_article($post_id) {
  var_trace($post_id, 'POST_ID');
  /* URI: /media/objects/articles/<article-slug>[?lang=<language>] */

  $pod_slug = get_post_meta($post_id, 'pod_slug', true);
  if($pod_slug) {
    $pod = pods('article', $pod_slug);
    $pod_from_page = true;
  } else {
    $pod = pods('article', pods_var(3, 'url'));
    $pod_from_page = false;
  }
  var_trace('article pod - var 3: '. pods_var(3, 'url'));
  var_trace('article pod - var 4: '. pods_var(4, 'url'));

  return get_article_data($pod);
}

/**
 * Return a data structure with all the articles of a specific type.
 * By default, all articles are added to the list; to filter by
 * type (plain articles or data articles), the optional $type
 * parameter must be used.
 *
 * @param Array $options An associative array of configuration options
 *   'type' (string) default:"all' - The type of article: all, plain, data
 *   'shallow' (bool) default:FALSE - Whether to generate shallow or
 *      full objects for each item (see documentation for get_article_data()
 *      for details
 * @return Array The data structure with all the good stuff
 */
function pods_prepare_article_list($options = []) {
  // check that type parameter is one of the expected values, else return
  if(array_key_exists('type', $options) and 'all' !== $options['type'] and 'plain' !== $options['type'] and 'data' !== $options['type']) {
    trigger_error('invalid type parameter');
    return;
  }

  if(!array_key_exists('type', $options)) {
    $options['type'] = 'all';
  }

  if(array_key_exists('shallow', $options) and !is_bool($options['shallow'])) {
    trigger_error("'shallow' parameter must be bool");
    return;
  }

  if(!array_key_exists('shallow', $options)) {
    $options['shallow'] = FALSE;
  }

  // set default parameter
  $find_params = ['limit' => -1 ];

  if('plain' === $options['type']) {
    $find_params['where'] = 'data_package.id IS NULL';
  } elseif('data' === $options['type']) {
    $find_params['where'] = 'data_package.id IS NOT NULL';
  }

  $pod = pods('article')->find($find_params);
  $articles = array();

  while($pod->fetch()) {
    $articles[] = get_article_data($pod, [ 'shallow' => TRUE ]);
  }

  return $articles;
}
