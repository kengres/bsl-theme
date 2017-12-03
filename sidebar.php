<?php
if(isset($_POST['email'])):
    $email=$_POST['email'];
    wp_mail('info@paraisol.ru','Подписка на рассылку'," Новый подписчик на рассылку ООО \"Параисоль\" – $email");
endif;
?>

<div class="col-md-3">
	<div class="search">
    	<?php get_search_form(); ?>
    </div>
    
    <form class="subscription_shares" method="post" action="">
        <div class="subscription_n">Подписка</div>
        <div class="subscription_t">на горящие туры, акции и спецпредложения</div>
        <div class="form-group">
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Ваш e-mail">
        </div>

        <button type="submit" class="btn btn-primary btn-block">ПОДПИСАТЬСЯ</button>
    </form>

    <div class="right_sidebar_wr">
        <div class="right_sidebar_head">
           <a href="/tag/sobytijnyj-turizm" style="color: white" >Событийный туризм</a>  
        </div>
        <div class="right_sidebar_info">
           <div class="sidebar_mini">
<ul>
 <?php $pc = new WP_Query('category_name=sobturizm &showposts=2'); ?> <?php while ($pc->have_posts()) : $pc->the_post(); ?> <li> <a href="<?php the_permalink(); ?>"title=""> <?php the_post_thumbnail(array()); ?></a>
<br/><br/>
 </li> <?php endwhile; ?>
</ul>
 <a href="/tag/sobytijnyj-turizm" >Все предложения</a>
</div>

    </div>
      </div>
     

    

        

<div class="right_sidebar_head">
    <a href="/tag/specpredlozheniya/" style="color: white" > Спецпредложения</a>           
 </div>

<div class="sidebar_mini">
    <ul>
        <?php $pc = new WP_Query('category_name=specpredlojeniya &showposts=2'); ?> 
        <?php while ($pc->have_posts()) : $pc->the_post(); ?> 
        
            <li> 
                <a href="<?php the_permalink(); ?>" title=""><?php the_post_thumbnail('full', array(
                    'class' => 'img-responsive',
                    'alt'   => 'Featured Image'
                )); ?></a>
                
            </li> 
        <?php endwhile; ?>
    </ul>
    
    <a href="/tag/specpredlozheniya/"> Все спецпредложения</a>  
</div>
   

<!-- 
    <div class="right_sidebar_wr1">
        <div class="right_sidebar_head">
            <a href="/news" style="color: white"> Новости</a>
        </div>
        <?php
        $posts = get_posts(array('post_type'=>'post','category_name'=>'novosti','numberposts' =>'3'));
        foreach ($posts as $post):
            ?>
            <div class="right_sidebar_news">

            
                <a href="/news/detail?post_id=<?=$post->ID?>"> <strong><?=$post->post_title?></strong> </a>
            </div>
        <?php endforeach;?>
    </div> 
-->



  <div class="tag_cloud">
        <?php
         $args = array(
            'smallest'                  => 10,
            'largest'                   => 20,
            'unit'                      => 'pt',
            'number'                    => 50,
            'format'                    => 'flat',
            'separator'                 => "\n",
            'orderby'                   => 'name',
            'order'                     => 'ASC',
            'exclude'                   => null,
            'include'                   => null,
            'topic_count_text_callback' => default_topic_count_text,
            'link'                      => 'view',
            'taxonomy'                  => 'post_tag',
            'echo'                      => true,
            'child_of'                  => null, // see Note!
        );
        wp_tag_cloud( $args );
         ?>

    </div>


</div>