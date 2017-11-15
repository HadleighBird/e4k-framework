<?php
/**
 * Template Name: About Template 1 Template
 */
get_header(); ?>

<?php
$about_template_1_banner = get_field('about_template_1_banner');
?>

<div class="about-template-1-banner" style="background-image: url(<?php echo $about_template_1_banner['url']; ?>);">
    <div class="about-template-1-banner-text">
        <h2><?php the_title(); ?></h2>
    </div>
</div>

<?php
$about_template_1_content = get_field('about_template_1_content');
?>

<div class="about-template-1-text">
    <div class="container">
        <div class="row">
            <div class="about-template-1-content col-md-12">
                <?php echo $about_template_1_content; ?>
            </div>
        </div>
    </div>
</div>

<div class="about-template-1-repeater">
    <div class="container">
        <div class="row">
            <?php if (have_rows('about_template_1_repeater')): ?>
                <?php while (have_rows('about_template_1_repeater')): the_row() ?>
                    <?php
                    $about_template_1_images = get_sub_field('about_template_1_images');
                    ?>

                    <div class="about-template-1-item col-md-4">
                        <div class="about-template-1-image">
                            <img src="<?php echo $about_template_1_images['url']; ?>"/>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
get_footer(); ?>