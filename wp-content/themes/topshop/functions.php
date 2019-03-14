<?php
/**
 * topshop functions and definitions
 *
 * @package topshop
 */
define( 'TOPSHOP_THEME_VERSION' , '1.3.13' );

// Upgrade / Order Premium page
require get_template_directory() . '/upgrade/upgrade.php';

// Load WP included scripts
require get_template_directory() . '/includes/inc/template-tags.php';
require get_template_directory() . '/includes/inc/extras.php';
require get_template_directory() . '/includes/inc/jetpack.php';
require get_template_directory() . '/includes/inc/customizer.php';

// Load Customizer Library scripts
require get_template_directory() . '/customizer/customizer-options.php';
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';
require get_template_directory() . '/customizer/styles.php';
require get_template_directory() . '/customizer/mods.php';

// Load TGM plugin class
require_once get_template_directory() . '/includes/inc/class-tgm-plugin-activation.php';
// Add customizer Upgrade class
require_once( get_template_directory() . '/includes/topshop-pro/class-customize.php' );

if ( ! function_exists( 'topshop_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function topshop_theme_setup() {
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on topshop, use a find and replace
	 * to change 'topshop' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'topshop', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    
    add_image_size( 'topshop_blog_img_side', 352, 230, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'topshop' ),
        'top-bar' => __( 'Top Bar Menu', 'topshop' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	
	// The custom header is used for the logo
	add_theme_support( 'custom-header', array(
		'width'         => 280,
		'height'        => 91,
		'flex-width'    => true,
		'flex-height'   => true,
		'header-text'   => false,
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'topshop_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );
    
    add_theme_support( 'title-tag' );remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

	
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
endif; // topshop_theme_setup
add_action( 'after_setup_theme', 'topshop_theme_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function topshop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'topshop' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
	
	register_sidebar(array(
		'name' => __( 'TopShop Footer Left', 'topshop' ),
		'id' => 'topshop-site-footer',
        'description' => __( 'The footer will divide into however many widgets are put here.', 'topshop' )
	));
    register_sidebar(array(
        'name' => __( 'TopShop Footer Center', 'topshop' ),
        'id' => 'topshop-site-footer2',
        'description' => __( 'The footer will divide into however many widgets are put here.', 'topshop' )
    ));
    register_sidebar(array(
        'name' => __( 'TopShop Footer Right', 'topshop' ),
        'id' => 'topshop-site-footer3',
        'description' => __( 'The footer will divide into however many widgets are put here.', 'topshop' )
    ));
}
add_action( 'widgets_init', 'topshop_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function topshop_theme_scripts() {
    wp_enqueue_style( 'topshop-google-body-font-default', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic', array(), TOPSHOP_THEME_VERSION );
    wp_enqueue_style( 'topshop-google-heading-font-default', '//fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,400,300', array(), TOPSHOP_THEME_VERSION );
    
	wp_enqueue_style( 'topshop-font-awesome', get_template_directory_uri().'/includes/font-awesome/css/font-awesome.css', array(), '4.7.0' );
	wp_enqueue_style( 'topshop-style', get_stylesheet_uri(), array(), TOPSHOP_THEME_VERSION );
    wp_enqueue_style( 'topshop-woocommerce-style', get_template_directory_uri().'/templates/css/topshop-woocommerce-style.css', array(), TOPSHOP_THEME_VERSION );
	
	wp_enqueue_style( 'topshop-header-standard-style', get_template_directory_uri().'/templates/css/topshop-header-standard.css', array(), TOPSHOP_THEME_VERSION );

	wp_enqueue_script( 'topshop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), TOPSHOP_THEME_VERSION, true );
	wp_enqueue_script( 'topshop-caroufredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
	
	if ( get_theme_mod( 'topshop-sticky-header' ) ) {
		wp_enqueue_script( 'topshop-waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
	    wp_enqueue_script( 'topshop-waypoints-sticky', get_template_directory_uri() . '/js/waypoints-sticky.min.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
        wp_enqueue_script( 'topshop-waypoints-custom', get_template_directory_uri() . '/js/waypoints-custom.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
	}
	
	wp_enqueue_script( 'topshop-customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'), TOPSHOP_THEME_VERSION, true );

	wp_enqueue_script( 'topshop-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), TOPSHOP_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'topshop_theme_scripts' );

/**
 * Print TopShop styling settings.
 */
function topshop_print_styles() {
    $topshop_custom_css = '';
    if ( get_theme_mod( 'topshop-custom-css', false ) ) {
        $topshop_custom_css = get_theme_mod( 'topshop-custom-css' );
    } ?>
    <style type="text/css" media="screen">
        <?php echo htmlspecialchars_decode( $topshop_custom_css ); ?>
    </style>
<?php
}
add_action('wp_head', 'topshop_print_styles', 11);

/**
 * Enqueue topshop custom customizer styling.
 */
function topshop_load_customizer_script() {
	wp_enqueue_script( 'topshop-customizer-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
    wp_enqueue_style( 'topshop-customizer-css', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'topshop_load_customizer_script' );

/**
 * Enqueue admin styling.
 */
function topshop_load_admin_script() {
    wp_enqueue_style( 'topshop-admin-css', get_template_directory_uri() . '/upgrade/css/admin-css.css' );
}
add_action( 'admin_enqueue_scripts', 'topshop_load_admin_script' );

// Create function to check if WooCommerce exists.
if ( ! function_exists( 'topshop_is_woocommerce_activated' ) ) :
    
function topshop_is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
}

endif; // topshop_is_woocommerce_activated

if ( topshop_is_woocommerce_activated() ) {
    require get_template_directory() . '/includes/inc/woocommerce-inc.php';
}

/**
 * Adjust is_home query if topshop-blog-cats is set
 */
function topshop_set_blog_queries( $query ) {
    $topshop_blog_query_set = '';
    if ( get_theme_mod( 'topshop-blog-cats', false ) ) {
        $topshop_blog_query_set = get_theme_mod( 'topshop-blog-cats' );
    }
    
    if ( $topshop_blog_query_set ) {
        // do not alter the query on wp-admin pages and only alter it if it's the main query
        if ( !is_admin() && $query->is_main_query() ){
            if ( is_home() ){
                $query->set( 'cat', $topshop_blog_query_set );
            }
        }
    }
}
add_action( 'pre_get_posts', 'topshop_set_blog_queries' );

/**
 * Exclude the selected slider category from the categories widget
 */
function topshop_exclude_slider_categories_widget( $args ) {
	$exclude = ''; // ID's of the categories to exclude
	if ( get_theme_mod( 'topshop-slider-cats', false ) ) {
        $exclude = get_theme_mod( 'topshop-slider-cats' );
    }
	$args['exclude'] = $exclude;
	return $args;
}
add_filter( 'widget_categories_args', 'topshop_exclude_slider_categories_widget' );

/**
 * Display recommended plugins with the TGM class
 */
function topshop_register_required_plugins() {
	$plugins = array(
		// The recommended WordPress.org plugins.
		array(
            'name'      => __( 'Elementor Page Builder', 'topshop' ),
            'slug'      => 'elementor',
            'required'  => false,
        ),
		array(
			'name'      => __( 'WooCommerce', 'topshop' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => __( 'Breadcrumb NavXT', 'topshop' ),
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
		),
		array(
			'name'      => __( 'Meta Slider', 'topshop' ),
			'slug'      => 'ml-slider',
			'required'  => false,
		)
	);
	$config = array(
		'id'           => 'topshop',
		'menu'         => 'tgmpa-install-plugins',
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'topshop_register_required_plugins' );

/**
 * Elementor Check
 */
if ( ! defined( 'ELEMENTOR_PARTNER_ID' ) ) {
    define( 'ELEMENTOR_PARTNER_ID', 2118 );
}

/**
 * Register a custom Post Categories ID column
 */
function topshop_edit_cat_columns( $topshop_cat_columns ) {
    $topshop_cat_in = array( 'cat_id' => 'Category ID <span class="cat_id_note">For the Default Slider</span>' );
    $topshop_cat_columns = topshop_cat_columns_array_push_after( $topshop_cat_columns, $topshop_cat_in, 0 );
    return $topshop_cat_columns;
}
add_filter( 'manage_edit-category_columns', 'topshop_edit_cat_columns' );

/**
 * Print the ID column
 */
function topshop_cat_custom_columns( $value, $name, $cat_id ) {
    if( 'cat_id' == $name ) 
        echo $cat_id;
}
add_filter( 'manage_category_custom_column', 'topshop_cat_custom_columns', 10, 3 );

/**
 * Insert an element at the beggining of the array
 */
function topshop_cat_columns_array_push_after( $src, $topshop_cat_in, $pos ) {
    if ( is_int( $pos ) ) {
        $R = array_merge( array_slice( $src, 0, $pos + 1 ), $topshop_cat_in, array_slice( $src, $pos + 1 ) );
    } else {
        foreach ( $src as $k => $v ) {
            $R[$k] = $v;
            if ( $k == $pos )
                $R = array_merge( $R, $topshop_cat_in );
        }
    }
    return $R;
}
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
 
function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'RUB': $currency_symbol = ' руб.'; break;
     }
     return $currency_symbol;
}add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');

function translate_text($translated) {
$translated = str_ireplace('Подытог', 'Итого', $translated);
return $translated;
}

function add_header_widget() {

    register_sidebar( array(
        'name'          => 'Header widget',
        'id'            => 'header_widget',
        'before_widget' => '<div class="custom_search">',
        'after_widget'  => '</div>',
    ) );

}
add_action( 'widgets_init', 'add_header_widget' );


function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    <?php

    $fragments['a.cart-customlocation'] = ob_get_clean();

    return $fragments;

}
// add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
// function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
//     if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
// 		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart " data-product_id="' . $product->get_id() . '" method="post" enctype="multipart/form-data">';
// 		$html .= woocommerce_quantity_input( array(), $product, false );
// 		$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
////        $html .= '<a action="' . esc_url( $product->add_to_cart_url() ) . '" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' . $product->get_id() . '">' . esc_html( $product->add_to_cart_text() ) . '</a>';
// 		$html .= '</form>';
//
// 	}
// 	return $html;
// }
add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_loop_ajax_add_to_cart', 10, 2 );
function quantity_inputs_for_loop_ajax_add_to_cart( $html, $product ) {
    if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
        // Get the necessary classes
        $class = implode( ' ', array_filter( array(
            'button',
            'product_type_' . $product->get_type(),
            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
            $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
        ) ) );

        // Adding embeding <form> tag and the quantity field
        $html = sprintf( '%s%s<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>%s',
            '<form class="cart">',
            woocommerce_quantity_input( array(), $product, false ),
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $quantity ) ? $quantity : 1 ),
            esc_attr( $product->get_id() ),
            esc_attr( $product->get_sku() ),
            esc_attr( isset( $class ) ? $class : 'button' ),
            esc_html( $product->add_to_cart_text() ),
            '</form>'
        );
    }
    return $html;
}

add_action( 'wp_footer' , 'archives_quantity_fields_script' );
function archives_quantity_fields_script(){
    if( !is_shop() || !is_product_category() || !is_product_tag() ): ?>
        <script type='text/javascript'>
            jQuery(function($){
                // Update quantity on 'a.button' in 'data-quantity' attribute (for ajax)
                $('form.cart').on('change', 'input.qty', function() {
                    if ($(this).val() === '0')
                        $(this).val('1');
                    $(this).closest('form.cart').find( 'a.add_to_cart_button').attr('data-quantity', $(this).val());
                });
            });
        </script>
    <?php endif;
}

