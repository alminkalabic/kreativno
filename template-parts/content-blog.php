<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Kreativno
 */

?>

<div class="col-12 col-lg-4">
	<article id="blog-<?php the_ID(); ?>" <?php post_class('mb-4'); ?>>
		<a href="<?php echo get_permalink(); ?>" class="article-blog-box">
			<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>
			<div class="blog-img">
				<img src="<?php echo $featured_img_url; ?>" alt="<?php the_title() ?>" />
			</div>
			<header class="entry-header">
				<?php the_title( '<h3 class="entry-title-blog mt-2">', '</h3>' ); ?>
			</header><!-- .entry-header -->
		</a>
	</article><!-- #post-## -->
</div>
