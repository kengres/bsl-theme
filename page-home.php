<?php
	get_header();
	$post = get_post($_GET['id']);
?>
   
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<div class="col-md-9">
                    <div class="tur-name-wr">
                    	<div class="name_tour ">
							<div class="name_tour_text">
								<span style="font-size: x-large;"><?php the_title(); ?></span>
							</div>
							<div></div>
						</div>

						<?php the_content(); ?>
					</div>  
				</div>
			<?php endwhile; else : ?>
				<div class="col-md-9">
					<h1>Не найдено</h1>
					<p>Извините, но того, что Вы искали, тут нет.</p>
				</div>
			<?php endif; ?>
    
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>