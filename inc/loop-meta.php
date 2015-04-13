<div <?php hybrid_attr( 'loop-meta' ); ?>>

	<?php if ( is_home() && !is_front_page() ) { ?>

		<h1 class="page-title blog-title"><span><?php echo get_post_field( 'post_title', get_queried_object_id() ); ?></span></h1>

		<div class="loop-description blog-description">
			<?php echo apply_filters( 'the_content', get_post_field( 'post_content', get_queried_object_id() ) ); ?>
		</div>

	<?php } elseif ( is_category() ) { ?>

		<h1 class="page-title category-title"><span><?php single_cat_title(); ?></span></h1>

		<div class="loop-description category-description">
			<?php echo category_description(); ?>
		</div>

	<?php } elseif ( is_tag() ) { ?>

		<h1 class="page-title tag-title"><span><?php single_tag_title(); ?></span></h1>

		<div class="loop-description tag-description">
			<?php echo tag_description(); ?>
		</div>

	<?php } elseif ( is_tax() ) { ?>

		<h1 class="page-title tax-title"><span><?php single_term_title(); ?></span></h1>

		<div class="loop-description tax-description">
			<?php echo term_description( '', get_query_var( 'taxonomy' ) ); ?>
		</div>

	<?php } elseif ( is_author() ) { ?>

		<h1 class="page-title fn n author-title"><span><?php the_author_meta( 'display_name', get_query_var( 'author' ) ); ?></span></h1>

		<div class="loop-description author-description">
			<?php echo wpautop( get_the_author_meta( 'description', get_query_var( 'author' ) ) ); ?>
		</div>

	<?php } elseif ( is_search() ) { ?>

		<h1 class="page-title search-title"><span><?php echo esc_attr( get_search_query() ); ?></span></h1>

		<div class="loop-description search-description">
			<?php echo wpautop( sprintf( __( 'You are browsing the search results for "%s"', 'infusion' ), esc_attr( get_search_query() ) ) ); ?>
		</div>

	<?php } elseif ( is_post_type_archive() ) { ?>

		<?php $post_type = get_post_type_object( get_query_var( 'post_type' ) ); ?>

		<h1 class="page-title cpt-title"><span><?php post_type_archive_title(); ?></span></h1>

		<div class="loop-description cpt-description">
			<?php if ( !empty( $post_type->description ) ) echo wpautop( $post_type->description ); ?>
		</div>

	<?php } elseif ( is_day() || is_month() || is_year() ) { ?>

		<?php
			if ( is_day() )
				$date = get_the_time( __( 'F d, Y', 'infusion' ) );
			elseif ( is_month() )
				$date = get_the_time( __( 'F Y', 'infusion' ) );
			elseif ( is_year() )
				$date = get_the_time( __( 'Y', 'infusion' ) );
		?>

		<h1 class="page-title date-title"><span><?php echo $date; ?></span></h1>

		<div class="loop-description date-description">
			<?php echo wpautop( sprintf( __( 'You are browsing the site archives for %s.', 'infusion' ), $date ) ); ?>
		</div>

	<?php } elseif ( is_archive() ) { ?>

		<h1 class="page-title archive-title"><span><?php _e( 'Archives', 'infusion' ); ?></span></h1>

		<div class="loop-description archive-description">
			<?php echo wpautop( __( 'You are browsing the site archives.', 'infusion' ) ); ?>
		</div>

	<?php } // End if check ?>

</div>