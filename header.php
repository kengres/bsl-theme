<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="yandex-verification" content="4ab70243c3877620" />
	  <title><?php if (function_exists('seo_title_tag')) { seo_title_tag(); } else { wp_title(); } ?></title>

    <!-- Подключения favicon.ico -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?=bloginfo('template_url')?>/images/apple-touch-icon.png">
    <link rel="icon" type="images/png" sizes="32x32" href="<?=bloginfo('template_url')?>/images/favicon-32x32.png">
    <link rel="icon" type="images/png" sizes="16x16" href="<?=bloginfo('template_url')?>/images/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="<?=bloginfo('template_url')?>/images/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

<?php wp_head();?>
</head>

<body <?php body_class(); ?>>

<header>
    <div class="container">
      <div class="row">
        <?php
          $user_agent = $_SERVER["HTTP_USER_AGENT"];
          if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
            elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
            elseif (strpos($user_agent, "MSIE") !== false || strpos($user_agent, "Edge") !== false) $browser = "Internet Explorer";
            elseif (strpos($user_agent, "FreeU") !== false) $browser = "FreeU";
            elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
            elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";

              ?>
              <?php
              if($browser=='Chrome' || $browser=='FreeU'):?>
              <link href="<?=bloginfo('template_url')?>/css/checkbox.css" rel="stylesheet">
              <?php
          endif;
          ?>
        <div class="col-md-2 logo">
          <a class="logo" href="/"><img src="<?=bloginfo('template_url')?>/images/logo.jpg" alt="logo"></a>
        </div>
        <div class="col-xs-12 col-md-7">
          <div id="owl_banner" class="owl-carousel owl-theme">
            <?php $args = array( 'post_type' => 'banners', 'showposts' => '10' );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="item">
              <div class="banner">
                <a href="<?php $ban = get_post_meta(get_the_ID(), 'banner', true); echo $ban; ?>">
                  <?php the_post_thumbnail('banner'); ?>
                </a>
              </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>

          <div class="overlay"></div>
        </div>
        <div class="col-md-3">
          <div class="contact_phone_wr">
            <div class="contact_phone"><?php
              echo get_theme_mod('para_numbers_one');
            ?></div>
            <div class="contact_phone"><?php
              echo get_theme_mod('para_numbers_two');
            ?></div>
            <div class="contact_phone"><?php
              echo get_theme_mod('para_numbers_three');
            ?></div>
            <button class="butmodal	btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">ЗАКАЗАТЬ ЗВОНОК</button>
          </div>
          <div class="social_ico">
            <a href="<?php echo get_theme_mod('para_social_facebook');?>" target="_blank">
              <img src="<?=bloginfo('template_url')?>/images/fb.png" alt="social_ico">
            </a>
            <a href="<?php echo get_theme_mod('para_social_vkontakte');?>" target="_blank">
              <img src="<?=bloginfo('template_url')?>/images/vk.png" alt="social_ico">
            </a>
            <a href="<?php echo get_theme_mod('para_social_instagram');?>" target="_blank">
              <img src="<?=bloginfo('template_url')?>/images/inst.png" alt="social_ico">
            </a>
            <a href="mailto:<?php echo get_theme_mod('para_social_email');?>">
              <img src="<?=bloginfo('template_url')?>/images/mail.png" alt="social_ico">
            </a>
          </div>
        </div>
      </div>
      <!-- end of row -->
      <!-- menu row -->
      <div class="row">
        <div id="navbar-wrapper">
          <nav class="navbar navbar-default" role="navigation" data-spy="affix" data-offset-top="250">
          	<div class="container-fluid">
          		<!-- Brand and toggle get grouped for better mobile display -->
          		<div class="navbar-header">
          			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          				<span class="sr-only">Toggle navigation</span>
                  		<span class="icon-bar"></span>
                  		<span class="icon-bar"></span>
                  		<span class="icon-bar"></span>
          			</button>
              		<a class="navbar-brand" href="<?php echo home_url(); ?>">
          				<?php bloginfo('name'); ?>
                  	</a>
          		</div>
                  <?php
                  wp_nav_menu( array(
                      'theme_location'    => 'primary',
                      'depth'             => 2,
                      'container'         => 'div',
                      'container_class'   => 'collapse navbar-collapse',
                      'container_id'      => 'bs-example-navbar-collapse-1',
                      'menu_class'        => 'nav navbar-nav',
                      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                      'walker'            => new WP_Bootstrap_Navwalker())
                  );
                  ?>
              </div>
          </nav>
        </div>
      </div>
    </div>


</header>
