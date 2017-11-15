<?php
/**
 * SEO for all of our E4K sites
 * this is used in favour of an SEO Plugin
 * as some times they can add unnesscary stuff to
 * our site
 */

if ( !function_exists( 'seo_opengraph' ) ):

    function seo_opengraph( $output )
    {
        return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
    }
    add_filter( 'language_attributes', 'seo_opengraph' );

endif;

if ( ! function_exists( 'theme_seo' ) ):

    global $post;

    if ( is_single() )
    {
        if ( has_post_thumbnail( $post->ID ) )
        {
            $img_src = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
        }


        if ( $content = $post->post_content )
        {
            $content = substr( strip_tags( $post->post_content ), 0, 145);
            $content = str_replace( "", "'", $content );
        }
        ?>

        <!-- Meta Tags -->
        <meta name="keywords" content="<?php echo strip_tags( get_the_tag_list( '', '', '', '' ) ) ?>">
        <meta name="description" content="<?php echo $content; ?>">
        <meta name="language" content="<?php bloginfo( 'language' ); ?>">
        <meta name="copyright" content="Copyright <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>">
        <meta name="">
    }

endif;