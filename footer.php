<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

$header = get_field('header');
$sitename = $header['sitename'];
$social_links = $header['social_links'];

$footer = get_field('footer');
$footer_quotes = $footer['footer_quotes'];
$footer_logo = $footer['footer_logo'];

// echo '<pre>';
// print_r($footer_logo);
// echo '</pre>';
?>

	<footer id="footer" class="footer position-relative light-background">

		<nav id="footer-navigation" class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'myportfolio' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'secondary-menu',
					'walker'         => new Custom_Walker_Nav_Menu(),
				)
			);			
			?>
		</nav>

		<!-- quotes name -->
		<div class="footer-quotes">
			<h3><?php echo $footer_quotes ?></h3>
		</div>

		<!-- footer logo -->
		<div class="footer-logo">
    		<a href="<?php echo esc_url(home_url('/')); ?>">
    		    <img src="<?php echo esc_url($footer_logo); ?>" alt="footer logo">
    		</a>
		</div>


		<div class="container">
		<div class="credits">
			Designed by <a href="https://getbootstrap.com/" target="_blank">Bootstrap,</a> main theme by <a href="https://underscores.me/" target="_blank">underscore</a>
		  </div>
		</div>

		

	</footer>
</div><!-- #page -->


<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>
<script src="<?php echo get_template_directory_uri(). '/vendor/glightbox/js/glightbox.js'?>"></script>
<script src="<?php echo get_template_directory_uri(). '/vendor/isotope-layout/isotope.pkgd.min.js'?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(). '/vendor/imagesloaded/imagesloaded.pkgd.min.js'?>"></script>
<script src="<?php echo get_template_directory_uri(). '/js/main.js'?>"></script>



<?php wp_footer(); ?>

</body>
</html>
