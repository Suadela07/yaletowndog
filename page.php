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
<?php
	if(is_page('Contact')){
		echo '<div class="page-title">';
			echo	'<h1 id="page-contact-title" class="page-title-heading">Contact</h1>';
		echo '</div>';
	}
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<?php
		if(is_page('Contact')){
			echo '<div class="contact-wrapper">';
		}
	?>
		<section class="contact-info">
	<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
	?>
			<div class="contactsocial">
				<h2>Follow Yaletown Dog Training</h2>
				<a href="https://www.facebook.com/yaletowndogtraining/" target="_blank"><i class="fa fa-facebook" aria-hidden="true">&nbsp;</i></a>
				<a href="https://www.youtube.com/channel/UC1JMZvs-jH3Gvh_Yl7_eSaw" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
			</div>
	<?php
				if(function_exists('get_field')){
					if(get_field('service_location')){
						echo '<div class="service-location">';
							the_field('service_location');
						echo '</div>';
					}
				}
		?>
		</section>
		<div class="contact-form">
	<?php
        if(is_page('Contact')){
					echo '<h2>Contact Sarah Now:</h2>';
          echo do_shortcode('[contact-form-7 id="118" title="Contact form 1"]');
        }
  ?>
		</div>
		<div class="map">
		<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
		?>
		</div>

		<?php
			if(is_page('Contact')){
				echo '</div>';
			}
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
