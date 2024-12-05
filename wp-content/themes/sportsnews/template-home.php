<?php
/*
Template Name: Home Slider Template
*/
?>
<?php get_header(); ?>

<section id="content" class="main-content">


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if (get_post_meta($post->ID,"_fts_hpslider_active",true)!='yes') {  ?>

<div class="sliderarea">

 <div class="flexslider">
          <ul class="slides">
		  
		  <?php if (get_post_meta($post->ID,"_fts_hpslider_recent",true)=='yes') {  
		  $num=4;
		
		  if (get_post_meta($post->ID,"_fts_hpslider_num",true) !='') { $numposts=get_post_meta($post->ID,"_fts_hpslider_num",true); } else {$numposts=$num;}
		  $cat=get_post_meta($post->ID,"_fts_hpslider_cat",true); if ($cat !='') {
		  $args = array('posts_per_page' => $numposts,'post_type'=>'post','category'=> $cat,'orderby'=> 'date','order' => 'desc'	); 
		  } else {  $args = array('posts_per_page' => $numposts,'post_type'=>'post','orderby'=> 'date','order' => 'desc'	); }
	
		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post );
		$myex=get_the_excerpt();
		$text=fly_limit_text($myex,200);
		?>
		
		  
		 <li >
  	    	  <a href="<?php the_permalink();?>"><?php echo get_the_post_thumbnail($post->ID,'slideimg');?>
              <div class="flex-caption"><div class="mycat"><?php $category = get_the_category(); echo @$category[0]->cat_name; ?></div><h2><?php the_title();?></h2><p><?php echo $text;?></p></div>
			  </a>
    	</li>
		
		<?php endforeach; 
wp_reset_postdata(); wp_reset_query();?>
		  
			<?php } else { 
			$post1 = get_post_meta($post->ID,"_fts_hpslider_post1",true);
			$post2 = get_post_meta($post->ID,"_fts_hpslider_post2",true);
			$post3 = get_post_meta($post->ID,"_fts_hpslider_post3",true);
			$post4 = get_post_meta($post->ID,"_fts_hpslider_post4",true);
			?>
			
			<?php if ($post1!='') {  $myex=get_excerpt_by_id($post1);	$text=fly_limit_text($myex,200);?>
			
		 <li >
  	    	  <a href="<?php echo get_the_permalink($post1);?>"><?php echo get_the_post_thumbnail($post1,'slideimg');?>
              <div class="flex-caption"><div class="mycat"><?php $category = get_the_category($post1); echo @$category[0]->cat_name; ?></div><h2><?php echo get_the_title($post1);?></h2><p><?php echo $text;?></p></div>
			  </a>
    	</li>
		
			<?php } ?>
			
			<?php if ($post2!='') { $myex=get_excerpt_by_id($post2);	$text=fly_limit_text($myex,200); ?>
			
		 <li >
  	    	  <a href="<?php echo get_the_permalink($post2);?>"><?php echo get_the_post_thumbnail($post2,'slideimg');?>
              <div class="flex-caption"><div class="mycat"><?php $category = get_the_category($post2); echo @$category[0]->cat_name; ?></div><h2><?php echo get_the_title($post2);?></h2><p><?php echo $text;?></p></div>
			  </a>
    	</li>
		
			<?php } ?>
			
			<?php if ($post3!='') { $myex=get_excerpt_by_id($post3);	$text=fly_limit_text($myex,200);?>
			
		 <li >
  	    	  <a href="<?php echo get_the_permalink($post3);?>"><?php echo get_the_post_thumbnail($post3,'slideimg');?>
              <div class="flex-caption"><div class="mycat"><?php $category = get_the_category($post3); echo @$category[0]->cat_name; ?></div><h2><?php echo get_the_title($post3);?></h2><p><?php echo $text;?></p></div>
			  </a>
    	</li>
		
			<?php } ?>
			
			<?php if ($post4!='') { $myex=get_excerpt_by_id($post4);	$text=fly_limit_text($myex,200);?>
			
		 <li >
  	    	  <a href="<?php echo get_the_permalink($post4);?>"><?php echo get_the_post_thumbnail($post4,'slideimg');?>
              <div class="flex-caption"><div class="mycat"><?php $category = get_the_category($post4); echo @$category[0]->cat_name; ?></div><h2><?php echo get_the_title($post4);?></h2><p><?php echo $text;?></p></div>
			  </a>
    	</li>
		
			<?php } ?>
		  
		  <?php }  wp_reset_postdata(); wp_reset_query();  ?>


			
          </ul>
        </div>

</div>
<?php } ?>


<?php if (get_post_meta($post->ID,"_fts_featart_active",true)!='yes') {  ?>
<div class="featarts">

<?php 	$fpost1 = get_post_meta($post->ID,"_fts_featart1",true);
			$fpost2 = get_post_meta($post->ID,"_fts_featart2",true);
			$fpost3 = get_post_meta($post->ID,"_fts_featart3",true);
			$fpost4 = get_post_meta($post->ID,"_fts_featart4",true);
			$fpost5 = get_post_meta($post->ID,"_fts_featart5",true);
			$fpost6 = get_post_meta($post->ID,"_fts_featart6",true);
			?>
			
	<?php if ($fpost1!='') { ?>
	<div class="featart_col">
		<?php echo get_the_post_thumbnail($fpost1,'articlemed',array('class' => 'articleimg'));?>
		<div class="articletitle"><?php $category = get_the_category($fpost1); echo @$category[0]->cat_name; ?></div>
	<div class="articlsubtitle"><?php echo get_the_title($fpost1); ?></div>
		<a href="<?php echo get_the_permalink($fpost1);?>" class="full"></a>
	</div>
	<?php }?>
	
	<?php if ($fpost2!='') {?>
	<div class="featart_col rightart">
		<?php echo get_the_post_thumbnail($fpost2,'articlemed',array('class' => 'articleimg'));?>
		<div class="articletitle"><?php $category = get_the_category($fpost2); echo @$category[0]->cat_name; ?></div>
		<div class="articlsubtitle"><?php echo get_the_title($fpost2); ?></div>
		<a href="<?php echo get_the_permalink($fpost2);?>" class="full"></a>
	</div>
	<?php }?>
	
		<?php if ($fpost3!='') {?>
	<div class="featart_col">
		<?php echo get_the_post_thumbnail($fpost3,'articlemed',array('class' => 'articleimg'));?>
		<div class="articletitle"><?php $category = get_the_category($fpost3); echo @$category[0]->cat_name; ?></div>
		<div class="articlsubtitle"><?php echo get_the_title($fpost3); ?></div>
		<a href="<?php echo get_the_permalink($fpost3);?>" class="full"></a>
	</div>
	<?php }?>
	
	<?php if ($fpost4!='') {?>
	<div class="featart_col rightart">
		<?php echo get_the_post_thumbnail($fpost4,'articlemed',array('class' => 'articleimg'));?>
		<div class="articletitle"><?php $category = get_the_category($fpost4); echo @$category[0]->cat_name; ?></div>
		<div class="articlsubtitle"><?php echo get_the_title($fpost4); ?></div>
		<a href="<?php echo get_the_permalink($fpost4);?>" class="full"></a>
	</div>
	<?php }?>
	
			<?php if ($fpost5!='') {?>
	<div class="featart_col">
		<?php echo get_the_post_thumbnail($fpost5,'articlemed',array('class' => 'articleimg'));?>
		<div class="articletitle"><?php $category = get_the_category($fpost5); echo @$category[0]->cat_name; ?></div>
		<div class="articlsubtitle"><?php echo get_the_title($fpost5); ?></div>
		<a href="<?php echo get_the_permalink($fpost5);?>" class="full"></a>
	</div>
	<?php }?>
	
	<?php if ($fpost6!='') {?>
	<div class="featart_col rightart">
		<?php echo get_the_post_thumbnail($fpost6,'articlemed',array('class' => 'articleimg'));?>
		<div class="articletitle"><?php $category = get_the_category($fpost6); echo @$category[0]->cat_name; ?></div>
		<div class="articlsubtitle"><?php echo get_the_title($fpost6); ?></div>
		<a href="<?php echo get_the_permalink($fpost6);?>" class="full"></a>
	</div>
	<?php }?>


</div>
<?php } ?>

	
<?php if (get_post_meta($post->ID,"_fts_hpposts_active",true)!='yes') {  ?>	
<h2 class="darkbg"><?php if (get_post_meta($post->ID,"_fts_recent_title",true) =='') { echo 'Latest Articles'; } else { echo get_post_meta($post->ID,"_fts_recent_title",true);} ?></h2>

<?php 

		$num=5;
		  if (get_post_meta($post->ID,"_fts_hpnumposts",true) !='') { $numposts=get_post_meta($post->ID,"_fts_hpnumposts",true); } else {$numposts=$num;}
		  $cat=get_post_meta($post->ID,"_fts_hpcat_posts",true); if ($cat !='') {
		  $args = array('posts_per_page' => $numposts,'post_type'=>'post','category_name'=> $cat,'orderby'=> 'date','order' => 'desc'	); 
		  } else {  $args = array('posts_per_page' => $numposts,'post_type'=>'post','orderby'=> 'date','order' => 'desc'	); }
	
		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); $myex=get_excerpt_by_id($post);	$text=fly_limit_text($myex,170);
		?>
	
<div class="articleexcerpt">
		<div class="thumb">
		<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php echo get_the_post_thumbnail($post->ID,'articlemed',array('class' => 'articleimg'));?></a>
		</div>
	  <div class="cattop"><a href="<?php $category = get_the_category();  echo get_category_link( @$category[0]->term_id ); ?>"><?php echo @$category[0]->cat_name; ?></a></div>
<h3><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a></h3>

<div class="bylines topone">
<?php if (!get_theme_option('bylines-hide-author')) { ?> By <span class="vcard author"> <span class="fn"><?php the_author_posts_link(); ?></span></span> <?php } ?>   
<?php if (!get_theme_option('bylines-hide-date')) { ?><time class="entry-date date updated" datetime="<?php the_time('o-m-d') ?>"> | <?php the_time('F j, Y'); ?> </time><?php }?>
<?php if (!get_theme_option('bylines-hide-comment')) { ?> <a href="<?php the_permalink(); ?>#comments">   <?php comments_number(); ?></a> <?php } ?> 
</div><!--.bylines-->

<div class="bylines"><?php echo $text; ?></div>
	</div>
	
		<?php endforeach; 
wp_reset_postdata();?>
	
<?php } ?>

	
	<div class="entry-content">		
			<?php the_content(); ?>
		</div>
	<?php endwhile; endif; ?>

</section> <!--.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>