<?php

/*
	Excerpt Shorcode Window
*/

/*
	This actually adds the html for the dialog, all html and JS needed to control the behavior should go here
*/
add_action('admin_footer', 'excerpt_button_add_editor');

// Add Excerpt Shortcode Dialog Window
function excerpt_button_add_editor()
{
	$terms = get_terms('category');
?>
<style>  
	.flytonic_sc_editor { padding: 10px !important; margin:0 auto; color:#444; font-size:12px;  }
 .flytonic_sc_editor .fly_textinput {font-size:11px; border:1px solid #ddd; border-radius:4px; -moz-border-radius:4px; color:#444; padding:3px !important; margin:0 0 10px 0; height:27px;  }
 .flytonic_sc_editor label {margin-right:5px;}
.flytonic_sc_editor p {margin:0 0 10px 0; padding:0; font-size:12px; font-style:italic; color:#666;}	


</style>


 <div id="excerpt_editor" class="flytonic_sc_editor" title="Recent Posts Shortcode"  style="display:none">
    	
	<div>
    	<label><?php _e('Number of Posts (3=Default)', 'sportsnews'); ?></label>
    	<input class="fly_textinput" type="text" name="excerpt_num" id="excerpt_num" size="10">
   	</div>	  
	

	<div>
    	<label><?php _e('Show only titles', 'sportsnews'); ?></label>
    	<input class="fly_textinput" id="excerpt_titles" type="checkbox" value="Y" />
	<p><?php _e('Check the box if you want to show posts as a list with titles only.', 'sportsnews'); ?></p>
	</div>

	<div>
    	<label><?php _e('Filter by Category', 'sportsnews'); ?></label>
    	<select class="fly_textinput" name="excerpt_cat" id="excerpt_cat">
    	     	<option value=""><?php _e('[None]', 'sportsnews'); ?></option>
                <?php foreach ($terms as $tag) { ?>
                <option value="<?php echo $tag->name;?>"><?php echo $tag->name;?></option>
                <?php } ?>
    	</select>
	<p><?php _e('You can choose to show posts within a certain category.', 'sportsnews'); ?></p>
	</div>

    </div>



    <script>
	jQuery(document).ready( function() {
		jQuery('#excerpt_editor').dialog({
			autoOpen:false,
			draggable: false,
			modal: true,
			resizable: false,
			buttons: {
				Ok: function() {
					var str = '[excerptlist ';
					
					if (jQuery('#excerpt_num').val()!='') str += 'num=' + jQuery('#excerpt_num').val() + ' '; //a normal input
					if (jQuery('#excerpt_titles').is(':checked')) str += 'titleonly=\'y\' '; //a checkbox
					if (jQuery('#excerpt_cat :selected').val()!='') str += 'cat=\'' + jQuery('#excerpt_cat :selected').val() + '\' '; //a select box
										
					str += ']';
					
					var Editor = tinyMCE.get('content');
					Editor.focus();
					Editor.selection.setContent(str);

					
					jQuery( this ).dialog( "close" );
				},
				Cancel: function() {
					jQuery( this ).dialog( "close" );
				}
			}
		});
	});
	</script>
<?php
}

?>