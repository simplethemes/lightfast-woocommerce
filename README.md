Lightfast Child theme for WooCommerce
=====================

http://themes.simplethemes.com/lightfast/

Sample child theme which includes the basic functions for wrapping and integrating WooCommerce with the Lightfast WordPress theme. This also registers a new 'Shop' Widget location for shop-specific widgets.


### Instructions

If your starting fresh with Lightfast and WooCommerce, you can install this theme directly.

If you already have a customized Lightfast child theme instaled, you may not want to overwrite yours. In this case, take note of the files in this package and what they represent:


* __functions.php__
    * Includes the basic functions to hook into woocommerce wrappers and replace with the Lightfast layout structure. See the code comments for function descriptions.
* __woocommerce.css__
    * Place this in your child theme directory. This is a clone of the exisiting woocommerce.css with some customizations that work with native Lightfast styles.
* __woocommerce.php__
    * Place this in your child theme directory. This includes a WooCommerce Page template for internal shop pages that do not specifically represent 'Products'.