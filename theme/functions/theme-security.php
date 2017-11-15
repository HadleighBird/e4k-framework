<?php
/**
 * Contains some security settings for WordPress
 * and removes some legacy code from WordPress'
 * header file also adds custom login page style
 */

/**
 * Make sure the function is not already exists
 */
if ( ! function_exists( 'theme_admin_login' ) ):

    function theme_admin_login() {
        /**
         * Register the Admin style
         */
        wp_register_style(
            'theme-admin',
            get_theme_file_uri( 'assets/admin/admin.css' ),
            array(),
            '1.0.0',
            'all'
        );

        /**
         * Enqueue our Stylesheet
         * after registering it
         */
        wp_enqueue_style( 'theme-admin' );
    }

    add_action( 'login_enqueue_scripts', 'theme_admin_login' );

endif;

/**
 * Make sure the function is not already exists
 */
if ( ! function_exists( 'theme_login_url' ) ):
    /**
     * Return the Site URL for Login Image
     * instead of WordPress.org
     */
    function theme_login_url() {
        return site_url();
    }

    add_filter( 'login_headerurl', 'theme_login_url' );

endif;

/**
 * Make sure the function is not already exists
 */
if ( ! function_exists( 'theme_site_info' ) ):
    /**
     * Return E4K Company name for the Login
     * title on the link
     */
    function theme_site_info() {
        return 'Powered by E4K Digital Agency';
    }

    add_filter( 'login_headertitle', 'theme_site_info' );

endif;

/**
 * [Important: Do not remove code below unless you are sure what you are doing]
 */

# Let's disabling Editing in the backend (Stop clients from touching/seeing code)
// define( 'DISALLOW_FILE_EDIT', true );

/**
 * Make sure the function is not already exists
 */
if ( ! function_exists( 'theme_wp_update' ) ):

    # Hide Updates notices from most Plugins that you may use
    function theme_wp_update() {
        remove_action( 'load-update-core.php', 'wp_update_plugins' );
        remove_action( 'admin_notices', 'update_nag', 3 );
        remove_action( 'update_footer', 'core_update_footer', 3 );
    }

    add_action( 'admin_menu', 'theme_wp_update' );

endif;

# Remove WordPress Generator
remove_action( 'wp_head', 'wp_generator' );

/**
 * Make sure the function is not already exists
 */
if ( ! function_exists( 'theme_emojis' ) ):

    /**
     * Remove WordPress Emojis from the website
     */
    function theme_emojis() {
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    }

    add_action( 'init', 'theme_emojis' );

endif;