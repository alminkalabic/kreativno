<?php /* Template Name: Select */  ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HS6GL7866X"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-HS6GL7866X');
</script>
</head>

<body <?php body_class(); ?>>


<div class="d-flex align-items-center min-vh-100 p-2">
  <div class="container text-center">
	<div class="navbar-brand-kreativno mb-4">
		<a href="<?php echo esc_url( home_url( '/' )); ?>">
			<img style="height: 60px;" src="<?php echo get_template_directory_uri() ?>/img/logo.svg" alt="logo">
		</a>
	</div>
	<form>
		<div class="form-row align-items-center">
			<div class="col-12">
				<select class="custom-select" id="inputZelim">
					<option selected>Izaberite</option>
					<option value="1">Kupiti poster</option>
					<option value="2">Preuzeti Viber stikere</option>
				</select>
			</div>
		</div>
	</form>
  </div>
</div>

<script>
	jQuery('#inputZelim').change(function() {
	if (jQuery(this).val() === '1') {
        window.location.href = "https://kreativno.ba";
    }
    if (jQuery(this).val() === '2') {
        window.location.href = "https://bit.ly/349dXDT";
    }
});

</script>



<?php wp_footer(); ?>
</body>
</html>
