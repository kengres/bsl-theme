<?php if (get_theme_mod('para_home_about_display' == 'Yes')) { ?>
  <div class="jumbotron">
    <h2><?php echo get_theme_mod('para_home_about_title'); ?></h2>
    <div>
      <?php echo wpautop(get_theme_mod('para_home_about_paragraph')); ?>  
    </div>
    <p><a class="btn btn-primary btn-lg" href="<?php echo get_permalink(get_theme_mod('para_home_about_link')); ?>" role="button">Читать дальше...</a></p>
  </div>
<?php } ?>