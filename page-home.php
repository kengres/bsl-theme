<?php
	get_header();
	$post = get_post($_GET['id']);
?>
   
<div class="container">
	<div class="row">
		<div class="col-md-9">

			<div class="home_section home_section1">
				<?php get_template_part('templates/home', 'section1') ?>
			</div>
			

			<div class="home_section home_section2">
				<?php get_template_part('templates/home', 'section2') ?>
			</div>

			<div class="home_section home_section3">
				<?php get_template_part('templates/home', 'section3') ?>
			</div>

		</div>  
		
		<?php get_sidebar(); ?>

	</div> <!-- row -->
</div> <!-- container -->
<?php get_footer(); ?>