<?php

function get_next_posts_link_custom( $label = null, $max_page = 0 ) {
	global $paged, $wp_query;

	if ( ! $max_page ) {
		$max_page = $wp_query->max_num_pages;
	}

	if ( ! $paged ) {
		$paged = 1;
	}

	$nextpage = intval( $paged ) + 1;

	if ( null === $label ) {
		$label = __( 'Next Page &raquo;' );
	}

	if ( ! is_single() && ( $nextpage <= $max_page ) ) {
		/**
		 * Filters the anchor tag attributes for the next posts page link.
		 *
		 * @since 2.7.0
		 *
		 * @param string $attributes Attributes for the anchor tag.
		 */
		$attr = apply_filters( 'next_posts_link_attributes', '' );

		return '<a class="page-link" href="' . next_posts( $max_page, false ) . "\" $attr>" . preg_replace( '/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label ) . '</a>';
	}
}

function get_previous_posts_link_custom( $label = null ) {
	global $paged;

	if ( null === $label ) {
		$label = __( '&laquo; Previous Page' );
	}

	if ( ! is_single() && $paged > 1 ) {
		/**
		 * Filters the anchor tag attributes for the previous posts page link.
		 *
		 * @since 2.7.0
		 *
		 * @param string $attributes Attributes for the anchor tag.
		 */
		$attr = apply_filters( 'previous_posts_link_attributes', '' );
		return '<a class="page-link" href="' . previous_posts( false ) . "\" $attr>" . preg_replace( '/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label ) . '</a>';
	}
}

// custom pagination - paginacija koja se koristi kod custom page-eva (template-a), prodjedjujemo parametar od query-a
function getPagination()
{

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    // $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $max   = intval($wp_query->max_num_pages);

    /**	Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /**	Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="nav-box"><nav class="pagination"><ul class="pagination">' . "\n";

    /**	Previous Post Link */
    if (get_previous_posts_link())
        printf('<li class="page-item">%s</li>' . "\n", get_previous_posts_link_custom('&laquo;'));

    /**	Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="page-item active"' : '';

        printf('<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li class="page-item"><a class="page-link">…</a></li>' . "\n";
    }

    /**	Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' class="page-item active"' : '';
        printf('<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /**	Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li class="page-item"><a class="page-link">…</a></li>' . "\n";

        $class = $paged == $max ? ' class="page-item active"' : '';
        printf('<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /**	Next Post Link */
    if (get_next_posts_link())
        printf('<li class="page-item">%s</li>' . "\n", get_next_posts_link_custom('&raquo;'));

    echo '</ul></nav></div>' . "\n";
}

?>

<?php
// custom pagination - paginacija koja se koristi kod custom page-eva (template-a), prodjedjujemo parametar od query-a
function getCustomPagination($last_news)
{

    $wp_query = $last_news;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;


    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max   = intval($wp_query->max_num_pages);


    /**	Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /**	Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="nav-box"><nav class="pagination"><ul class="pagination">' . "\n";

    /**	Previous Post Link */
    if (get_previous_posts_link())
    printf('<li class="page-item">%s</li>' . "\n", get_previous_posts_link_custom('&laquo;'));

    /**	Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
    $class = 1 == $paged ? ' class="page-item active"' : '';

    printf('<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

    if (!in_array(2, $links))
        echo '<li class="page-item"><a class="page-link">…</a></li>' . "\n";
    }

    /**	Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array) $links as $link) {
    $class = $paged == $link ? ' class="page-item active"' : '';
    printf('<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /**	Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
    if (!in_array($max - 1, $links))
        echo '<li class="page-item"><a class="page-link">…</a></li>' . "\n";

    $class = $paged == $max ? ' class="page-item active"' : '';
    printf('<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /**	Next Post Link */
    if (get_next_posts_link())
    printf('<li class="page-item">%s</li>' . "\n", get_next_posts_link_custom('&raquo;'));

    echo '</ul></nav></div>' . "\n";
}

