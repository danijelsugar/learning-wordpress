<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Learning Theme</title>
	<?php wp_head(); ?>
</head>

<?php 

if( is_front_page() ):
	$awesomeClasses = array( 'learning-class', 'my-class' );
else:
	$awesomeClasses = array( 'not-learning-class' );
endif;
?>


<body <?php body_class( $awesomeClasses ); ?>>

	<div class="container">

		<div class="row">

			<div class="col-lg-12">

				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<a class="navbar-brand" href="#">Learning Theme</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
					    <?php 
				        	wp_nav_menu( array( 
					        	'theme_location' => 'primary', 
					        	'container' => false,
					        	'menu_class' => 'navbar-nav ml-auto'
					        	) 
				        	);

					    ?>
					</div>
				</nav>

				
			</div>

		</div>

	<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="">
	