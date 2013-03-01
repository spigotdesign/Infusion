<?php
/**
 * Header Template
 *
 * The header template is generally used on every page of your site. Nearly all other templates call it 
 * somewhere near the top of the file. It is used mostly as an opening wrapper, which is closed with the 
 * footer.php file. It also executes key functions needed by the theme, child themes, and plugins. 
 *
 * @package infusion
 * @subpackage Template
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php hybrid_document_title(); ?></title>

<meta name="viewport" content="width=device-width">
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon" href="<?php bloginfo( 'stylesheet_directory' ); ?>/img/icons/apple-touch-icon.png">

<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr-2.6.2.min.js"></script>


<?php wp_head(); // wp_head ?>

</head>

<body class="<?php hybrid_body_class(); ?>">

	<?php do_atomic( 'open_body' ); // infusion_open_body ?>

	<div id="container" class="hfeed">

		<?php do_atomic( 'before_header' ); // infusion_before_header ?>

		<header role="banner">
			
			<div class="wrap">

			<?php do_atomic( 'open_header' ); // infusion_open_header ?>

					<?php hybrid_site_title(); ?>
					
					<?php hybrid_site_description(); ?>
				
				<?php get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>

				<?php do_atomic( 'header' ); // infusion_header ?>
				
		  <?php get_sidebar( 'header' ); // Loads the sidebar-header.php template. ?>

			<?php do_atomic( 'close_header' ); // infusion_close_header ?>
			
			</div><!-- .wrap -->

		</header>

		<?php do_atomic( 'after_header' ); // infusion_after_header ?>

		<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template. ?>

		<?php do_atomic( 'before_main' ); // infusion_before_main ?>

		<div id="main" role="main">

			<?php do_atomic( 'open_main' ); // infusion_open_main ?>