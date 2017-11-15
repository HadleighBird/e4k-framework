<?php
/**
 * The template for displaying the blog page
 *
 * This template displays the blog page and how the content is lad out
 *
 * @package WordPress
 * @since Template 1.0
 *
 */
?>
    <!-- Blog Posts -->
    <article id="blog-<?php echo the_ID(); ?>" class="col m6 s12 blog-card">
        <div class="card">
            <div class="card-image">
                <?php if ( has_post_thumbnail() ): ?>
                    <img class="activator" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo the_title(); ?> Thumbnail" />
                <?php else: ?>
                    <img class="activator" src="http://placehold.it/525x325" alt="Placehold Thumbnail" />
                <?php endif; ?>
            </div>

            <div class="card-content">
                <h3 class="card-title truncate activator"><?php echo the_title(); ?></h3>
                <?php the_excerpt(); ?>
         <div class="blog-link">
                <a href="<?php echo the_permalink(); ?>" class="btn">Read More</a>
            </div>
            </div>

        </div>
    </article>