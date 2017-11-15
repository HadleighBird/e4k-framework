<?php
/**
 * Template Name: About Template 3 Template
 */
get_header(); ?>

<?php
$about_template_3_banner = get_field('about_template_3_banner');
?>

<div class="about-template-3-banner" style="background-image: url(<?php echo $about_template_3_banner['url']; ?>);">
    <div class="about-template-3-banner-text">
        <h2><?php the_title(); ?></h2>
    </div>
</div>

<?php
$about_template_3_full_content = get_field('about_template_3_full_content');
$about_template_3_solid_color = get_field('about_template_3_solid_color');
?>

<div class="about-template-3-full" style="background-color: <?php echo $about_template_3_solid_color; ?>;">
    <div class="container">
        <div class="row">
            <div class="about-template-3-full-content col-md-12">
                <?php echo $about_template_3_full_content; ?>
            </div>
        </div>
    </div>
</div>

<?php
$about_template_3_content = get_field('about_template_3_content');
?>

<div class="about-template-3-text">
    <div class="container">
        <div class="row">
            <div class="about-template-3-content col-md-12">
                <?php echo $about_template_3_content; ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer(); ?>