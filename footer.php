<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yaletown_Dog_Training
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info footwrapper">
			<div class="footercontact">
				<h4>Contact Sarah directly</h4>
				<div class="contactbuttons">
					<i class="fa fa-phone" aria-hidden="true"></i><a href="tel:16046833318">&nbsp; +1 (604) 868-8633</a><br>
					<i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:sarah@yaletowndogtraining.com"> sarah@yaletowndogtraining.com</a>
				</div>
			</div>
			<div class="footerlogo">
				<a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_bloginfo( 'template_directory' ); ?>/images/footprint_white.png" /></a>
			</div>
			<div class="footersocial">
				<a href="https://www.facebook.com/yaletowndogtraining/" target="_blank"><i class="fa fa-facebook" aria-hidden="true">&nbsp;</i></a>
				<a href="https://www.youtube.com/channel/UC1JMZvs-jH3Gvh_Yl7_eSaw" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
			</div>
		</div><!-- .site-info -->
		<div class="sitecopyright">
			<p>&copy; 2017 Yaletown Dog Training</p>
			<p id="footcredits"><strong>Some images courtesy of:</strong> <a href="http://www.pawdography.com/" target="_blank">pawDOGraphy</a> | <strong>Design by:</strong> <a href="http://www.craigdarcy.ca" target="_blank">Craig D'Arcy</a>, <a href="http://chenderson.htpwebdesign.ca/Portfolio" target="_blank">Crystal Henderson</a>, and <a href="http://jhernandez.htpwebdesign.ca/portfolio/" target="_blank">Jenniffer Hernandez</a></p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
