<div class="row">
  <div class="col-xs-12">
    <div class="page-header">
      <h2>Последнние новости</h2>
    </div>
  </div>
<?php
  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $novostiPosts = new WP_Query(array(
    'category_name'  => 'novosti',
    'posts_per_page' => 4,
    'paged'          => $paged
  ));
  if ($novostiPosts->have_posts()) :
    while ($novostiPosts->have_posts()) : $novostiPosts->the_post(); ?>
    <div class="col-md-12">
      <div class="row">
        <div class="col-xs-4 col-sm-4">

          <a href="<?php the_permalink() ?>" class="thumbnail">
            <?php the_post_thumbnail('full', array (
              'class' => 'img-responsive',
              'alt'   => 'Featured Image'
            ))?>
          </a>

        </div>

        <div class="col-xs-6 col-md-8">
          <a href="<?php the_permalink() ?>">
              <h3><?php the_title() ?></h3>
          </a>
          <?php echo get_the_excerpt(); ?>
        </div>
      </div>
    </div>
    <?php 
    endwhile;
  endif;
  wp_reset_postdata();
    ?>

    </div>