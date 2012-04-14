<?php /**
  One thing to note is that when referencing images or other files from your child theme, you need to   use #get_stylesheet_directory_uri() as opposed to get_template_directory_uri() as the latter will link  to the #parent theme.
**/ 

    function is_sidebar_active($home) {  // was index 
    global $wp_registered_sidebars;
    $widgetcolums = wp_get_sidebars_widgets();
    if ($widgetcolums[$home])
    return true;
    return false;
    }

register_sidebar( array(
		'name' => __( 'Above Content Left', 'OEvent' ),
		'id' => 'above-content-1',
		'description' => __( 'For Block Templates - An optional widget area Above your content', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="above-content-title-h3">',
		'after_title' => '</h3>',
	) );

register_sidebar( array(
		'name' => __( 'Above Content Middle', 'OEvent' ),
		'id' => 'above-content-2',
		'description' => __( 'For Block Templates - -An optional widget area Above your content', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="above-content-title-h3">',
		'after_title' => '</h3>',
	) );

register_sidebar( array(
		'name' => __( 'Above Content Right', 'OEvent' ),
		'id' => 'above-content-3',
		'description' => __( 'For Block Templates - An optional widget area Above your content', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="above-content-title-h3">',
		'after_title' => '</h3>',
		'before_widget_content' => '<div class="widget-content-3">',
		'after_widget_content' => '</div>',

	) );

	






// add feed links to header
if (function_exists('automatic_feed_links')) {
	automatic_feed_links();
} else {
	return;
}
// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);



// custom excerpt length set at 55 words
function custom_excerpt_length($length) {
	return 55;
}
add_filter('excerpt_length', 'custom_excerpt_length');

// add a favicon to your image set to root dir ..  to change /wp-content/theme/favicon.ico
function blog_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'wp-content/themes/occupation/images/favicon.ico" />';
}
add_action('wp_head', 'blog_favicon');

// Add a side bar to signle posts - also added get_sidebar();  to single.php template
// adding body class not working without deleting classes from 20-11 theme currently modifying the style.css to get the addition to work 
// while trying to get a remove function to work instead of deleting the conflicting function in the twenty eleven parent at line 549
 
/*	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}
 
	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
	{
		$classes[] = 'singular';
 
	return $classes;
}
add_filter( 'body_class', 'twentyeleven_body_classes' );
function twentyeleven_body_classes( $classes ) {
 
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}
 
	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';
 
	return $classes;
}
add_filter( 'body_class', 'twentyeleven_body_classes' );

*/
// second try at function to add side bar  this one works

function remove_twentyeleven_body_classes() {
    remove_filter( 'body_class', 'twentyeleven_body_classes' );
}
add_action( 'after_setup_theme', 'remove_twentyeleven_body_classes' );


// add upload ability for photos etc.. to the contributor role so they can add pictures topost step to getting them to add to gallery
if ( current_user_can('contributor') && !current_user_can('upload_files') )
	add_action('admin_init', 'allow_contributor_uploads');
 
function allow_contributor_uploads() {
	$contributor = get_role('contributor');
	$contributor->add_cap('upload_files');
}



	?>
<?php
// This removes the default headers so we can use our own.  'chessboard', 'hanoi', 
  function ttoptions_remove_twenty_eleven_headers()
   {
      unregister_default_headers(array('lanterns', 'pine-cone', 'shore', 'trolley', 'wheel', 'willow', 'hanoi'));
    }
  add_action('after_setup_theme', 'ttoptions_remove_twenty_eleven_headers', 11);
  add_action('after_setup_theme', 'ttoptions_setup');
  
  // set our own default header image.
define('HEADER_IMAGE', get_bloginfo('stylesheet_directory') . '/images/portland-pepper.jpg');


// This adds our own default headers. Code from Aaron Jorbin's introduction to Thirty Ten.
function ttoptions_setup(){
	$ttoptions_dir =	get_bloginfo('stylesheet_directory');
	register_default_headers( array (
		'history' => array (
			'url' => "$ttoptions_dir/images/history.jpg",
			'thumbnail_url' => "$ttoptions_dir/images/history-tnail.jpg",
			'description' => __( 'history', 'twentyeleven-options' )
		),
		'portlandpepper' => array (
			'url' => "$ttoptions_dir/images/portland-pepper.jpg",
			'thumbnail_url' => "$ttoptions_dir/images/portland-pepper-tnail.jpg",
			'description' => __( 'Portland Pepper Spray', 'twentyeleven-options' )
				),
		'spray' => array (
			'url' => "$ttoptions_dir/images/spray-3.jpg",
			'thumbnail_url' => "$ttoptions_dir/images/spray-3-tnail.jpg",
			'description' => __( 'Spray', 'twentyten-options' )
				),
		'suit' => array (
			'url' => "$ttoptions_dir/images/suit.jpg",
			'thumbnail_url' => "$ttoptions_dir/images/suit-tnail.jpg",
			'description' => __( 'Suit', 'twentyten-options' )
				),
		'tokyo' => array (
			'url' => "$ttoptions_dir/images/tokyo.jpg",
			'thumbnail_url' => "$ttoptions_dir/images/tokyo-tnail.jpg",
			'description' => __( 'Tokyo', 'twentyten-options' )
						),
		

	));
}

//

?>
<?php
/**
 * Create a shortcode to insert content of a page of specified ID
 * 
 * @param    array        attributes of shortcode
 * @return     string        $output        Content of page specified, if no page id specified output = null
 * short code to insert in to template 	<?php echo do_shortcode('[pa_insert page="1228"]');?>
 */
function pa_insertPage($atts, $content = null) {
 // Default output if no pageid given
 $output = NULL;
 // extract atts and assign to array
 extract(shortcode_atts(array(
 "page" => '' // default value could be placed here
 ), $atts));
 // if a page id is specified, then run query
 if (!empty($page)) {
 $pageContent = new WP_query();
 $pageContent->query(array('page_id' => $page));
 while ($pageContent->have_posts()) : $pageContent->the_post();
 // assign the content to $output
 $output = get_the_content();
 endwhile;
 }
 return $output;
}
add_shortcode('pa_insert', 'pa_insertPage');