<?php
/**
 * Template Name: WooCommerce Page
*/

get_header();

do_action('skeleton_inner_wrap_open');

do_action('skeleton_before_content');

$type = get_post_type();

if ($type == 'product') {
    woocommerce_content();
} else {
    get_template_part( '/loops/loop', 'page' );
}

do_action('skeleton_after_content');

if ( is_active_sidebar( 'shop' ) ) {

    do_action('skeleton_before_sidebar');

    dynamic_sidebar( 'shop' );

    do_action('skeleton_after_sidebar');

}

do_action('skeleton_inner_wrap_close');

get_footer();

?>