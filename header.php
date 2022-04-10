<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Kreativno
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <div class="head-content-box">
        <header id="masthead" class="site-header navbar-static-top <?php echo wp_bootstrap_kreativno_bg_class(); ?>" role="banner">
            <div class="container header-kretivno">
                <div class="header-box">
                    <div class="menu" data-toggle="modal" data-target="#menuModal">
                        <i class="fas fa-bars"></i> <i class="modal-span">Meni</i>
                    </div>
                    <div class="navbar-brand-kreativno">
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img style="height: 60px;" src="<?php echo get_template_directory_uri() ?>/img/logo.svg" alt="logo">
                        </a>
                    </div>
                    <div class="search" data-toggle="modal" data-target="#searchModal">
                        <i class="modal-span">Pretraga</i> <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="close-modal" data-dismiss="modal" aria-label="Zatvori"><i class="fas fa-times"></i></div>
                        <div class="modal-body">
                            <form action="/" method="get">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input id="header-search" class="form-control rounded-0 border-0" placeholder="Pretražite" name="s" id="search" value="<?php the_search_query(); ?>" type="text">
                                        <button class="btn search-form-submit" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="close-modal" data-dismiss="modal" aria-label="Zatvori"><i class="fas fa-times"></i></div>
                        <div class="modal-body">
                            <nav class="navbar-kreativno">
                                <?php
                                    wp_nav_menu(array(
                                    'theme_location'    => 'primary',
                                    'container'       => 'div',
                                    'container_id'    => 'main-nav-kreativno',
                                    'container_class' => '',
                                    'menu_id'         => false,
                                    'menu_class'      => 'navbar-nav-kreativno',
                                    'depth'           => 3,
                                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                    'walker'          => new wp_bootstrap_navwalker()
                                    ));
                                ?>
                            </nav>

                            <div class="nav-social">
                                <ul>
                                    <li><a target="_blank" href="https://facebook.com/kreativno.ba"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a target="_blank" href="https://www.instagram.com/kreativno.ba/"><i class="fas fa-hashtag"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- #masthead -->

        
        <div id="content" class="<?php if(!is_front_page()) { echo 'site-content';} else {echo 'home-content';} ?>">
            <div class="<?php if(!is_front_page()) { echo 'container';} else {echo 'home-container';} ?>">
                <div class="<?php if(!is_front_page()) { echo 'row';} else {echo 'home-row';} ?>">
                    