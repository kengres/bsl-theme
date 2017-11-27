<?php /** Template Name: tickets **/

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
                    <div class="name_tour_text">Подбор билетов</div>
                </div>
<!-- AVIASEILS - ПОИСК БИЛЕТОВ -->
<!-- ФОРМА ПОИСКА БИЛЕТОВ -->
                <br/>
                <center>  <script charset="utf-8" src="//www.travelpayouts.com/widgets/b1008aaf27290b4cb7609fa7bf64ff66.js?v=1061" async></script> </center>
                <br/>
<!-- КАЛЕНДАРЬ РЕЙСОВ -->
                <center> <script charset="utf-8" src="//www.travelpayouts.com/calendar_widget/iframe.js?marker=154635.&origin=IKT&destination=BKK&currency=rub&searchUrl=hydra.aviasales.ru&one_way=false&only_direct=false&locale=ru&period=year&range=7%2C14" async></script> </center>
<!-- КАРТА -->
<iframe src="//maps.avs.io/flights/?auto_fit_map=true&hide_sidebar=true&hide_reformal=true&disable_googlemaps_ui=true&zoom=3&show_filters_icon=true&redirect_on_click=true&small_spinner=true&hide_logo=true&direct=false&lines_type=TpLines&cluster_manager=TpWidgetClusterManager&marker=154635.map&show_tutorial=false&locale=ru&host=map.aviasales.ru" width="800px" height="300px" scrolling="no" frameborder="0"></iframe>
<!-- ПОДПИСКА НА ТУРЫ -->
<script charset="utf-8" async src="//www.travelpayouts.com/subscription_widget/widget.js?backgroundColor=%2378ba36&marker=154635&host=hydra.aviasales.ru&originIata=IKT&originName=%D0%98%D1%80%D0%BA%D1%83%D1%82%D1%81%D0%BA&destinationIata=BKK&destinationName=%D0%91%D0%B0%D0%BD%D0%B3%D0%BA%D0%BE%D0%BA"></script>
<!-- AVIASEILS - КОНЕЦ -->
<br/>
<br/>
                <div class="tours-list">
                    <div class="name_tour1">
                        <div class="name_tour_text">Лучшие цены</div>
                    </div>
                    <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						query_posts( array('post_type'=>'post','category_name'=>'tickets','posts_per_page'=>12, 'paged' => $paged));
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