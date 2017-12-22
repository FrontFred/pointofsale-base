<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package erply
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'erply' ); ?></a>

	<header id="masthead" class="site-header">
		<nav class="navbar navbar-default navbar-static-top drop-shadow">
			<div class="flex-display" style="display:flex;">
				<div class="col-md-2 col-sm-2 col-xs-4 site-branding ">
                    <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo2.png" alt="erply-logo"></a>
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
				</div><!-- .site-branding -->
                <div id="nav-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
				<div class="col-md-7 col-sm-10 col-xs-10 main-navigation" id="site-navigation">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
					?>
				</div><!-- #site-navigation -->
			
				<div class="col-md-3 custom-search" id="custom-search">
                    <p><b>Maksuton asiakastuki!</b></p>
                    <p>Ark. klo 9.00 - 17.00</p>
                    <p>Puh.<b> +358 974790284</b></p>
                    <p>tai <a href="mailto:tuki@erply.com" target="_top">tuki@erply.com</a></p>
                    <div class="demo-buttons" style="display:flex;justify-content:flex-end;">
                        <a href="/#subscribe" class="erply-header-link subscribe-button">TILAA UUTISKIRJE</a>
                        <a href="index.php/registration" class="erply-header-link">REKISTERÖIDY</a>
                    </div>
				</div>
			</div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
