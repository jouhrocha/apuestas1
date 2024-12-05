<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * 
 */

get_header(); ?>

<section id="content" class="main-content">
		
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h1 class="entry-title"><?php _e('Page Not Found', 'sportsnews'); ?></h1>

			<div class="entry-content">

			<p style="text-align:center;"><i class="fa fa-exclamation-triangle fa-3x"> </i></p>
			<p><?php _e('Page not found or has been removed.  Please browse one of our other pages. Search our site below', 'sportsnews') ; ?></p>
			
			<?php get_search_form(); ?>

			</div><!--.entry-content-->

		</article>
          	
</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>