<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Kreativno
 */

get_header(); ?>

	<section id="primary" class="content-area col-12">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					single_term_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header><!-- .page-header -->
			
			<div class="row">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					if ( 'posteri' === get_post_type() ) {
						get_template_part( 'template-parts/content', 'posteri' );
					}
					else {
						get_template_part( 'template-parts/content', get_post_format() );
					}

				endwhile;

				//the_posts_navigation(); 
				echo getPagination();
				?>
			</div>

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
