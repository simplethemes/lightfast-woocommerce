<?php

/**
 * Lightfast Child Theme
 *
 * @category   WordPress
 * @package    Lightfast
 * @author     Simple Themes
 * @copyright  2007-2014 Simple Themes LLC
 * @license    http://www.gnu.org/licenses/gpl.html  GPL 3.0
 * @link       http://www.simplethemes.com/wordpress-themes/theme/lightfast
 *
 *
 * This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 */



/*-----------------------------------------------------------------------------------*/
// WooCommerce Compatibility
/*-----------------------------------------------------------------------------------*/

// Add Theme Support for WC
add_theme_support( 'woocommerce' );

// Wrap WC in native theme functions
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'skeleton_content_wrap_open', 10);
add_action('woocommerce_after_main_content', 'skeleton_content_wrap_close', 10);



// Disable WC styles

function st_dequeue_woo_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );
    return $enqueue_styles;
}
add_filter( 'woocommerce_enqueue_styles', 'st_dequeue_woo_styles' );



// Add custom theme styles to WC

function st_woocommmerce_styles() {
    wp_register_style('woocommerce', get_bloginfo('stylesheet_directory').'/woocommerce.css', array('skeleton-style'), $version, 'screen, projection');
    wp_enqueue_style( 'woocommerce');
}
add_action( 'wp_enqueue_scripts', 'st_woocommmerce_styles');



// Adds a unique WooCommerce 'Shop' widget location

function st_woocommerce_sidebar() {
    register_sidebar( array(
        'name' => __( 'Shop', 'smpl' ),
        'id' => 'shop',
        'description' => __( 'WooCommerce Sidebar', 'smpl' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        )
    );
}
add_action( 'init', 'st_woocommerce_sidebar' );


// 3 products per row

function loop_columns() {
    return 3;
}
add_filter('loop_shop_columns', 'loop_columns');
