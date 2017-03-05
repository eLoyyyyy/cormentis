<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cormentis
 */?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<?php 		
		/*$naSiteHeader = "cm-site-header";
		$navWrap = "cm-site-nav-wrap";

		if( is_front_page() ){
			$naSiteHeader = "cm-header";
			$navWrap = "cm-nav-wrap";
		}*/

			$naSiteHeader = "cm-site-header";
			$navWrap = "cm-site-nav-wrap";
	?>
	<header class="<?php echo $naSiteHeader; ?>" role="banner">
		<div >
			<nav class="<?php echo $navWrap; ?> navbar-default navbar-custom" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#cm-nav">
							<span class="sr-only">Cormentis Toggle</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="cm-site-logo">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" role="home"><?php bloginfo( 'name' ); ?></a></h1>	
							<?php 
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $description; /* WPCS: xss ok. */  ?></p>
							<?php endif; ?>
						</div>
					</div>
					<div id="cm-nav" class="collapse navbar-collapse">
						<!-- <ul class="nav navbar-nav navbar-right">
							<li><a href="#@about">About</a></li>
							<li><a href="#@events">Events</a></li>
							<li><a href="#@our-team">Our Team</a></li>
							<li><a href="#@service">Service</a></li>
							<li><a href="#@blog">Blog</a></li>
						</ul> -->
						<?php if( has_nav_menu( 'primary-menu' ) ) : 
							cormentis_nav_menu();
						endif; ?>

					</div>
				</div>
			</nav>
		</div>
	</header>
