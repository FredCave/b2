<?php get_header(); ?>

<div class="bookshop_wrapper page-<?php echo $title; ?>">
	<?php while ( have_posts() ) : the_post();
		the_content();
	endwhile; ?>
</div>

<?php get_footer(); ?>