<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">

			<div class="col-md-9">
				<h2>Результат поиска: <?=get_search_query()?></h2>

				<?php if(have_posts()): while (have_posts()): the_post(); ?>
                  <div class="col-md-6">
                      <div class="tour_country_wr">
                          <div class="no-gutter">
                              <div class="col-md-12 tour_img">
                                  <div class="tour_country_wr">
                                      <a href="<?php the_permalink(); ?>"><?=the_post_thumbnail(array(380,197)); ?></a>
                                  </div>
                              </div>
                              <div class="col-md-6"></div>
                          </div>
                      </div>
                	</div>
        		<?php endwhile; else:
            		echo '<h3>Результов нет... </h3>';
        		endif; ?>

    		</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
