<?php
/**
 * This file contains everything to do with the Theme.
 * It sets-ups some basic Advanced Custom Fields to kick-start
 * the project along with adding
 * some basic shortcodes for Contact Forms and a basic slider.
 */

/**
 * This turns of zlib output compression. The reason we set this to off
 * is because WordPress always returns an error message
 */
ini_set( 'zlib.output_compression', 'off' );

define( 'THEME_FUNCTIONS', get_theme_file_path( '/framework/theme/functions/' ) );

# Require the Theme Security file (Without this the theme fails)
require_once( THEME_FUNCTIONS . 'theme-security.php' );

# Require the Navbar Walker
require_once( THEME_FUNCTIONS . 'menu-walker.php' );

# Include the Breadcrumbs function, Contact Form shortcode and SEO
include_once( THEME_FUNCTIONS . 'contact-form.php' );
include_once( THEME_FUNCTIONS . 'breadcrumbs.php' );
// include_once( THEME_FUNCTIONS . 'custom-seo.php' );

/**
 * Set-Up Advanced Custom Fields
 */
$acf_options = [
    # Title of the page
    'page_title'    => 'Global Settings',

    # Menu Slug
    'menu_slug' => 'global-settings',

    # The capability required for this menu
    'capability' => 'edit_posts',

    # Set the position for the menu order
    'position' => false,

    /**
     * Icon URL
     * @link https://developer.wordpress.org/resource/dashicons/
     */
    'icon_url' => 'dashicons-admin-site',

    # If set to true, this options page will redirect to the first child page (if a child page exists).
    'redirect' => true,

    /**
     * Post ID - this references the get_field function
     * Read the documentation for more info
     * [Important - Please do not change this unless you fully understand what will happen]
     */
    'post_id' => 'options',

    # Whether to load the option (values saved from this options page) when WordPress starts up.
    'autoload' => false,
];
acf_add_options_page( $acf_options );