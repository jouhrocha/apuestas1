<?php 

add_action('init', 'fly_fantasy_posts');

function fly_fantasy_posts() {

// Check it Slug has been set
if (get_theme_option('affiliate-slug')){
	$slug=get_theme_option('affiliate-slug');
   } else { $slug= 'review'; 

}

$args = array(
  'labels' => array(   
         'name' => __( 'Fantasy Sites' ,'sportsnews' ),
         'singular_name' => __( 'Fantasy Site' ,'sportsnews' ),
        'add_new' => __( 'Add New Fantasy Site','sportsnews'  ),
	'add_new_item' => __( 'Add New Fantasy Site','sportsnews'  ),
	'edit' => __( 'Edit Fantasy Site' ,'sportsnews' ),
	'edit_item' => __( 'Edit Fantasy Site' ,'sportsnews' ),
	'new_item' => __( 'New Fantasy Site','sportsnews'  ),
	'view' => __( 'View Fantasy Site' ,'sportsnews' ),
	'view_item' => __( 'View Fantasy Site' ,'sportsnews' ),
	'search_items' => __( 'Search Fantasy Sites','sportsnews'  ),
	'not_found' => __( 'No Fantasy Sites found' ,'sportsnews' ),
	'not_found_in_trash' => __( 'No Fantasy Sites found in Trash','sportsnews'  ),
	'parent' => __( 'Parent Fantasy Site','sportsnews'  ),

                ),

  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'hierarchical' => false,
  'rewrite' => array( 'slug' => $slug, 'with_front' => false ),
  'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes','comments','author')
);

register_post_type('fantasy',$args);

  $labels = array(
       'name' => __( 'Fantasy Tags','sportsnews'),
    'singular_name' => __( 'Fantasy tag','sportsnews' ),
    'search_items' =>  __( 'Search Fantasy Tags','sportsnews' ),
    'all_items' => __( 'All Fantasy Tags','sportsnews' ),
    'parent_item' => __( 'Parent Fantasy Tag','sportsnews' ),
    'parent_item_colon' => __( 'Parent Fantasy Tag:','sportsnews' ),
    'edit_item' => __( 'Edit Fantasy Tag','sportsnews' ), 
    'update_item' => __( 'Update Fantasy Tag' ,'sportsnews'),
    'add_new_item' => __( 'Add New Fantasy Tag' ,'sportsnews'),
    'new_item_name' => __( 'New Fantasy Tag' ,'sportsnews'),
    'menu_name' => __( 'Fantasy Tags' ,'sportsnews'),
  ); 	

register_taxonomy('fantasy-tags',array('fantasy'), array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'fantasytags' ),
  ));

}



// Add Second Editor to Casino Page
add_action( 'edit_form_advanced', 'fst_fantasy_editor' );
add_action( 'save_post', 'fst_save_fantasyeditor', 10, 2 );
function fst_fantasy_editor() {
	// get and set $content somehow...

global $post;

if( 'fantasy' != $post->post_type )
        return;

	$editor1 = get_post_meta( $post->ID, '_fst_fantasy_editor1', true);
	wp_nonce_field('fantasy'.$post->ID,'fantasy_form2' );

	 echo '<h3>Top Content Area on Fantasy Review (Optional)</h3>';
    echo wp_editor( $editor1, '_fst_fantasy_editor1', array( 'textarea_name' => '_fst_fantasy_editor1' ) );
}

function fst_save_fantasyeditor( $post_id, $post_object )
{
    if( !isset( $post_object->post_type ) || 'fantasy' != $post_object->post_type )
        return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;
  if (isset($_POST['fantasy_form2']) AND !wp_verify_nonce( $_POST['fantasy_form2'], 'fantasy'.$post_id )) {
		return;
	}
    if ( isset( $_POST['fantasy_form2'] )  )
        update_post_meta( $post_id, '_fst_fantasy_editor1', $_POST['_fst_fantasy_editor1'] );
}


add_action('admin_init', 'fly_create_metaboxes');
add_action('save_post','save_blogmetaboxes');
add_action('save_post','save_casinometaboxes');



function fly_create_metaboxes(){  
  add_meta_box("room-meta", __('Fantasy Site Properties', 'doubledown'), "fly_casino_metabox", "fantasy", "normal", "low");
  add_meta_box("blog-meta",__('Blog Page Options', 'doubledown'), "blog_type_metabox", "page", "advanced", "low");
   }  

function get_distinct_values($key, $excludeArray)
{
	global $wpdb;
	$x = $wpdb->get_col("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key='$key'");
	$types = array();
	foreach($x as $y)
	{
		if (!in_array($y, $excludeArray)) {
			$types[] = $y;
		}
	}
	return $types;
}

function fly_casino_metabox($post) {

$custom = get_post_custom($post->ID);  

$roomurl = isset($custom["_as_roomurl"][0]) ? $custom["_as_roomurl"][0] : '';
$redirectkey = isset($custom["_as_redirectkey"][0]) ? $custom["_as_redirectkey"][0] : '';
$bonuscode= isset($custom["_as_bonuscode"][0]) ? $custom["_as_bonuscode"][0] : '';
$rating = isset($custom["_as_rating"][0]) ? $custom["_as_rating"][0] : '';
$bonustext = isset($custom["_as_bonustext"][0]) ? $custom["_as_bonustext"][0] : '';
$subonus = isset($custom["_as_subonus"][0]) ? $custom["_as_subonus"][0] : '';
$bonusper = isset($custom["_as_bonusper"][0]) ? $custom["_as_bonusper"][0] : '';

$mindeposit = isset($custom["_as_mindeposit"][0]) ? $custom["_as_mindeposit"][0] : '';
$thumb1 = isset($custom["_as_thumb1"][0]) ? $custom["_as_thumb1"][0] : '';
$screen1 = isset($custom["_as_screen1"][0]) ? $custom["_as_screen1"][0] : '';


$weburl = isset($custom["_as_weburl"][0]) ? $custom["_as_weburl"][0] : '';
$location = isset($custom["_as_location"][0]) ? $custom["_as_location"][0] : '';     
$founded = isset($custom["_as_founded"][0]) ? $custom["_as_founded"][0] : '';      

$customhl1 = isset($custom["_as_customhl1"][0]) ? $custom["_as_customhl1"][0] : '';    
$customhinput1 = isset($custom["_as_customhinput1"][0]) ? $custom["_as_customhinput1"][0] : '';    
$customhl2 = isset($custom["_as_customhl2"][0]) ? $custom["_as_customhl2"][0] : '';    
$customhinput2 = isset($custom["_as_customhinput2"][0]) ? $custom["_as_customhinput2"][0] : '';    
$customhl3 = isset($custom["_as_customhl3"][0]) ? $custom["_as_customhl3"][0] : '';    
$customhinput3 = isset($custom["_as_customhinput3"][0]) ? $custom["_as_customhinput3"][0] : '';    
$customhl4 = isset($custom["_as_customhl4"][0]) ? $custom["_as_customhl4"][0] : '';    
$customhinput4 = isset($custom["_as_customhinput4"][0]) ? $custom["_as_customhinput4"][0] : '';    
$customhl5 = isset($custom["_as_customhl5"][0]) ? $custom["_as_customhl5"][0] : '';    
$customhinput5 = isset($custom["_as_customhinput5"][0]) ? $custom["_as_customhinput5"][0] : '';    

$customrating_name1 = isset($custom["_as_customrating_name1"][0]) ? $custom["_as_customrating_name1"][0] : '';    
$customrating1 = isset($custom["_as_customrating1"][0]) ? $custom["_as_customrating1"][0] : '';    
$customrating_name2 = isset($custom["_as_customrating_name2"][0]) ? $custom["_as_customrating_name2"][0] : '';    
$customrating2 = isset($custom["_as_customrating2"][0]) ? $custom["_as_customrating2"][0] : '';    
$customrating_name3 = isset($custom["_as_customrating_name3"][0]) ? $custom["_as_customrating_name3"][0] : '';    
$customrating3 = isset($custom["_as_customrating3"][0]) ? $custom["_as_customrating3"][0] : '';    
$customrating_name4 = isset($custom["_as_customrating_name4"][0]) ? $custom["_as_customrating_name4"][0] : '';    
$customrating4 = isset($custom["_as_customrating4"][0]) ? $custom["_as_customrating4"][0] : '';    
$customrating_name5 = isset($custom["_as_customrating_name5"][0]) ? $custom["_as_customrating_name5"][0] : '';    
$customrating5 = isset($custom["_as_customrating5"][0]) ? $custom["_as_customrating5"][0] : '';    
$customrating_name6 = isset($custom["_as_customrating_name6"][0]) ? $custom["_as_customrating_name6"][0] : '';    
$customrating6 = isset($custom["_as_customrating6"][0]) ? $custom["_as_customrating6"][0] : '';    

$pros = isset($custom["_as_pros"][0]) ? $custom["_as_pros"][0] : '';    
$cons = isset($custom["_as_cons"][0]) ? $custom["_as_cons"][0] : '';    
	
?>

<style>

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


<input type="hidden" name="fsports_type_noncename" id="fsports_type_noncename" value="<?php echo wp_create_nonce( 'fsports_type'.$post->ID );?>" />

<div class="fly_box">
	<p class="label">
	<label><?php _e('Site Affiliate URL', 'sportsnews'); ?>:</label>
	<?php _e('The referral url from the affiliate program', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_roomurl" value="<?php echo $roomurl; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Redirect Key', 'sportsnews'); ?>:</label>
	<?php _e('This is just a word to hide the full affiliate url that you create.  So the new url would be to visit the site would', 'sportsnews'); ?>: <?php bloginfo('url'); ?>/visit/yourkey/
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_redirectkey" value="<?php echo $redirectkey; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Screenshot URL (480px x 300px or bigger)', 'sportsnews'); ?>:</label>
	<?php _e('The screenshot of the website to be shown on the review page', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" id="upload_image__as_thumb1" name="_as_thumb1" value="<?php echo $thumb1; ?>" />
	<input class="upload_image_button button-primary" id="upload_image_button" type="button" value="<?php _e('Choose Image', 'sportsnews'); ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Established Date', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_founded" value="<?php echo $founded; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Website Display URL', 'sportsnews'); ?>:</label>
	<?php _e('This is the display URL in the format of www.domain.com', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_weburl" value="<?php echo $weburl; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Location', 'sportsnews'); ?>:</label>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_location" value="<?php echo $location; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Minimum Deposit (with currency)', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_mindeposit" value="<?php echo $mindeposit; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Main Signup Bonus Code', 'sportsnews'); ?>:</label>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_bonuscode" value="<?php echo $bonuscode; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Max Bonus Amount (with currency)', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_subonus" value="<?php echo $subonus; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Bonus Headline', 'sportsnews'); ?>:</label>
	<?php _e('This is the bonus information displayed in the widgets and review.  Include text and numbers..etc', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_bonustext" value="<?php echo $bonustext; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Pros, separate each by |', 'sportsnews'); ?>:</label>
	</p>
	<div class="inputwrap">
	<input type="text" name="_as_pros" value="<?php echo $pros; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Cons, separate each by |', 'sportsnews'); ?>:</label>
	</p>
	<div class="inputwrap">
	<input type="text" name="_as_cons" value="<?php echo $cons; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Site Editor Rating', 'sportsnews'); ?>:</label>
	<?php _e('Select the rating to be show to visitors', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
	<select name="_as_rating" class="smallmetatwo">
        <option value="">Select</option>
    	<option <?php if ($rating == "1") echo 'SELECTED'; ?>>1</option>


<?php $x=0; while ($x<=5){ ?>

<option <?php if ($rating == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>

<h3><?php _e('Optional Custom Fields to Add to Review Table', 'sportsnews'); ?></h3>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 1', 'sportsnews'); ?>:</label>
	
	<?php _e('This is a custom field you can add on the review page template 2.  Please enter the value below.', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhl1" value="<?php echo $customhl1; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 1', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhinput1" value="<?php echo $customhinput1; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 2', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhl2" value="<?php echo $customhl2; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 2', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhinput2" value="<?php echo $customhinput2; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 3', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhl3" value="<?php echo $customhl3; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 3', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhinput3" value="<?php echo $customhinput3; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 4', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhl4" value="<?php echo $customhl4; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 4', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhinput4" value="<?php echo $customhinput4; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 5', 'sportsnews'); ?>:</label>
	

	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhl5" value="<?php echo $customhl5; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 5', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customhinput5" value="<?php echo $customhinput5; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Field 1', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customrating_name1" value="<?php echo $customrating_name1; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Value 1', 'sportsnews'); ?>:</label>
	</p>
	<div class="inputwrap">
	<select name="_as_customrating1" class="smallmetatwo">
        <option value="">Select</option>
    	<option <?php if ($customrating1 == "1") echo 'SELECTED'; ?>>1</option>
<?php $x=0; while ($x<=5){ ?>

<option <?php if ($customrating1 == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Field 2', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customrating_name2" value="<?php echo $customrating_name2; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Value 2', 'sportsnews'); ?>:</label>
	</p>
	<div class="inputwrap">
	<select name="_as_customrating2" class="smallmetatwo">
        <option value="">Select</option>
    	<option <?php if ($customrating2 == "1") echo 'SELECTED'; ?>>1</option>
<?php $x=0; while ($x<=5){ ?>

<option <?php if ($customrating2 == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Field 3', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customrating_name3" value="<?php echo $customrating_name3; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Value 3', 'sportsnews'); ?>:</label>
	</p>
	<div class="inputwrap">
	<select name="_as_customrating3" class="smallmetatwo">
        <option value="">Select</option>
    	<option <?php if ($customrating3 == "1") echo 'SELECTED'; ?>>1</option>
<?php $x=0; while ($x<=5){ ?>

<option <?php if ($customrating3 == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Field 4', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customrating_name4" value="<?php echo $customrating_name4; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Value 3', 'sportsnews'); ?>:</label>
	</p>
	<div class="inputwrap">
	<select name="_as_customrating4" class="smallmetatwo">
        <option value="">Select</option>
    	<option <?php if ($customrating4 == "1") echo 'SELECTED'; ?>>1</option>
<?php $x=0; while ($x<=5){ ?>

<option <?php if ($customrating4 == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Field 5', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customrating_name5" value="<?php echo $customrating_name5; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Value 5', 'sportsnews'); ?>:</label>
	</p>
	<div class="inputwrap">
	<select name="_as_customrating5" class="smallmetatwo">
        <option value="">Select</option>
    	<option <?php if ($customrating5 == "1") echo 'SELECTED'; ?>>1</option>
<?php $x=0; while ($x<=5){ ?>

<option <?php if ($customrating5 == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Field 6', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_customrating_name6" value="<?php echo $customrating_name6; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Rating Value 6', 'sportsnews'); ?>:</label>
	</p>
	<div class="inputwrap">
	<select name="_as_customrating6" class="smallmetatwo">
        <option value="">Select</option>
    	<option <?php if ($customrating6 == "1") echo 'SELECTED'; ?>>1</option>
<?php $x=0; while ($x<=5){ ?>

<option <?php if ($customrating6 == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>


</table>


<script>
var destObj = false;
var oldSendTo;

jQuery(document).ready(function() {

	jQuery('.upload_image_button').click(function() {
	 formfield = jQuery(this).prev().attr('name');
	 destObj = jQuery(this).prev();
	 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	 return false;
	});
	
	oldSendTo = window.send_to_editor;
	window.send_to_editor = function(html) {
		if (destObj != false) {
			 imgurl = jQuery('img',html).attr('src');
			 jQuery(destObj).val(imgurl);
			 jQuery(destObj).parent().find('img').attr('src', imgurl);
			 tb_remove();
			 destObj = false;
		} else {
			oldSendTo(html);
		}
	}
	
	jQuery('.clear_field_button').click( function() {
		jQuery(this).prev().prev().val('');
	});
});
</script>

<?php
      }


function blog_type_metabox() {
         global $post;  
         $custom = get_post_custom($post->ID); 


$numblogs = isset($custom["_numblogs"][0]) ? $custom["_numblogs"][0] : '';
 $blogexcerpts = isset($custom["_blogexcerpts"][0]) ? $custom["_blogexcerpts"][0] : '';
$blogcat = isset($custom["_blogcat"][0]) ? $custom["_blogcat"][0] : '';
         
 
      
?>


<style>

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

<input type="hidden" name="blog_type_noncename" id="blog_type_noncename" value="<?php echo wp_create_nonce( 'blog_type'.$post->ID );?>" />


<div class="fly_box">
	<p class="label">
	<label><?php _e('Show Excerpts Instead of Full Posts', 'sportsnews'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<select name="_blogexcerpts" >
        <option value=""><?php _e('Select', 'sportsnews'); ?></option>
    	<option <?php if ($blogexcerpts == "Yes") echo 'SELECTED'; ?>><?php _e('Yes', 'sportsnews'); ?></option>
        <option <?php if ($blogexcerpts == "No") echo 'SELECTED'; ?>><?php _e('No', 'sportsnews'); ?></option>
       </select> 
	</div>

</div>


<?php $terms = get_terms('category');?>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Show Posts From This Cat Only', 'sportsnews'); ?>:</label>
	<?php _e('Choose to only show posts from this category', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
	<select id="_blogcat" name="_blogcat">
			<option value="">[<?php _e('All', 'sportsnews'); ?>]</option>
                            <?php foreach ($terms as $tag) { ?>
                                <option <?php if ($blogcat == $tag->term_id) echo 'SELECTED'; ?> value="<?php echo $tag->term_id;?>"><?php echo $tag->name;?></option>
                            <?php } ?>
	</select>
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Number of Posts To Show', 'sportsnews'); ?>:</label>
	<?php _e('Enter a number here', 'sportsnews'); ?>
	</p>

	<div class="inputwrap">
	<input  type="text" name="_numblogs" value="<?php echo $numblogs; ?>" />
	</div>

</div>



<?php  } 

function save_blogmetaboxes($post_id) {	
	if (isset($_POST['blog_type_noncename']) AND !wp_verify_nonce( $_POST['blog_type_noncename'], 'blog_type'.$post_id )) {
		return $post_id;
	}

$fields = array('_numblogs', '_blogexcerpts', '_blogcat');
	foreach ($fields as $field) {
		if (isset($_POST[$field])) { modify_post_meta($post_id, $field, $_POST[$field]); }
	}

}


function save_casinometaboxes($post_id) {
	global $post;

	if ( isset($_POST['fsports_type_noncename']) AND !wp_verify_nonce( $_POST['fsports_type_noncename'], 'fsports_type'.$post_id )) {
		return $post_id;
	}
	
	//special handling
	

	$fields = array('_as_roomname', '_as_roomurl','_as_redirectkey','_as_usonly' ,'_as_bonusamount','_as_bonuscode','_as_rating','_as_bonustext','_as_mindeposit','_as_subonus','_as_bonusper','_as_thumb1','_as_weburl','_as_payout','_as_founded','_as_customhl1','_as_customhinput1','_as_customhl2','_as_customhinput2','_as_customhl3','_as_customhinput3','_as_customhl4','_as_customhinput4','_as_customhl5','_as_customhinput5','_as_customrating_name1','_as_customrating1','_as_customrating_name2','_as_customrating2','_as_customrating_name3','_as_customrating3','_as_customrating_name4','_as_customrating4','_as_customrating_name5','_as_customrating5','_as_customrating_name6','_as_customrating6','_as_pros','_as_cons','_as_location');
	foreach ($fields as $field) {
		if (isset($_POST[$field])) { modify_post_meta($post_id, $field, $_POST[$field]); }
	}

}	


function modify_post_meta($id, $key, $value)
{
	delete_post_meta($id, $key);
	if ($value != "") {
		add_post_meta($id, $key, $value);
	}

}



?>