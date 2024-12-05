<?php

// Get casino posts
function getAllPostsByType($type='fantasy') {
	$posts = get_posts(array('numberposts'=>-1, 'post_type' => $type, 'orderby'=>'title', 'order'=>'ASC'));
	return $posts;
}

// Get unlinked terms
function fly_unlinkterm($id,$myterm) {
$ret='';
	$terms = wp_get_post_terms($id,$myterm);
	$count = count($terms);
 	$i=0;
 		if($count > 0){
		foreach ($terms as $term) {
		$i++;
      				$ret .=''.$term->name.'';
		
			if ($count != $i) {
        			$ret .= ', ';
       		 	}
		}
}
	
	return $ret;
}

// Get custom posts
function fta_getallposts() {
	$posts = get_posts(array('numberposts'=>-1, 'post_type' => array( 'post','page'), 'orderby'=>'title', 'order'=>'ASC'));
	return $posts;
}
// Get excerpt by id
function get_excerpt_by_id($post_id){
$the_post = get_post($post_id); //Gets post ID
$the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
$excerpt_length = 50; //Sets excerpt length by word count
$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
$words = explode(' ', $the_excerpt, $excerpt_length + 1);
if(count($words) > $excerpt_length) :
array_pop($words);
array_push($words, '…');
$the_excerpt = implode(' ', $words);
endif;
$the_excerpt = '<p>' . $the_excerpt . '</p>';
return $the_excerpt;
}

// Limit text length
function fly_limit_text($string,$num=30) {
	$string = strip_tags($string);
	if (strlen($string) > $num) {
    	// truncate string
    	$stringCut = substr($string, 0, $num);
    	// make sure it ends in a word
    	$string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
	}

	$string =$string .'...';

	return $string;
}
?>