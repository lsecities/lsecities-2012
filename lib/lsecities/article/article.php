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
    $this->title = $pod->field('title' . $lang_suffix);
    $this->subtitle = $pod->field('subtitle' . $lang_suffix);
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

  public $article_data_english;
  public $article_data_lang2;

  public $parent_publication;

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
   * @var Array Data structure with content of linked 'grid-style'
   * slideshow (Reveal.js)
   */
  public $grid_slideshow;

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

    $this->permalink = $pod->field('slug');
    $this->title = $pod->field('title');

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
    if($__lang2_slug) {
      $this->lang2['slug'] = $__lang2_slug;
      $this->lang2['name'] = $pod->field('language.name');
    }

    $this->layout = $pod->field('layout');

    $this->parent_publication = [
      'id' => $pod->field('in_publication.id'),
      'title' => $pod->field('in_publication.name')
    ];

    $__publication_pod = pods('publication_wrappers', $this->parent_publication_id);
    lc_data('publication_pod', $__publication_pod);

    // research programmes
    $this->research_programmes = array_map(function($item) { return $item['permalink']; }, $pod->field('research_programmes'));

    // grab the featured image URI
    $this->featured_image_uri = pods_image_url($pod->field('heading_image'), 'original');

    // grab the ToC image URI
    $this->toc_image_uri = pods_image_url($pod->field('cover_image'), 'original');

    $this->article_data_english = new ArticleData($pod, FALSE);
    if($this->lang2) {
      $this->article_data_lang2 = new ArticleData($pod, TRUE);
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
    //$this->about_cities = array_map(function($item) { $country_pod = pods('country', $item['country.id']); $country_name = $country_pod->field('name'); return [ 'permalink' => $item['permalink'], 'name' => $item['name'], 'hierarchical_name' => $country_name . '|' . $item['name'], 'country' => $country_name ]; }, $pod->field('about_cities'));
    $this->about_cities = array_map(function($item) { return new City($item); }, $pod->field('about_cities.permalink'));
    $this->about_countries = array_map(function($item) { return new Country($item); }, $pod->field('about_countries.permalink'));

    $this->authors = $pod->field('authors');

    // fetch any attachments, replace hostname until we switch to WP+Pods for the whole website
    $this->attachments = $pod->field('attachments');

    $__data_gallery_permalink = $pod->field('gallery.slug');
    $this->data_gallery = \LSECitiesWPTheme\photo_gallery_get_galleria_data($__data_gallery_permalink);

    if($pod->field('grid_slideshow.permalink')) {
      $__grid_slideshow = new GridSlideshow($pod->field('grid_slideshow.permalink'));
      $this->grid_slideshow = $__grid_slideshow->to_var();
    }
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
    return json_encode($this->to_var($options),  JSON_PRETTY_PRINT);
  }

  function to_var($options) {
    // set defaults
    if(!array_key_exists('shallow', $options)) {
      $options['shallow'] = FALSE;
    }
    if(!array_key_exists('full_content', $options)) {
      $options['full_content'] = TRUE;
    }

    if($options['full_content']) {
      // TODO: port
      if($options['shallow'] and is_array($this->authors)) {
        // if preparing a shallow object, filter out the array items we don't need
        $__authors = \LSECitiesWPTheme\filter_items($this->authors, ['name', 'family_name']);
      } elseif(is_array($this->authors)) {
        // otherwise, just add the set of full linked objects
        $__authors = $this->authors;
      } else {
        $__authors = NULL;
      }

      $vars = get_object_vars($this);
      unset($vars['pod']);
      unset($vars['authors']);
      $vars['authors'] = $__authors;


      if(TRUE === $options['shallow']) {
        $vars['article_data']->text = NULL;
        $vars['article_data']->extra_content = NULL;
        if($vars['article_data_lang2']) {
          $vars['article_data_lang2']->text = NULL;
          $vars['article_data_lang2']->extra_content = NULL;
        }
      }

      return $vars;
    } else {
      return $this->permalink;
    }
  }
}

class ArticlesList {
  public $articles;

  function __construct() {
    // set default parameter
    $find_params = ['limit' => -1 ];

    $pod = pods('article')->find($find_params);
    $this->articles = [];

    while($pod->fetch()) {
      $this->articles[] = new Article($pod->field('slug'));
    }
  }

  function to_json($options) {
    // set defaults
    if(!array_key_exists('shallow', $options)) {
      $options['shallow'] = FALSE;
    }
    if(!array_key_exists('full_content', $options)) {
      $options['full_content'] = FALSE;
    }

    return json_encode(array_map(function($item) use ($options) { return $item->to_var($options); }, $this->articles), JSON_PRETTY_PRINT);
  }
}

/**
 * Prepare data structure with article data to be used in the Article page
 * template
 * @param String $permalink Permalink of the requested article
 * @param String $request_language The language code for the request. Defaults to en-gb.
 * @return Array The PHP serialization of the Article object, plus page data (current URI, page title, etc.)
 */
function pods_prepare_article($permalink, $request_language = 'en-gb') {
  $__obj = new Article($permalink);
  $obj = $__obj->to_var();

  /**
   * Articles can include content in a second language; this is requested via
   * the last part of the URI path (e.g. /pt-br - default is en-gb); if the
   * requested language matches the article's second language (if any), serve
   * content in this language, otherwise fall back to English
   */
  $obj['article_data'] = $request_language == $obj['lang2']['slug'] ?
    $obj['article_data_lang2'] :
    $obj['article_data_english'];

  /**
   * Check request language and available translations, if any, and create
   * data structure for links to alternate version (translation) of the
   * article.
   */
  if($obj['lang2']['slug']) {
    $obj[translations][] = $obj['lang2']['slug'] === $request_language ?
        [
          'uri' => '../en-gb/',
          'language_name' => 'English'
        ] :
        [
          'uri' => '../' . strtolower($obj['lang2']['slug']) . '/',
          'language_name' => $obj['lang2']['name']
        ];
  }

  /**
   * Add HTML page data
   */
  $__page = new Page();
  $obj['html_page'] = $__page->to_var();

  return $obj;
}
