<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Yaletown_Dog_Training
 */

get_header(); ?>
<div class="page-title">
		<h1 id="page-single-title" class="page-title-heading">Blog Post</h1>
</div>
<div class="index-wrapper">
	<div class="blog-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
    echo '</div>';
get_footer();
