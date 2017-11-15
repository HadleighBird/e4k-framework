<?php
/**
 * WordPress Footer file - contains mark-up
 * for the footer of the website
 */
?>

	<?php
	$footer_copyright_background_color = get_field('footer_copyright_background_color','options');
	$footer_social_media_background_color = get_field('footer_social_media_background_color','options');
	?>

	<footer id="main-footer" style="background-color: <?php echo $footer_copyright_background_color; ?>;">
		<!-- Social Media Links -->
		<div class="social-media" style="background-color: <?php echo $footer_social_media_background_color; ?>;">
			<div class="container">
				<!-- Social Icons Wrapper -->
				<div class="social-icon-wrap">
					<?php
					/**
					 * Social Media Links
					 */
					$fb_link = get_field( 'facebook', 'options' );
					$twitter_link = get_field( 'twitter', 'options' );
					$google_link = get_field( 'google', 'options' );
					$instagram_link = get_field( 'instagram', 'options' );
					$linkedin_link = get_field( 'linkedin', 'options' );
					?>
					<?php if ( $fb_link ): ?>
					<a class="facebook" href="<?php echo $fb_link; ?>" target="_blank">
						<i class="fa fa-facebook"></i>
					</a>
					<?php endif; ?>
					<?php if ( $twitter_link ): ?>
					<a class="twitter" href="<?php echo $twitter_link; ?>" target="_blank">
						<i class="fa fa-twitter"></i>
					</a>
					<?php endif; ?>
					<?php if ( $google_link ): ?>
					<a class="google" href="<?php echo $google_link; ?>" target="_blank">
						<i class="fa fa-google-plus"></i>
					</a>
					<?php endif; ?>
					<?php if ( $instagram_link ): ?>
					<a class="instagram" href="<?php echo $instagram_link; ?>" target="_blank">
						<i class="fa fa-instagram"></i>
					</a>
					<?php endif; ?>
					<?php if ( $linkedin_link ): ?>
					<a class="linkedin" href="<?php echo $linkedin_link; ?>" target="_blank">
						<i class="fa fa-linkedin"></i>
					</a>
					<?php endif; ?>
				</div>
			</div>
		</div>

	    <!-- Copyright Info -->
		<div class="copyright clearfix">
			<div class="container">
				<p class="text-muted pull-left">Copyright &copy; <?php echo date( 'Y' ); ?> <?php echo bloginfo( 'name' ); ?>. All Rights Reserved</p>
				<p class="text-muted powered-by">Powered By <a href="//www.e4k.co" target="_blank">E4K Digital Agency</a></p>
			</div>
		</div>
	</footer>


<!-- WordPress Footer -->
<?php wp_footer(); ?>
</body>
</html>