<?php
/**
* Header File for theme
*
* Displays all of the <head> section, header and top navigation areas
*
* @package Sportsbook Theme from Flytonic
*
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if (get_theme_option('branding-favicon') == "") { ?>
	<link rel="Shortcut Icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
	<?php } else { ?>
	<link rel="Shortcut Icon" href="<?php echo get_theme_option('branding-favicon'); ?>" type="image/x-icon" />
	<?php } ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>"> 
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/includes/js/html5.js"></script>
	<![endif]-->

	<?php 

	//Show Theme Options Header Scripts here
	echo trim(stripslashes(get_theme_option('header-script'))); 
	?>

	<?php wp_head(); ?>
</head>

<?php if (lo_get_layout_type() == 'c-s'){ $class1='rightside'; } else { $class1='leftside'; } ?>

<body <?php body_class('custom '.$class1.''); ?>>

<div id="outerwrap" class="outside">

<?php if (!get_theme_option('header-top-disable')) { ?>

	<div class="topheader">
		<div class="wrap">
			<div class="topnavigation">
				<?php wp_nav_menu( array( 'container' => 'false', 'theme_location' => 'topheader', 'menu_class' => 'topnav','menu_id'=> 'topnav') ); ?>
			</div><!--.toptitle-->
			<div class="socialmediatop">
			
		<?php if (!get_theme_option('header-search-disable')) { ?>

		<div class="searchgo" id="searchgo">
		<form method="get" class="searchform" action="<?php bloginfo('url'); ?>">
			<input class="searchinput" value="" name="s" type="text" placeholder="<?php _e('Search', 'sportsnews'); ?>...">
			<input name="submit" class="searchsubmit" value="<?php _e('Search', 'sportsnews'); ?>" type="submit">
		</form>
		</div>

		<?php } ?>
			
		<ul>
			
		<?php if (get_theme_option('header_fb_url')!='') {?>
			<li><a href="<?php echo get_theme_option('header_fb_url'); ?>" title="Facebook"><i class="fa fa-facebook"></i></a></li>
		<?php } ?>
		<?php if (get_theme_option('header_tw_url')!='') {?>

			<li><a href="<?php echo get_theme_option('header_tw_url'); ?>" title="Twitter"><i class="fa fa-twitter"> </i></a></li>
		<?php } ?>
		<?php if (get_theme_option('header_goog_url')!='') {?>

			 <li><a href="<?php echo get_theme_option('header_goog_url'); ?>" title="Google Plus"><i class="fa fa-google-plus"> </i></a></li>
		<?php } ?>
		<?php if (get_theme_option('header_pint_url')!='') {?>

			 <li><a href="<?php echo get_theme_option('header_pint_url'); ?>" title="Pinterest"><i class="fa fa-pinterest"> </i></a></li>
		<?php } ?>
		<?php if (get_theme_option('header_insta_url')!='') {?>

			 <li><a href="<?php echo get_theme_option('header_insta_url'); ?>" title="Instagram"><i class="fa fa-instagram"> </i></a></li>
		<?php } ?>
		<?php if (get_theme_option('header_contact_url')!='') {?>
		
			 <li><a href="mailto:<?php echo get_theme_option('header_contact_url'); ?>" title="Contact"><i class="fa fa-envelope"></i></a></li> 
		<?php } ?>
						 
		<?php if (!get_theme_option('header-search-disable')) { ?>
			<li><a href="#" id="sbutton" title="Search"><i class="fa fa-search"> </i></a></li>
		<?php } ?>
		
		</ul>
		</div>	<!--.topnavigation-->
			
				<div class="clearboth"></div>
			
		</div><!--.wrap-->
	</div><!--.topheader-->
	
<?php } ?>

	<header id="header" class="main-header wrap">
	
	<button id="mobile-menu-btn">
	<i>&nbsp;</i>
	<i>&nbsp;</i>
	<i>&nbsp;</i></button>

	<nav id="mobile-menu">  
	
		<div class="logomobile">
	
		<?php if (get_theme_option('header-logo') != ""): ?>
			<img width="200" alt="<?php bloginfo('name'); ?>" src="<?php echo get_theme_option('header-logo'); ?>" />
			<?php else: ?>
			<span><?php bloginfo('name'); ?></span>
  		<?php endif;?>
		</div>
	
		<div class="socialmobile">
		<ul>
					<?php if (get_theme_option('header_fb_url')!='') {?>
			<li><a href="<?php echo get_theme_option('header_fb_url'); ?>" title="Facebook"><i class="fa fa-facebook"></i></a></li>
		<?php } ?>
		<?php if (get_theme_option('header_tw_url')!='') {?>

			<li><a href="<?php echo get_theme_option('header_tw_url'); ?>" title="Twitter"><i class="fa fa-twitter"> </i></a></li>
		<?php } ?>
		<?php if (get_theme_option('header_goog_url')!='') {?>

			 <li><a href="<?php echo get_theme_option('header_goog_url'); ?>" title="Google Plus"><i class="fa fa-google-plus"> </i></a></li>
		<?php } ?>
		<?php if (get_theme_option('header_pint_url')!='') {?>

			 <li><a href="<?php echo get_theme_option('header_pint_url'); ?>" title="Pinterest"><i class="fa fa-pinterest"> </i></a></li>
		<?php } ?>
		<?php if (get_theme_option('header_contact_url')!='') {?>
			 <li><a href="<?php echo get_theme_option('header_contact_url'); ?>" title="Contact"><i class="fa fa-envelope"></i></a></li> 
		<?php } ?>
		</ul>
		</div>
	
		<?php wp_nav_menu( array( 'container' => 'false', 'theme_location' => 'primary', 'menu_class' => 'mobilenav','menu_id'=> 'mobilenav')); ?>
	</nav><!--End of Mobile Navbar-->
	
  	<div class="header-logo">
		
		<?php if (get_theme_option('header-logo') != ""): ?>
   		<a title="<?php bloginfo('name'); ?>" href="<?php echo get_option('home'); ?>">
   		<img alt="<?php bloginfo('name'); ?>" src="<?php echo get_theme_option('header-logo'); ?>" /></a>
  		<?php else: ?>
  		<h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>

  		<?php endif;?>
  	</div><!--.header-logo-->
		
	<?php if ( is_active_sidebar( 'headertop-widgets' ) ) : ?>
			<div class="headerwidgets">
				<?php dynamic_sidebar('headertop-widgets'); ?>
			</div><!--.Widgets Heading-->
	<?php endif; ?>
				 
	<nav class="navbar"  id="navigation">
			<?php wp_nav_menu( array( 'container' => 'false', 'theme_location' => 'primary', 'menu_class' => 'nav','menu_id'=> 'nav','fallback_cb' => 'fly_default_menu','link_before'  => '<span>',
	'link_after'      => '</span>',) ); ?>
	</nav><!--Nav--> 
		<div class="clearboth"></div>
</header><!--End of Header-->

	<div id="main" class="contentarea">
	<?php if (get_theme_option('breaking-news-enable')) {?>
	<div class="breaking">
		<div class="breaking_left">
		<?php _e('Breaking News	', 'sportsnews'); ?>	
		</div>
		<div class="breaking_right">
		<?php echo get_theme_option('breaking-news-text'); ?> <a href="<?php echo get_theme_option('breaking-news-url'); ?>" title="<?php _e('more', 'sportsnews'); ?>">
		<?php if (get_theme_option('breaking-news-urltext')!='') { echo get_theme_option('breaking-news-urltext'); } else { _e('more', 'sportsnews');} ?>
		</a>
		</div>
	</div>
	<?php } ?>
	<?php theme_options_show_breadcrumbs(); ?>