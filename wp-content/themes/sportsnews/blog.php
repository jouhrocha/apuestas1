<?php
/*
Template Name: Blog Template
*/
?>

<?php get_header(); ?>

<section id="content" class="main-content">


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php

$numposts=get_post_meta($post->ID, '_numblogs', 'true');
if ($numposts == ''){
$numposts=5;}

$cat=get_post_meta($post->ID, '_blogcat', 'true');
$excerpts=get_post_meta($post->ID, '_blogexcerpts', 'true');


?>
	<div class="post" id="post-<?php the_ID(); ?>" style="margin-bottom:20px;">
	
	<?php get_template_part( 'content', 'sharethis' );  ?>
	
        <?php the_content(); ?>

    	</div> <!--#.post-->
		
     	<?php endwhile; endif; ?> <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>


	<?php if ($excerpts == 'Yes'){ ?>

			
	<?php if ( get_query_var('paged') ) {

    	$page = get_query_var('paged');
 	$paged = get_query_var('paged');

	} elseif ( get_query_var('page') ) {

    	$page = get_query_var('page');
    	$paged = get_query_var('page');

	} else {

    	$page = 1;
	$paged = 1;

	}

	if ($cat == ''){ 
	query_posts("showposts=$numposts&paged=$page"); } else {   query_posts("showposts=$numposts&paged=$page&cat=$cat");      } $x=0;  while ( have_posts() ) : the_post() ?>

<?php $x=$x+1; if ($x % 2 == 0) {$myclass='articleblock odd';} else {$myclass='articleblock';} ?>	
		
		<article <?php post_class($myclass) ?> id="post-<?php the_ID(); ?>">

			<?php get_template_part( 'content', 'thumb' ); ?>
			
			<div class="textwrap">
			<h3><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<?php if (!get_theme_option('bylines-hide-all')) {  get_template_part( 'content', 'meta' );  } ?>
			<?php the_excerpt();?>
			</div>

		</article>
		
  	<?php endwhile; ?>
	
	<?php kriesi_pagination();?> 

	
	<?php } else { ?>


 	<?php if ( get_query_var('paged') ) {

    	$page = get_query_var('paged');
 	$paged = get_query_var('paged');

	} elseif ( get_query_var('page') ) {

    	$page = get_query_var('page');
    	$paged = get_query_var('page');

	} else {

    	$page = 1;
	$paged = 1;

	}

 	if ($cat == ''){ 
	query_posts("showposts=$numposts&paged=$page"); } else {   query_posts("showposts=$numposts&paged=$page&cat=$cat");      }  while ( have_posts() ) : the_post() ?>
	
       		<article <?php post_class('blogarticles') ?> id="post-<?php the_ID(); ?>">

			<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>    
        		
			<?php if (!get_theme_option('bylines-hide-all')) {  get_template_part( 'content', 'meta3' ); } ?>
			
  			<?php the_content();?>
			
		</article><!--.articleexcerpt-->
		
		<hr />

  	<?php endwhile; ?>

	<?php kriesi_pagination();?> 

	<?php }  ?>		

</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>