<?php
/**
 * Application class.
 *
 * This class is essentially a wrapper around the `Container` class that's
 * specific to the framework. This class is meant to be used as the single,
 * one-true instance of the framework. It's used to load up services.
 *
 * @package   SeoThemes\Base
 * @link      https://github.com/seothemes/base
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Base;

/**
 * Application class.
 *
 * @since  1.0.0
 */
class App {

	/**
	 * Config array.
	 *
	 * @since  1.0.0
	 *
	 * @var array $config Child theme config.
	 */
	public $config;

	/**
	 * Theme object.
	 *
	 * @since  1.0.0
	 *
	 * @var \WP_Theme
	 */
	public $theme;

	/**
	 * Theme name.
	 *
	 * @since  1.0.0
	 *
	 * @var string $name
	 */
	public $name;

	/**
	 * Theme URL.
	 *
	 * @since  1.0.0
	 *
	 * @var string $url
	 */
	public $url;

	/**
	 * Theme version.
	 *
	 * @since  1.0.0
	 *
	 * @var string $version
	 */
	public $version;

	/**
	 * Theme handle.
	 *
	 * @since  1.0.0
	 *
	 * @var string $handle
	 */
	public $handle;

	/**
	 * Theme author.
	 *
	 * @since  1.0.0
	 *
	 * @var string $author
	 */
	public $author;

	/**
	 * Theme dir.
	 *
	 * @since  1.0.0
	 *
	 * @var string $dir
	 */
	public $dir;

	/**
	 * Theme uri.
	 *
	 * @since  1.0.0
	 *
	 * @var string $uri
	 */
	public $uri;


	/**
	 * Theme bootstrap.
	 *
	 * @since 1.0.0
	 *
	 * @var object $bootstrap
	 */
	private $bootstrap;

	/**
	 * Constructs the class and defines properties.
	 *
	 * @since 1.0.0
	 *
	 * @param $config
	 *
	 * @return void
	 */
	public function __construct( $config ) {
		$this->config  = $config;
		$this->theme   = wp_get_theme();
		$this->name    = $this->theme->get( 'Name' );
		$this->url     = $this->theme->get( 'ThemeURI' );
		$this->version = $this->theme->get( 'Version' );
		$this->handle  = $this->theme->get( 'TextDomain' );
		$this->author  = $this->theme->get( 'Author' );
		$this->dir     = get_stylesheet_directory();
		$this->uri     = get_stylesheet_directory_uri();
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init() {
		$this->bootstrap = new Bootstrap( $this->config );
		$this->bootstrap->init();
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return false|string
	 */
	public static function name() {
		return wp_get_theme()->get( 'Name' );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return false|string
	 */
	public static function url() {
		return wp_get_theme()->get( 'ThemeURI' );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return false|string
	 */
	public static function version() {
		return wp_get_theme()->get( 'Version' );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return false|string
	 */
	public static function handle() {
		return wp_get_theme()->get( 'TextDomain' );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return false|string
	 */
	public static function author() {
		return wp_get_theme()->get( 'Author' );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function dir() {
		return get_stylesheet_directory();
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function uri() {
		return get_stylesheet_directory_uri();
	}
}
