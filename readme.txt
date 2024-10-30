Count of Products in One Category
Contributors: Silvio Osowsky
Tags: woocommerce, products, category, shortcode, count, inventory, stock, display
Requires at least: 5.8.0
Tested up to: 6.2
Stable tag: 1.0.15
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

This plugin provides a shortcode that displays the count of products in a product category of woocommerce.

== Description ==
This plugin provides a shortcode that displays the count of products in a product category. You can use the shortcode on every page or post. IMPORTANT! This is clearly NOT an official plugin from Woocommerce.

== Installation ==
Upload the plugin files to the /wp-content/plugins/count-of-products-in-category-for-wp-woocommerce directory, or install the plugin through the WordPress plugins screen directly.
Activate the plugin through the 'Plugins' screen in WordPress.
Use the shortcode [so_cp_count] in your page or post content.

== Frequently Asked Questions ==

= How do I use the shortcode? =
Use the [so_cp_count] shortcode in your page or post content. 
You must specify a product category name (slug) in the 'title' parameter. 
This establishes the connection to the category. 
ou can also additionally use the optional attribute 'show_category_name' to customize the output. 
For example, [so_cp_count title="clothing" show_category_name="true"] shows the number of products in the clothing category along with the category name. 
If you set the parameter 'show_category_name' to "false" then the category name will not be displayed, only the number of products in the product category.

== Changelog ==
= 1.0.15 =
Added use only publish products.

= 1.0.14 =
Added feature to exclude products in the trash from product count in the [category_product_count] shortcode.

= 1.0.13 =
Added: Ability to swap out the CSS styles for the plugin to a separate file.

= 1.0.12 =
Removed: get_results fo count

= 1.0.11 =
fix stock

= 1.0.10 =
update "how to use"

= 1.0.9 =
tested up 6.2

= 1.0.8 =
update images in assets

= 1.0.7 =
add images to assets

= 1.0.5 =
Fixed issue with incorrect category name display.

= 1.0.4 =
Added support for optional title and show_category_name shortcode attributes.

= 1.0.3 =
Fixed issue with shortcode not displaying on some pages.

= 1.0.2 =
Fixed issue with incorrect product count display.

= 1.0.1 =
Initial release.
