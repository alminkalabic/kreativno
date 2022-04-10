<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Kreativno
 */

?>

	<section class="no-results not-found">
		<header class="page-header">
				<?php
					if ( !is_page_template( 'all-posters.php' ) ) { ?>
						<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'wp-kreativno' ); ?></h1>					
					<?php } else { ?>
						<h3 class="page-title"><?php esc_html_e( 'Nothing Found', 'wp-kreativno' ); ?></h3>
					<?php }
				?>
		</header><!-- .page-header -->

		<div class="page-content">
				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wp-kreativno' ); ?></p>
				
				<?php
					if ( !is_page_template( 'all-posters.php' ) ) {
						get_search_form(); 
					} 
				?>

		</div><!-- .page-content -->
	</section><!-- .no-results -->

