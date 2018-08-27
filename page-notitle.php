<?php 

/*
	Template name: Page No Title
*/

get_header(); ?>

	<?php 
	if( have_posts() ): 
		while( have_posts() ): the_post(); 
	?>		

			<h3>This is my static title</h3>
			<small>Posted on: <?php the_time( 'F, d, Y' ); ?>, in <?php the_category(); ?></small>
			<p><?php the_content(); ?></p>

	<?php		
		endwhile;
	endif;
	?>

<?php get_footer(); ?>