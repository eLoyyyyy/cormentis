<?php
/**
* Template part for displaying posts
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package cormentis
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'cm-article' ); ?> >
	<header class="entry-header">
		<?php  the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php cormentis_posted_on(); ?>	
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_excerpt();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cormentis' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<footer class="entry-footer">
		<?php cormentis_entry_footer(); ?>
	</footer>
</article>