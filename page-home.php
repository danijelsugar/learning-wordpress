<?php get_header(); ?>

<div class="row justify-content-center">

	<div class="col xs 12">

		<div id="learning-carousel" class="carousel slide" data-ride="carousel">
			
			<!-- Wrapper for slides -->
			<div class="carousel-inner">

				<?php 

					$args_cat = array(
						'include' => '16, 14, 15'
					);

					$categories = get_categories( $args_cat );
					$count = 0;
					$bullets = '';
					foreach($categories as $category):

						$args = array(
							'type' => 'post',
							'posts_per_page' => 1,
							'category__in' => $category->term_id,
						);

						$lastBlog = new WP_Query( $args );

						if( $lastBlog->have_posts() ): 

							

							while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

								<div class="carousel-item <?php if($count === 0): echo 'active'; endif; ?>">
									<?php the_post_thumbnail('full'); ?>
									<div class="carousel-caption">
									    <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
										<small><?php the_category(' '); ?></small>
									</div>
								</div>

								<?php $bullets .= '<li data-target="#learning-carousel" data-slide-to="'.$count.'" class="'; ?>
								<?php if($count === 0): $bullets .='active'; endif; ?>
								<?php $bullets .='"></li>' ?>

								<?php endwhile;
						endif;


						wp_reset_postdata();
						$count++;	
					endforeach;
				?>
				
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php echo $bullets; ?>
				</ol>

			</div>

			<!-- Controls -->
			<a class="carousel-control-prev" href="#learning-carousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#learning-carousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

	</div>

</div>
<div class="row">


	<div class="col-xs-12 col-sm-8">

		<?php 
		if( have_posts() ): 
			while( have_posts() ): the_post(); ?>	

				<?php get_template_part( 'content', get_post_format() ); ?>

				<?php		
			endwhile;
		endif;


		//PRINT OTHER 2 POSTS NO FIRST ONE
/*
		$args = array(
			'type' => 'post',
			'posts_per_page' => 2,
			'offset' => 1
		);

		$lastBlog = new WP_Query( $args );

		if( $lastBlog->have_posts() ): 
			while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>	

				<?php get_template_part( 'content', get_post_format() ); ?>

				<?php		
			endwhile;
		endif;


		wp_reset_postdata();
*/
		?>

		

		<?php 

		//PRINT ONLY LOREM
/*
		$lastBlog = new WP_Query( 'type=post&posts_per_page=-1&cat=16' );

		if( $lastBlog->have_posts() ): 
			while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>	

				<?php get_template_part( 'content', get_post_format() ); ?>

				<?php		
			endwhile;
		endif;


		wp_reset_postdata();
*/
		?>

	</div>
	<div class="col-xs-12 col-sm-4">
		<?php get_sidebar(); ?>
	</div>
</div>



<?php get_footer(); ?>