<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?> class="no-js">

<head>
	<?php wp_head(); // Hook required for scripts, styles, and other <head> items. ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>

	<div id="page" class="hfeed site">

		<header class="site-header">
			
			<div class="branding" itemscope itemtype="http://schema.org/Organization">

				<h1 class="site-title"><a itemprop="url" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

				<meta  itemprop="logo" content="/images/logo.png" />	

			</div>
			
			<?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>

		</header>

		<main class="content group" itemprop="mainContentOfPage">