<?php
/**
 * Template part for displaying page content in single.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cormentis
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'cm-article' ); ?> >
	<header class="entry-header">
		<?php the_title( '<h1 class="single-title entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php cormentis_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cormentis' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php cormentis_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->