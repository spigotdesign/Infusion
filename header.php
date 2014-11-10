<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>

<head>
	<?php wp_head(); // Hook required for scripts, styles, and other <head> items. ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>

	<div class="container">

		<header class="site-header" role="banner">
			
			<div class="branding" itemscope itemtype="http://schema.org/Organization">

				<h1 class="site-title"><a itemprop="url" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

				<meta  itemprop="logo" content="/images/logo.png" />	

			</div>
			
			<?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>

		</header>

		<div class="main-container" role="main">