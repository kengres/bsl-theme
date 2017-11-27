<?php

/*Template Name: review
*/

get_header();



?>
<div class="container">
<div class="row">

<div class="col-md-12">
    <div class="col-md-9">
        <h1 class="name_tour">
            <div class="name_tour_text">Отзывы</div>

        </h1>
        <div class="reviews_form">
			<div class="cloze-f"></div>
            <form method="post" action="<?=bloginfo('template_url')?>/comment.php">
                <p>Уже путешествовали с параисоль?</p>
                <p>Оставьте отзыв о нашей работе</p>
                <div class="form-group form-men-woomen">
                    <div class="in_name">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Имя">
                    </div>
                   
                </div>
                <div class="form-group form-men-woomen">
                    <input type="email" name="email" class="form-control in_name2" id="exampleInputEmail1"
                           placeholder="Ваш e-mail (на сайте не отображается)">
                </div>
                <div class="form-group form-men-woomen">
                    <textarea name="comment" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">ОСТАВИТЬ ОТЗЫВ</button>
            </form>
        </div>



<div class="show-f">Раскрыть форму отзыва</div>






        <?php
        $comments = get_comments();
    foreach ($comments as $comment):

        if($comment->comment_approved=='1'):
                      if($comment->comment_parent==0):
        ?>
       
<div class="reviews_text">
            <div class="reviews_text_img">
                <?php
                if($comment->comment_type == 'men'):
                ?>
                <img src="<?=bloginfo('template_url')?>/images/reviews_men.png" alt="reviews_men ">
                    <?php
                    else:
                    ?>
                <img src="<?=bloginfo('template_url')?>/images/reviews_woomen.png" alt="reviews_women ">
                        <?php
                        endif;
                        ?>
            </div>


            <div class="reviews_text_info">
                <div class="date"><?=stristr($comment->comment_date, ' ', true);?></div>
                <div class="review">
                    <span><?=$comment->comment_author?></span>
                    <p><?=$comment->comment_content?></p>
                </div>
                <?php
                $comme = get_comments();
                foreach ($comme as $c):
                    if($c->comment_parent==$comment->comment_ID):
                        ?>
                        <div class="reviews_in_reviews">
                            <img src="<?=bloginfo('template_url')?>/images/summer.png" alt="summer">

                            <p> <?=$c->comment_content?> </p>
                        </div>
                        <?php
                    endif;
                endforeach;
                ?>
            </div>

        </div>

        <?php
        endif;
        endif;
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