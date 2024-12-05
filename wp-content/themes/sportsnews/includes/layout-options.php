<?php

function lo_get_layout_type()
{
	global $post;
if ($post!='') {


	if ($post->post_type=='page' || $post->post_type=='casino') {
		$uc = get_post_meta($post->ID, '_use_custom_layout', true);
		if ($uc !='') return get_post_meta($post->ID, '_layout_type', true);
	}

}
	
	$lo = get_option('layout_type');
	if ($lo=="") $lo = "c-s";
	
	return $lo;
}


function lo_append_to_custom_css($content) {
	$content .= "\n\n/* LAYOUT OPTIONS */\n";
	$options = array('total_width','layout_type','sidebar1_width','sidebar2_width','content_width');
	foreach($options as $option) {
		$$option = get_option($option);
	}
	
	if ($layout_type == "") $layout_type = "c-s";
	//if ($total_width == "") $total_width = 1000;
	//if ($sidebar1_width == "") $sidebar1_width = 300;
	//if ($sidebar2_width == "") $sidebar2_width = 200;
	//if ($content_width == "") $content_width = 639;
	
	
	
	
	return $content;
}

//ADMINISTRATION SCREEN
add_action('admin_menu', 'layout_options_add_menu',100);
function layout_options_add_menu()
{
	add_submenu_page('design-options', __('Layout Options', 'sportsnews'), __('Layout Options', 'sportsnews'), 'update_themes', 'layout-options', 'layout_options_show_ui');
	
}


if (!function_exists('layout_options_show_ui')) {

function layout_options_show_ui()
{
	$options = array('layout_type');
	
	if (isset($_REQUEST["action"]) AND $_REQUEST["action"] == "Save Changes") {
		foreach($options as $option) {
			delete_option($option);
			add_option($option, $_POST[$option]);
		}
		//design_generate_css();
	} elseif (isset($_REQUEST["action"]) AND $_REQUEST["action"] == "Reset to Default") {
		foreach($options as $option) {
			delete_option($option);
		}
		//design_generate_css();
	}
	
	foreach($options as $option) {
		$$option = get_option($option);
	}


	
	if ($layout_type == "") $layout_type = "c-s";
	//if ($total_width == "") $total_width = 1000;
	//if ($sidebar1_width == "") $sidebar1_width = 300;
	//if ($sidebar1_width == "") $sidebar2_width = 200;
	//if ($content_width == "") $content_width = 639;

?>
<style>
    /*My css start*/
    .js .postbox .handlediv:focus {
		box-shadow: none;
		outline: 0;
	}
	
	.postbox .handlediv {    
	display: block;    
	float: right;    
	width: 36px;    
	height: 36px;    
	margin: 0;    
	padding: 0;    
	border: 0;    
	background: 0 0;    
	cursor: pointer;
	}
	
	.js .postbox .handlediv:focus .toggle-indicator::before {
		box-shadow: 0 0 0 1px #5b9dd9,0 0 2px 1px rgba(30,140,190,.8);
	}

	.postbox .hndle, .stuffbox .hndle {
		border-bottom: 1px solid #ccd0d4;
	}
	
	/*My css end*/
	
	.slider_container, .sidebar_sliders {
		margin: 10px 40px 10px 40px;
		font-size: 18px;
		width: 500px; }
	.slider_label {
		font-weight: bold; }
	.layout-editor {
		position: relative;
		width: 1000px;
		height: 200px;
		border:1px solid #ddd;
		padding: 4px;
		margin-left: 10px; }
		.layout-editor .panel {
			outline:1px dashed #999;
			height: 100%;
			display: inline-block;
			width: 200px;
			margin: 0px; }
			
		.layout-editor .content {
			background-color: #9dedff; }
		.layout-slider { width: 1000px; margin-left: 10px; margin-bottom: 15px; }
		.layout-editors { margin-top: 30px; }
		
		.layout-errors li { color: #DD0000;  }
		
	.dynamic-layout-block, .total-width { margin-bottom: 20px; }
	.dynamic-layout-block label, .total-width label { display: block ;}
			
</style>
<script>
jQuery(document).ready( function() {
	jQuery('.handlediv').click(function(){
		jQuery(this).siblings('.inside').toggle(500);
	});
});
</script>
	<div class="wrap meta-box-sortables">
    	<div class="icon32" id="icon-themes"><br></div>
        <h2>Layout Options</h2>
        
        <div id="poststuff">
		
          <form method="post" action="?page=layout-options">
            <div class="postbox " id="quick-settings">
				<button type="button" class="handlediv button-link" aria-expanded="false"><span class="screen-reader-text">Toggle panel: Layout Options</span><span class="toggle-indicator" aria-hidden="true"></span></button>
				
                <div title="Click to toggle" class="handlediv"><br></div><h3 class="hndle"><span>	<?php _e('Select Sidebar Layout Options', 'sportsnews'); ?></span></h3>
                <div class="inside">
                	<label><?php _e('Select a layout type', 'sportsnews'); ?>:</label><br />
                    <select name="layout_type" id="layout_type">
                    	
                        <option <?php echo ($layout_type=="c-s"?"SELECTED":"");?> value="c-s"><?php _e('Content - Sidebar', 'sportsnews'); ?></option>
                        <option <?php echo ($layout_type=="s-c"?"SELECTED":"");?> value="s-c"><?php _e('Sidebar - Content', 'sportsnews'); ?></option>
 			
                       
                    </select><br />
                    <br />
                  
                    <br /><br />
                    <input type="submit" onclick="return checkForNeg();" name="action" value="<?php _e('Save Changes', 'sportsnews'); ?>" accesskey="p" tabindex="5" id="save-changes" class="button-primary">
                    
                    <input type="submit" name="action" value="<?php _e('Reset to Default', 'sportsnews'); ?>" accesskey="p" tabindex="5" class="button-secondary">
                </div>                
            </div>
			</form>
		</div><!--poststuff-->
        
    </div><!--wrap-->

<?php
}}


//END ADMINISTRATION SCREEN

?>