<?php

/**
 * Customize the PATH to ACF to load the Stylesheet etc...
 * @link https://www.advancedcustomfields.com/resources/including-acf-in-a-plugin-theme/
 */
if ( ! function_exists( 'theme_acf_path' ) ):

    function theme_acf_path( $path ) {
        $path = get_theme_file_path( 'framework/acf/' );
        return $path;
    }

    add_filter( 'acf/settings/path', 'theme_acf_path' );

endif;

/**
 * Customize the ACF DIR
 * @link https://www.advancedcustomfields.com/resources/including-acf-in-a-plugin-theme/
 */
if ( ! function_exists( 'theme_acf_dir' ) ):

    function theme_acf_dir( $dir ) {
        # Update PATH
        $dir = get_theme_file_uri( 'framework/acf/' );

        # Return directory PATH
        return $dir;
    }

    add_filter( 'acf/settings/dir', 'theme_acf_dir' );

endif;

# Hide ACF field group menu item
// add_filter('acf/settings/show_admin', '__return_false');

include_once( get_theme_file_path( 'framework/acf/acf.php' ) );

/**
 * ACF Basic Fields like Slider and Global Settings
 */
if ( ! function_exists( 'theme_acf_save_point' ) ):

    function theme_acf_save_point( $path ) {
        # Update PATH
        $path = get_theme_file_path( 'framework/theme/acf-json' );

        # Return PATH
        return $path;
    }
    add_filter('acf/settings/save_json', 'theme_acf_save_point');

endif;

if ( ! function_exists( 'theme_acf_json_point' ) ):

    function theme_acf_json_point( $paths ) {

        # Remove original PATH
        unset( $paths[0] );

        # Append PATHS
        $paths[] = get_theme_file_path( 'framework/theme/acf-json' );

        # Return PATHS
        return $paths;

    }
    add_filter('acf/settings/load_json', 'theme_acf_json_point');

endif;