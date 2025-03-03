<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MyPortfolio
 */

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

		<div class="container">
		  <div class="copyright text-center ">
			<p>© <span>Copyright</span> <strong class="px-1 sitename">iPortfolio</strong> <span>All Rights Reserved</span></p>
		  </div>
		  <div class="credits">
			Designed by <a href="https://getbootstrap.com/" target="_blanck">Bootstrap,</a> main theme by <a href="https://underscores.me/" target="_blanck">underscore</a>
		  </div>
		</div>

	</footer>
</div><!-- #page -->


<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<?php wp_footer(); ?>

</body>
</html>
