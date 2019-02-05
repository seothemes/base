<?php
/**
 * Theme functions file.
 *
 * This file is used to bootstrap the child theme.
 *
 * @package   SeoThemes\Base
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-3.0-or-later
 * @link      https://github.com/seothemes/base
 */

namespace SeoThemes\Base;

/*
|--------------------------------------------------------------------------
| Run Composer autoloader.
|--------------------------------------------------------------------------
|
| Auto-load any projects via the Composer autoloader. Be sure to check if the
| file exists in case someone is using Composer to load their dependencies
| in a different directory. This also autoloads our child theme classes.
|
*/

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

/*
|--------------------------------------------------------------------------
| Create new application.
|--------------------------------------------------------------------------
|
| Creates the one true instance of the child theme application. You may access
| this instance via the `$child_theme` variable or access the static methods
| which the application provides for you after the application has booted.
|
*/

$child_theme = new App( require __DIR__ . '/config/defaults.php' );

/*
|--------------------------------------------------------------------------
| Initialize the application.
|--------------------------------------------------------------------------
|
| Calls the application's `init()` method, which launches the application.
| Pat yourself on the back for a job well done. To see what happens next,
| head over to the `app/App.php` file and dig through the code.
|
*/

$child_theme->init();
