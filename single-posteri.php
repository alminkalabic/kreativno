<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Kreativno
 */

get_header(); ?>

	<section id="primary" class="content-area col-12">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<div class="row">
					<div class="col-12">
						<?php the_title( '<h1 class="item-entry-title m-0">', '</h1>' ); ?>
					</div>
					<div class="col-12">
						<div class="scroll-to-order mt-2" onclick="scrollToOrder()">Idi na narudžbu</div>
					</div>
				</div>
			</header><!-- .entry-header -->
			<div class="row">
				<div class="col-lg-6">
					<div class="entry-content">

						<?php 
							$mock = get_field( "mock" ); //img size
							$feature = get_the_post_thumbnail_url(get_the_ID(),'full'); 

							if( $mock ) { ?>
								<div class="mock-box">
									<img src="<?php echo $mock ?>" />
									<div class="real-photo">
										<div class="real-photo-title" data-toggle="modal" data-target="#posterModal">Pogledaj bez rendera</div>
									</div>
								</div>

								<!-- Modal -->
								<div class="modal fade" id="posterModal" tabindex="-1" role="dialog" aria-labelledby="posterModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered mt-0" role="document">
									<div class="modal-content">
									<div class="close-modal" data-dismiss="modal" aria-label="Zatvori"><i class="fas fa-times"></i></div>
									<div class="modal-body">
										<img src="<?php echo $feature; ?>" />
									</div>
									</div>
								</div>
								</div>
							<?php } else { ?>
								<div class="mock-box"><img src="<?php echo $feature ?>" /></div>
							<?php }
						?>
						
						<div class="mt-3">
							<?php the_content(); ?>
						</div>
					</div><!-- .entry-content -->
				</div>
				<div id="scrollHere" class="col-lg-6 mobile-bg">
					<div class="entry-content form">
						<h4 class="mt-0">Narudžba za <?php the_title(); ?></h4>

							<form id="kreativno-form" class="order-form" method="post" action="<?php echo get_stylesheet_directory_uri(); ?>/forms/contact.php" role="form">
								<div class="messages"></div>

								<div class="alert alert-light alert-dismissible fade show mb-4" role="alert">
									<strong>Napomena:</strong> Plaćanje se vrši pouzećem, a cijena proizvoda ovisi o veličini i okviru postera.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
									<div class="controls">
										<div class="mobile-price">
											<div class="row">
												<div class="col-6 d-flex align-items-center">
													<div class="price-box w-100">
														<table class="table table-price">
															<tbody>
																<tr>
																<td class="pr-0"><div class="price-name table-poster-title">Poster</div></td>
																<td><div class="product-cost price-cost">-</div></td>
																</tr>
																<tr>
																<td class="pr-0"><div class="price-name">Okvir</div></td>
																<td>
																	<div class="frame-cost price-cost">
																	<div id="empty-frame-price"></div>
																<?php 
																	$framePrice = get_field('frame_p', 'option')[get_field( "standard" )]['name_of_prices']; 
																	foreach($framePrice as $index=>$item){ ?>
																		<div id="price-table-<?php echo $index ?>" class="hide-all-frame-prices" style="display: none"><?php echo $item['price']; ?></div>
																<?php } ?>

																</div>
																</td>
																</tr> 
																<tr>
																<td class="pr-0"><div class="price-name">Poštarina</div></td>
																<td><div class="delivery-cost price-cost">

																<?php 
																	$sendPrice = get_field('send_p', 'option')[get_field( "standard" )]['name_of_prices']; 
																	foreach($sendPrice as $index=>$item){ ?>
																		<div id="delivery-table-<?php echo $index ?>" class="hide-all-delivery-prices" style="display: none"><?php echo $item['price']; ?></div>
																<?php } ?>

																</div></td>
																</tr>
																<tr>
																<td class="border-bottom-0" colspan="2">
																	<div class="price-info">Ukupno za platiti</div>
																	<div class="price-cost-final">-</div>
																</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="col-6 d-flex align-items-center">
													<div class="row w-100">
													<div class="col-lg-12">
														<div class="form-group mt-4">
															<label for="form_velicina">Veličina(cm)</label>
															<select id="form_velicina" type="text" name="velicina" class="form-control" required="required" data-error="Polje Veličina je obavezno.">
																<?php 
																	$prices = get_field('prices', 'option')[get_field( "standard" )]['name_of_prices']; //Proslijedi redni broj kako bi prikazao listu
																	foreach($prices as $value){ ?>
																		<option value="<?php echo $value['price']; ?>"> <?php echo $value['name']; ?></option>
																<?php } ?>
															</select>
															<div class="help-block with-errors"></div>
														</div>
													</div>
													<div class="col-lg-12">
														<div class="form-group mb-0">
															<label for="form_boja">Boja okvira</label>
															<select id="form_boja" type="text" name="boja" class="form-control" required="required" data-error="Polje Boja je obavezno.">
																<?php 
																	$frames = get_field('frames', 'option')[get_field( "standard" )]['name_of_frames']; //Proslijedi redni broj kako bi prikazao listu
																	foreach($frames as $frame){ ?>
																		<option value="<?php echo $frame['name']; ?>" <?php if($frame['stanje'] == 'no') {echo 'disabled';}; ?>> <?php echo $frame['name']; ?></option>
																<?php } ?>
															</select>
															<div class="help-block with-errors"></div>
														</div>
													</div> 
													</div>
												</div>
											</div>
										</div>
										<?php 
										$forms = get_field('forms', 'option')[get_field( "form_standard" )]['form_name']; //Proslijedi redni broj kako bi prikazao listu
										if($forms[0]['slug']) {
										foreach($forms as $index=>$input){ ?>
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group <?php echo $index == 0 ? 'mt-4' : ''; ?>">
													<label for="form_<?php echo $input['slug']; ?>"><?php echo $input['title']; ?> </label>
													<input id="form_<?php echo $input['slug']; ?>" type="<?php echo $input['type']; ?>" name="info_<?php echo $index ?>" class="form-control" placeholder="<?php echo $input['placeholder']; ?>" required="required" data-error="<?php echo $input['error_message']; ?>.">
													<div class="help-block with-errors"></div>
													<small class="form-text text-muted text-center"><?php echo $input['description']; ?></small>
												</div>
											</div>
										</div>
										<?php }} ?>
										<div class="row">
										<div class="col-12"><h5 class="m-0 mt-4 text-center">Podaci za dostavu</h5></div>
											<div class="col-lg-12 mt-2">
												<div class="form-group">
													<label for="form_ime_i_prezime">Ime i prezime </label>
													<input id="form_ime_i_prezime" type="text" name="ime_i_prezime" class="form-control" placeholder="Unesite vaše puno ime i prezime " required="required" data-error="Polje Ime i prezime je obavezno.">
													<div class="help-block with-errors"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="form_broj_telefona">Telefon </label>
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text" id="form_broj_telefona">+387</span>
														</div>
														<input id="form_broj_telefona" type="tel" name="broj_telefona" class="form-control" placeholder="Unesite vaš broj telefona " required="required" data-error="Polje Telefon je obavezno.">
													</div>
													<small id="broj_telefonaHelp" class="form-text text-muted">Nakon popunjavanja forme bit ćete kontaktirani kako bi potvrdili narudžbu.</small>
													<div class="help-block with-errors"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group">
													<label for="form_adresa">Adresa </label>
													<input id="form_adresa" type="text" name="adresa" class="form-control" placeholder="Unesite vašu adresu " required="required" data-error="Polje Adresa je obavezno.">
													<div class="help-block with-errors"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for="form_grad">Grad </label>
													<input id="form_grad" type="text" name="grad" class="form-control" placeholder="Vaš grad" required="required" data-error="Polje Grad je obavezno.">
													<div class="help-block with-errors"></div>
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for="form_postanski_broj">Poštanski broj </label>
													<input id="form_postanski_broj" type="tel" name="postanski_broj" class="form-control" placeholder="Vaš poštanski br." required="required" data-error="Polje Poštanski broj je obavezno.">
													<div class="help-block with-errors"></div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="g-recaptcha" data-sitekey="6Lf5XckZAAAAAKN-882vTl9BFfbdb2aW7bzjMOEJ" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
											<input class="form-control d-none" data-recaptcha="true" required data-error="Potvrdi da nisi robot">
											<div class="help-block with-errors text-left"></div>
										</div>


										<button type="submit" class="btn btn-success btn-lg btn-send"><i class="fas fa-check-circle"></i> Naruči</button>
									</div>

							</form>
					</div><!-- .entry-content -->
				</div>
			</div>
		</article><!-- #post-## -->

		<?php endwhile; // End of the loop.?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<!-- Modal -->
	<div class="modal fade" id="finalModal" tabindex="-1" role="dialog" aria-labelledby="finalModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="close-modal" data-dismiss="modal" aria-label="Zatvori"><i class="fas fa-times"></i></div>
				<div class="modal-body">
						<div class="logo mb-3">
							<img style="height: 60px;" src="<?php echo get_template_directory_uri() ?>/img/logo.svg" alt="logo" />
						</div>
						<div class="messages"><?php echo $okMessage; ?></div>
						<div class="mt-3 text-center">
							<a href="<?php echo get_home_url(); ?>" class="btn btn-success">Vrati se na početnu stranicu</a>
						</div>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
