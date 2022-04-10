<?php /* Template Name: Svi posteri */ 

isset($_GET['title']) ? $getTitle         = $_GET['title'] : $getTitle         = "";
isset($_GET['kategorije']) ? $getkategorije        = $_GET['kategorije'] : $getkategorije        = "-1";

get_header(); ?>

<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Kreativno
 */

?>

	<section id="primary" class="content-area col-12">
		<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<div class="row">
						<div class="col-12">
							<?php the_title( '<h1 class="item-entry-title m-0">', '</h1>' ); ?>
						</div>
					</div>
				</header><!-- .entry-header -->

				<div class="filter-box mt-3">

					<div class="btn-group">
						<div class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Prikaži filtere
						</div>
						<div class="dropdown-menu dropdown-menu-center">
							<div class="p-2">
								<form id="posteri-filter" action="<?php echo get_page_link(get_the_ID()); ?>" method="get">
									<h5 class="m-0 mb-2 font-weight-normal">Filtiraj</h5>
									<div class="form-group">
										<label for="naslov">Nazivu</label>
										<input id="naslov" class="form-control" name="title" placeholder="npr. krea0015" value="<?php echo $getTitle; ?>">
									</div>

									<div class="form-group">
										<label for="kategorije">Kategorija</label>
										<select class="form-control" name="kategorije" id="kategorije">
											<option value="-1"><?php echo __("Sve", ""); ?></option>
											<?php
												$kategorije = get_terms(array(
													'taxonomy' => 'kategorije',
													'hide_empty' => false,
													'orderby' => 'name',
													'order' => 'DESC' 
												));

												$kategorijeAll = array();

												$parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
												$parent_cat = get_terms('kategorije',$parent_cat_arg);//category name

												foreach ($parent_cat as $catVal) {

													$kategorijeAll[] = $catVal->term_id;
															if ($catVal->term_id == $getkategorije) {
																$checked = 'selected';
															} else {
																$checked = '';
															}

													echo '<option value="' . $catVal->term_id . '" ' . $checked . ' name="k" >' . $catVal->name . '</option>';

													$child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
													$child_cat = get_terms( 'kategorije', $child_arg );


														foreach( $child_cat as $child_term ) {

															$kategorijeAll[] = $child_term->term_id;
															if ($child_term->term_id == $getkategorije) {
																$checked = 'selected';
															} else {
																$checked = '';
															}


															echo '<option value="' . $child_term->term_id . '" ' . $checked . ' name="k" >- ' . $child_term->name . '</option>';
														}

												} 
											?>
										</select>
									</div>
									
									<div class="submit-button">
										<input type="submit" name="Search" value="Filtriraj" class="w-100 btn btn-primary posteri-submit-btn" id="poster-search" />
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					
				<?php

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					$args = array(
						'post_type' => 'posteri',
						'post_status' => array('publish'),
						'paged' => $paged,
						'posts_per_page' => 28,
					);

					$kategorije_args = array(
						'taxonomy' => 'kategorije',
						'field'    => 'term_id',
						'terms'    => $getkategorije,
						'operator' => 'IN',
						// 'lang' => pll_current_language(),
					);

					if (isset($_GET['title']) && $_GET['title'] != '') $args['post_title_like'] = $getTitle;
					if (isset($_GET['kategorije']) && $_GET['kategorije'] != '-1') $args['tax_query'][1] = $kategorije_args;

					$the_query = new WP_Query($args);
					// print_r($the_query);
					if ($the_query->have_posts()) :
						while ($the_query->have_posts()) :
							$the_query->the_post();
							get_template_part('template-parts/content', 'posteri');
						endwhile;

						echo getCustomPagination($the_query);
						$the_query->wp_reset_postdata();

					else :
						echo '<div class="col-12">';
						get_template_part( 'template-parts/content', 'none' );
						echo '</div>';
					endif;

					?>
				
				</div>
			</article><!-- #post-## -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
