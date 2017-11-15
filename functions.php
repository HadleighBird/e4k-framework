<?php
/**
 * Functions file contains all the website functions including:
 * - Navbar Functionality
 * - Advanced Custom Fields ~ Global Options
 *
 * This file is pretty much the same for all our websites.
 */

/**
 * Define the current version of the theme
 */
define( 'THEME_VERSION', '0.96.3' );
define( 'BOOTSTRAP_VERSION', '3.3.7' );

/**
 * More defined elements to make navigating the
 * theme easier
 */
define( 'THEME_FRAMEWORK', get_theme_file_path( '/framework/' ) ); # Theme Framework


/**
 * Make sure the function is not already exists
 */
if ( ! function_exists( 'theme_setup' ) ):

    /**
     * Function sets up the basics for the framework like
     * - Add Custom Menu Support and Register Custom Menus
     * - Add Title Tag Support (For Yoast SEO)
     * - Add Theme Thumbnail Support
     */
    function theme_setup() {
        # Add Menu Support and Register Custom menu
        add_theme_support( 'menus' );
        register_nav_menus(
            [
                'primary-menu'  => 'Primary Menu',
                'footer-menu'   => 'Footer Menu'
            ]
        );

        # Add theme support for thumbnails
        add_theme_support( 'post-thumbnails' );

        # WordPress now mananges the document title
        add_theme_support( 'title-tag' );
    }

    add_action( 'after_setup_theme', 'theme_setup' );

endif;

/**
 * Include Advanced Custom Fields
 * to register with the theme
 */
require_once( THEME_FRAMEWORK . 'theme/acf-setup.php' );

/**
 * Require the Theme Framework
 * to set up the basics ACF Fields like
 * global settings
 */
require_once( THEME_FRAMEWORK . 'theme/theme.php' );

/**
 * Make sure the function is not already exists
 */
if ( ! function_exists( 'load_theme_styles' ) ):

    /**
     * Load required CSS Styles
     */
    function load_theme_styles() {
        /**
         * Register Framework CSS
         * for Responsive layouts
         */
        wp_register_style(
            'bootstrap',
            get_theme_file_uri( 'assets/css/bootstrap.css' ),
            array(),
            BOOTSTRAP_VERSION,
            'all'
        );

        /**
         * Register Mobile Navbar
         */
        wp_register_style(
            'mobile-nav',
            get_theme_file_uri( 'assets/css/mobile-menu.css' ),
            array(),
            THEME_VERSION,
            'all'
        );

        /**
         * Register Slider CSS for Flickity
         */
        wp_register_style(
            'slider',
            get_theme_file_uri( 'assets/css/slider.css' ),
            array(),
            THEME_VERSION,
            'all'
        );

        /**
         * Register Default CSS File
         */
        wp_register_style(
            'main',
            get_stylesheet_uri(),
            array(),
            THEME_VERSION,
            'all'
        );

        /**
         * Enqueue all our Stylesheets
         * after registering them
         */
        wp_enqueue_style( 'bootstrap' );
        wp_enqueue_style( 'mobile-nav' );
        wp_enqueue_style( 'slider' );
        wp_enqueue_style( 'main' );
    }

    add_action( 'wp_enqueue_scripts', 'load_theme_styles' );

endif;

/**
 * Make sure the function is not already exists
 */
if ( ! function_exists( 'load_theme_scripts' ) ):

    /**
     * Load required JavaScript Files
     */
    function load_theme_scripts() {

        /**
         * Register Bootstrap JS
         */
        wp_register_script(
            'bootstrap',
            get_theme_file_uri( 'assets/js/bootstrap.js' ),
            array( 'jquery' ),
            BOOTSTRAP_VERSION,
            true
        );

        /**
         * Theme Main Script
         */
        wp_register_script(
            'form',
            get_theme_file_uri( 'assets/js/form.js' ),
            array( 'jquery' ),
            THEME_VERSION,
            true
        );

        /**
         * Slider Main Script
         */
        wp_register_script(
            'slider',
            get_theme_file_uri( 'assets/js/slider.js' ),
            array( 'jquery' ),
            THEME_VERSION,
            true
        );

        /**
         * Theme Main Script
         */
        wp_register_script(
            'custom',
            get_theme_file_uri( 'assets/js/main.js' ),
            array( 'jquery' ),
            THEME_VERSION,
            true
        );

        # Localize Scripts
        wp_localize_script( 'form', 'ajaxForm',
            array(
                'ajaxurl'   => admin_url( 'admin-ajax.php' ),
            )
        );

        # Enqueue Scripts that are needed on all pages
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'jquery-ui-core' );

        # Enqueue the scripts
        wp_enqueue_script( 'bootstrap' );
        wp_enqueue_script( 'form' );
        wp_enqueue_script( 'slider' );
        wp_enqueue_script( 'custom' );
    }

    add_action( 'wp_enqueue_scripts', 'load_theme_scripts' );

endif;