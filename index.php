<?php
/**
 * Controls the fallback of all pages
 */
get_header(); ?>



                <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();

                        get_template_part('template-parts/content', get_post_format() );

                        endwhile;
                        else : ?>
                        <?php
                    endif;
                    ?>

<?php
get_footer(); ?>