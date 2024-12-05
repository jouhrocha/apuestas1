<?php
function fly_full_width( $atts, $content = null ) {
   return '<div class="full_width">' . do_shortcode($content) . '</div>';
}
add_shortcode('full_width', 'fly_full_width');

function fly_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'fly_one_half');

function fly_one_half_last( $atts, $content = null ) {
   return '<div class="one_half lastcolumn">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_half_last', 'fly_one_half_last');

function fly_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'fly_one_third');

function fly_one_third_last( $atts, $content = null ) {
   return '<div class="one_third lastcolumn">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_third_last', 'fly_one_third_last');

function fly_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'fly_two_third');

function fly_two_third_last( $atts, $content = null ) {
   return '<div class="two_third lastcolumn">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_third_last', 'fly_two_third_last');



function fly_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'fly_one_fourth');

function fly_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth lastcolumn">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fourth_last', 'fly_one_fourth_last');

function fly_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'fly_three_fourth');

function fly_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth lastcolumn">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fourth_last', 'fly_three_fourth_last');

function fly_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'fly_one_fifth');

function fly_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth lastcolumn">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fifth_last', 'fly_one_fifth_last');

function fly_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'fly_two_fifth');

function fly_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth lastcolumn">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_fifth_last', 'fly_two_fifth_last');

function fly_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'fly_three_fifth');

function fly_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth lastcolumn">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fifth_last', 'fly_three_fifth_last');

function fly_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'fly_four_fifth');

function fly_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth lastcolumn">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('four_fifth_last', 'fly_four_fifth_last');


function fly_dropcap2( $atts, $content = null ) {
   return '<span class="dropcap2">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap2', 'fly_dropcap2');

function fly_formatter($content) {
	$new_content = '';
	
	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	
	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	
	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
	
	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {
			
			/* Append to content (no formatting) */
			$new_content .= $matches[1];
		} else {
			
			/* Format and append to content */
			$new_content .= wptexturize(wpautop($piece));		
		}
	}
	
	return $new_content;
}

// Remove the 2 main auto-formatters
//remove_filter('the_content', 'wpautop');
//remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
//add_filter('the_content', 'fly_formatter', 99);
//add_filter('widget_text', 'fly_formatter', 99);
?>