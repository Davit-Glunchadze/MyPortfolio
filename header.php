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

$header = get_field('header');
$favicon_logo = $header['favicon_logo'];
$profile_image = $header['profile_image'];
$sitename = $header['sitename'];
$social_links = $header['social_links'];
$logo_bottom = $header['logo_bottom'];

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Favicons -->
	<?php if ($favicon_logo) : ?>
    <link href="<?php echo esc_url($favicon_logo['url']); ?>" rel="icon" type="image/png">
	<?php else: ?>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/img/icon/D-con.png" rel="icon" type="image/x-icon">
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'myportfolio' ); ?></a>
		
	<header id="header" class="header dark-background d-flex flex-column">
    	<i class="header-toggle d-xl-none bi bi-list"></i>

		<!-- profile image -->
		<div class="profile-img">
    		<?php if ($profile_image && isset($profile_image['url'])) : ?>
    		    <img src="<?php echo esc_url($profile_image['url']); ?>" 
    		         alt="<?php echo esc_attr($profile_image['alt'] ?: 'profile-photo'); ?>">
    		<?php else: ?>
    		    <img src="<?php echo get_template_directory_uri() . "/assets/img/my-profile-img.jpg"; ?>" 
    		         alt="profile-photo">
    		<?php endif; ?>
		</div>

		<!-- site name -->
		<a href="<?php echo esc_url(home_url('/')); ?>">
    	  <h1 class="sitename"><?php echo $sitename ?> </h1>
    	</a>

		<!-- social links -->
    	<div class="social-links text-center">
			<?php foreach ($social_links as $social) : ?>
				<?php if ($social['logo']) : ?>
					<a href="<?php echo esc_url($social['link']); ?>" target="_blank">
    					<img src="<?php echo esc_url($social['logo']); ?>" alt="icon">
					</a>
				<?php endif; ?>
			<?php endforeach; ?>
    	</div>
		
		<!-- navigation menu -->
		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'walker'         => new Custom_Walker_Nav_Menu(),
				)
			);			
			?>
		</nav>
		<!-- logo bottom -->
		<div class="logo">
			<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logo_bottom);?>" alt="logo"></a>
		</div>
	</header><!-- #masthead -->
