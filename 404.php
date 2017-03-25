<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Yaletown_Dog_Training
 */

get_header(); ?>
<div class="page-title-404">
		<h1 id="page-404-title" class="page-title-heading"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'yaletowndog' ); ?></h1>
</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="wrapper-404">
			<section class="error-404 not-found">


				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'yaletowndog' ); ?></p>

					<?php
						get_search_form();
						echo '<div class="recententriesdiv">';
						the_widget( 'WP_Widget_Recent_Posts' );
						echo '</div>';
						// Only show the widget if site has multiple categories.
						if ( yaletowndog_categorized_blog() ) :
					?>

					<div class="widget2 widget_categories_2">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'yaletowndog' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->

					<?php
						endif;

						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'yaletowndog' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

						the_widget( 'WP_Widget_Tag_Cloud' );
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
