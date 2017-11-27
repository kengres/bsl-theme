<?php /** Template Name: hotels **/

	get_header();
	if(isset($_POST['email'])):
	$email=$_POST['email'];
	wp_mail('info@paraisol.ru','Подписка на рассылку'," Новый подписчик на рассылку ООО \"Параисоль\" – $email");
	endif;
?>



<div class="content_wr">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="name_tour1 ">
                    <div class="name_tour_text">Подбор отеля</div>
                </div>
                <br/>
                <script charset="utf-8" src="//partner.onetwotrip.com/build/widget/form.widget.load.js?id=12735"  async></script>
               
                <div class="tours-list">
                    <div class="name_tour1">
                        <div class="name_tour_text">Лучшие цены</div>
                    </div>
                    <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						query_posts( array('post_type'=>'post','category_name'=>'hotels','posts_per_page'=>12, 'paged' => $paged));
              			if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                   
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
                    
                    <?php endwhile; ?>
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
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>