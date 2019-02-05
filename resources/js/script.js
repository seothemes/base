/**
 * Custom JavaScript.
 *
 * @package SeoThemes\Base
 * @author  SEO Themes
 * @license GPL-3.0-or-later
 */

var baseScripts = (function ($) {
    'use strict';

    /**
     * Empty placeholder function.
     *
     * @since 0.1.0
     */
    var functionName = function () {

            // Remove no-js body class.
            $('body').removeClass('no-js');

            // Initialize fitVids script.
            $('.site-container').fitVids();

            // Adjust site inner margin for fixed header.
            var siteInnerMarginTop = 0;

            if ($('.site-header').css('position') === 'fixed') {
                siteInnerMarginTop = $('.site-header').outerHeight();
            }

            $('.site-inner').css('margin-top', siteInnerMarginTop);
        },

        /**
         * Fire events on document ready, and bind other events.
         *
         * @since 0.1.0
         */
        ready = function () {
            functionName();

            // Examples binding to events.
            $(window).on('resize.genesis_starter_theme', functionName);
            $(window).on('scroll.genesis_starter_theme resize.genesis_starter_theme', functionName);
        };

    // Only expose the ready function to the world
    return {
        ready: ready
    };

})(jQuery);

jQuery(baseScripts.ready);
