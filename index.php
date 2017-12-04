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
              <div class="page-header">
                <h2>Новости</h2>
              </div>
              <?php
                $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
                $novostiPosts = new WP_Query(array(
                    'category_name'  => 'novosti',
                    'posts_per_page' => 12,
                    'paged'          => $paged
                ));
                if ($novostiPosts->have_posts()) :
                  while ($novostiPosts->have_posts()) : $novostiPosts->the_post(); ?>
                    <div class="row novostiRow">
                      <div class="col-xs-4 col-sm-5 col-md-4">

                        <a href="<?php the_permalink() ?>" class="thumbnail">
                            <?php the_post_thumbnail('full', array (
                            'class' => 'img-responsive',
                            'alt'   => 'Featured Image'
                            ))?>
                        </a>
                      </div>

                      <div class="col-xs-8 col-sm-7 col-md-8">
                        <a href="<?php the_permalink() ?>" class="postLink">
                            <h3 class="noMarginTop xs-small"><?php the_title() ?></h3>
                        </a>
                        <div class="hidden-xs">
                          <?php echo get_the_excerpt(); ?>
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
                <?php endif;  wp_reset_postdata();?>
                </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>