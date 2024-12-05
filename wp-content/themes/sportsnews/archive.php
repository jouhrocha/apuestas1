<?php
/**
 * The template for displaying archive pages.
 *
 * 
 */


get_header(); ?>

<section id="content" class="main-content">

<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
             
                <?php if (is_category()) { ?>                                
                      <h1><?php echo single_cat_title(); ?></h1>
                        
                <?php } elseif( is_tag() ) { ?>
                        <h1><?php _e('Posts Tagged:', 'sportsnews'); ?> <?php single_tag_title(); ?></h1>
                        
                <?php } elseif (is_day()) { ?>
                       <h1><?php _e('Archive for', 'sportsnews'); ?> <?php echo get_the_date(); ?></h1>
                        
                <?php } elseif (is_month()) { ?>
                        <h1><?php _e('Archive for', 'sportsnews'); ?> <?php echo get_the_date( _x( 'F Y', 'monthly archives date format', 'sportsnews' ) ) ?></h1>
                        
                <?php } elseif (is_year()) { ?>
                        <h1><?php _e('Archive for', 'sportsnews'); ?> <?php echo get_the_date( _x( 'Y', 'yearly archives date format', 'sportsnews' ) ) ?></h1>
                        
                <?php } elseif (is_search()) { ?>
                      <h1><?php _e('Search Results', 'sportsnews'); ?></h1>
                        
                <?php } elseif ( is_author() ) { ?>
                        <h1><?php _e('Author Archive', 'sportsnews'); ?></h1>
                        
                <?php } elseif ( isset($_GET['paged'] ) && !empty( $_GET['paged']) ) { ?>
                        <h1><?php _e('Blog Archives', 'sportsnews'); ?></h1>
                        
                <?php } ?>

	<?php $x=0; while (have_posts()) : the_post();?>

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
          	
</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>