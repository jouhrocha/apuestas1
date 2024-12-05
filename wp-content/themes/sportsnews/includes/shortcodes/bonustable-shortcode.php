<?php 

// Adds Bonus Table Shortcode
function fly_bonustable_func($atts) {
	extract(shortcode_atts(array(
		'num' => 5,
		'orderby' => 'date',
		'sort' => 'DESC',
		'tag'=>'',
		'platform'=>'',
		'country'=>'',
	), $atts));


if ($orderby == 'date'){
	
$loop = new WP_Query( array( 'post_type' => 'fantasy', 'posts_per_page' => -1, 'orderby'=>'date','order' => 'DESC'  )); 

} else if ($orderby == 'title') {

$loop = new WP_Query( array( 'post_type' => 'fantasy', 'posts_per_page' => -1, 'order'=>$sort, 'orderby'=>'title')); 

} else if ($orderby == 'order') {

$loop = new WP_Query( array( 'post_type' => 'fantasy', 'posts_per_page' => -1, 'order'=>$sort, 'orderby'=>'menu_order' )); 

} else {

$loop = new WP_Query( array( 'post_type' => 'fantasy', 'posts_per_page' => -1, 'order'=>$sort, 'orderby'=>'meta_value_num', 'meta_key'=>$orderby ) );

}

	$i=0;
	$posts = array();
	foreach ($loop->posts as $p) {
		if ($i>=$num) continue;
		
		if ($tag!='' && !has_term($tag, 'fantasy-tags', $p)) continue;
		$custom = get_post_custom($p->ID);	
		
		$posts[] = $p;
		$i++;
	}


$redirectkey=fly_redirect_slug();

$ret = '

<table class="midsites">
    	<tr>
 
      	<th class="casinocol">Fantasy Site</th>
		<th class="rating hideme">Rating</th>
      	<th class="bonuscol ">Bonus</th>
      	<th class="reviewcol hide2">Review</th>
      	<th class="visitcol">Visit</th>
    	</tr>


';
$x=0;
global $post;
$opost = $post;
foreach ($posts as $post) :
	setup_postdata($post); 
$x=$x+1;
if(!empty(get_post_meta($post->ID,"_as_rating",true))){$rateper=get_post_meta($post->ID,"_as_rating",true)*20;}else{$rateper=0;}
if ($x % 2==0) {@$myclass='alt';}
$ret .= '

<tr class=" '.@$myclass.' ">
      	
	<td class="logo"><a href="' . get_permalink() . '">'. get_the_post_thumbnail($post->ID,'casino-icon',array('class' => 'logo')).'</a></td>
	<td class="rating hideme"><span class="rate cen"><span class="ratetotal" style="width:'.$rateper.'%;"></span></span></td>
	<td class="bonus">'. get_post_meta($post->ID,"_as_bonustext",true) . '</td>
      	<td class="review hide2"><a class="visbutton size1 gray" href="' . get_permalink() . '">Review</td>
      	<td class="visit"><a class="visbutton size1" '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectkey .'/'. get_post_meta($post->ID,"_as_redirectkey",true)  .'/">Visit</a></td>
    	</tr>

';

endforeach;
$post = $opost;


 $ret .='</table>';
 
 return $ret;
}

add_shortcode('bonustable', 'fly_bonustable_func');

?>