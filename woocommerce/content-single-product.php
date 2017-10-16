<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php 

$product = new WC_Product( get_the_ID() );

// REMOVED WOOCOMMERCE_BEFORE_SINGLE_PRODUCT 


// IF AS IT MAY BE
if ( $product->slug === "as-it-may-be" ) :
	include( get_template_directory() . "/includes/single/content-single-as-it-may-be.php" );
else :
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="product_column">

		<?php // REMOVED WOOCOMMERCE_BEFORE_SINGLE_PRODUCT_SUMMARY 

		// VIDEO IS PRIORITY
		if ( get_field("video") ) { ?>
			<div></div>
		<?php 
		} else if ( get_field("images") ) {
			// SLIDESHOW ?>
			<div id="product_single_slideshow">
				<ul>
					<?php 
					while ( have_rows("images") ) : the_row(); ?>
						<li class="product_single_slide">
							<?php bd_image_object( get_sub_field("image") ); ?>
						</li>
					<?php 
					endwhile;
					?>
				</ul>
			</div>
		<?php 
		} else {
			// PREVIEW IMAGE ?>
			<div>
				<?php bd_image_object( get_field("preview_image") ); ?>
			</div>
		<?php
		}

		?>

	</div>

	<div class="product_column product_column_info">

		<?php // REMOVED WOOCOMMERCE_BEFORE_SINGLE_PRODUCT_SUMMARY ?>

		<h1><?php the_title(); ?></h1>

		<p><?php the_field("technical_info"); ?></p>

		<!-- PUBLISHER LINK -->

		<p class="price"><?php echo $product->get_price_html() . " + shipping"; ?></p>

		<!-- ADD TO CART -->
		<div class="product_single_add_to_cart">
			<?php 
			add_action( 'custom_single_product_summary', 'woocommerce_template_single_add_to_cart', 5 );
			do_action( 'custom_single_product_summary');
			?>
		</div>

	</div>

	<?php 

	// REMOVED WOOCOMMERCE_SINGLE_PRODUCT_SUMMARY 

	// REMOVED WOOCOMMERCE_AFTER_SINGLE_PRODUCT_SUMMARY

	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); 

endif; // END OF AS IT MAY BE CHECK

?>
