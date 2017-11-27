<?php

get_header();
$post = get_post($_GET['id']);

?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="col-md-9">
<!--<div class="name_tour1">
<div class="name_tour_text"><?php // the_archive_title( '<h3 class="page-title">', '</h3>' );
                  
                    // the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?></div>
      </div>-->     
                   
                    <div class="name_tour">
            			<div class="name_tour_text"><?php single_tag_title(); ?></div>
        			</div>       
                    <?php
                    if(have_posts()):
                        while (have_posts()):
                            the_post(); ?>
                                <div class="col-md-6">
                                    <div class="tour_country_wr">

                                        <div class="no-gutter ddd">
                                            <div class="col-md-12 tour_img">

                                                <div class="tour_country_wr">
                                                    <a href="<?php the_permalink(); ?>"><?=the_post_thumbnail(array(380,197)); ?></a>
                                                </div>


 
                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            


                        endwhile;
                    else:
                        echo '<h3>Результов нет... </h3>';
                    endif;

                    ?>





                </div>
                <?php
                get_sidebar();
                ?>
            </div>
        </div>
    </div>
<?php
get_footer();
