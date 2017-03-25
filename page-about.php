<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Yaletown_Dog_Training
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="page-title">
				<h1 id="page-about-title" class="page-title-heading">About Sarah</h1>
		</div>
		<main id="main" class="site-main" role="main">
			<div class="about-wrapper">
				<div class="about-me">
					<?php
            if(function_exists('get_field')){
            	echo '<div class="alignleft">';
            		if ( has_post_thumbnail() ) {
                  the_post_thumbnail();
              echo '</div>';
                		}
                if(get_field('about_me')){
              echo '<div class="content-about-me">';
               			the_field('about_me');
             	echo '</div>';
						?>
						<?php if( have_rows('credential_images') ): ?>
							<div class="credential">
										<!-- <h2 id="credential-heading">Credentials</h2> -->
									<?php while( have_rows('credential_images') ): the_row();
										$image = get_sub_field('credential_image');
										$link = get_sub_field('credential_link');
									?>
										<div class= "credit_image">
										<?php if( $link ): ?>
											<a href="<?php echo $link; ?>" target="_blank">
										<?php endif; ?>
											<img src="<?php echo $image; ?>"/>
										<?php if( $link ): ?>
											</a>
										<?php endif; ?>
										</div>
									<?php endwhile; ?>
							<?php endif;
											} //about_me
									} //get_field
							?>
						</div> <!--  credential -->
					</div> <!--  about-me -->

					<div class="featured-testimonial">
             <?php
			 		 			if(function_exists('get_field')){
						 			if(get_field('featured_testimonial')){
							 			echo '<div class="content-featured-testimonial">';
								 			the_field('featured_testimonial');
										echo '</div>';
									} //featured-testimonial
				 				} //get_field
        			?>
					</div> <!--  featured-testimonial -->

					<div class="right-column-wrapper">
						<div class="a-testimonial">
							<section class="random-testimonial">
				  				<?php
								    $args = array(
								      'post_type' => 'testimonial',
								      'posts_per_page' => 1,
								      'orderby' => 'rand'
								     );
				    		 		$testimonials = new WP_Query( $args );
				      			if ( $testimonials -> have_posts() ){
				      				while ( $testimonials -> have_posts() ) {
				        				$testimonials -> the_post();
													if (function_exists ('get_field')){
														if (get_field('testimonial')){
										 					echo '<h2>';
																the_title();
										 					echo '\'s testimonial:</h2>';
								    					echo '<blockquote><figure>" ';
																the_field('testimonial');
								   						echo ' "</figure>
									 						<figcaption>';
									 							the_title();
									 						echo '</figcaption></blockquote>';
				      							}
													}
												}
				    					wp_reset_postdata();
				    				}
				  				?>
								</section>
							</div> <!--  a-testimonial -->

							<?php
								if(function_exists('get_field')){
									if(get_field('second_image')){
										$secondimage = get_field('second_image'); ?>
										<div class="second-image">
											<img class="aligncenter" src="<?php echo $secondimage['url']; ?>" alt="<?php echo $secondimage['alt']; ?>" />
										</div> <?php
									}
								}
							?>
						</div> <!--  right-column-wrapper -->

				</div> <!--  about-wrapper -->
			</main><!-- #main -->
		</div><!-- #primary -->
<?php
get_footer();
