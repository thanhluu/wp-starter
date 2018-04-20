<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="navbar navbar-default navbar-static-top site-header" role="banner">
		<div class="container">
			<div class="navbar-header">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand">
					<?php $site_logo = wp_starter_get_theme_option('site_logo'); ?>
					<?php if( $site_logo ) : ?>
						<img src="<?php echo esc_url( $site_logo ); ?>" title="<?php bloginfo('name'); ?>">
					<?php else : ?>
						<?php bloginfo('name'); ?>
					<?php endif; ?>
				</a>
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<button class="navbar-toggle" data-toggle="collapse" data-target=".main-navigation">
						<span class="sr-only"><?php _e( 'Toggle navigation', 'wp-starter' ); ?></span>
						<span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
					</button>
				<?php endif; ?>
			</div>

			<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="collapse navbar-collapse main-navigation" role="navigation">
				<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class' => 'nav navbar-nav',
						'depth' => 2,
						'fallback_cb' => 'wp_starter_navwalker::fallback',
						'walker' => new wp_starter_navwalker()
					) ); ?>
			</nav>
			<?php endif; ?>
		</div>
	</header>

	<div id="container" class="site-container">
