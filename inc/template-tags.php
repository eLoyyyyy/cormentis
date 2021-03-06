<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package cormentis
 */

 if ( ! function_exists( 'cormentis_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function cormentis_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="fa fa-calendar"></i> ' . $time_string . '</a>';

	$byline = '<span class="author vcard" itemprop="author"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"> <i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>';

	echo '<span class="posted-on">' . $posted_on . '</span> <span class="byline">' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'cormentis_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function cormentis_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'cormentis' ) );
		if ( $categories_list && cormentis_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'cormentis' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'cormentis' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'cormentis' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'cormentis' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'cormentis' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function cormentis_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'cormentis_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'cormentis_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so cormentis_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so cormentis_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in cormentis_categorized_blog.
 */
function cormentis_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'cormentis_categories' );
}
add_action( 'edit_category', 'cormentis_category_transient_flusher' );
add_action( 'save_post',     'cormentis_category_transient_flusher' );



function cormentis_pre_post_meta(){?>
    <header class="genpost-entry-header">
        <link itemprop="mainEntityOfPage" href="<?php echo esc_url( get_permalink() );?>" />
        <span itemprop="author" itemscope itemtype="http://schema.org/Person"><?php ; ?>
            <link itemprop="url" href="<?php echo get_author_posts_url( the_author_meta( 'ID' ) ); ?>">
            <meta itemprop="name" content="<?php the_author(); ?>">
        </span>
        <meta itemprop="datePublished" content="<?php the_time('c'); ?> ">
        <meta itemprop="dateModified" content="<?php the_modified_time('c'); ?>">
        <span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
            <?php $logo = get_theme_mod( 'site_logo', '' );
            if ( !empty($logo) ) : ?>
            <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                <meta itemprop="url" content="<?php echo esc_url( $logo ); ?>">
            </span>
            <?php endif; ?>
            <meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
        </span>
        <?php the_title( '<h1 class="single-title entry-title">', '</h1>' ); ?>
    		<div class="entry-meta">
    			<?php cormentis_posted_on(); ?>
    		</div><!-- .entry-meta -->
    </header>
<?php
}


/**
 * Remove 'hentry' from post_class()
 */
function cormentis_remove_hentry( $class ) {
	$class = array_diff( $class, array( 'hentry' ) );
	return $class;
}
add_filter( 'post_class', 'cormentis_remove_hentry' );
