(function($){
$(function() {


$('#page_template').change(function() {
        $('#homelist-meta').toggle($(this).val() == 'template-home.php' );
    }).change();

$('#page_template').change(function() {
        $('#blog-meta').toggle($(this).val() == 'blog.php');
    }).change();


});
})(jQuery);



