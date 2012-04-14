<?php
/**
Template Name: Blog w slider Template
 * Description: A Page Template that showcases Sticky Posts, Blog Posts
 *
 * The showcase template in Twenty Eleven consists of a featured posts section using sticky posts,
 * another recent posts area (with the latest post shown in full and the rest as a list)
 * and a left sidebar holding aside posts.
 *
 * We are creating two queries to fetch the proper posts and a custom widget for the sidebar.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

// Enqueue showcase script for the slider
wp_enqueue_script( 'twentyeleven-showcase', get_template_directory_uri() . '/js/showcase.js', array( 'jquery' ), '2011-04-28' );

get_header(); ?>



		
		<div class="main-slider">
	
		<?php
		echo do_shortcode( "[anything_slides]" ); 
		?>
	</div>
<div id="primary" class="showcase">

			<div id="content" role="main">

				<?php
					/**
					 * We are using a heading by rendering the_content
					 * If we have content for this page, let's display it.
					 */
				?>

				<?php  	?>
			
				<section class="recent-posts">
					<h1 class="showcase-heading"><?php _e( 'Recent Posts', 'twentyeleven' ); ?></h1>

					<?php

					// Display our recent posts, showing full content for the very latest, ignoring Aside posts.
					$recent_args = array(
						'order' => 'DESC',
						'post__not_in' => get_option( 'sticky_posts' ),
						'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'terms' => array( 'post-format-aside', 'post-format-link', 'post-format-quote', 'post-format-status' ),
								'field' => 'slug',
								'operator' => 'NOT IN',
							),
						),
						'no_found_rows' => true,
					);

					// Our new query for the Recent Posts section.
					$recent = new WP_Query( $recent_args );

					// The first Recent post is displayed normally
					while ( $recent->have_posts() ) : $recent->the_post();

						// Set $more to 0 in order to only get the first part of the post.
						global $more;
						$more = 0;

						get_template_part( 'content', get_post_format() );

					
				?>
					<?php
					endwhile;

					// If we had some posts, close the <ol>
					if ( $recent->post_count > 0 ) ;
					?>
				</section><!-- .recent-posts -->

				

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>