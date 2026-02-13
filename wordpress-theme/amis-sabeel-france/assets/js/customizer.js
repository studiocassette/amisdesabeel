/**
 * Theme Customizer enhancements for a better user experience.
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

(function($) {
    'use strict';

    wp.customize('amis_sabeel_hero_title', function(value) {
        value.bind(function(to) {
            $('.hero-title').text(to);
        });
    });

    wp.customize('amis_sabeel_hero_description', function(value) {
        value.bind(function(to) {
            $('.hero-description').contents().filter(function() {
                return this.nodeType === 3;
            }).first().replaceWith(to);
        });
    });

    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title a').text(to);
        });
    });

    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });

})(jQuery);
