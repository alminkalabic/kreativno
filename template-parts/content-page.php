<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Kreativno
 */

?>
<?php if ( !is_single() ) { echo '<div class="col-12">';} ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('page-single'); ?>>
		<?php
		$enable_vc = get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);
		if(!$enable_vc ) {
		?>
			<header class="entry-header">
				<div class="row">
					<div class="col-12">
						<?php the_title( '<h1 class="item-entry-title m-0">', '</h1>' ); ?>
					</div>
				</div>
			</header><!-- .entry-header -->
		<?php } ?>

		<div class="entry-content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-kreativno' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() && !$enable_vc ) : ?>
			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', 'wp-kreativno' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</article><!-- #post-## -->
<?php if ( !is_single() ) { echo '</div>';} ?>