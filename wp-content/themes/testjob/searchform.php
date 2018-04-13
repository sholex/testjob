<form role="search" method="get" id="searchform" class="searchform" action="<?php esc_url( home_url( '/' ) ) ?>">
	<div class="form-group searchform">
		<input type="text" class="form-control" value="<?php get_search_query() ?>" name="s" id="s"  placeholder="Поиск"/>

	</div>
</form>