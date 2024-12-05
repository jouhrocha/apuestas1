<?php
/**
 * The template for displaying all pages.
 *
 * 
 */

get_header(); ?>

<section id="content" class="main-content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php get_template_part( 'content', 'sharethis' );  ?>
			<div class="entry-content">

      				<?php the_content();?>

			</div><!--.entry-content-->

		</article>
		
	<?php endwhile; endif; ?>

	<?php kriesi_pagination();?> 
	
</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>