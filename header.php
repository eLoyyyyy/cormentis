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
		$naSiteHeader = "cm-site-header";
		$navWrap = "cm-site-nav-wrap";

		if( is_front_page() ){
			$naSiteHeader = "cm-header cm-bg-wrap";
			$navWrap = "cm-nav-wrap";

			$wrap = "";
			$wrap .= '<div class="container">';
				$wrap .= '<div class="cm-motive-wrap">';
					$wrap .= '<h1 class="cm-motive">Empowering People’s <span class="cm-italic">Character</span> for Competence &amp; Excellence.</h1>';
				$wrap .= '</div>';
			$wrap .='</div>';


		}
	?>
	<header class="<?php echo $naSiteHeader; ?>" role="banner">
		<?php if( is_front_page() ) : ?>
			<div class="cm-nav-trans"></div>
		<?php endif;?>
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
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" role="home" class="navbar-brand"><?php bloginfo( 'name' ); ?></a></h1>
						<?php 
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */  ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div id="cm-nav" class="collapse navbar-collapse">
					<?php if( has_nav_menu( 'primary-menu' ) ) : 
						cormentis_nav_menu();
					endif; ?>

				</div>
			</div>
		</nav>
		
		<?php echo $wrap;?>
	</header>
