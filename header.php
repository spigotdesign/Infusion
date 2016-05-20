<!DOCTYPE html>

<html <?php language_attributes( 'html' ); ?>>

<head>
	<?php wp_head(); ?>
</head>

<body <?php body_class('no-js');?>>

	<div id="site" class="hfeed site">

		<header class="site-header">
			
			<div class="branding" itemscope itemtype="http://schema.org/Organization">

				<h1 class="site-title"><a itemprop="url" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/icons/adidas.svg' ); ?></a></h1>

			</div>
			
			<?php hybrid_get_menu( 'primary' ); ?>

		</header>

		<main class="content group" itemprop="mainContentOfPage">