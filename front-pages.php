<?php 
/**
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package cormentis
*/

get_header();

if ( 'page' == get_option( 'show_on_front' ) ) : ?>


	<div class="cm-subscribe cm-light-gray">
		<div class="container">
			<?php echo do_shortcode("[newsletter_form form='1']"); ?>
		</div>
	</div>
	<section class="cm-procedure clearfix">
		<div class="container">
			<div class="col-sm-12 col-md-7">
				<h2 class="cm-section-heading cm-violet">About <span class="cm-red">us</span></h2>
				<p class="cm-gray text-medium">Vision</p>
				<p>
					In 2022 CORMENTIS Co is leading as a soft skills training institution in the country, which established integrity and reputation in terms of empowering entrepreneur’s character and soft competencies.
				</p>
				<p class="cm-gray text-medium">Mission</p>
				<p>
					To empower entrepreneur’s character, leadership, and personality through effective and quality trainings and program, which will help them to share their passion, goals and vision to their employees, partners and clients. 
				</p>
				<p class="cm-gray text-medium">Goals</p>
				<p>
					Cormentis Co. sets her following goal as a company who provides soft skills;
				<ul>
					<li>Be able to reach all the capital cities in the country in empowering people’s character, personality and skills.</li>
					<li>To provide accessible and advance training facilities for the clients.</li>
					<li>To provide effective trainings, workshop and coaching program;</li>
					<li>To be one of the top performing soft skills training provider in terms of client’s satisfaction and net worth.</li>
				</ul>
				</p>
			</div>
		</div>
	</section>
	<section class="cm-testimonials">
		<div class="container cm-banner">
			<ul>
				<li>
					<blockquote class="cm-quote">
						<p>Denim you probably haven't heard of. Lorem ipsum dolor met consectetur adipisicing sit amet, consectetur adipisicing elit, of them jean shorts sed magna aliqua. Lorem ipsum dolor met.</p>
					</blockquote>
					<span class="cm-divider"></span>
					<div class="cm-quote-details">
						<span class="cm-quote-name">Miguel Benjamín Ángel Arredondo Jímenez</span>
						<span class="cm-quote-post">One Lane | CEO</span>
					</div>
				</li>
				<li>
					<blockquote class="cm-quote">
						<p>Nunc vestibulum nisl eget nibh aliquam ultricies. Fusce mattis euismod diam, et aliquet justo tristique nec. Curabitur finibus odio ac diam iaculis finibus. In quis lacinia leo. Suspendisse luctus, tortor eget lacinia imperdiet, elit erat commodo augue, ac fringilla ipsum augue laoreet mi. Phasellus varius quis orci non cursus. Nulla justo justo</p>
					</blockquote>
					<span class="cm-divider"></span>
					<div class="cm-quote-details">
						<span class="cm-quote-name">José Alfredo Nieto</span>
						<span class="cm-quote-post">Web Developer</span>
					</div>
				</li>
				<li>
					<blockquote class="cm-quote">
						<p>Denim you probably haven't heard of. Lorem ipsum dolor met consectetur adipisicing sit amet, consectetur adipisicing elit, of them jean shorts sed magna aliqua. Lorem ipsum dolor met.</p>
					</blockquote>
					<span class="cm-divider"></span>
					<div class="cm-quote-details">
						<span class="cm-quote-name">Jorge Alberto Ventura</span>
						<span class="cm-quote-post">Graphic Designer</span>
					</div>
				</li>
			</ul>
		</div>
	</section>
	<section class="cm-contact-us">
		<div class="container text-center">
			<h2 class="cm-section-heading cm-white">Contact Us</h2>
			<div class="col-md-6 center-block">
				<form>
					<div class="form-group">
							<input type="email" class="form-control" id="full_name" placeholder="Full Name">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="email" placeholder="Email Address">
						</div>
						<div class="form-group">
							<textarea class="form-control" placeholder="Message"></textarea>
						</div>
					<button type="submit" class="btn btn-danger btn-lg btn-block">Submit</button>
				</form>
			</div>
		</div>
	</section>
<?php else : ?>
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
endif;

get_footer(); ?>
