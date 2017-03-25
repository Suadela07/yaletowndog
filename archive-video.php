<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Yaletown_Dog_Training
 */

get_header(); ?>

<div id="primary" class="content-area">

		<div class="page-title">
				<h1 id="page-videos-title" class="page-title-heading">Videos</h1>
		</div>

	<div class="video-wrapper">

			<main id="main" class="site-main" role="main">
				<h2 class="filtertitle">Video Categories:</h2>
				<section class="filter widget">
							<ul id="filters" class="filter-list" data-group="video-category">
								<li><a href="#" data-filter="*" class="selected">All</a></li>

								<?php

									$terms = get_terms( 'video-category' );

									if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
											foreach( $terms as $term) {
							 				echo '<li><a href="#" data-filter=".'.$term->slug.'">' . $term->name . '</a></li>';
											}
									}

								?>
						</ul>
				</section>

<div id="video-list" class="video-flex-wrapper">
		<?php
			$args = array(
				'post_type'=> 'video',
				'posts_per_page' => -1
			);

			$videos = new WP_Query($args);
			//var_dump($videos);
			if ( $videos->have_posts() ) {
				while($videos->have_posts()) {
					$videos->the_post();
					//echo '<h3>Something!</h3>';
					//the_title();
					$termList = get_the_terms( $post->object, 'video-category' );
					$termName = "";

					foreach ( $termList as $term ) { // for each term
              $termName .= $term->slug.' '; //create a string that has all the slugs
          }

					if( function_exists('get_field') ) {
							if( get_field('video_url') ) {
								echo '<div class="'. $termName. 'item video-item">';
								the_field('video_url');
								echo '<h3 class="video-time-title">';
								the_title();
								echo '</h3>';
							}
							if( get_field('video_description') ) {
								echo '<p class="video_description">';
								the_field('video_description');
								echo '</p>';
							}
							echo '</div>';
					}
				}
			}
		?>
</div><!-- video-flex-wrapper -->

		</main><!-- #main -->
	</div><!-- video-wrapper -->
</div><!-- #primary -->
<?php
get_footer();
