// some useful functions include as needed
///

<?php
/* add header widget
    register_sidebar( array(  
        'name' => __( 'Header Widget', 'twentyeleven-child' ),  
        'id' => 'header-widget',  
        'before_widget' => '<div id="%1$s" class="widget %2$s">',  
        'after_widget' => "</div>",  
        'before_title' => '<h3 class="widget-title">',  
        'after_title' => '</h3>',  
    ) );  
    ?>  
	<?php     function techild_header_widget(){  
        if ( ! dynamic_sidebar( 'header-widget' ) ) :  
            get_search_form();  
        endif;  
    }  */

	
	
/*  <?php  // add new post types
	add_action('init', 'create_post_types');
	function create_post_types() {
		register_post_type(
			'wods',
			array(
				'labels' => array(
					'name' => __( 'WODs' ),
					'singular_name' => __( 'WOD' ),
					'add_new' => __( 'Add WOD' ),
					'add_new_item' => __( 'Add New WOD' ),
					'edit' => __( 'Edit' ),
					'edit_item' => __( 'Edit WOD' ),
					'new_item' => __( 'New WOD' ),
					'view' => __( 'View WOD' ),
					'view_item' => __( 'View WOD' ),
					'search_items' => __( 'Search WODs' ),
					'not_found' => __( 'No WODs found' ),
					'not_found_in_trash' => __( 'No WODs found in the Trash' ),
				),
				'public' => true,
				'show_ui' => true,
				'menu_position' => 5,
				'menu_icon' => get_stylesheet_directory_uri() . '/library/images/icon-wod.png',
				'query_var' => true,
				'supports' => array( 'title', 'editor' ),
				'rewrite' => array( 'slug' => 'wod', 'with_front' => false ),
				'can_export' => true
			)
		);
		register_post_type(
			'events',
			array(
				'labels' => array(
					'name' => __( 'Events' ),
					'singular_name' => __( 'Event' ),
					'add_new' => __( 'Add Event' ),
					'add_new_item' => __( 'Add New Event' ),
					'edit' => __( 'Edit' ),
					'edit_item' => __( 'Edit Event' ),
					'new_item' => __( 'New Event' ),
					'view' => __( 'View Event' ),
					'view_item' => __( 'View Event' ),
					'search_items' => __( 'Search Events' ),
					'not_found' => __( 'No Events found' ),<h4></h4>
					'not_found_in_trash' => __( 'No Events found in the Trash' ),
				),
				'public' => true,
				'show_ui' => true,
				'menu_position' => 5,
				'menu_icon' => get_stylesheet_directory_uri() . '/library/images/icon-event.png',
				'query_var' => true,
				'supports' => array( 'title', 'editor' ),
				'rewrite' => array( 'slug' => 'event', 'with_front' => false ),
				'can_export' => true
			)
		);
		?>
		
		
*/


/*
<?php 




// smart jquery inclusion
if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, '1.3.2');
	wp_enqueue_script('jquery');
}


// enable threaded comments
function enable_threaded_comments(){
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script('comment-reply');
		}
}
add_action('get_header', 'enable_threaded_comments');



// add google analytics to footer
function add_google_analytics() {
	echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');


// custom excerpt ellipses for 2.9+
function custom_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

/* custom excerpt ellipses for 2.8-  included for old verision
>function custom_excerpt_more($excerpt) {
>	return str_replace('[...]', '...', $excerpt);
>}
>add_filter('wp_trim_excerpt', 'custom_excerpt_more'); 



// no more jumping for read more link
function no_more_jumping($post) {
	return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
}
add_filter('excerpt_more', 'no_more_jumping');


// add a favicon for your admin
function admin_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/images/favicon.png" />';
}
add_action('admin_head', 'admin_favicon');


// custom admin login logo
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url('.get_bloginfo('template_directory').'/images/custom-login-logo.png) !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');


// disable all widget areas
function disable_all_widgets($sidebars_widgets) {
	//if (is_home())
		$sidebars_widgets = array(false);
	return $sidebars_widgets;
}
add_filter('sidebars_widgets', 'disable_all_widgets');



// category id in body and post class
function category_id_class($classes) {
	global $post;
	foreach((get_the_category($post->ID)) as $category)
		$classes [] = 'cat-' . $category->cat_ID . '-id';
		return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');


// get the first category id  when working with different categories is the ability to get the first category ID of the current post.
function get_first_category_ID() {
	$category = get_the_category();
	return $category[0]->cat_ID;
}

add_filter('user_contactmethods','hide_profile_fields',10,1);

function hide_profile_fields( $contactmethods ) {
unset($contactmethods['aim']);
unset($contactmethods['jabber']);
unset($contactmethods['yim']);
return $contactmethods;
}

// fancy up your RSS feeds - add an ADvert and thumbnail

function wpbeginner_postrss($content) {
if(is_feed()){
$content = 'This post was written by Syed Balkhi '.$content.'Check out WPBeginner';
}
return $content;
}
add_filter('the_excerpt_rss', 'wpbeginner_postrss');
add_filter('the_content', 'wpbeginner_postrss');

// Add Tumbnails to your RSS Feeds

function rss_post_thumbnail($content) {
global $post;
if(has_post_thumbnail($post->ID)) {
$content = '<p>' . get_the_post_thumbnail($post->ID) .
'</p>' . get_the_content();
}
return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');


// ad a shortcode to your post to add a donate button

function donate_shortcode( $atts ) {

extract(shortcode_atts(array(
'text' => 'Make a donation',
'account' => 'REPLACE ME',
'for' => '',
), $atts));

global $post;

if (!$for) $for = str_replace(" "," ",$post->post_title);

return '<a class="donateLink" href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$account.'&item_name=Donation for '.$for.'">'.$text.'</a>';

}
add_shortcode('donate', 'donate_shortcode');

//
// Functions that need work
//  
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
//
//
//customize footer
//did not work in twenty eleven added footer.php
//function remove_footer_admin () {
//echo 'Fueled by <a href="http://www.occupywa.org" target="_blank">The OccupyMovement</a> | Designed by <a href="http://www.occupynw.org" target="_blank">NWW</a> | WordPress Tutorials: <a href="http://www.occupyseattle.org" target="_blank">Occupy Seattle</a></p>';
//}
// add_filter('admin_footer_text', 'remove_footer_admin');




//
