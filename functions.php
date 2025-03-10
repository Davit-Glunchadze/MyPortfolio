<?php
/**
 * MyPortfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MyPortfolio
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function myportfolio_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on MyPortfolio, use a find and replace
		* to change 'myportfolio' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'myportfolio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'myportfolio' ),
			'menu-2' => esc_html__( 'Secondary', 'myportfolio' )
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'myportfolio_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'myportfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function myportfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'myportfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'myportfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function myportfolio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'myportfolio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'myportfolio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'myportfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function myportfolio_scripts() {
	wp_enqueue_style( 'myportfolio-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'myportfolio-style', 'rtl', 'replace' );

	wp_enqueue_script( 'myportfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'myportfolio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * 
 */
/**
 * 
 */
/**
 * import javascript file.
 */

function custom_theme_scripts() {
    // Add and register main.js file
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'custom_theme_scripts');

/**
 * import main-css file.
 */
wp_enqueue_style('main-style', get_template_directory_uri() .  "/assets/main-style.css");

/**
 * import-export ACF
 */
function my_acf_json_save_point( $path ) {
    // Save path
    $path = get_stylesheet_directory() . '/assets/acf-json';
    return $path;
}
add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_load_point( $paths ) {
    // Delete original path (optional) 
    unset($paths[0]);

    // New path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

/**
 * Add custom walker for nav menu
 */
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $icons = array(
            'home'      => '<i class="bi bi-house-door"></i>',
            'about'     => '<i class="bi bi-person"></i>',
            'services'  => '<i class="bi bi-tools"></i>',
            'contact'   => '<i class="bi bi-envelope"></i>',
            'portfolio' => '<i class="bi bi-briefcase"></i>',
            'resume'    => '<i class="bi bi-file-earmark-text"></i>',
        );

        $menu_title = strtolower(trim($item->title)); // პატარა ასოებად გადაყვანა
        $icon = isset($icons[$menu_title]) ? $icons[$menu_title] : '<i class="fa-solid fa-crown"></i>'; // Default icon

        $output .= sprintf(
            '<li class="%s"><a href="%s">%s %s</a>',
            implode(" ", $item->classes),
            esc_url($item->url),
            $icon,
            esc_html($item->title)
        );
    }
}

/**
 * Add Enqueue custom styles
 */
function enqueue_font_awesome() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), '6.4.2');
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome');



/**
 * Remove wordpress admin bar
 */
add_filter('show_admin_bar', '__return_false');

/**
 *  head links
 */
function my_theme_enqueue_styles() {
    // Google Fonts Preconnect
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';

    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap', array(), null);

    // IcoFont
    wp_enqueue_style('icofont', 'https://cdnjs.cloudflare.com/ajax/libs/icofont/1.0.1/css/icofont.min.css', array(), null);

    // Vendor CSS Files
    wp_enqueue_style('bootstrap-grid', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap-grid.min.css');
    wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/vendor/bootstrap-icons/bootstrap-icons.css');
    wp_enqueue_style('glightbox', get_template_directory_uri() . '/vendor/glightbox/css/glightbox.min.css');
    wp_enqueue_style('swiper', get_template_directory_uri() . '/vendor/swiper/swiper-bundle.min.css');
    
    // AOS CSS from CDN
    echo '<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">';
}
add_action('wp_head', 'my_theme_enqueue_styles');

/**
 * footer scripts
 */
function enqueue_custom_scripts() {
    // Main JS File
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);

    // Bootstrap
    wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // PHP Email Form Validation
    wp_enqueue_script('php-email-form', get_template_directory_uri() . '/vendor/php-email-form/validate.js', array(), null, true);

    // Typed.js
    wp_enqueue_script('typed', get_template_directory_uri() . '/vendor/typed.js/typed.umd.js', array(), null, true);

    // PureCounter
    wp_enqueue_script('purecounter', get_template_directory_uri() . '/vendor/purecounter/purecounter_vanilla.js', array(), null, true);

    // Waypoints
    wp_enqueue_script('waypoints', get_template_directory_uri() . '/vendor/waypoints/noframework.waypoints.js', array(), null, true);

    // GLightbox
    wp_enqueue_script('glightbox', get_template_directory_uri() . '/vendor/glightbox/js/glightbox.min.js', array(), null, true);

    // ImagesLoaded
    wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/vendor/imagesloaded/imagesloaded.pkgd.min.js', array(), null, true);

    // Isotope Layout
    wp_enqueue_script('isotope', get_template_directory_uri() . '/vendor/isotope-layout/isotope.pkgd.min.js', array(), null, true);

    // Swiper
    wp_enqueue_script('swiper', get_template_directory_uri() . '/vendor/swiper/swiper-bundle.min.js', array(), null, true);

    // AOS JS from CDN
    wp_enqueue_script('aos', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', array(), null, true);

    // GLightbox JS from CDN
    wp_enqueue_script('glightbox-cdn', 'https://cdn.jsdelivr.net/npm/glightbox@3.0.5/dist/glightbox.min.js', array(), null, true);

    // jsPDF JS from CDN
    wp_enqueue_script('jspdf-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js', array(), null, true);

    // html2pdf JS from CDN
    wp_enqueue_script('html2pdf-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js', array(), null, true);
}
add_action('wp_footer', 'enqueue_custom_scripts');
