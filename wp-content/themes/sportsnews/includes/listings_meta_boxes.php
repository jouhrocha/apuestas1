<?php 
add_action('admin_init', 'ftm_listings_metaboxes');
add_action('save_post','ftm_savehome_meta');

function ftm_listings_metaboxes(){  
add_meta_box("homelist-meta", "Home Page Template Options", "ftm_homepage_addmeta", "page", "normal", "low");

   }
   
function ftm_homepage_addmeta($post) {
$custom = get_post_custom($post->ID);  

$hpposts_active = isset($custom["_fts_hpposts_active"][0]) ? $custom["_fts_hpposts_active"][0] : '';
$hpcat_posts = isset($custom["_fts_hpcat_posts"][0]) ? $custom["_fts_hpcat_posts"][0] : '';
$hpnumposts = isset($custom["_fts_hpnumposts"][0]) ? $custom["_fts_hpnumposts"][0] : '';
$recent_title = isset($custom["_fts_recent_title"][0]) ? $custom["_fts_recent_title"][0] : '';

$hpslider_active = isset($custom["_fts_hpslider_active"][0]) ? $custom["_fts_hpslider_active"][0] : '';
$hpslider_recent = isset($custom["_fts_hpslider_recent"][0]) ? $custom["_fts_hpslider_recent"][0] : '';
$hpslider_num= isset($custom["_fts_hpslider_num"][0]) ? $custom["_fts_hpslider_num"][0] : '';
$hpslider_cat= isset($custom["_fts_hpslider_cat"][0]) ? $custom["_fts_hpslider_cat"][0] : '';
$hpslider_post1= isset($custom["_fts_hpslider_post1"][0]) ? $custom["_fts_hpslider_post1"][0] : '';
$hpslider_post2= isset($custom["_fts_hpslider_post2"][0]) ? $custom["_fts_hpslider_post2"][0] : '';
$hpslider_post3= isset($custom["_fts_hpslider_post3"][0]) ? $custom["_fts_hpslider_post3"][0] : '';
$hpslider_post4= isset($custom["_fts_hpslider_post4"][0]) ? $custom["_fts_hpslider_post4"][0] : '';

$featart_active = isset($custom["_fts_featart_active"][0]) ? $custom["_fts_featart_active"][0] : '';
$featart1 = isset($custom["_fts_featart1"][0]) ? $custom["_fts_featart1"][0] : '';
$featart2 = isset($custom["_fts_featart2"][0]) ? $custom["_fts_featart2"][0] : '';
$featart3 = isset($custom["_fts_featart3"][0]) ? $custom["_fts_featart3"][0] : '';
$featart4 = isset($custom["_fts_featart4"][0]) ? $custom["_fts_featart4"][0] : '';
$featart5 = isset($custom["_fts_featart5"][0]) ? $custom["_fts_featart5"][0] : '';
$featart6 = isset($custom["_fts_featart6"][0]) ? $custom["_fts_featart6"][0] : '';

?>

<style>

h3.flyboxh2 {background:#e5e5e5; padding:10px; color:#222; }

.fly_box {border-bottom:1px solid #e5e5e5;padding:0px 0px 15px 0; }

	 .fly_box p.label label {color: #333; font-size: 13px;line-height: 1.5em;font-weight: bold;padding:0;margin: 0;  display: block;
    vertical-align: text-bottom;  }

	.fly_box p.label { font-size: 12px;line-height: 1.5em; color: #666; text-shadow: 0px 1px 0px #FFF;}


	.fly_box input[type="text"], .fly_box  input[type="number"], .fly_box input[type="password"], .fly_box input[type="email"], .fly_box  textarea,.fly_box  select {
	width: 100%;
    padding: 5px;
    resize: none;
    margin: 0px;
font-size:11px;
color:#666;
}
	
</style>

<input type="hidden" name="ftm_homepage_noncename" id="ftm_homepage_noncename" value="<?php echo wp_create_nonce( 'ftm_homepage'.$post->ID );?>" />

<h3 class="flyboxh2"><?php _e('Top Slider Section', 'sportsnews '); ?></h3>
<div class="fly_box">
	<p class="label">
	<label><?php _e('Hide Top Slider', 'sportsnews '); ?></label>
	<?php _e('Check to hide slider on top of page.', 'sportsnews '); ?>
	</p>
<input type="hidden" name="_fts_hpslider_active" value="no" />
	<input value="yes" type="checkbox" id="_fts_hpslider_active"  name= "_fts_hpslider_active" <?php if ($hpslider_active=='yes') { echo "Checked"; } ?> />

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Show Most Recent Posts?', 'sportsnews'); ?></label>
	<?php _e('Check to show most recent post by category below or pick each post/page individually', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
	<input type="hidden" name="_fts_hpslider_recent" value="no" />
	<input value="yes"  type="checkbox" id="_fts_hpslider_recent" name= "_fts_hpslider_recent" <?php if ($hpslider_recent=='yes') { echo "Checked"; } ?> />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('First Slide to Show as Featured Post (Optional)', 'sportsnews'); ?></label>
	<?php _e('Select first post to show as Featured Post if recent posts is not checked', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
<?php $location = fta_getallposts(); ?>
	<select name="_fts_hpslider_post1">
    		<option value=""><?php _e('Select...', 'sportsnews'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $hpslider_post1) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Second Slide to Show as Featured Post (Optional)', 'sportsnews'); ?></label>
	<?php _e('Select second post to show as Featured Post if recent posts is not checked', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
<?php $location = fta_getallposts(); ?>
	<select name="_fts_hpslider_post2">
    		<option value=""><?php _e('Select...', 'sportsnews'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $hpslider_post2) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Third Slide to Show as Featured Post (Optional)', 'sportsnews'); ?></label>
	<?php _e('Select third post to show as Featured Post if recent posts is not checked', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
<?php $location = fta_getallposts(); ?>
	<select name="_fts_hpslider_post3">
    		<option value=""><?php _e('Select...', 'sportsnews'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $hpslider_post3) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Fourth Slide to Show as Featured Post (Optional)', 'sportsnews'); ?></label>
	<?php _e('Select fourth post to show as Featured Post if recent posts is not checked', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
<?php $location = fta_getallposts(); ?>
	<select name="_fts_hpslider_post4">
    		<option value=""><?php _e('Select...', 'sportsnews'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $hpslider_post4) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Number of Slider Posts to Show if Recent Only:', 'sportsnews'); ?></label>
	</p>

	<div class="inputwrap">
	<input class="minimeta" type="text" name="_fts_hpslider_num" value="<?php echo $hpslider_num; ?>" />
	</div>

</div>


<?php $terms = get_terms('category');?>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Show Posts From This Category Only (Optional):', 'sportsnews'); ?></label>
	<?php _e('Filter posts by category', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
	<select id="_blogcat" name="_fts_hpslider_cat">
			<option value="">[<?php _e('All', 'sportsnews'); ?>]</option>
            <?php foreach ($terms as $tag) { ?>
                <option <?php if ($hpslider_cat == $tag->term_id) echo 'SELECTED'; ?> value="<?php echo $tag->term_id;?>"><?php echo $tag->name;?></option>
            <?php } ?>
	</select>
	</div>
</div>
	
<h3 class="flyboxh2"><?php _e('Featured Articles Section', 'sportsnews '); ?></h3>	

<div class="fly_box">
	<p class="label">
	<label><?php _e('Disable Featured Articles Section?', 'sportsnews '); ?></label>
	<?php _e('Check to hide this section.', 'sportsnews '); ?>
	</p>
<input type="hidden" name="_fts_featart_active" value="no" />
	<input value="yes" type="checkbox" id="_fts_featart_active"  name= "_fts_featart_active" <?php if ($featart_active=='yes') { echo "Checked"; } ?> />

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('First featured article', 'sportsnews'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = fta_getallposts(); ?>
	<select name="_fts_featart1">
    		<option value=""><?php _e('Select...', 'sportsnews'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $featart1) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Second featured article (Optional)', 'sportsnews'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = fta_getallposts(); ?>
	<select name="_fts_featart2">
    		<option value=""><?php _e('Select...', 'sportsnews'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $featart2) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Third featured article (Optional)', 'sportsnews'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = fta_getallposts(); ?>
	<select name="_fts_featart3">
    		<option value=""><?php _e('Select...', 'sportsnews'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $featart3) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Fourth featured article (Optional)', 'sportsnews'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = fta_getallposts(); ?>
	<select name="_fts_featart4">
    		<option value=""><?php _e('Select...', 'sportsnews'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $featart4) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Fifth featured article (Optional)', 'sportsnews'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = fta_getallposts(); ?>
	<select name="_fts_featart5">
    		<option value=""><?php _e('Select...', 'sportsnews'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $featart5) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Sixth featured article (Optional)', 'sportsnews'); ?></label>
	</p>
	<div class="inputwrap">
<?php $location = fta_getallposts(); ?>
	<select name="_fts_featart6">
    		<option value=""><?php _e('Select...', 'sportsnews'); ?></option>
  		<?php foreach ($location as $h) { ?>
        	<option value="<?php echo $h->ID; ?>" <?php if ($h->ID == $featart6) echo 'SELECTED'?>><?php echo $h->post_title; ?></option>
        <?php } ?>
  	</select>
	</div>

</div>

<h3 class="flyboxh2"><?php _e('Recent News Section', 'sportsnews '); ?></h3>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Title of This Section', 'sportsnews'); ?>:</label>
	<?php _e('Default title is Latest articles', 'sportsnews '); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_fts_recent_title" value="<?php echo $recent_title; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Hide Recent Articles Section', 'sportsnews '); ?></label>
	<?php _e('Check to hide this section', 'sportsnews '); ?>
	</p>
<input type="hidden" name="_fts_hpposts_active" value="no" />
	<input value="yes" type="checkbox" id="_fts_hpposts_active"  name= "_fts_hpposts_active" <?php if ($hpposts_active=='yes') { echo "Checked"; } ?> />

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Filter By Category of News(Optional)', 'sportsnews '); ?></label>
	<?php _e('Filter the recent news by category', 'sportsnews '); ?>
	</p>

<?php $tags = get_terms('category');?>

	<div class="inputwrap">
	
	<select name="_fts_hpcat_posts">
       <option value="">[<?php _e('All', 'sportsnews '); ?>]</option>
		<?php foreach ($tags as $tag) { ?>
                      <option <?php if ($hpcat_posts == "$tag->name") echo 'SELECTED'; ?>><?php echo $tag->name;?></option>
                <?php } ?>
       </select>
	</div>
</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Show how many news stories:', 'sportsnews'); ?></label>
	</p>

	<div class="inputwrap">
	<input class="minimeta" type="text" name="_fts_hpnumposts" value="<?php echo $hpnumposts; ?>" />
	</div>

</div>



<?php }  

function ftm_savehome_meta($post_id) {
	global $post;

	if (isset($_POST['ftm_homepage_noncename']) AND !wp_verify_nonce( $_POST['ftm_homepage_noncename'], 'ftm_homepage'.$post_id )) {
		return $post_id;
	}
	
	$fields = array('_fts_hpposts_active','_fts_hpcat_posts','_fts_hpnumposts','_fts_hpslider_active','_fts_hpslider_recent','_fts_hpslider_num','_fts_hpslider_cat','_fts_hpslider_post1','_fts_hpslider_post2','_fts_hpslider_post3','_fts_hpslider_post4','_fts_featart_active','_fts_featart1','_fts_featart2','_fts_featart3','_fts_featart4','_fts_featart5','_fts_featart6','_fts_recent_title');
	foreach ($fields as $field) {
			if (isset($_POST[$field])) { modify_post_meta($post_id, $field, $_POST[$field]); }
	}
	
}
?>