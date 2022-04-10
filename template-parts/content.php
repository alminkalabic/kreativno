<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Kreativno
 */

?>

<?php if ( !is_single() ) { echo '<div class="col-6 col-lg-3 d-flex align-items-center">';} ?>
	<article id="post-<?php the_ID(); ?>" <?php !is_single() ? post_class('result-single') : post_class('blog-single'); ?>>
		<header class="entry-header">
			<?php
			if ( is_single() ) : ?>
				<div class="row">
					<div class="col-12">
						<?php the_title( '<h1 class="item-entry-title m-0">', '</h1>' ); ?>
					</div>
				</div>
			<?php else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
			endif;

			/* if ( 'post' === get_post_type() && is_single()) : ?>
			<div class="entry-meta">
				<?php wp_bootstrap_kreativno_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif;  */?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php
			if ( is_single() ) : ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			<?php else : ?>
				<a href="<?php echo get_permalink() ?>">
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
				</a>
			<?php endif;

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-kreativno' ),
					'after'  => '</div>',
				) );
			?>

		<footer class="entry-footer">
			<?php wp_bootstrap_kreativno_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
<?php if ( !is_single() ) { echo '</div>';} ?>