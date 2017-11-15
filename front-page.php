<?php
/**
 * Front page file controls the
 * static file for the website
 */
get_header(); ?>

<div id="slider">
	<?php if ( have_rows( 'home_slider' ) ): ?>
		<div class="main-carousel">
			<?php while ( have_rows( 'home_slider' ) ): the_row(); ?>

				<?php
				$slider_images = get_sub_field( 'slider_images' );
				?>

				<div class="carousel-cell">
					<!-- Leave in for SEO Purpose -->
					<!-- <img src="<?php echo $carousel_images['url']; ?>" alt="<?php echo $carousel_images['alt']; ?>" /> -->
					<div class="background-image" style="background-image: url(<?php echo $slider_images['url']; ?>);"></div>
				</div>

			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</div>

<?php
get_footer(); ?>