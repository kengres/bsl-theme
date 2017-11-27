<?php
/*
 * Template Name: tour
*/
get_header();



$post = get_post($_GET['id']);

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <div class="col-md-9">
                    <div class="tur-name-wr">
                        <div class="tur-name 444">
                            <h2><?= $post->post_title ?></h2>
                            <span><?= stristr($post->post_date, ' ', true) ?></span>
<div class="tagpost"><?php the_tags('Теги: ', ', ', '<br />'); ?></div>
</Br>
                           
                        </div>
					<?=
                        $post->post_content;
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
?>