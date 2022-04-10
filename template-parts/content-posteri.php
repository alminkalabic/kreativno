<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Kreativno
 */

?>

<div class="col-6 col-lg-3 d-flex align-items-center">
	<article id="poster-<?php the_ID(); ?>" <?php post_class(); ?>>
		<a href="<?php echo get_permalink(); ?>" class="article-poster-box">
			<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>
			<div class="poster-img">
				<img src="<?php echo $featured_img_url; ?>" alt="<?php the_title() ?>" />
			</div>
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title-poster">', '</h2>' ); ?>
			</header><!-- .entry-header -->
			<?php $prices = get_field('prices', 'option')[get_field( "standard" )]['name_of_prices']; //Proslijedi redni broj kako bi prikazao listu ?>
			<div class="price-min-max">
				<?php foreach($prices as $key => $element) {
				if ($key === array_key_first($prices))
					echo strval($element['price']) . 'KM – ';

				if ($key === array_key_last($prices))
					echo $element['price'] . 'KM';
				} ?>
			</div>
		</a>
	</article><!-- #post-## -->
</div>
