<?php

/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'fly_load_topsites' );

/* Function that registers our widget. */
function fly_load_topsites() {
	register_widget( 'Top_Site_Widget' );
}

class Top_Site_Widget extends WP_Widget {
	
	function __construct() {
		parent::__construct(
			'topsites-widget', // Base ID
			__( 'Top Fantasy Sites Widget', 'sportsnews' ), // Name
			array( 'description' => __( 'Fantasy Sports Site Listings Widget.', 'sportsnews' ), ) // Args
		);
	}		
	

public function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		@$title = apply_filters('widget_title', $instance['title'] );
        @$detailslink = $instance["detailslink"];
		@$version = $instance["version"];
              

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;


		@$key = @$instance["ts_sort"];

                if ($key=='order'){	
	
		$loop = new WP_Query( array( 'post_type' => 'fantasy', 'posts_per_page' => -1, 'orderby'=>'menu_order', 'order' => 'asc' ) );

 		} elseif ($key=='date'){	
	
		$loop = new WP_Query( array( 'post_type' => 'fantasy', 'posts_per_page' => -1, 'orderby'=>'date','order' => 'DESC' ) );
 
                } elseif ($key=='name'){	
	
		$loop = new WP_Query( array( 'post_type' => 'fantasy', 'posts_per_page' => -1, 'orderby'=>'title', 'order' => 'ASC' ) );   
 
                } else {

               $loop = new WP_Query( array( 'post_type' => 'fantasy', 'posts_per_page' => -1, 'orderby'=>'meta_value_num', 'meta_key'=>$key, 'order' => 'desc' ) );

                 }
		
		$i=0;
		$posts = array();
		foreach ($loop->posts as $p) {
			if ($i>=$instance["numsites"]) continue;
			
			if ($instance['tag']!='' && !has_term($instance['tag'], 'fantasy-tags', $p)) continue;
			
			@$custom = get_post_custom($p->ID);	
			
			$posts[] = $p;
			$i++;
		}
		
		@$content = apply_filters('topsites_content', $posts,$version);
		
		if (!is_array($content) && $content!="") {
			echo $content;
			
		} else {
?>


<?php if ($version) { ?>
		 
<div class="topsitewidget">
           
<?php
global $post;
$opost = $post;
$redirectkey=fly_redirect_slug();
foreach ($posts as $post) :
	setup_postdata($post); 

 ?>
 
 	 <div class="siterow">
              	<div class="logocol">
				<?php echo get_the_post_thumbnail($post->ID,'casino-icon',array('class' => 'logo')); ?>	   	
				</div>
              <div class="bonus2">
			  <span class="bonusamtlg"><?php echo get_post_meta($post->ID,"_as_bonustext",true);?></span>
			     <h4><a href=""><?php _e('Use Code', 'sportsnews'); ?>: <?php echo get_post_meta($post->ID,"_as_bonuscode",true);?></a></h4>
			  </div>
			  
			  <?php if (@$detailslink) { ?>
			<a title="<?php echo the_title(); ?>" href="<?php the_permalink() ?>" class="full"</a>
		<?php } else { ?>
			<a title="<?php echo the_title(); ?>" <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/" class="full"></a>
		<?php } ?>

     </div><!--.siterow--> 
 
<?php endforeach;
$post = $opost;

 ?>
 </div><!--.topsiteswidget-->   

<?php } else { ?>
 <div class="ratingwidget">
           
<?php
global $post;
$opost = $post;
$redirectkey=fly_redirect_slug();
foreach ($posts as $post) :
	setup_postdata($post); 

 ?>
 
	<div class="siterow">
              	<div class="logocol">
					<a href="">
						<?php echo get_the_post_thumbnail($post->ID,'casino-icon',array('class' => 'logo')); ?>	   	
					</a> 
				</div>
              <div class="bonus">
			   <h4><a href=""><?php echo the_title(); ?></a></h4>
			   <span class="rate"><span class="ratetotal" style="width:<?php if(!empty(get_post_meta($post->ID,"_as_rating",true))){ echo get_post_meta($post->ID,"_as_rating",true)*20; }else{ echo 0; } ?>%;"></span></span>
			  <span class="bonusamt"><?php echo get_post_meta($post->ID,"_as_bonustext",true);?></span>
			  </div>
			  
			  <div class="visit">
			  
		<?php if (@$detailslink) { ?>
			<a class="visbutton sm"><?php _e('Review', 'sportsnews'); ?></a>
		<?php } else { ?>
			<a class="visbutton sm"><?php _e('Visit Now', 'sportsnews'); ?> </a>
		<?php } ?>
		
		<?php if (@$detailslink) { ?>
			<a title="<?php echo the_title(); ?>" href="<?php the_permalink() ?>" class="full"></a>
		<?php } else { ?>
			<a title="<?php echo the_title(); ?>" <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/" class="full"></a>
		<?php } ?>
		</div>
        
  </div><!--.siterow--> 
		 
	
<?php endforeach;
$post = $opost;

 ?>
 </div><!--.ratingwidget-->   
 
<?php } ?>
 
 
       <?php  
	  
		} // end default
		
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		@$instance['title'] = strip_tags( @$new_instance['title'] );
		@$instance['ts_sort'] = strip_tags( @$new_instance['ts_sort'] );
		@$instance['numsites'] = strip_tags( @$new_instance['numsites'] );
        @$instance['version'] = strip_tags( @$new_instance['version'] );
		@$instance['tag'] = strip_tags( @$new_instance['tag'] );
		@$instance['detailslink'] = strip_tags( @$new_instance['detailslink'] );
		
		return @$instance;
	}

public function form( $instance ) {

		/* Set up some default widget settings. */
		@$defaults = array( 'title' => 'Top Sites', 'ts_sort' => 'order','numsites' => '5','tag' => '');
		@$instance = wp_parse_args( (array) $instance, $defaults ); ?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'sportsnews'); ?>:</label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo @$instance['title']; ?>" type="text" style="width:100%;" />
</p>

<p>
<label for="<?php echo $this->get_field_id('numsites'); ?>"><?php _e('Number of Fantasy Sites to Show', 'sportsnews'); ?>:</label>
<input class="widefat" id="<?php echo $this->get_field_id('numsites'); ?>" name="<?php echo $this->get_field_name('numsites'); ?>" value="<?php echo @$instance['numsites']; ?>" type="text" style="width:25px;" />
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_sort'); ?>"><?php _e('Sort By', 'sportsnews'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_sort'); ?> ">
<option value="date" <?php if ($instance['ts_sort'] == "date") echo 'SELECTED'; ?> ><?php _e('Date (Newest)', 'sportsnews'); ?></option>
<option value="name" <?php if ($instance['ts_sort'] == "name") echo 'SELECTED'; ?> ><?php _e('Name', 'sportsnews'); ?></option>
<option value="order" <?php if ($instance['ts_sort'] == "order") echo 'SELECTED'; ?> ><?php _e('Menu Order', 'sportsnews'); ?></option>
 <option value="_as_rating" <?php if ($instance['ts_sort'] == "_as_rating") echo 'SELECTED'; ?> ><?php _e('Rating', 'sportsnews'); ?></option>
</select>
</p>


<p>
<label><?php _e('Filter by Tag', 'sportsnews'); ?></label>
    <?php
		@$terms = get_terms('fantasy-tags', array('hide_empty'=>0));
	?>
    <select class="widefat" style="width:60%;" name="<?php echo $this->get_field_name('tag');?>">
    	<option value=""></option>
    <?php	foreach ($terms as $term) { ?>
    	<option <?php echo ($instance['tag']==$term->term_id?'SELECTED':'');?> value="<?php echo $term->term_id;?>"><?php echo $term->name;?></option>
    <?php  } ?>
    </select>
</p>

<p>	
<label><?php _e('Link to Review Page Instead of Fantasy Site Directly', 'sportsnews'); ?>:</label>	
<input style="width:20px;" class="widefat" type="checkbox" <?php if (@$instance['detailslink']) echo 'CHECKED'; ?> name="<?php echo $this->get_field_name('detailslink'); ?>" /><?php _e('Check to link details button to review page', 'sportsnews'); ?>.
</p>

<p>	
<label><?php _e('Show alternate version, displaying bonus code and site only', 'sportsnews'); ?>:</label>	
<input style="width:20px;" class="widefat" type="checkbox" <?php if (@$instance['version']) echo 'CHECKED'; ?> name="<?php echo $this->get_field_name('version'); ?>" />
</p>


  <?php
    }
 }

?>