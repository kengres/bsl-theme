/*
Template Name: tag cloud
*/

<?php
/*
Template Name: page
*/

get_header();
?>
<div class="container">
<div class="row">
<div class="col-md-12">
    <div class="col-md-9">
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
    the_content();
    
    <div id="page-cnt" class="tags">
<?php wp_tag_cloud('smallest=12&largest=18&unit=px&number=0&orderby=count&order=DESC');?>
</div>     
    
    
endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
    </div>
    <?php

get_sidebar();
?>

</div>
</div>
</div>
<?php
get_footer();