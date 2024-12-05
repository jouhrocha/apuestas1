<?php
/**
 * Search form template
 *
 * 
 */
?>

<form method="get" class="searchform" id="searchform" action="<?php bloginfo('url'); ?>/">
	<input class="searchinput" value="" name="s" type="text" placeholder="<?php _e('Search', 'sportsnews'); ?>...">
	<input name="submit" class="searchsubmit" value="<?php _e('Search', 'sportsnews'); ?>" type="submit">
</form>
