<?php
/**
 * The template index page.
 *
 * 
 */

get_header(); ?>

<section id="content" class="main-content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
		<article <?php post_class('blogarticles') ?> id="post-<?php the_ID(); ?>">

			<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>    
        		
			<?php if (!get_theme_option('bylines-hide-all')) {  get_template_part( 'content', 'meta3' ); } ?>
			
  			<?php the_content();?>
			
		</article><!--.articleexcerpt-->
		
		<hr />

	<?php endwhile; endif; ?><?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

	<?php kriesi_pagination();?> 
	
</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>



