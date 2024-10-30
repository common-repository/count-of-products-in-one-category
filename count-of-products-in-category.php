<?php
/**
* Plugin Name: Count of Products in One Category
* Plugin URI: https://plugin.wp.osowsky-webdesign.de/count-of-products
* Description: This plugin provides a shortcode that displays the count of products in a product category of woocommerce. You can use the shortcode on every page or post. IMPORTANT! This is clearly NOT an official plugin from Woocommerce.
* Version: 1.0.15
* Requires at least: 5.8.0
* Requires PHP:      7.2
* Tested up to: 6.2
* Author: Silvio Osowsky
* License: GPLv3 or later
* License URI: https://www.gnu.org/licenses/gpl-3.0.html
* Author URI: https://osowsky-webdesign.de/
*/

function so_category_product_count_scripts() {
    wp_enqueue_style( 'count-of-products', plugin_dir_url( __FILE__ ) . 'count-of-products.css', array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'so_category_product_count_scripts' );

function so_category_product_count_shortcode( $atts ) {
    global $wpdb;
    $prefix = $wpdb->prefix;

    // shortcode attributes
    $atts = shortcode_atts( array(
        'title' => '',
        'show_category_name' => true,
    ), $atts, 'category_product_count' );
  
    // get category id
    $category_id = get_term_by( 'slug', wp_strip_all_tags($atts['title']), 'product_cat' )->term_id;

    // get products in category with stock greater than zero
    $sql = "SELECT COUNT(*) 
        FROM {$prefix}posts p
        INNER JOIN {$prefix}term_relationships tr ON p.ID = tr.object_id
        INNER JOIN {$prefix}term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
        INNER JOIN {$prefix}terms t ON tt.term_id = t.term_id
        INNER JOIN {$prefix}postmeta pm ON p.ID = pm.post_id
        WHERE p.post_type = 'product'
        AND t.slug = '".wp_strip_all_tags($atts['title'])."'
        AND pm.meta_key = '_stock'
        AND pm.meta_value > 0
        AND p.post_status = 'publish'";
    $product_count = $wpdb->get_var($sql);

    // build output string
    $output = '<div class="so-cp-count-wrapper">';
    if ( wp_strip_all_tags($atts['show_category_name']) == 'true' ) {
        $output .= '<span class="so-cp-count-category-name">' . get_term_by('slug', $atts['title'], 'product_cat')->name . '</span>';
    }
    $output .= '<span class="so-cp-count-product-count">(' . $product_count . ')</span>';
    $output .= '</div>';

    // return output
    return $output;
}

add_shortcode( 'so_cp_count', 'so_category_product_count_shortcode' );
