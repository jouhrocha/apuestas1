
// Mobile Menu script
jQuery(document).ready(function($) {
			$('#mobile-menu .menu-item-has-children').append('<span class="arrow up">&#9650;</span><span class="arrow down">&#9660;</span>');
			$("#mobile-menu-btn").click(function() {
				//$("#mobile-menu").toggle('slide', { direction: 'left' }, 500);
				$("#mobile-menu").slideToggle();
			});
			
			$('#mobile-menu .menu-item-has-children .arrow').click(function(e) {
				$(this).closest('li').toggleClass('menu-icon-up');
				//$(this).closest('li').find('ul').first().toggle('slide', { direction: 'up' }, 500);
				$(this).closest('li').find('ul').first().slideToggle();
			});
});



// This is the sticky header script
jQuery(document).ready(function($){
var stickyNavTop = $('.main-header').offset().top;
 
var stickyNav = function(){
var scrollTop = $(window).scrollTop();
      
if (scrollTop > stickyNavTop) { 
    $('.main-header').addClass('stickyheader');
} else {
    $('.main-header').removeClass('stickyheader'); 
}
};
 
stickyNav();
 
$(window).scroll(function() {
    stickyNav();
});
});



jQuery(document).ready(function() {
  jQuery('a#sbutton').click(function() {
	jQuery('#searchgo').slideToggle(0,0000001);
	return false;
  });
});

// Flexslider
jQuery(document).ready(function() {
  jQuery('.flexslider').flexslider({
    animation: "slide",
	prevText: "",   
nextText: "",  
controlNav: false,
animationSpeed:100, 
  });
});