<?php

    get_header();
    $post = get_post($_GET['id']);

?>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h2 class="text-center text-primary"><?php single_tag_title(); ?></h2>
          </div> 
        </div>
        <?php
          if(have_posts()):
            while (have_posts()):
              the_post(); ?>

            <div class="col-xs-12 col-sm-6 tag-tour-col">
              <a href="<?php the_permalink(); ?>">

                <div class="tag-tour-inner">
                  <div class="tag-tourImage">
                    <?php the_post_thumbnail( 'full', array(
                          'class' => 'img-responsive',
                          'alt'   => 'Featured Image'
                      )); ?>
                  </div>
                  <div class="tour-inner-mask"></div>
                  <div class="tourContent">
                    <div class="tourContent-inner">
                    </div>
                  </div>
                </div>
              </a>
                
            </div>

            <?php
              endwhile;
              else:
                echo '<h3>Результов нет... </h3>';
            endif;

        ?>
      
      </div>

    </div> <!-- col-md-9 -->
      <?php
      get_sidebar();
      ?>
  </div> <!-- row -->
</div> <!-- container -->
<?php
get_footer();
?>