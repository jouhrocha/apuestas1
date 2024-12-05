<?php
/**
 * The template for displaying all single posts.
 *
 * 
 */

get_header(); ?>

<section id="content" class="main-content">

	<?php while (have_posts()) : the_post(); ?>	
		
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h1 class="entry-title"><?php the_title(); ?></h1>
			
			<?php if (!get_theme_option('bylines-hide-all')) { get_template_part( 'content', 'meta2' ); } ?>
		
			<div class="entry-content">

      				<?php the_content();?>

				<p class="tagging"><i class="fa fa-tags"> </i>  <?php the_tags(' ',' &bull; ','<br />'); ?></p>  
				
				<?php comments_template(); // Get comments template ?>

			</div><!--.entry-content-->

		</article>

        <?php endwhile; ?>
          	
</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>