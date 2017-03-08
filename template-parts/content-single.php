<?php
/**
 * Template part for displaying page content in single.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cormentis
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'cm-article' ); ?> itemprop="mainEntity" itemscope itemtype="http://schema.org/Article" >
	<?php cormentis_pre_post_meta(); ?>
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
