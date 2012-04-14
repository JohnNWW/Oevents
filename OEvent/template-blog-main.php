<?php
/**
 * Template Name: Page - blog - main
 * The default template for displaying home page content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<?php get_header(); ?>


		<div id="primary">
			<div id="content" role="main">
				<?php twentyeleven_content_nav( 'nav-above' ); ?>
<?php
$args = array( 'numberposts' => 8 );
$lastposts = get_posts( $args );
foreach($lastposts as $post) : setup_postdata($post); ?>

<?php get_template_part( 'content', get_post_format() ); ?>
<?php endforeach; ?>
<?php twentyeleven_content_nav( 'nav-below' ); ?>


			<?php if ( have_posts() ) : ?>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

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

			</div><!-- #content -->
		</div><!-- #primary -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>
