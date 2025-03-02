<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MyPortfolio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<!-- Favicons -->
	<link href="<?php echo get_template_directory_uri() . "/assets/img/icon/D-icon.png"?>" rel="icon">
  	<link href="<?php echo get_template_directory_uri() . "/assets/img/apple-touch-icon.png"?>" rel="apple-touch-icon">

  	<!-- Fonts -->
  	<link href="https://fonts.googleapis.com" rel="preconnect">
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icofont/1.0.1/css/icofont.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


  	<!-- Vendor CSS Files -->
  	<!-- <link href="<?php echo get_template_directory_uri() . "/vendor/bootstrap/css/bootstrap-grid.min.css"; ?>" rel="stylesheet"> -->
	<link href="<?php echo get_template_directory_uri() . "/vendor/bootstrap-icons/bootstrap-icons.css"; ?>" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri() . "/vendor/aos/aos.css"; ?>" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri() . "/vendor/glightbox/css/glightbox.min.css"; ?>" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri() . "/vendor/swiper/swiper-bundle.min.css"; ?>" rel="stylesheet">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'myportfolio' ); ?></a>
		
	<header id="header" class="header dark-background d-flex flex-column">
    	<i class="header-toggle d-xl-none bi bi-list"></i>

    	<div class="profile-img">
    	  <img src="<?php echo get_template_directory_uri() . "/assets/img/my-profile-img.jpg" ?>" alt="main-profile-img">
    	</div>

    	<a href="index.html" class="logo d-flex align-items-center justify-content-center">
    	  <h1 class="sitename">David Glunchadze</h1>
    	</a>

    	<div class="social-links text-center">
    	  <a href="#" class="twitter"><img src="<?php echo get_template_directory_uri() . "/assets/img/social/twitter.png" ?>" alt="twiter icon"></a>
    	  <a href="#" class="facebook"><img src="<?php echo get_template_directory_uri() . "/assets/img/social/facebook.png" ?>" alt="facebook icon"></a>
    	  <a href="#" class="instagram"><img src="<?php echo get_template_directory_uri() . "/assets/img/social/instagram.png" ?>" alt="instagram icon"></a>
    	  <a href="#" class="github"><img src="<?php echo get_template_directory_uri() . "/assets/img/social/github.png" ?>" alt="github icon"></a>
    	  <a href="#" class="linkedin"><img src="<?php echo get_template_directory_uri() . "/assets/img/social/linkedin.png" ?>" alt="linkedin icon"></a>
    	</div>

		<nav id="site-navigation" class="main-navigation">
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'myportfolio' ); ?></button> -->
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'walker'         => new Custom_Walker_Nav_Menu(),
				)
			);			
			?>
		</nav><!-- #site-navigation -->
		<div class="logo">
			<a href="#"><img src="<?php echo get_template_directory_uri() . "/assets/img/icon/D-icon.png"?>" alt="logo"></a>
		</div>
	</header><!-- #masthead -->
