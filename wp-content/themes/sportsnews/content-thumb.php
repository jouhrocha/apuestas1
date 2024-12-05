<div class="imgwrap">
<?php if ( has_post_thumbnail() ) { ?>
		<a href="<?php the_permalink(); ?>">      
        	<?php the_post_thumbnail('articlemed', array('class' => 'articleimg')); ?>
        	</a>
		
 	<?php } else if (get_theme_option('art-thumb')) { ?>
       	
		<a href="<?php the_permalink(); ?>">      
        	<img class="articleimg" src="<?php echo get_theme_option('art-thumb'); ?>" alt="<?php the_title(); ?>" width="200" height="150" />
        	</a>
		
<?php } ?>
<div class="articletitle"><a href="<?php $category = get_the_category();  echo get_category_link( @$category[0]->term_id ); ?>"><?php echo @$category[0]->cat_name; ?></a></div>
</div>