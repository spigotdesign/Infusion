<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>

<head>
	<?php wp_head(); // Hook required for scripts, styles, and other <head> items. ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>

	<div class="container">

		<section class="leaderboard">

				<div class="contain">

					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

				</div>

		</section>

		<header class="site-header" role="banner">

			<div class="contain">
			
				<div class="branding">

					<h1 class="site-title"><a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>	

				</div>

				<button class="toggle-menu" type="button" role="button" aria-label="Toggle Navigation">
            		
            		<span class="screen-reader-text"><?php _e( 'Navigation', 'jmoe' ); ?></span>

        		</button>
				
				<?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>

			</div>

		</header>

		<div class="main-container" role="main">