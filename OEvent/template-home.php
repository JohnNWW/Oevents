<?php
/**
 * The main template file - Home.
 * Template Name: Home
 * This has been modified to use the lastest slider theme from OccupyMovement it is of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * 
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

	<div id="primary" >
	
	
	<?php /* test - - END of Division - -- - - */			  ?>
	
	
	

<?php /* -- ENDif end of Above Content Widgets ---*/ ?> 
	 <div id="content-sidebar"> <!-- --> 
	<div id="content-home" role="main"><!-- -->
					
			
	
				<?php if ( have_posts() ) : ?>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
			
		<?php $recent = new WP_Query("page_id=685"); while($recent->have_posts()) : $recent->the_post();?>
		<?php the_content(); ?>
	<?php  edit_post_link('Edit this entry.', '<p>', '</p>'); ?> 
<?php endwhile; ?>
			
			
				<?php// twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
			
    <?php if ( function_exists('is_sidebar_active') && is_sidebar_active('above-content-1') ) { ?>
  <!--	<div class="main-slider"> -->	
	<div id="above-content">	
		<?php //dynamic_sidebar('above-content-1'); ?>
	   
			<?php if ( is_active_sidebar( 'above-content-1' )) ?>
		
				<div class="above-content-1">
				<div class="above-content-1-heading">
					</div>
						<?php dynamic_sidebar( 'above-content-1' ); ?>
					</div>
				<div class="above-content-2" >
				<div class="above-content-2-heading">
					</div>
						 <?php dynamic_sidebar( 'above-content-2' ); ?>
					</div>			
				<div class="above-content-3">
				<div class="above-content-3-heading">
					</div>
						   <?php dynamic_sidebar( 'above-content-3' ); ?>
					</div>	 
				
		
	<!-- 	</div>  end main-slider -->		
	</div>	<!-- end above-content -->
    <?php } ?>  
					
	
	</div>	<!-- #content -->	 </div> <!-- content-sidebar --> 
	
</div>	<!-- #primary works when relative and above sidebar -->

<?php get_footer(); ?>