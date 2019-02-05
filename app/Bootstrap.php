<?php
/**
 * Bootstrap class.
 *
 * This class is is used by the main App class to handle the automatic loading
 * of classes in the `app` directory, as well load the SeoThemes\Core|Theme
 * class by passing the path to the config file to load it's components.
 *
 * @package   SeoThemes\Base
 * @link      https://github.com/seothemes/base
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Base;

use SeoThemes\Core\Theme;

/**
 * Bootstrap class.
 *
 * @package SeoThemes\Base
 */
class Bootstrap {

	/**
	 * @var
	 */
	private $config;

	/**
	 * Bootstrap constructor.
	 *
	 * @param $config
	 */
	public function __construct( $config ) {
		$this->config = $config;
	}

	/**
	 * Initializes the child theme.
	 *
	 * Hooking to `genesis_setup` means we don't have to "start the engine"
	 * by requiring the Genesis `lib/init.php` file, and it provides us
	 * with access to all of Genesis functions once it's been loaded.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'genesis_setup', [ $this, 'setup' ], 15 );
		add_action( 'genesis_setup', [ $this, 'bootstrap' ], 15 );
	}

	/**
	 * Set up child theme using SeoThemes\Core.
	 *
	 * Passes all of the theme configuration over to the core, which is responsible
	 * for instantiating the components and injecting the correct configuration.
	 * Custom components can be created and loaded from the `app/` directory.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function setup() {
		Theme::setup( $this->config );
	}

	/**
	 * Handles the loading of theme files.
	 *
	 * Autoloads all classes in the `app/` directory of the theme. Only loads classes
	 * which have an `init()` method which allows you to selectively load specific
	 * classes. Classes without an `init()` method will not be auto loaded here.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function bootstrap() {
		foreach ( glob( __DIR__ . '/*', GLOB_ONLYDIR ) as $dir ) {
			foreach ( glob( $dir . '/*.php' ) as $file ) {
				$search  = [ dirname( $dir ), '/', '.php' ];
				$replace = [ __NAMESPACE__, '\\', '' ];
				$class   = str_replace( $search, $replace, $file );

				if ( method_exists( $class, 'init' ) && ! array_key_exists( $class, $this->config ) ) {
					$this->$class = new $class();
					$this->$class->init();
				}
			}
		}
	}
}
