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
		<h1 id="page-service-title" class="page-title-heading">Services</h1>
	</div>
	<main id="main" class="site-main" role="main">
		<div class="services-wrapper">
			<section class="dog-training">
				<div class="dog-training-content">
					<?php
						 if(get_field('dog_training')){
							 echo '<div class="service-about-me">';
										 the_field('dog_training');
							 echo '</div>';
						 			}
									if(function_exists('get_field')){
							 echo '<div class="dog-training-image">'; //this div contains the image and the price section in a column
									if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									}
						?>
						<section class="prices">
						<?php
									if(function_exists('get_field')){
											if(get_field('prices')){
													echo '<h2>Prices</h2>';
													the_field('prices');
											}
									}
							?>
					 </section>
				 </div> <!-- dog-training-image -->
					  <?php
			 						}
		        ?>
				</div> <!-- dog-training-content -->
			</section> <!-- dog-training -->
			<div class="bottom-wrapper">
					<div class="class-image">
						<?php
		            if(function_exists('get_field')){
										if(get_field('classes_image')) {
											echo '<img src="';
											the_field('classes_image');
											echo '">';
										}
		            }
		        ?>
					</div>
					<div class="classes-skype-wrapper">
						<section class="classes">
							<?php
			            if(function_exists('get_field')){
			                if(get_field('classes')){
			                  echo '<h2>Classes</h2>';
			                  the_field('classes');
			                }
			            }
			        ?>
						</section>
						<section class="skype">
							<?php
			            if(function_exists('get_field')){
			                if(get_field('skype')){
			                    echo '<h2>Skype Sessions</h2>';
			                    the_field('skype');
			                }
			            }
			        ?>
						</section>
					</div> <!-- classes-skype-wrapper -->
				</div> <!-- bottom-wrapper -->
		</div> <!-- services-wrapper -->
	</main><!-- #main -->
	<div class="randomtestimonial">
		<div class="service-testimonial">
			<?php get_template_part( 'template-parts/randomtestimonial' ); ?>
		</div>
	</div>
</div><!-- #primary -->
<?php
get_footer();
