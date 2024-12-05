<?php



/*

	Columns Shorcode Window

*/



/*

	This actually adds the html for the dialog, all html and JS needed to control the behavior should go here

*/

add_action('admin_footer', 'fly_columns_window');



// Add Excerpt Shortcode Dialog Window

function fly_columns_window()

{

	

?>

<style>  

flytonic_sc_editor { padding: 10px !important; margin:0 auto; color:#444; font-size:12px;  }

.flytonic_sc_editor .fly_textinput {font-size:11px; border:1px solid #ddd; border-radius:4px; -moz-border-radius:4px; color:#444; padding:3px !important; margin:0 0 10px 0; height:27px;  }

.flytonic_sc_editor label {margin-right:5px;}

.flytonic_sc_editor p {margin:0 0 10px 0; padding:0; font-size:12px; font-style:italic; color:#666;}	



.sc-layout-thumbs .thumb-wrapper {

    cursor: pointer;

    float: left;

    font-size: 30px;

    margin-bottom: 10px;

    margin-top: 10px;

    margin-right: 10px;

    min-width: 9.09%;

    text-align: center;

    width: 60px;

}

.sc-layout-thumbs .thumb-wrapper a { text-decoration: none;}

.sc-layout-thumbs .thumb-wrapper a:focus{ box-shadow: none;}

.sc-layout-thumbs .thumb-wrapper i {

    color: #428bca;

}



.sc-layout-thumbs .thumb-wrapper a span {

	width: 10px;

	height: 30px;

	display: block;

	background: #428bca;

	float: left;

	margin-right: 2px;

}

.sc-layout-thumb.onumb-wrapper a span.full_width { width: 60px;}

.sc-layout-thumbs .thumb-wrapper a span.one_half{ width: 28px;}

.sc-layout-thumbs .thumb-wrapper a span.one_third { width: 18px}

.sc-layout-thumbs .thumb-wrapper a span.one_fourth { width: 13px;}

.sc-layout-thumbs .thumb-wrapper a span.two_third { width: 38px;}

.sc-layout-thumbs .thumb-wrapper a span.three_fourth { width: 43px;}

.sc-layout-thumbs .thumb-wrapper a span.two_fifth{ width: 23px;}

.sc-layout-thumbs .thumb-wrapper a span.three_fifth { width: 33px;}



.sc-layout-thumbs .thumb-wrapper a span.one_fifth {width: 10px;}

.sc-layout-thumbs .thumb-wrapper a span.four_fifth { width: 46px;}





</style>



    <script>

	jQuery(document).ready( function() {

		



		jQuery('#fly_columns').dialog({

			autoOpen:false,

			draggable: false,

			modal: true,

			resizable: false,

			buttons: {

				//Ok: function() {

				//	var str = '[ft_columns ';

				//	

				//	if (jQuery('#box_style').val()!='') str += 'box_style=\'' + jQuery('#box_style').val() + '\' '; //a normal input

				//						

				//	str += ']';

				//	

				//	str += jQuery('#box_body').val() + '[/ft_columns]';

				//	

				//	var Editor = tinyMCE.get('content');

				//	Editor.focus();

				//	Editor.selection.setContent(str);

				//	

				//	

				//	jQuery( this ).dialog( "close" );

				//},

				Close: function() {

					jQuery( this ).dialog( "close" );

				}

			}

		});

		

		jQuery('.btn').on('click', function(){

			var tagtext = jQuery(this).attr('tagtext');

			

			if(typeof(tagtext)=='undefined'){

				return;

			    }

			

			if(window.tinyMCE) {

		

			window.tinyMCE.activeEditor.insertContent(tagtext);

				

			parent.tinymce.activeEditor.windowManager.close();

			

			}

			return;

		});

		

		

		

	});

	</script>

	

	

    

	<div id="fly_columns" class="flytonic_sc_editor" title="Columns Shortcode"  style="display:none">

	   

	   

		<div class="jsn-bootstrap3">

			<div class="sc-layout-thumbs">

				<div class="thumb-wrapper" title="one columns" data-columns="1">

					<a tagtext="[full_width]Your content[/full_width]" href="javascript:void(0);" class="btn"><span class="full_width"></span><!--<i class="wr-layout-12"></i>--></a>

				</div>

				

				<div class="thumb-wrapper" title="two columns" data-columns="2">

					<a tagtext="[one_half]Your content[/one_half][one_half_last]Your content[/one_half_last]" href="javascript:void(0);" class="btn">

					<!--<i class="wr-layout-6-6"></i>-->

					<span class="one_half"></span>

					<span class="one_half"></span>

					</a>

				</div>

				

				

				<div title="three columns" data-columns="3" class="thumb-wrapper">

					<a tagtext="[one_third]Your content[/one_third][one_third]Your content[/one_third][one_third_last]Your content[/one_third_last]" href="javascript:void(0);" class="btn">

					<!--<i class="wr-layout-4-4-4"></i>-->

					<span class="one_third"></span>

					<span class="one_third"></span>

					<span class="one_third"></span>

					</a>

				</div>

				

				<div title="four columns" data-columns="4" class="thumb-wrapper">

					<a tagtext="[one_fourth]Your content[/one_fourth][one_fourth]Your content[/one_fourth][one_fourth]Your content[/one_fourth][one_fourth_last]Your content[/one_fourth_last]" href="javascript:void(0);" class="btn">

					<!--<i class="wr-layout-3-3-3-3"></i>-->

					<span class="one_fourth"></span>

					<span class="one_fourth"></span>

					<span class="one_fourth"></span>

					<span class="one_fourth"></span>

					</a>

				</div>

				

				<div title="five columns" data-columns="5" class="thumb-wrapper">

					<a tagtext="[one_fifth]Your content[/one_fifth][one_fifth]Your content[/one_fifth][one_fifth]Your content[/one_fifth][one_fifth]Your content[/one_fifth][one_fifth_last]Your content[/one_fifth_last]" href="javascript:void(0);" class="btn">

					<span></span>

					<span></span>

					<span></span>

					<span></span>

					<span></span>

					</a>

				</div>

				

				<div title="1/3 & 2/3" data-columns="4,8" class="thumb-wrapper active">

					<a class="btn" href="javascript:void(0);" tagtext="[one_third]Your content[/one_third][two_third_last]Your content[/two_third_last]">

						<!--<i class="wr-layout-4-8"></i>-->

						<span class="one_third"></span>

						<span class="two_third"></span>

					</a>

				</div>

				

				<div title="2/3 & 1/3" data-columns="8,4" class="thumb-wrapper">

					<a class="btn" href="javascript:void(0);" tagtext="[two_third]Your content[/two_third][one_third_last]Your content[/one_third_last]">

					<!--<i class="wr-layout-8-4"></i>-->

						<span class="two_third"></span>

						<span class="one_third"></span>

					</a>

				</div>

				

				<div title="1/4 & 3/4" data-columns="3,9" class="thumb-wrapper">

					<a class="btn" href="javascript:void(0);" tagtext="[one_fourth]Your content[/one_fourth][three_fourth_last]Your content[/three_fourth_last]">

					<!--<i class="wr-layout-3-9"></i>-->

					<span class="one_fourth"></span>

					<span class="three_fourth"></span>

					</a>

				</div>

				

				<div title="3/4 & 1/4" data-columns="9,3" class="thumb-wrapper">

					<a class="btn" href="javascript:void(0);" tagtext="[three_fourth]Your content[/three_fourth][one_fourth_last]Your content[/one_fourth_last]">

					<!--<i class="wr-layout-9-3"></i>-->

					<span class="three_fourth"></span>

					<span class="one_fourth"></span>

					</a>

				</div>

				

				

				<div title="2/5 & 3/5" data-columns="2,3" class="thumb-wrapper">

					<a class="btn" href="#" tagtext="[two_fifth]Your content[/two_fifth][three_fifth_last]Your content[/three_fifth_last]">

						<span class="two_fifth"></span>

						<span class="three_fifth"></span>

					</a>

				</div>

				

				<div title="3/5 & 2/5" data-columns="3,2" class="thumb-wrapper">

					<a class="btn" href="#" tagtext="[three_fifth]Your content[/three_fifth][two_fifth_last]Your content[/two_fifth_last]">

						<span class="three_fifth"></span>

						<span class="two_fifth"></span>

					</a>

					

				</div>

				

				

				<div title="1/5 & 4/5" data-columns="1,4" class="thumb-wrapper">

					<a href="#" class="btn" tagtext="[one_fifth]Your content[/one_fifth][four_fifth_last]Your content[/four_fifth_last]">

						<span class="one_fifth"></span>

						<span class="four_fifth"></span>

					</a>

					

				</div>

				

				<div title="4/5 & 1/5" data-columns="4,1" class="thumb-wrapper">

					

					<a href="#" class="btn" tagtext="[four_fifth]Your content[/four_fifth][one_fifth_last]Your content[/one_fifth_last]">

						<span class="four_fifth"></span>

						<span class="one_fifth"></span>

					</a>

				</div>

				

				

			</div>

		</div>

	</div>

<?php

}



?>