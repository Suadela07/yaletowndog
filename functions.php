<?php
/**
 * Yaletown Dog Training functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Yaletown_Dog_Training
 */

if ( ! function_exists( 'yaletowndog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function yaletowndog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Yaletown Dog Training, use a find and replace
	 * to change 'yaletowndog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'yaletowndog', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size('large-slider', 2000, 550, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'yaletowndog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'yaletowndog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function yaletowndog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'yaletowndog_content_width', 640 );
}
add_action( 'after_setup_theme', 'yaletowndog_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function yaletowndog_scripts() {
	wp_enqueue_style( 'yaletowndog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'yaletowndog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'yaletowndog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if(is_page( array( "service", "about") ) || is_front_page()){

			wp_enqueue_style( 'flexslider-style', get_template_directory_uri() . '/flexslider.css');

			wp_enqueue_script( 'yaletown-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '', true);

			wp_enqueue_script( 'flexsettings', get_template_directory_uri() . '/js/flexslider-setting.js', array('yaletown-flexslider'), '', true);
	}

	if (is_post_type_archive('video') ) {
		wp_register_script( 'yaletown-imagesloaded', get_template_directory_uri() . '/js/libs/imagesloaded.pkgd.min.js', array( 'jquery'), '4.1.1', true);
		wp_register_script( 'yaletown-isotope', get_template_directory_uri() . '/js/libs/isotope.pkgd.min.js', array('yaletown-imagesloaded'), '3.0.1', true);
		wp_enqueue_script( 'yaletown-isotopesettings', get_theme_file_uri('/js/isotope-settings-video.js'), array('yaletown-isotope'), '1.0', true);
	}
}
add_action('wp_enqueue_scripts', 'yaletowndog_scripts');

/**
* Removes "Contacts" from admin panel for users without Administrative privilege
*/
if (!(current_user_can('administrator'))) {
	function remove_wpcf7() {
	remove_menu_page( 'wpcf7' );
	}
add_action('admin_menu', 'remove_wpcf7');
}

/*
* Resize youtube embeds
*/
add_filter( 'embed_defaults', 'bigger_embed_size' );
	function bigger_embed_size() {
	return array( 'width' => 900, 'height' => 600 );
	}

add_action( 'wp_enqueue_scripts', 'yaletowndog_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
* Create customized admin footer
*/
add_filter('admin_footer_text', 'left_admin_footer_text_output'); //left side
		function left_admin_footer_text_output($text) {
    $text = 'Thank you for creating with us (Craig,Crystal,Jenn)';
    return $text;
}

add_filter('update_footer', 'right_admin_footer_text_output', 11); //right side
		function right_admin_footer_text_output($text) {
    $text = 'Purely powered by our love for puppies.';
    return $text;
}

/**
* Remove items from post dashboard
*/
function my_columns_filter( $columns ) {
	unset($columns['tags']);
	unset($columns['comments']);

  return $columns;
}

add_filter( 'manage_edit-post_columns', 'my_columns_filter',10, 1 );


/**
* Enqueue admin login screen stylesheet
*/
function my_login_stylesheet() {

	wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/login.css' );

}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

/**
* Add logo to admin login screen
*/
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Title for Logo Link';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/**
* Add custom message to admin login screen
*/
function the_login_message($message){
    if(empty($message)){
        return "<p class='welcome'>Welcome back Sarah!</p>";
    }else{
        return $message;
    }
}
add_filter('login_message', 'the_login_message');

/**
* Change error messages on admin login screen
*/
add_filter( 'login_errors', function( $error ) {
	global $errors;
	$err_codes = $errors->get_error_codes();

	// Invalid username.
	// Default: '<strong>ERROR</strong>: Invalid username. <a href="%s">Lost your password</a>?'
	if ( in_array( 'invalid_username', $err_codes ) ) {
		$error = '<strong>On no!</strong> Are you sure that\'s your username?';
	}

	// Incorrect password.
	// Default: '<strong>ERROR</strong>: The password you entered for the username <strong>%1$s</strong> is incorrect. <a href="%2$s">Lost your password</a>?'
	if ( in_array( 'incorrect_password', $err_codes ) ) {
		$error = '<strong>Oops!</strong> I think you typed the wrong password!';
	}

	return $error;
} );

/**
* Add new dashboard widget
*/
function tutorials_add_dashboard_widgets() {

	wp_add_dashboard_widget(
      'tutorials_dashboard_widget',         // Widget slug.
      'Tutorials',         		    // Title.
      'tutorials_dashboard_widget_function' // Display function.
  );
}
add_action( 'wp_dashboard_setup', 'tutorials_add_dashboard_widgets' );


function tutorials_dashboard_widget_function() { ?>

			<section>
		    <div id="widget">
		         <h1>How to add/edit content on your website!</h1>
		    </div>

				<article class="tutorial-content">
					<h3>To add or edit content on the home page:</h3>
						<ul>
							<li>Click Pages in the sidebar.</li>
							<li>Click Home from the list of pages.</li>
							<li>You can edit the site description, hero image slider and quote, Service section and Page sections from here.</li>
							<li>Remember to click 'Publish' or 'Update' before leaving the page!</li>
						</ul>

					<h3>To add or edit content on the services page:</h3>
						<ul>
							<li>Click Services from the list of pages.</li>
							<li>You can edit dog training, prices, classes and skype content sections from here.</li>
							<li>Remember to click 'Publish' or 'Update' before leaving the page!</li>
						</ul>

					<h3>To add or edit content on the videos page:</h3>
						<ul>
							<li>Click Videos in the sidebar.</li>
							<li>Click Add New or on the title of the video you would like to edit.</li>
							<li>For a new entry, add a title. Copy and paste the URL from youtube into the editor and the video will appear. Enter a description for the video. In the right hand column choose a category for that video to be sorted into. You can add categories or use the ones already included. (Videos can also be sorted into more than one category at a time)</li>
							<li>Remember to click 'Publish' or 'Update' before leaving the page!</li>
						</ul>

					<h3>To add or edit content on the blogs page:</h3>
						<ul>
							<li>Click Posts in the sidebar.</li>
							<li>Click Add New or on the title of the blog post you would like to edit.</li>
							<li>For a new entry, add a title and content. You can include a featured image, categories to sort by and images in the text from this page.</li>
							<li>Remember to click 'Publish' or 'Update' before leaving the page!</li>
						</ul>

					<h3>To add or edit content on the about page:</h3>
						<ul>
							<li>Click Pages in the sidebar.</li>
							<li>Click About from the list of pages.</li>
							<li>You can add information about you, a larger testimonial (like Bonnie’s we currently have there), your credential images and the links to their pages as well as remove or change the second image that appears under the random testimonial.</li>
							<li>Remember to click 'Publish' or 'Update' before leaving the page!</li>
						</ul>

					<h3>To add or edit content on the contact page:</h3>
						<ul>
							<li>Click Pages in the sidebar.</li>
							<li>Click Contact from the list of pages.</li>
							<li>You can edit the text that appears on this page.</li>
							<li>Remember to click 'Publish' or 'Update' before leaving the page!</li>
						</ul>

					<h3>To add or edit a book resource:</h3>
						<ul>
							<li>Click on Book Resources in the sidebar.</li>
							<li>Click Add New or on the title of the book resource you would like to edit.</li>
							<li>For a new entry, add a title, book image, book author and the url from wherever you would like (we currently used amazon)</li>
							<li>Remember to click 'Publish' or 'Update' before leaving the page!</li>
						</ul>

					<h3>To add or edit a website or blog resource:</h3>
						<ul>
							<li>Click on Link Resources in the sidebar.</li>
							<li>Click Add New or on the title of the blog or website you would like to edit.</li>
							<li>For a new entry, add a title, copy and paste the url of the blog or website and then in the right hand column choose whether it is a blog or a website so it will be sorted into those sections</li>
							<li>Remember to click 'Publish' or 'Update' before leaving the page!</li>
						</ul>

					<h3>To add or edit a testimonial:</h3>
						<ul>
							<li>Click on Testimonials in the sidebar</li>
							<li>Click Add New or on the title of the testimonial you would like to edit.</li>
							<li>For a new entry, add the author and the testimonial content. A featured image can also be added.</li>
							<li>Remember to click 'Publish' or 'Update' before leaving the page!</li>
						</ul>

				</article>
			</section>

    <style>
         #widget h1 {
            color: #21517f;
						margin-bottom: 10px;
         }

				 #dashboard-widgets h3 {
				 		font-size: 20px;
				 }

				 .tutorial-content li {
				 		list-style: disc;
						margin-left: 20px;
						font-size: 15px;
				 }
    </style>

<?php }
