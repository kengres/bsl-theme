<?php 
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
                    <div class="name_tour_text">Подбор тура</div>
                </div>

                <script type="text/javascript" src="//ui.sletat.ru/module-5.0/app.js" charset="utf-8"></script>
                <script type="text/javascript">sletat.createModule5('Search', {
                        nightsMin         : 7,
                        files             : ["//ui.sletat.ru/module-5.0/theme/tuxedo_dec2015.min.css"],
                        agencyContact1    : {
                            phone           : "+7 (495) 960-24-27",
                            email           : "info@paraisol.ru"
                        },
                        enabledCurrencies : ["RUB", "EUR", "USD"],
                        useCard           : true,
                        formType          : "full",
                        dateOffset        : 7,
                        dateRange         : 7
                    });
				        </script>
                <span class="sletat-copyright">Идет загрузка модуля <a title="поиск туров" href="http://sletat.ru/" target="_blank" rel="noopener">поиска туров</a> …</span>
                
                <div class="tours-list">

                  <div class="name_tour1">
                    <div class="name_tour_text">Лучшие цены</div>
                  </div>
                  <div class="row tour_links">
                    
                    <?php
                        $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
                        $tourPosts = new WP_Query(array(
                          'category_name'  => 'tours',
                          'posts_per_page' => 12,
                          'paged'          => $paged
                        ));
                        if ($tourPosts->have_posts()) :
                          while ($tourPosts->have_posts()) : $tourPosts->the_post(); ?>
  
                         <div class="col-sm-6 tour-col">
                          <a href="<?php the_permalink(); ?>" class="tourLink">
                              <div class="tourInner">
                                <div class="tourImage">
                                  <?php the_post_thumbnail( 'full', array(
                                        'class' => 'img-responsive',
                                        'alt'   => 'Featured Image'
                                    )); ?>
                                </div>
                                <div class="tour-inner-mask"></div>
                                <div class="tourContent">
                                  <div class="tourContent-inner">
                                    <?php 
                                      $placeValue = get_post_meta($post->ID, 'single_tour_place', true);
                                      $durationValue = get_post_meta($post->ID, 'single_tour_duration', true);
                                      $hitValue = get_post_meta($post->ID, 'single_tour_hit', true);
                                      $dateValue = get_post_meta($post->ID, 'single_tour_date', true);
                                      $priceValue = get_post_meta($post->ID, 'single_tour_price', true);
                                    ?>
                                    <?php if(!empty($placeValue)): ?>
                                      <div class="tour-country"><span class="span"><?php echo $placeValue; ?></span></div>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty($durationValue) || !empty($dateValue) || !empty($hitValue)): ?>
                                      <div class="tour-time">
                                        <?php if(!empty($durationValue)): ?>
                                          <div class="tour-date-time"><span><?php echo $durationValue; ?></span></div>
                                        <?php endif; ?>
                                        <?php if(!empty($dateValue)): ?>
                                          <div class="tour-date"><span><?php echo $dateValue; ?></span></div>
                                        <?php endif; ?>
                                        <?php if(!empty($hitValue)): ?>
                                          <div class="tour-text"><span><?php echo $hitValue; ?></span></div>
                                        <?php endif; ?>
                                      </div>
                                    <?php endif; ?>

                                    <?php if(!empty($priceValue)): ?>
                                        <div class="tour-money"><span class="span"><?php echo $priceValue; ?></span></div>
                                      <?php endif; ?>
                                  </div>
                                </div>
                              </div>
                            </a>
                         </div>
                      
                      <?php endwhile; ?>

                      <div id="paginate">
                        <?php
                          $big = 999999999; // need an unlikely integer
                          $args = array(
                            'base'        =>   str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                            'format'      =>   '?paged=%#%',
                            'current'     =>   max( 1, get_query_var('paged') ),
                            'total'       =>   $tourPosts->max_num_pages,
      
                            'end_size'    =>   1,
                            'mid_size'    =>   2,
                            'prev_next'   =>   true,
                            'prev_text'   =>   'Назад',
                            'next_text'   =>   'Вперед'
                          );
                          echo paginate_links($args);
                        ?>
                      </div>
                  </div>
					<?php else : ?>
						<div class="col-md-12">
							<h1>Не найдено</h1>
							<p>Извините, но того, что Вы искали, тут нет.</p>
						</div>
					<?php endif; wp_reset_postdata(); ?>
                </div>
            </div> <!-- end of col-md-9 -->

            <?php get_sidebar(); ?>
        </div> <!-- end of row -->
    </div>
</div>
<?php get_footer(); ?>