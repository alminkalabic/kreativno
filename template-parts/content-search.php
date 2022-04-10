<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Kreativno
 */

?>

<?php if ( !is_single() ) { echo '<div class="col-6 col-lg-3 d-flex align-items-center">';} ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('result-single'); ?>>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
		<a href="<?php echo get_permalink() ?>">
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		</a>
		<footer class="entry-footer">
			<?php wp_bootstrap_kreativno_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
<?php if ( !is_single() ) { echo '</div>';} ?>