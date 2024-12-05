<?php
/**
 * The template for displaying all single sportsbook reviews
 *
 * @package sportsbook theme
 */

get_header(); ?>


<section id="content" class="main-content" itemscope itemtype="http://schema.org/Review">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<span itemprop="author" itemscope itemtype="http://schema.org/Person">
  		<meta itemprop="name" content="<?php echo get_the_author(); ?>" />
 </span>

<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
<meta itemprop="ratingValue" content="<?php echo get_post_meta($post->ID,"_as_rating",true);?>" />
<meta itemprop="bestRating" content="5" />
<meta itemprop="worstRating" content="1" />
</span>

<meta itemprop="datePublished" content = "<?php the_time('c'); ?>">

 <?php $redirectkey=fly_redirect_slug(); ?>
	
	<h1 class="entry-title"><span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Organization">
<span itemprop="name"><?php the_title(); ?></span></span></h1>

<?php get_template_part( 'content', 'sharethis' );  ?>
  
 <div class="entry-content" itemprop="description">
		<?php  $editor1=get_post_meta( $post->ID, '_fst_fantasy_editor1', true); echo apply_filters('the_content',$editor1);  ?>
</div>


 <div class="topreviewarea">
 
 	<div class="topreview_col1">
	
		<div class="logoarea">
			<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/">
					<?php the_post_thumbnail('casino-logo',array('class' => 'logo')); ?>
			</a>
		</div>
		<span class="bigrate"><?php if(!empty(get_post_meta($post->ID,"_as_rating",true))){ echo get_post_meta($post->ID,"_as_rating",true); }else{ echo 0; } ?></span>
		<span class="rate cen"><span class="ratetotal" style="width:<?php if(!empty(get_post_meta($post->ID,"_as_rating",true))){ echo get_post_meta($post->ID,"_as_rating",true)*20; }else{ echo 0; } ?>%;"></span></span>
		<span class="ratingtext"><?php _e('Our Rating', 'sportsnews'); ?></span>
	
	</div>
	
	<div class="topreview_col2">
	
	<img src="<?php echo get_post_meta($post->ID,"_as_thumb1",true);?>" alt="dealimage" height="180" class="screenshot">
	
	<div class="captionarea">
	
		<div class="captionarea1">
			<span class="bigbonus"><?php echo get_post_meta($post->ID,"_as_bonustext",true);?></span>
			<span class="smbonus"><?php _e('Use code', 'sportsnews'); ?>: <?php echo get_post_meta($post->ID,"_as_bonuscode",true);?></span>		</div>
		<div class="captionarea2">
			<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/" class="visbutton med"><?php _e('Visit Now', 'sportsnews'); ?></a>		
		</div>
	</div>
	</div>
 
 </div>
 
 	<?php if (get_post_meta($post->ID,"_as_pros",true) !='') { ?>
 
 <div class="proconsarea">
	<div class="procol">
	<img src="<?php bloginfo('template_directory'); ?>/images/thumb_up.png" alt="Pros" class="proimage" />
		<h3><?php _e('Pros', 'sportsnews'); ?></h3>
		<ul>
			 	 <?php $features=get_post_meta($post->ID, '_as_pros', true); 
            		 $feat = explode("|", $features);
             			for($i = 0; $i < count($feat); $i++){ ?>
             			<li><?php echo $feat[$i]; ?></li>
           	<?php } ?>
		</ul>
	</div>
	
	<div class="concol">
	<img src="<?php bloginfo('template_directory'); ?>/images/thumb_down.png" alt="Pros" class="conimage" />
		<h3><?php _e('Cons', 'sportsnews'); ?></h3>
		<ul>
			 	 <?php $features=get_post_meta($post->ID, '_as_cons', true); 
            		 $feat = explode("|", $features);
             			for($i = 0; $i < count($feat); $i++){ ?>
             			<li><?php echo $feat[$i]; ?></li>
           	<?php } ?>
		</ul>
	</div>
 
 </div>
 
	<?php } ?>
 
 <div class="inforeview">
 
	<div class="innerleft">
		<div class="bonusleft">
		
			<div class="bonusleft1">
				<?php echo get_post_meta($post->ID,"_as_subonus",true);?>
			</div>
			<div class="bonusleft2">
			<?php echo get_post_meta($post->ID,"_as_bonustext",true);?>
			</div>
			<div class="bonusleft3">
			<?php _e('Use code', 'sportsnews'); ?>: <?php echo get_post_meta($post->ID,"_as_bonuscode",true);?>
			</div>
			<div class="claim">
			<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/"><?php _e('Claim Bonus Now', 'sportsnews'); ?></a>
			</div>
		
		</div>
		
		<div class="moreinfotable">
			<h3><?php _e('More Information', 'sportsnews'); ?></h3>
			<table class="summary">
				<tr>
					<th><?php _e('Name', 'sportsnews'); ?></th>
					<td><?php the_title(); ?></td>
				</tr>
				
				<?php if (get_post_meta($post->ID,"_as_weburl",true) !='') { ?>
				<tr>
					<th><?php _e('Website URL', 'sportsnews'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_weburl",true); ?></td>
				</tr>
				<?php } ?>
				<?php if (get_post_meta($post->ID,"_as_founded",true) !='') { ?>
				<tr>
					<th><?php _e('Established', 'sportsnews'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_founded",true); ?></td>
				</tr>
				<?php } ?>
				<?php if (get_post_meta($post->ID,"_as_location",true) !='') { ?>
					<tr>
					<th><?php _e('Location', 'sportsnews'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_location",true); ?></td>
				</tr>
				
					<?php } ?>
					<?php if (get_post_meta($post->ID,"_as_mindeposit",true) !='') { ?>
					<tr>
					<th><?php _e('Minimum Deposit', 'sportsnews'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_mindeposit",true); ?></td>
				</tr>
				<?php } ?>
				
				
				<?php if (get_post_meta($post->ID, '_as_customhinput1', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl1', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput1', true);?></td>
			</tr>
			<?php } ?>


			<?php if (get_post_meta($post->ID, '_as_customhinput2', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl2', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput2', true);?></td>
			</tr>
			<?php } ?>


			<?php if (get_post_meta($post->ID, '_as_customhinput3', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl3', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput3', true);?></td>
			</tr>
			<?php } ?>


			<?php if (get_post_meta($post->ID, '_as_customhinput4', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl4', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput4', true);?></td>
			</tr>
			<?php } ?>


			<?php if (get_post_meta($post->ID, '_as_customhinput5', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl5', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput5', true);?></td>
			</tr>
			<?php } ?>
				

				
			</table>
		</div>
		
	</div>
	
	
	<div class="innerratings">
	<h3><?php the_title(); ?> <?php _e('Ratings', 'sportsnews'); ?></h3>
	<?php if (get_post_meta($post->ID,"_as_customrating_name1",true) !='') { ?>
		<div class="ratingcol">
		<span class="rateinfo"><?php echo get_post_meta($post->ID,"_as_customrating_name1",true); ?></span>
		<span class="rate cen"><span class="ratetotal" style="width:<?php if(!empty(get_post_meta($post->ID,"_as_customrating1",true))){ echo get_post_meta($post->ID,"_as_customrating1",true)*20; } ?>%;"></span></span>
		</div>
	<?php }?>
	<?php if (get_post_meta($post->ID,"_as_customrating_name2",true) !='') { ?>
		<div class="ratingcol">
		<span class="rateinfo"><?php echo get_post_meta($post->ID,"_as_customrating_name2",true); ?></span>
		<span class="rate cen"><span class="ratetotal" style="width:<?php if(!empty(get_post_meta($post->ID,"_as_customrating2",true))){ echo get_post_meta($post->ID,"_as_customrating2",true)*20; } ?>%;"></span></span>
		</div>
		<?php }?>
	<?php if (get_post_meta($post->ID,"_as_customrating_name3",true) !='') { ?>
			<div class="ratingcol">
		<span class="rateinfo"><?php echo get_post_meta($post->ID,"_as_customrating_name3",true); ?></span>
		<span class="rate cen"><span class="ratetotal" style="width:<?php if(!empty(get_post_meta($post->ID,"_as_customrating3",true))){ echo get_post_meta($post->ID,"_as_customrating3",true)*20; } ?>%;"></span></span>
		</div>
		<?php }?>
	<?php if (get_post_meta($post->ID,"_as_customrating_name4",true) !='') { ?>
		<div class="ratingcol">
		<span class="rateinfo"><?php echo get_post_meta($post->ID,"_as_customrating_name4",true); ?></span>
		<span class="rate cen"><span class="ratetotal" style="width:<?php if(!empty(get_post_meta($post->ID,"_as_customrating4",true))){ echo get_post_meta($post->ID,"_as_customrating4",true)*20; } ?>%;"></span></span>
		</div>
		<?php }?>
	<?php if (get_post_meta($post->ID,"_as_customrating_name5",true) !='') { ?>
			<div class="ratingcol">
		<span class="rateinfo"><?php echo get_post_meta($post->ID,"_as_customrating_name5",true); ?></span>
		<span class="rate cen"><span class="ratetotal" style="width:<?php if(!empty(get_post_meta($post->ID,"_as_customrating5",true))){ echo get_post_meta($post->ID,"_as_customrating5",true)*20; } ?>%;"></span></span>
		</div>
		<?php }?>
	<?php if (get_post_meta($post->ID,"_as_customrating_name6",true) !='') { ?>
		<div class="ratingcol">
		<span class="rateinfo"><?php echo get_post_meta($post->ID,"_as_customrating_name6",true); ?></span>
		<span class="rate cen"><span class="ratetotal" style="width:<?php if(!empty(get_post_meta($post->ID,"_as_customrating6",true))){ echo get_post_meta($post->ID,"_as_customrating6",true)*20; } ?>%;"></span></span>
		</div>
	<?php }?>
	</div>
 
 
 </div>


	<div class="entry-content" itemprop="description">
		<?php the_content();?>

	</div>

	<?php endwhile; endif; ?> 
  
 </section> <!--.content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>