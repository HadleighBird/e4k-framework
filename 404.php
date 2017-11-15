<?php
/**
 * Custom 404 page
 *
 * This file controls the 404 page of the website
 */
get_header(); ?>

<?php
$company_logo = get_field('company_logo','options');
?>

<section id="error-page">
	<div class="container">
		<div class="row">
			<div class="missing-content-message">
				<h2>The page you have tried to access doesn't exist...</h2>
				<img src="<?php echo $company_logo['url']; ?>"/>
			</div>
		</div>
	</div>
</section>

<?php
get_footer(); ?>