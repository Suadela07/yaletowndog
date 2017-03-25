<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Yaletown_Dog_Training
 */

get_header(); ?>
<div class="page-title">
		<h1 id="page-blog-title" class="page-title-heading">Blog</h1>
</div>
<div class="index-wrapper">
	<div class="blog-wrapper">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content' );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
echo '</div>';
get_footer();
