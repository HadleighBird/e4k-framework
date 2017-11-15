<?php
/**
 * Controls the fallback of all pages
 */
get_header(); ?>

    <?php while ( have_posts() ): the_post(); ?>
    <article id="single-post" class="ID-<?php echo the_ID(); ?>">
        <div class="container" itemscope itemtype="http://schema.org/Article">
            <div class="post-image">
                <?php if ( has_post_thumbnail() ): ?>
                    <img itemprop="image" src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo the_title(); ?> Image" />
                <?php else: ?>
                    <img itemprop="image" src="https://placehold.it/1440x725.jpg" alt="Placehold Image">
                <?php endif; ?>
            </div>
            <div class="post-title">
                <h1 itemprop="name" class="underline"><?php echo the_title(); ?></h1>
            </div>
            <div class="post-info">
                <p class="post-by" itemprop="author" itemscope itemtype="http://schema.org/Person">Posted By: <span itemprop="name" class="author"><?php the_author(); ?></span></p>
                <p class="post-time" itemprop="datePublished" content="2017-02-03">Posted on: <?php the_time('jS M, Y') ?></p>
            </div>
            <div class="post-content" itemprop="articleBody">
                <?php the_content(); ?>
            </div>
            <?php if ($tags): ?>
            <div class="post-info">
                <?php $tags = get_tags(); ?>
                <p class="tags"> Post Tags:
                    <?php foreach ( $tags as $tag ): ?>
                        <span class="tag tag-badge"><?php echo $tag->name; ?></span>
                    <?php endforeach; ?>
                </p>
            </div>
        	<?php endif; ?>
        </div>
    </article>
    <?php endwhile; ?>

<?php
get_footer(); ?>