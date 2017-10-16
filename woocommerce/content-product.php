<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>

	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	// REMOVED WOOCOMMERCE_BEFORE_SHOP_LOOP_ITEM_TITLE

	?>

	<div class="bookshop_preview">
		<?php bd_image_object( get_field("preview_image"), "visible" ); ?>
	</div>
	
	<div class="bookshop_preview_text">

		<?php
		/**
		 * woocommerce_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		do_action( 'woocommerce_shop_loop_item_title' );

		// REMOVED WOOCOMMERCE_AFTER_SHOP_LOOP_ITEM_TITLE

		?>

		<p>
		
			<?php 

			// PRICE
			echo $product->regular_price . "€ + shipping";

			// REMOVED WOOCOMMERCE_AFTER_SHOP_LOOP_ITEM_TITLE

			// REMOVED WOOCOMMERCE_AFTER_SHOP_LOOP_ITEM

			?>

		</p>

	</div>

</li>
