<?php
/**
 * The template for displaying all pages this includes sidebar.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>
<!-- /* NWW edit to add page nav links */	-->				
<div id="page-links">				
<div id="previous-link">
<?php previous_page_link_plus( array(
'order_by' => 'menu_order',
'order_2nd' => 'post_title',
'meta_key' => '',
'loop' => false,
'end_page' => false,
'thumb' => false,
'max_length' => 25,
'format' => '( <--- %link )',
'link' => '%title',
'tooltip' => '%title posted on %date by %author',
'in_same_parent' => false,
'in_same_author' => false,
'ex_pages' => '',
'in_pages' => '',
'before' => '',
'after' => '',
'num_results' => 1,
'echo' => true
) ); ?>
</div>



<div id="next-link">
<?php next_page_link_plus( array(
'order_by' => 'menu_order',
'order_2nd' => 'post_title',
'meta_key' => '',
'loop' => false,
'end_page' => false,
'thumb' => false,
'max_length' => 25,
'format' => '( %link ---> )',
'link' => '%title',
'tooltip' => '%title posted on %date by %author',
'in_same_parent' => false,
'in_same_author' => false,
'ex_pages' => '',
'in_pages' => '',
'before' => '',
'after' => '',
'num_results' => 1,
'echo' => true
) ); ?>		
</div> 					
</div> <!-- page links end -->
<!-- NWW end edit to add page nav links */	-->
					
					
					<?php comments_template( '', true ); ?>


				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		

</div><!-- #primary -->
<?php get_sidebar(); ?>  <!-- NWW Added to provide sidebar in single post pages -->

<?php get_footer(); ?>