<?php

/*Template Name: news*/
get_header();

?>

<div class="container">
<div class="row">
<div class="col-md-12">

    <div class="col-md-9">
        <div class="name_tour">
            <div class="name_tour_text">Новости</div>
        </div>

        <?php
        $posts = get_posts(array('post_type'=>'post','category_name'=>'novosti'));
        foreach ($posts as $post):
        ?>
        <div class="news-wr">
          
            <div class="news-info">
                <div class="text-right">
                <?=stristr($post->post_date, ' ', true);?>
                </div>
                <?php
                the_post_thumbnail();
                ?>
                <span>
                    <?=$post->post_title?>
                </span>
                <p><?=mb_strimwidth($post->post_content, 0, 395, "...");?></p>
                <div class="text-right"><a class="btn btn-primary " href="/news/detail?post_id=<?=$post->ID?>">Подробнее</a></div>

            </div>
        </div>
        <?php
        endforeach;
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