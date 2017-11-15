<?php
/**
 * This File controls the SEO side of the Theme.
 * Yoast SEO is recommend to make this file contain the best possible SEO
 * settings
 * [Note: We require Yoast SEO to function correctly]
 */

/**
 * Make sure the function is not already exists
 */
if ( ! function_exists( 'theme_opengraph' ) ):

    function theme_opengraph( $output ) {
        return $output . ' prefix="og: http://ogp.me/ns#"';
    }

    add_filter( 'language_attributes', 'theme_opengraph' );

endif;

/**
 * Make sure the function is not already exists
 */
if ( ! function_exists( 'theme_seo' ) ):

    function theme_seo() {
        global $post;

        /**
         * Check to see if the Page is a Blog Post entry
         */
        if ( is_singular() ) {
            /**
             * If the post has a thumbnail use that for
             * the thumbnail image else just return a placeholder
             * for now
             */
            if ( has_post_thumbnail() ) {
                $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
            } else {
                $img_src = 'https://placehold.it/920x425';
            }

            /**
             * If the post has an excerpt use that
             * or just get the site description
             */
            if ( $excerpt = $post->post_excerpt ) {
                $excerpt = strip_tags( $post->post_excerpt );
                $excerpt = str_replace( "", "'", $excerpt );
            } else {
                $excerpt = get_bloginfo( 'description' );
            }
?>

<!-- Site SEO -->
<meta property="og:title" content="<?php echo the_title(); ?>" />
<meta property="og:description" content="<?php echo $excerpt; ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo $excerpt; ?>" />
<meta property="og:description" content="<?php echo $excerpt; ?>" />
<meta property="og:description" content="<?php echo $excerpt; ?>" />


<?php
        }
    }

    add_action( 'wp_head', 'theme_seo', 5 );

endif;