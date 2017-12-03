<div class="row tour_links">
  <div class="col-xs-12">
    <div class="page-header">
      <h2>Лучшие цены</h2>
    </div>
  </div>
  <?php
      $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
      $tourPosts = new WP_Query(array(
        'category_name'  => 'tours',
        'posts_per_page' => 4,
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
    <?php endif; wp_reset_postdata(); ?>
</div>