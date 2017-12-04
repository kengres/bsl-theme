<div class="row homeNews">
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
    </div>
    <?php 
    endwhile;
  endif;
  wp_reset_postdata();
    ?>

    </div>