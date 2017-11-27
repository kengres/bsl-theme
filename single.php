<?php
	$post = $wp_query->post;

	if(in_category('novosti')){
        include(TEMPLATEPATH.'/single-news.php');
    }else{
        include(TEMPLATEPATH.'/single-all.php');
    }
?>