<?php

/**
 * Search form template
 */

?>

<form method="GET" action="<?php echo get_bloginfo('home'); ?>" id="searchForm" class="clearfix">
	<div class="input-group">
		<input class="form-control" type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s">
		<span class="input-group-btn">
			<button type="submit" id="searchSubmit" class="btn btn-success">Search <i class="fa fa-search"></i></button>
		</span>
	</div>
</form>