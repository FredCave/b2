<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

	<div id="bookshop_wrapper" class="bookshop_wrapper">

		<!-- BACK TO MAIN PAGE -->
		<a href="http://biekedepoorter.com">
			Back to main page
		</a>

		<hr>

		<!-- CART -->
		<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
			Cart: <?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> — <?php echo WC()->cart->get_cart_total(); ?>		
		</a>

		<hr>

		<?php 

		do_action( 'woocommerce_before_main_content' );

			if ( have_posts() ) : ?>

				<div id="bookshop_ordering">

					<?php 
					/**
					RESULTS COUNT
					ORDERING OF RESULTS DROPDOWN
					*/
					// do_action( 'woocommerce_before_shop_loop' ); ?>

				</div>

				<div id="bookshop_list">

					<?php 
					woocommerce_product_loop_start();

						woocommerce_product_subcategories();

						while ( have_posts() ) : the_post();

							do_action( 'woocommerce_shop_loop' ); 
	 
								/**
								IMAGE
								TITLE
								PRICE
								ADD TO CART
								*/
								wc_get_template_part( 'content', 'product' );

						endwhile; // END OF THE LOOP

					woocommerce_product_loop_end(); ?>

				</div>

				<?php 
				do_action( 'woocommerce_after_shop_loop' );

			endif;

		do_action( 'woocommerce_after_main_content' );

		// REMOVED WOOCOMMERCE_SIDEBAR HOOK 

		?>

	</div>

<?php get_footer(); ?>
