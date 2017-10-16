<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="product_column">

		<?php // REMOVED WOOCOMMERCE_BEFORE_SINGLE_PRODUCT_SUMMARY 

		// VIDEO IS PRIORITY
		if ( get_field("video") ) { ?>
			<div></div>
		<?php 
		} else {
			// LOAD THREE SLIDESHOWS

			if ( have_rows("images_en") ) { ?>
				<ul class="lang_en slideshow">
					<?php 
					while ( have_rows("images_en") ) : the_row(); ?>
						<li><?php var_dump( get_sub_field("image") ); // bd_image_object( get_sub_field("image") ); ?></li>
					<?php 
					endwhile; ?>
				</ul>
			<?php 
			}

			if ( have_rows("images_nl") ) { ?>
				<ul class="lang_nl slideshow">
					<?php 
					while ( have_rows("images_nl") ) : the_row(); ?>
						<li><?php bd_image_object( get_sub_field("image") ); ?></li>
					<?php 
					endwhile; ?>
				</ul>
			<?php 
			}

			if ( have_rows("images_fr") ) { ?>
				<ul class="lang_fr slideshow">
					<?php 
					while ( have_rows("images_fr") ) : the_row(); ?>
						<li><?php bd_image_object( get_sub_field("image") ); ?></li>
					<?php 
					endwhile; ?>
				</ul>
			<?php 
			}
		
		}

		?>

	</div>

	<div class="product_column product_column_info">

		<?php // REMOVED WOOCOMMERCE_BEFORE_SINGLE_PRODUCT_SUMMARY ?>

		<h1><?php the_title(); ?></h1>

		<p>Available in 3 languages:</p>

		<ul>
			<li class="lang_selected lang_en">English</li>
			<li class="lang_nl">Dutch</li>
			<li class="lang_fr">French</li>
		</ul>

		<div>
			<?php // LOAD 3 TECHNICAL INFOS:

			if ( get_field("technical_info_en") ) { ?>
				<p class="lang_selected lang_en"><?php the_field("technical_info_en"); ?></p>
			<?php
			}

			if ( get_field("technical_info_nl") ) { ?>
				<p class="lang_nl"><?php the_field("technical_info_nl"); ?></p>
			<?php
			}

			if ( get_field("technical_info_fr") ) { ?>
				<p class="lang_fr"><?php the_field("technical_info_fr"); ?></p>
			<?php
			}

			?>
		</div>

		<p><?php the_field("technical_info"); ?></p>

		<!-- PUBLISHER LINK -->

		<p><?php echo $product->get_price_html() . " + shipping"; ?></p>

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

<?php do_action( 'woocommerce_after_single_product' ); ?>
