<div class="search" rol="search">

<form method="get" class="search-form" action="<?php echo trailingslashit( home_url() ); ?>">
<div>
	<input class="search-text" type="text" name="s" placeholder="<?php if ( is_search() ) echo esc_attr( get_search_query() ); else esc_attr_e( 'Search: type keywords, press enter...', 'infusion' ); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
	<input class="search-submit button" name="submit" type="submit" value="<?php esc_attr_e( 'Search', 'infusion' ); ?>" />
</div>
</form><!-- .search-form -->

</div><!-- .search -->