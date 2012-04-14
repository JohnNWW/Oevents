<?php
/*
Template Name: No Sidebar
*/
?>






<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div style="width:100%" !important;">

<?php the_content('

Read the rest of this page »</p>'); ?> 
<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?> 
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p> 
<?php endif; ?> 

   <?php  /*
  public function addSidebar() {
        if ($this->hasSidebar()) {     
			remove_action(  'get_sidebar' );

        }
    }<div id="secondary" class="widget-area" role="complementary" style="display:none">
*/  ?> 	
<?php get_footer(); ?> 
</div>