<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Gender_Balance_Content_WIN
 */

get_header();
?>

<section class="container-fluid d-flex justify-content-center align-items-center">
	<div class="row">

		<div class="col-12 col-md-6 offset-md-3 col-xl-4 offset-xl-4">
			<img class="w-100"src="<?php bloginfo ('stylesheet_directory'); ?>/assets/WIN_logo.png" alt="Women In News">
		</div>
		<div class="col-12 text-center mt-5">
			<h2  class="mt-5">Sorry, this page does not exist</h2>
		</div>
		<div class="col-12 text-center mt-5">
			<a href="<?php echo get_home_url() ?>" class="btn btn-secondary">Go to Gender Balance Content</a>
		</div>

	</div>
</section>

<?php
get_footer();
