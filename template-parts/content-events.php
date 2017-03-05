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
		<div class="panel panel-default">
			<div class="panel-heading">
				<em>Details</em>
			</div>
			<div class="panel-body">
				<ul class="list-unstyled">
	        <li itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            <a itemprop="url" href="<?php the_permalink(); ?>">
						<p>From:
							<?php $start_date = date( 'Y-m-d H:i:s', get_post_meta( get_the_ID(), 'events_startdate', true ) ); ?>
            	<span itemprop="validFrom" content="<?php echo get_date_from_gmt( $start_date, 'c' ); ?>"><?php echo get_date_from_gmt( $start_date, 'F j, Y' ); ?></span>
						</p>
						<p>To:
							<?php $end_date = date( 'Y-m-d H:i:s', get_post_meta( get_the_ID(), 'events_enddate', true ) ); ?>
            	<span itemprop="validTo" content="<?php echo get_date_from_gmt( $end_date, 'c' ); ?>"><?php echo get_date_from_gmt( $end_date, 'F j, Y' ); ?></span>
						</p>
          </li>
	      </ul>
			</div>
		</div>
		<?php
			echo '<pre>' . print_r( get_post_meta( get_the_ID() ) ) . '</pre>';

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
