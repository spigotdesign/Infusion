<?php
/**
 * Footer Template
 *
 * The footer template is generally used on every page of your site. Nearly all other
 * templates call it somewhere near the bottom of the file. It is used mostly as a closing
 * wrapper, which is opened with the header.php file. It also executes key functions needed
 * by the theme, child themes, and plugins. 
 *
 * @package infusion
 * @subpackage Template
 */
?>
		<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>

		<?php do_atomic( 'close_main' ); // infusion_close_main ?>

		</div><!-- #main -->

		<?php do_atomic( 'after_main' ); // infusion_after_main ?>
		
		<?php get_sidebar( 'secondary' ); // Loads the sidebar-secondary.php template. ?>

		<?php get_sidebar( 'subsidiary' ); // Loads the sidebar-subsidiary.php template. ?>

		<?php get_template_part( 'menu', 'subsidiary' ); // Loads the menu-subsidiary.php template. ?>

		<?php do_atomic( 'before_footer' ); // infusion_before_footer ?>

		<footer role="contentinfo">

			<?php do_atomic( 'open_footer' ); // infusion_open_footer ?>

			<div class="wrap">

				<?php echo apply_atomic_shortcode( 'footer_content', hybrid_get_setting( 'footer_insert' ) ); ?>

				<?php do_atomic( 'footer' ); // infusion_footer ?>

			</div><!-- .wrap -->

			<?php do_atomic( 'close_footer' ); // infusion_close_footer ?>

		</footer>

		<?php do_atomic( 'after_footer' ); // infusion_after_footer ?>

	</div><!-- #container -->

	<?php do_atomic( 'close_body' ); // infusion_close_body ?>

	<?php wp_footer(); // wp_footer ?>

</body>
</html>