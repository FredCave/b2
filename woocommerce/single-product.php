<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<div id="single_book_wrapper" class="bookshop_wrapper">

		<!-- BACK TO MAIN PAGE -->
		<a href="<?php bloginfo("url"); ?>/bookshop">
			Back to bookshop
		</a>

		<hr>

		<!-- CART -->
		<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>">
			Cart: <?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> — <?php echo WC()->cart->get_cart_total(); ?>	
			<span class="view_shopping_cart"> — View your shopping cart</span>	
		</a>

		<hr>

		<?php

		// REMOVED woocommerce_before_main_content
		
			while ( have_posts() ) : the_post();

				wc_get_template_part( 'content', 'single-product' );

			endwhile; // END OF THE LOOP

		do_action( 'woocommerce_after_main_content' );

		// REMOVED WOOCOMMERCE_SIDEBAR HOOK 

		?>

	</div>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
