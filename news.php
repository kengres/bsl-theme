<?php /* Template Name: news */
	get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
       		<div class="col-md-9">
        	<div class="name_tour">
            	<div class="name_tour_text">Новости</div>
        	</div>
        	<div class="fixpost">
        	<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				query_posts( array('post_type'=>'post','category_name'=>'novosti','posts_per_page'=>10, 'paged' => $paged));
              	if( have_posts() ) : while( have_posts() ) : the_post(); ?>
					<div class="news-wr">
						<div class="news-info">
							<?php the_post_thumbnail(); ?>
							<span>
                    			<?php the_title(); ?>
                			</span>
                			<p><?php do_excerpt(get_the_excerpt(), 47); ?></p>
                			<div class="text-right">
                				<a class="btn btn-primary" href="<?php the_permalink(); ?>">Подробнее</a>
                			</div>

						</div>
					</div>
				<?php endwhile; ?>
					</div>
					<div id="paginate" class="col-md-12">
						<?php global $wp_query;
							$big = 999999999; // need an unlikely integer
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages,

								'end_size' => 1,
								'mid_size' => 2,
								'prev_next' => true,
								'prev_text' => 'Назад',
								'next_text' => 'Вперед'
						) ); ?>
					</div>
				<?php else : ?>
					<div class="col-md-12">
						<h1>Не найдено</h1>
						<p>Извините, но того, что Вы искали, тут нет.</p>
					</div>
				<?php endif; wp_reset_query(); ?>
			
    		</div>

    		<?php get_sidebar(); ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>