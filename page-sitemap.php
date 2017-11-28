<?php
  get_header();
  $post = get_post($_GET['id']);
?>
   
<div class="container">
	<div class="row">
		
    <div class="col-md-12">
      <h1 class="text-success">Карта сайта</h1>

      <?php 
        $args = array(
          'theme_location'=> 'sitemap',
          'container' => false,
          'menu_class' => 'sitemapMenu'
        );
        wp_nav_menu($args); ?>
    </div>
    
	</div>
</div>
<?php get_footer(); ?>