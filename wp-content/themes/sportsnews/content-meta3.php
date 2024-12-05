<div class="singlebylines">

<div class="leftmeta">
<?php  if (!get_theme_option('bylines-hide-author')) { ?> <?php _e('By', 'sportsnews'); ?>

<span class="vcard author">	
 <span class="fn"><?php the_author_posts_link(); ?></span>
</span>

<?php }  if (!get_theme_option('bylines-hide-category')) { ?> <i class="fa fa-folder"> </i>  <?php the_category(', '); }  ?>   

<?php //meta 

	if (!get_theme_option('bylines-hide-date')) { ?>
<i class="fa fa-calendar"> </i>  <time class="entry-date date updated" datetime="<?php the_time('o-m-d') ?>"><?php the_time('F j, Y'); ?></time>

 <?php } ?>
 
 </div>
 
 
</div><!--.bylines-->