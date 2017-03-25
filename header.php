<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yaletown_Dog_Training
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="<?php echo get_bloginfo( 'template_directory' ); ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_bloginfo( 'template_directory' ); ?>/apple-touch-icon.png">
<link rel="icon" type="image/png" href="<?php echo get_bloginfo( 'template_directory' ); ?>/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo get_bloginfo( 'template_directory' ); ?>/favicon-194x194.png" sizes="194x194">
<link rel="icon" type="image/png" href="<?php echo get_bloginfo( 'template_directory' ); ?>/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="<?php echo get_bloginfo( 'template_directory' ); ?>/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php echo get_bloginfo( 'template_directory' ); ?>/manifest.json">
<link rel="mask-icon" href="<?php echo get_bloginfo( 'template_directory' ); ?>/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#242f3a">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'yaletowndog' ); ?></a>

	<header id="masthead" class="site-header scroll_start" role="banner">
		<div class="headwrapper scroll_start">
			<div class="site-branding scroll_start">
				<div class="headerlogosmall scroll_start">
					<a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_bloginfo( 'template_directory' ); ?>/images/footprint_white.png" /></a>
				</div>
				<div class="headerlogotext scroll_start">
					<a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_bloginfo( 'template_directory' ); ?>/images/logotextwhitetransparent.png" /></a>
				</div>
				<?php
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title site-title-header"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation scroll_start" role="navigation">
				<button class="menu-toggle scroll_start" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'yaletowndog' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	<div class="placehold scroll_start"></div>

	<div id="content" class="site-content">
