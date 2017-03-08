<?php
if ( !defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;
/* custom breadcrumbs */
/*
 *
 *  Note; this is the custom breadcrumb modification for Bootstrap.
 *  It's classes and structure came from the Materialize breadcrumb component.
 *
 */
// Breadcrumbs
function custom_breadcrumbs() {
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumb';
    $home_title         = _('Home');
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
    $count = 1;
    // Get the query & post information
    global $post,$wp_query;
    // Do not display on the homepage
    if ( !is_front_page() ) {
        // Build the breadcrums
        echo '<ol class="breadcrumb z-depth-0" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';
        // Home page
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <meta itemprop="position" content="'.$count++.'" />
                <a itemprop="item" class="breadcrumb grey-text text-darken-1" href="' . get_home_url() . '"><span itemprop="name">' . $home_title . '</span></a>
             </li>';
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
            if ( is_day() ) {
                // Day archive
                // Year link
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-1 archive-year" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '"><span itemprop="name">' . get_the_time('Y') . ' Archives</span></a>
                    </li>';
                // Month lilink
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-1 archive-month" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('F') . '"><span itemprop="name">' . get_the_time('F') . ' Archives</span></a>
                    </li>';
                // Day display
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-4 archive-day truncate"><span itemprop="name"> ' . get_the_time('jS') . ' ' . get_the_time('F') . ' Archives</span></a>
                    </li>';
            } else if ( is_month() ) {
                // Month Archive
                // Year link
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-1 archive-year" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '"><span itemprop="name">' . get_the_time('Y') . ' Archives</span></a>
                    </li>';
                // Month display
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-4 archive-month truncate" title="' . get_the_time('F') . '"><span itemprop="name">' . get_the_time('F') . ' Archives</span></a>
                    </li>';
            } else if ( is_year() ) {
                // Display year archive
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-4 truncate" title="' . get_the_time('Y') . '"><span itemprop="name">' . get_the_time('Y') . ' Archives</span></a>
                    </li>';
            } else {
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="'.$count++.'" />
                    <a itemprop="item" class="breadcrumb grey-text text-darken-4 is-archive truncate"><span itemprop="name">' . post_type_archive_title() . '</span></a>
                 </li>';
            }
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
            // If post is a custom post type
            $post_type = get_post_type();
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb" href="' . $post_type_archive . '"><span itemprop="name">' . $post_type_object->labels->name . '</span></a>
                    </li>';
            }
            $custom_tax_name = get_queried_object()->name;
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-4 truncate"><span itemprop="name">' . $custom_tax_name . '</span></a>
                    </li>';
        } else if ( is_single() ) {
            // If post is a custom post type
            $post_type = get_post_type();
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-1" href="' . $post_type_archive . '"><span itemprop="name">' . $post_type_object->labels->name . '</span></a>
                    </li>';
            }
            // Get post category info
            $category = get_the_category();
            if(!empty($category)) {
                // Get last category post is in
                $last_category = array_values($category);
                $last_category = end($last_category);
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $parents = preg_replace('/<a href="(.*?)">(.*?)<\/a>/', '<a href="$1"><span itemprop="name">$2</span></a>', $parents);
                    $parents = str_replace( '<a', '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                                    <meta itemprop="position" content="'.$count++.'" />
                                                    <a itemprop="item" class="breadcrumb grey-text text-darken-1" ', $parents );
                    $parents = str_replace( '</a>', '</a>
                                                    </li>', $parents );
                    $cat_display .= $parents;
                }
            }
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
            }
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-4 truncate" title="' . get_the_title() . '"><span itemprop="name">' . get_the_title() . '</span></a>
                    </li>';
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-1 truncate" href="' . $cat_link . '" title="' . $cat_name . '"><span itemprop="name">' . $cat_name . '</span></a>
                    </li>';
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-4 truncate" title="' . get_the_title() . '"><span itemprop="name">' . get_the_title() . '</span></a>
                    </li>';
            } else {
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-4 truncate" title="' . get_the_title() . '"><span itemprop="name">' . get_the_title() . '</span></a>
                    </li>';
            }
        } else if ( is_category() ) {
            // Category page
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-4 truncate"><span itemprop="name">' . single_cat_title('', false) . '</span></a>
                    </li>';
        } else if ( is_page() ) {
            // Standard page
            if( $post->post_parent ){
                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );
                // Get parents in the right order
                $anc = array_reverse($anc);
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <meta itemprop="position" content="'.$count++.'" />
                                    <a itemprop="item" class="breadcrumb grey-text text-darken-1" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '"><span itemprop="name">' . get_the_title($ancestor) . '</span></a>
                                </li>';
                }
                // Display parent pages
                echo $parents;
                // Current page
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-4 truncate" title="' . get_the_title() . '"><span itemprop="name">' . get_the_title() . '</span></a>
                                </li>';
            } else {
                // Just display current page if not parents
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <meta itemprop="position" content="'.$count++.'" />
                        <a itemprop="item" class="breadcrumb grey-text text-darken-4 truncate"><span itemprop="name">' . get_the_title() . '</span></a>
                    </li>';
            }
        } else if ( is_tag() ) {
            // Tag page
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
            // Display the tag name
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="'.$count++.'" />
                    <a itemprop="item" class="breadcrumb grey-text text-darken-4 truncate"><span itemprop="name">' . $get_term_name . '</span></a>
                </li>';
        } else if ( is_author() ) {
            // Auhor archive
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
            // Displaliy author name
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="'.$count++.'" />
                    <a itemprop="item" class="breadcrumb grey-text text-darken-4 truncate" title="' . $userdata->display_name . '"><span itemprop="name">' . 'Author: ' . $userdata->display_name . '</span></a>
                </li>';
        } else if ( get_query_var('paged') ) {
            // Paginated archives
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="'.$count++.'" />
                    <a itemprop="item" class="breadcrumb grey-text text-darken-4" title="Page ' . get_query_var('paged') . '"><span itemprop="name">'.__('Page') . ' ' . get_query_var('paged') . '</span></a>
                </li>';
        } else if ( is_search() ) {
            // Search results page
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="'.$count++.'" />
                    <a itemprop="item" class="breadcrumb grey-text text-darken-4" title="Search results for: ' . get_search_query() . '"><span itemprop="name">Search results for: ' . get_search_query() . '</span></a>
                </li>';
        } elseif ( is_404() ) {
            // 404 page
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="'.$count++.'" />
                    <a itemprop="item" class="breadcrumb grey-text text-darken-4"><span itemprop="name">' . 'Error 404' . '</span></a>
                </li>';
        }
        echo '</ol>';
    }
}
