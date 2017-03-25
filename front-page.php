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

get_header('front'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if( have_rows('image_slider') ): ?>
				<div class="flexslider gallery-slider">
					<ul class="slides gallery-slides">
						<?php while( have_rows('image_slider') ): the_row();
							$image = get_sub_field('slider_image');
							$quote = get_sub_field('slider_quote');
							$author = get_sub_field('slider_author');

							$url = $image['url'];
							$alt = $image['alt'];

							$size = 'large-slider';
							$myimage = $image['sizes'][ $size ];
							$width = $image['sizes'][ $size . '-width' ];
							$height = $image['sizes'][ $size . '-height' ];

						?>
						<li>
							<div class="slider-text">
								<?php if( $quote ): ?>
								<div class="slider_quote">
									<h3><?php echo $quote; ?></h3>
								</div>
								<?php endif; ?>
								<?php if( $author ): ?>
								<div class="slider_author">
									<h4><?php echo $author; ?></h4>
								</div>
								<?php endif; ?>
							</div>
						<div class="slider_image">
							<img src="<?php echo $myimage; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>"/>
						</div>
						<?php endwhile; ?>
						</li>
						<?php endif; ?>
					</ul>
				</div>


			<div class="site-description">
				<?php
            if(function_exists('get_field')){
                if(get_field('site_description')){
                    the_field('site_description');
                }
            }
        ?>
			</div>
      <div class="wrapper">
		<div class="services">
			<?php if( have_rows('service_fields') ): ?>

			<?php while( have_rows('service_fields') ): the_row();

				$icon = get_sub_field('service_icon');
				$title = get_sub_field('service_title');
				$content = get_sub_field('service_text');
				$link = get_sub_field('service_icon_link');

				?>
				<div class="single-service">

					<?php if( $link ): ?>

								<a href="<?php echo $link; ?>"><img class="aligncenter" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />

					<?php endif; ?>

					<?php if( $link ): ?>
								</a>
					<?php endif; ?>

				  <h4><?php echo $title; ?></h4>

					<p><?php	echo $content; ?></p>
				</div>
			<?php endwhile; ?>

		<?php endif; ?>
	</div>
</div>
<div class="front-page-testimonials">
  <div class="front-page-testimonials-wrapper">
		<?php get_template_part( 'template-parts/randomtestimonial' ); ?>
  </div>
</div>
<div class="wrapper">
	<div class="page-links">
		<?php if( have_rows('page_fields') ): ?>

		<?php while( have_rows('page_fields') ): the_row();

			$icon = get_sub_field('page_icon');
			$title = get_sub_field('page_title');
			$content = get_sub_field('page_description');
			$link = get_sub_field('page_icon_link');

			?>
		<div class="single-page-link">

				<?php if( $link ): ?>

					<a href="<?php echo $link; ?>"><img class="aligncenter" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />

				<?php endif; ?>

				<?php if( $link ): ?>
					</a>
				<?php endif; ?>

				<h4><?php echo $title; ?></h4>

				<p><?php	echo $content; ?></p>
		</div>
		<?php endwhile; ?>

		<?php endif; ?>
	</div>

</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer('front');
