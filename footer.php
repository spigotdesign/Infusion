		<?php hybrid_get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>

		<?php hybrid_get_sidebar( 'subsidiary' ); // Loads the sidebar/subsidiary.php template. ?>
	
	<footer class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

			<p class="credit">
				&copy; Copyright <?php the_date('Y'); ?> <?php echo hybrid_get_site_link(); ?>. All rights reserved.
			</p>


	</footer>

</div><?php // end .container  ?>

<?php wp_footer(); // wp_footer ?>

</body>
</html>