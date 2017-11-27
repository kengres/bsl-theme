<?php

/*Template Name: news*/
get_header();

?>

<div class="container">
<div class="row">
<div class="col-md-12">

    <div class="col-md-9">
        <div class="name_tour">
            <div class="name_tour_text">Событийный туризм</div>
        </div>

    <?php
                    $posts = get_posts(array('post_type'=>'post','category_name'=>'tours','posts_per_page'=>1000));
                    foreach ($posts as $post):
                    ?>
                    <div class="col-md-6">
                        <div class="tour_country_wr">
<!--                            <div class="name_tour_country">-->
<!--                               --><?////=$post->post_title?>
<!--                                <img src="--><?////=bloginfo('template_url')?><!--<!--/images/star_tour.png" alt="star">-->
<!--                            </div>-->
                            <div class="no-gutter">
                                <div class="col-md-12 tour_img">

                                        <div class="tour_country_wr">
                                            <a href="/tour?id=<?=$post->ID?>"><?=the_post_thumbnail(array(380,197)); ?></a>
                                        </div>

<!--                                    <div class="tour_info tour_info_text">-->
<!--                                        <img src="--><?//=bloginfo('template_url')?><!--/images/time_date.png" alt="date">-->
<!--                                       --><?//=$fields['days']?>
<!--                                    </div>-->
<!--                                    <div class="tour_info tour_info_text">-->
<!--                                        <img src="--><?//=bloginfo('template_url')?><!--/images/breakfast.png" alt="date">-->
<!--                                        --><?//=$fields['service']?>
<!--                                    </div>-->
                                </div>
                                <div class="col-md-6">
<!--                                    <div class="tour_info tour_info_a">-->
<!--                                        <a href="/tour?id=--><?//=$post->ID?><!--">Горящий</a>-->
<!--                                    </div>-->
<!--                                    <div class="tour_info tour_info_price">-->
<!--                                        --><?//=$fields['price']?><!-- <span class="glyphicon glyphicon-rub" aria-hidden="true"></span>-->
<!--                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>

    <?php
    get_sidebar();
    ?>

</div>
</div>
</div>

<?php
get_footer();