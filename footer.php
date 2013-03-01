<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>

	</div><?php // end #main  ?>
	
	<footer role="contentinfo">

		<div class="wrap">

			<?php echo apply_atomic_shortcode( 'footer_content', hybrid_get_setting( 'footer_insert' ) ); ?>

		</div><!-- .wrap -->

	</footer>

</div><?php // end #container  ?>

<?php wp_footer(); // wp_footer ?>

</body>
</html>