<?php

function get_projects () {

	$project_query = new WP_Query( 'post_type=projects' );
	if ( $project_query->have_posts() ) { ?>

		<ul>

		<?php
		while ( $project_query->have_posts() ) : $project_query->the_post(); ?>

			<li>
				<p class="home_project_image">
					<?php 
					$image = get_field("preview_image");
					bd_image_object( $image );
					?>
				</p>
				<p class="home_project_title">
					<?php the_title(); ?>	
				</p>	
			</li>

		<?php
		endwhile; ?>

		</ul>

	<?php
	}

}

?>

<div id="home_projects" class="home_section">

	<?php get_projects(); ?>

</div>
