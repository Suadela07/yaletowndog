<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yaletown_Dog_Training
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="sidebar" role="complementary">

	<div class="searchbar">
	  <?php echo get_search_form(); ?>
	</div>

	<div class="recent-posts">

    <?php if( is_single()){?>
		<div class="returntoblogdiv">
    	<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="returntoblog">Return to Blog</a>
		</div>
		<?php }?>

		<h3>Recent Posts</h3>
		<?php
		    $recent_posts = wp_get_recent_posts();
				echo '<ul>';
		    foreach( $recent_posts as $recent ){
		        echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.$recent["post_title"].'" >' .   $recent["post_title"].'</a> </li> ';
		    }
				echo '</ul>';
		?>
	</div>

	<div class="blog-categories">
		<h3>Categories</h3>

		<ul>
		<?php wp_list_cats(); ?>
		</ul>

	</div>

</aside><!-- #secondary -->
