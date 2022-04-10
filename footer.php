<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Kreativno
 */

?>				</div>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
	<footer id="colophon" class="site-footer <?php echo wp_bootstrap_kreativno_bg_class(); ?>" role="contentinfo">
		<div class="container pt-3 pb-5">
			<div class="row">
				<div class="col-lg-8">
					<?php dynamic_sidebar( 'footer-1' ); ?>
					<div class="site-info">
						&copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
					</div><!-- close .site-info -->
				</div>
				<div class="col-lg-4 d-flex align-items-center">
					<ul class="footer-social">
						<li>Zapratite nas: </li>
						<li><a target="_blank" href="https://facebook.com/kreativno.ba"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/kreativno.ba/"><i class="fas fa-hashtag"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>