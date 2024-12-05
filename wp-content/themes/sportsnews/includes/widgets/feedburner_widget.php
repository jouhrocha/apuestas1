<?php

/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'fly_fburner_widget' );

/* Function that registers our widget. */
function fly_fburner_widget() {
	register_widget( 'fly_fburner_widg' );
}

class fly_fburner_widg extends WP_Widget {
function __construct() {
		parent::__construct(
			'fly-fb', // Base ID
			__( 'Feedburner Newsletter Signup', 'sportsnews' ), // Name
			array( 'description' => __( 'Add a feedburner signup form to widget area.', 'sportsnews' ), ) // Args
		);
	}	


public function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		@$title = apply_filters('widget_title', $instance['title'] );
		           

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		@$textabove = @$instance["textabove"];
		@$username = @$instance["username"];
		@$counterlink = @$instance["counterlink"];
               	@$submitlabel = empty($instance['submitlabel']) ? 'Subscribe' : $instance['submitlabel'];
		@$email = empty($instance['email']) ? 'Enter Your Email' : $instance['email'];
		@$imgfield = @$instance["imgfield"];
		
?>



	<?php if ($imgfield) { ?>
	
<div class="daily_img1"><img alt="<?php echo @$title; ?>" class="newsimage" src="<?php echo @$imgfield; ?>" /></div>
		

	<?php } ?>
<div class="newsletter">
     <span><?php echo @$textabove; ?></span>
    <form class="newsletterform" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" 
onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo @$username; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
                
               
	<input type="text" placeholder="Email address" onFocus="if (this.value == '<?php echo @$email; ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php echo $email; ?>';}"  value="<?php echo @$email; ?>" class="news_input newsletterinput email" name="email" />
	
		
	<input type="hidden" value="<?php echo @$username; ?>" name="uri"/>

	<input type="submit" value="<?php echo @$submitlabel; ?>" name="Submit" class="newsletter_btn submitbutton" />

	</form>

<?php if ($counterlink) { ?>
	<p class="counter"><a href="http://feeds.feedburner.com/<?php echo @$username; ?>"><img src="http://feeds.feedburner.com/~fc/<?php echo @$username; ?>?bg=99CCFF&amp;fg=444444&amp;anim=0"   alt="" /></a></p>
<?php } ?>

</div><!--.newsletter-->


      <?php  
	  
		
		
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		@$instance['title'] = strip_tags( @$new_instance['title'] );
		@$instance['username'] = strip_tags( @$new_instance['username'] );
		@$instance['email'] = strip_tags( @$new_instance['email'] );
	
		@$instance['textabove'] = strip_tags( @$new_instance['textabove'] );		
		@$instance['submitlabel'] = strip_tags( @$new_instance['submitlabel'] );	
		@$instance['counterlink'] = strip_tags( @$new_instance['counterlink'] );
		@$instance['imgfield'] = strip_tags( @$new_instance['imgfield'] );
		
		return $instance;
	}

public function form( $instance ) {

		/* Set up some default widget settings. */
		@$defaults = array( 'title' => 'Subscribe for Free','username' => '', 'imgfield'=> '', 'email' => 'Enter Your Email', 'submitlabel' => 'Subscribe','textabove' => 'Receive updates directly to your inbox.','counterlink' => '');
		@$instance = wp_parse_args( (array) $instance, $defaults ); ?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'sportsnews'); ?></label>
<input type="text"  class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo @$instance['title']; ?>" style="width:100%;" />
</p>

<p>
<label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Feedburner User:', 'sportsnews'); ?></label>
<input type="text"  class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo @$instance['username']; ?>" style="width:100%;" />
</p>

<p>
<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email Label:', 'sportsnews'); ?></label>
<input type="text"  class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo @$instance['email']; ?>" style="width:100%;" />
</p>

<p>
<label for="<?php echo $this->get_field_id('submitlabel'); ?>"><?php _e('Submit Label:', 'sportsnews'); ?></label>
<input type="text"  class="widefat" id="<?php echo $this->get_field_id('submitlabel'); ?>" name="<?php echo $this->get_field_name( 'submitlabel' ); ?>" value="<?php echo @$instance['submitlabel']; ?>" style="width:100%;" />
</p>

<p>
<label for="<?php echo $this->get_field_id('imgfield'); ?>"><?php _e('Image (Optional):', 'sportsnews'); ?></label>
<input type="text"  class="widefat" id="<?php echo $this->get_field_id('imgfield'); ?>" name="<?php echo $this->get_field_name('imgfield' ); ?>" value="<?php echo @$instance['imgfield']; ?>" style="width:100%;" />
<?php _e('To be placed under the title to the right - size 80x80px.', 'sportsnews'); ?>
<p>

<label for="<?php echo $this->get_field_id('textabove'); ?>"><?php _e('Text Above Email Input (Optional):', 'sportsnews'); ?></label>
<input type="text"  class="widefat" id="<?php echo $this->get_field_id('textabove'); ?>" name="<?php echo $this->get_field_name( 'textabove' ); ?>" value="<?php echo @$instance['textabove']; ?>" style="width:100%;" />
</p>

<p>		
<input style="width:20px;" class="widefat" type="checkbox" <?php if ($instance['counterlink']) echo 'CHECKED'; ?> name="<?php echo $this->get_field_name('counterlink'); ?>" /> <?php _e('Check to show number of subscribers counter.', 'sportsnews'); ?>
</p>



  <?php
    }
 }

?>