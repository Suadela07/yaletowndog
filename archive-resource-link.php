<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Yaletown_Dog_Training
 */

get_header(); ?>
<div class="page-title">
		<h1 id="page-resources-title" class="page-title-heading">Resources</h1>
</div>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">
		<div class="gotoblogpage">
			<h2>Looking for dog training articles?</h2>
			<p>Click here to go to my blog</p>
		</div></a>
		<div class="resource_wrapper">
		<?php
				$args = array(
						'post_type' => 'resource-book',
						'post_per_page' => -1,
				);
				$resourcelist = new WP_Query( $args );
				if ( $resourcelist->have_posts() ) { ?>

				<h2>Books</h2>
				<div class="book-wrapper">
					<?php
						while( $resourcelist->have_posts() ) {
								$resourcelist->the_post(); ?>
						<figure class="books_pic">
							<div class="book">
					<?php	$image = get_field('book_image');?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'];?>" />
								<div class="titleauthorwrap">
									<div class="book_image_height">
						<?php
								if (function_exists ('get_field')){
									if(get_field('book_url')){ ?>
										 <a target="_blank" href=" <?php the_field('book_url'); ?> "> <?php the_title() ?> </a> <?php
									 }
								}
						?>
									</div> <!-- close book-image-height -->
									<div class="author">
						<?php
								if(function_exists ('get_field')){
										if(get_field('book_author')){
												the_field('book_author');
										}
								} ?>
							</div> <!-- close author -->
						</div> <!-- close titleauthorwrap -->
						</div> <!-- close book -->
					</figure> <!-- close books_pic -->
					<?php
						} //close while loop
					?>
				</div> <!-- close book-wrapper -->

			<?php
					wp_reset_postdata();
				} //close resourcelist have_posts
      ?>

				<div class="resource-blogs">
				<?php
            $args = array(
                'post_type' => 'resource-link',
                'post_per_page' => -1,
                'tax_query' => array(
                    array(
                    'taxonomy' => 'link-category',
                    'field' => 'slug',
                    'terms' => 'blog'
                    )
                )
            );
            $resourcelist = new WP_Query( $args );
            if ( $resourcelist->have_posts() ) {
                echo '<h2>Blogs</h2>';
								echo '<ul>';
                while( $resourcelist->have_posts() ) {
                    $resourcelist->the_post();

                    echo '<li><a target="_blank" href="';
                    if (function_exists ('get_field')){
                        if(get_field('link_url')){
                            the_field('link_url');
                        }
                    }
                    echo '">';
                    the_title();
                    echo '</a></li>';
                }
								echo '</ul>';
            	wp_reset_postdata();
            }
          ?>
				</div> <!-- close resource-blogs -->
				<div class="resource-websites">
          <?php
                $args = array(
                    'post_type' => 'resource-link',
                    'post_per_page' => -1,
                    'tax_query' => array(
                        array(
                        'taxonomy' => 'link-category',
                        'field' => 'slug',
                        'terms' => 'website'
                        )
                    )
                );
            	$resourcelist = new WP_Query( $args );
            	if ( $resourcelist->have_posts() ) {
                echo '<h2>Websites</h2>';
								echo '<ul>';
                while( $resourcelist->have_posts() ) {
                    $resourcelist->the_post();
                    echo '<li><a target="_blank" href="';
                    if (function_exists ('get_field')){
                        if(get_field('link_url')){
                            the_field('link_url');
                        }
                    }
                    echo '">';
                    the_title();
                    echo '</a></li>';
	               }
								echo '</ul>';
	            wp_reset_postdata();
	            }
          ?>
				</div> <!-- close resource-websites -->
			</div> <!-- close resource-wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
