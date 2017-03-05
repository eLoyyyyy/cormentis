<?php
/*if ( !defined( 'ABS_PATH' ) ) :
	exit();
endif;*/

/**
* The main template file
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package cormentis
*/

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<?php
							if ( have_posts() ) :

								if ( is_home() && ! is_front_page() ) { ?>
									<header>
										<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
									</header>
								<?php }
							
								while ( have_posts() ) : the_post();

									/*
									* Include the Post-Format-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Format name) and that will be used instead.
									*/

									get_template_part( 'template-parts/content', get_post_format() );

								endwhile;

								the_posts_navigation(  );
							else :

								get_template_part( 'template-parts/content', 'none' );
							endif;
						?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div><!-- #container -->
<?php
get_footer(); /*footer*/