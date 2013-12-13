			<?php hybrid_get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>

		<?php hybrid_get_sidebar( 'subsidiary' ); // Loads the sidebar/subsidiary.php template. ?>
	
	<footer <?php hybrid_attr( 'footer' ); ?>>

		<div class="wrap">

			<p class="credit">
				<?php printf(
					/* Translators: 1 is current year, 2 is site name/link, 3 is WordPress name/link, and 4 is theme name/link. */
					__( 'Copyright &#169; %1$s %2$s. Powered by %3$s and %4$s.', 'infusion' ), 
					date_i18n( 'Y' ), hybrid_get_site_link(), hybrid_get_wp_link(), hybrid_get_theme_link()
				); ?>
			</p><!-- .credit -->

		</div>

	</footer>

</div><?php // end .container  ?>

<?php wp_footer(); // wp_footer ?>

</body>
</html>