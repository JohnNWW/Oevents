<?php
/**
 * Template Name: Page - Block Style Template
 * Description: A Page Template that showcases Sticky Posts, Asides, and Blog Posts
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



<div id="block-primary" > 
		
	<div id="block-pg-main">
	<div id="block-pg-maina">
		<div class="block-pg-1a">
			<div class="block-pg-1a-text">
	<?php
$sticky = get_option( 'sticky_posts' ); // Get all sticky posts
rsort( $sticky ); // Sort the stickies, latest first
$sticky = array_slice( $sticky, 0, 1 ); // Number of stickies to show
query_posts ( array( 'post__in' => $sticky, 'caller_get_posts' => 1 ) ); // The query

if (have_posts() ) { while ( have_posts() ) : the_post(); ?>
    <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
	<?php the_content(); ?>

<?php endwhile;?>
<?php } else { echo "OPPS! Need a Sticky Post to go here"; }?>
		</div> <!-- block-pg-1a-text -->
		
		
		
			</div>  <!--block-pg-1a -->
		
		<div class="block-pg-1b">
	<h2><a href="http://ph1landrews.com/occupy/dev/wp/wp-content/uploads/2011/12/640_westcoastportblockade_wallstreet.jpg"><img class="alignleft size-medium wp-image-57" title="640_westcoastportblockade_wallstreet" src="http://ph1landrews.com/occupy/dev/wp/wp-content/uploads/2011/12/640_westcoastportblockade_wallstreet-266x300.jpg" alt="" width="266" height="300" /></a>Header Level 2</h2>
<ol>
	<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
	<li>Aliquam tincidunt mauris eu risus.</li>
	<li>Confusingly, the released footage also contains footage of police violence against peaceful demonstrators, including pulling a peaceful female protester to the ground by her hair, destroying a banner carried by peaceful protesters, and snatching a sign away from a protester. This incident caused the peaceful protester’s glasses to fall off his face and was an unnecessary escalation into violence. This situation was de-escalated by other protesters nearby as can be seen in the video.Occupy Seattle has been, since its founding, a non-violent organization. Assertions made by the Seattle Police Department and Mayor McGinn's office to paint Occupy Seattle as a violent protest is neither grounded in fact and is of disingenuous intent. </li>
</ol>
			</div><!-- block-pg-1b -->
	</div><!-- block-pg-maina -->
	
	<div id="block-pg-mainb">
		<div class="block-pg-2a">
			<div class="block-pg-2a-img"><h1 class="entry-title"><span STYLE="margin-left: 20px">Services test block</span></h1>
			</div><!-- block-pg-2a-img -->
			<div class="block-pg-2a-text">
			
	<p><a href="http://occupy.ph1landrews.com/dev/wp/category/news"><span style="font-size: large; font-style: italic;">NEWS !! This is the place if you need An Internet NEWS
	SERVICE to advance your occupation. </span></a></p>
	<h2>Header Level 2</h2>
<ul><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li></ul>

				</div><!-- block-pg-2a-txt -->
		</div><!-- block-pg-2a -->
		
		<div class="block-pg-2b">
					<div class="block-pg-2b-img"><h1 class="entry-title"><span STYLE="margin-left: 20px;">Services test block</span></h1>
			</div><!-- block-pg-2b-img -->
			<div class="block-pg-2b-text">
			
	<p><span style="font-size: x-large; font-style: italic; color:grey; font-family: 'new baskerville', 'Georgia', sans-serif;">		This is the place if you need Internet 
	Service to advance your occupation. </span></p>
	
<ul><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li></ul>

				</div><!-- block-pg-2b-txt -->
			</div><!-- block-pg-2b -->

		<div class="block-pg-2c">
				<div class="block-pg-2c-img"><h1 class="entry-title"><span STYLE="margin-left: 20px">Services test block</span></h1>
			</div><!-- block-pg-2c-img -->
			<div class="block-pg-2c-text">
			
	<p><span style="font-size: large; font-style: italic;">		This is the place if you need Internet 
	Service to advance your occupation. </span></p>
	<h2>Header Level 2<h2>
<ul><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li></ul>

				</div><!-- block-pg-2c-txt -->
			</div><!-- block-pg-2c --> 
	
	
	</div><!-- block-pg-mainb -->
	
		</div><!-- block-pg-main -->
	
	
<!-- 	<div id="block-content">

		
			</div>#block-content -->
			
					<section class="recent-posts">
				<div class="recent-posts-left">
					<h1><?php _e( 'Recent Posts', 'twentyeleven' ); ?></h1>
					<?php

					// Display our recent posts, showing full content for the very latest, ignoring Aside posts.
					$recent_args = array(
						'order' => 'DESC',
						'post__not_in' => get_option( 'sticky_posts' ),
						'tax_query' => array(
							array(
							 'numberposts' => '3', //not working trying to limit # posts displayed
								'taxonomy' => 'post_format',
								'terms' => array( 'post-format-aside', 'post-format-link', 'post-format-quote', 'post-format-status' ),
								'field' => 'slug',
								'operator' => 'NOT IN',
							),
						),
						'no_found_rows' => true,
					);

					// Our new query for the Recent Posts section.
					$recent = new WP_Query( 'orderby=date&posts_per_page=5');  // $recent_args 
					
					// The first Recent post is displayed normally
					if ( $recent->have_posts() ) : $recent->the_post();
						// Set $more to 0 in order to only get the first part of the post.
//	get rid of	fullpost		global $more;
		//						$more = 0;
		//			get_template_part( 'content', get_post_format() );
						echo '<ol class="other-recent-posts">';
					endif;

					// For all other recent posts, just display the title and comment status.
									
					while ( $recent->have_posts() ) : $recent->the_post(); ?>

					<li class="entry-title">
										<h2><a href='<?php the_permalink() ?>'rel='bookmark' title='<?php the_title(); ?>'> <?php the_title(); ?></a></h2>
			
		<?php	// <!	.entry-header .comments-link.a {  !> ?>
				
			
				<span class="comments-link.a" style="font-weight: normal; font-size: 12px; float: right; padding: 0 20px 0 0" > comments
						<?php comments_popup_link( '  0', '  1', '%' ); ?>   <!-- twentyeleven replaced with #  -->
					</span> 
						</li>
			
					<?php
					endwhile;

					// If we had some posts, close the <ol>
					if ( $recent->post_count > 0 )
						echo '</ol>';
				
					?>
					
					</div> <!--.recent-posts-left -->
				


				<div class="recent-posts-right">
							<h1><?php _e( 'Popular Posts', 'twentyeleven' ); ?></h1>
			
					<?php
					
					// Display our Popular posts, showing full content for the very latest, ignoring Aside posts.
					$popular_args = array(
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

						// Start of data def for popular posts
						//$popular = 'orderby=comment_count';
						$popular = new WP_Query( 'orderby=comment_count&posts_per_page=4' );
						
					// Our new query for the popular Posts section.
				//	$popular = new WP_Query( $popular_args );
					// The first popular post is displayed normally
					if ( $popular->have_posts() ) : $popular->the_post();
						// Set $more to 0 in order to only get the first part of the post.
		//	get rid of	fullpost		global $more;
		//								$more = 0;
		//			get_template_part( 'content', get_post_format() );
						echo '<ol class="other-recent-posts">';
					endif;

					// For all other popular posts, just display the title and comment status.
					while ( $popular->have_posts() ) : $popular->the_post(); ?>

					<li class="entry-title">
										<h2><a href='<?php the_permalink() ?>'rel='bookmark' title='<?php the_title(); ?>'> <?php the_title(); ?></a></h2>
			
		<?php	// <!	.entry-header .comments-link a {  !> ?>
					
					<span class="comments-link.a" style="font-weight: normal; font-size: 12px; float: right; padding: 0 20px 0 0"> comments
						<?php comments_popup_link( '  0', '  1' , '%' ); ?>  <!-- twentyeleven replaced with #  -->
					</span> 
						</li>

					<?php
					endwhile;

					// If we had some posts, close the <ol>
					if ( $popular->post_count > 0 )
						echo '</ol>';
					?>
					<div><!--.popular-posts-right -->
<!-- test did not work <IMG WIDTH:150px; HEIGHT:150px src="http://ph1landrews.com/occupy/dev/wp/wp-content/occupation/images/ck-mark-green.png"> -->

				</section><!-- .recent-posts -->

		

			
			
			
	</div>  <!--	[id="block-primary"]-->  <!--		<div >  -->

<?php get_footer(); ?>