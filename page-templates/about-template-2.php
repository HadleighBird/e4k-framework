<?php
/**
 * Template Name: About Template 2 Template
 */
get_header(); ?>

<?php
$about_template_2_banner = get_field('about_template_2_banner');
?>

<div class="about-template-2-banner" style="background-image: url(<?php echo $about_template_2_banner['url']; ?>);">
    <div class="about-template-2-banner-text">
        <h2><?php the_title(); ?></h2>
    </div>
</div>

<?php
$about_template_2_content = get_field('about_template_2_content');
$about_template_2_image = get_field('about_template_2_image');
?>

<div class="about-template-2-content">
    <div class="container">
        <div class="row">
            <div class="about-template-2-text col-md-6">
                <?php echo $about_template_2_content; ?>
            </div>
            <div class="about-template-2-image col-md-6">
                <img src="<?php echo $about_template_2_image['url']; ?>"/>
            </div>
        </div>
    </div>
</div>

<?php
get_footer(); ?>