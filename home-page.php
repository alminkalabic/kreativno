<?php /* Template Name: Home page */ 

get_header(); ?>

	<section id="primary" class="content-area home-page">
		<main id="main" class="site-main" role="main">

			<div class="header-banner">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 mt-4">
							<a class="banner big" href="/poster-kategorija/personalizirani/">
								<div class="row">
									<div class="col-md-6">
										<div class="big-text">
											<h1>Personalizirani posteri</h1>
											<p>Pogledajte našu kolekciju personaliziranih postera</p>
										</div>
									</div>
									<div class="banner-big-img">
										<img src="<?php echo get_template_directory_uri() ?>/img/fingerprint.png" />
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-3 mt-4 code">
							<a class="banner small border-gradient" href="/svi-posteri/">
								<div class="small-banner-box p-4">
									<h1><?php echo wp_count_posts( 'posteri' )->publish; ?></h1>
									<h2>Ukupno postera</h2>
								</div>
							</a>
						</div>
						<div class="col-lg-3 mt-4 code">
							<a class="banner small border-gradient" href="/kako-poruciti/">
								<div class="small-banner-box p-4">
									<h1><i class="fas fa-truck"></i></h1>
									<h2>Kako poručiti?</h2>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="home-posters">
				<div class="container">

					<ul class="home-lists nav nav-pills" id="pills-tab" role="tablist">
						<li>
							<a class="home-list-single active" id="pills-zadnje-dodano-tab" data-toggle="pill" href="#pills-zadnje-dodano" role="tab" aria-controls="pills-zadnje-dodano" aria-selected="true">Zadnje dodano</a>
						</li>
						<!-- <li>
							<a class="home-list-single border-home-list-single" id="pills-kategorije-tab" data-toggle="pill" href="#pills-kategorije" role="tab" aria-controls="pills-kategorije" aria-selected="false">Kategorije</a>
						</li> -->
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-zadnje-dodano" role="tabpanel" aria-labelledby="pills-zadnje-dodano-tab">
							<div class="row">
								<?php
									global $post;
								
									$myposts = get_posts( array(
										'post_type'  => 'posteri',
										'posts_per_page' => 20,
									) );
								
									if ( $myposts ) {
										foreach ( $myposts as $post ) : 
											setup_postdata( $post );
											get_template_part( 'template-parts/content', 'posteri' );
										endforeach;
										wp_reset_postdata();
									}
								?>

								<div class="col-12 text-center">
									<a href="/svi-posteri/" class="mt-4 btn btn-success btn-send">Pogledaj sve postere</a>
								</div>
							</div>
						</div>
						<!-- <div class="tab-pane fade" id="pills-kategorije" role="tabpanel" aria-labelledby="pills-kategorije-tab">
							
							<input type="text" class="form-control category-search" id="categoryInput" onkeyup="myFunction()" placeholder="Pretraži kategorije" title="Type in a name">

							<ul id="categoryUL" class="home-category-sort" data-columns="2">
								<?php

									/* $parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
									$parent_cat = get_terms('kategorije',$parent_cat_arg);//category name

									foreach ($parent_cat as $catVal) {

										echo '<li><a href="'.$catVal->slug.'">'.$catVal->name.'</a></li>'; //Parent Category

										$child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
										$child_cat = get_terms( 'kategorije', $child_arg );

										echo '<ul class="child-menu">';

											foreach( $child_cat as $child_term ) {
												echo '<li class="child"><a href="'.$child_term->slug.'">- '.$child_term->name . '</a></li>'; //Child Category
											}

										echo '</ul>';

									} */
									
								?>
							</ul>
						</div> -->
					</div>
				
				</div>
			</div>
		
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
