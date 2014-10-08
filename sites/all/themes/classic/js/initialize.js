jQuery(function($){
  $(document).ready(function(){
      
    //superFish
    $(function() { 
      $("#main-menu > ul.menu").superfish({
        delay: 100,
        autoArrows: false,
        dropShadows: false,
        animation: {opacity:'show', height:'show'},
        speed: 'fast'
      });
    });
  
  }); // end doc ready
}); // end function


/* ---- view slideshow height responsive ---- */

jQuery(function($){
  $(document).ready(function() {
    
  var width = $('.views_slideshow_cycle_main .views-slideshow-cycle-main-frame').width();
  var height = $('.views_slideshow_cycle_main .views-slideshow-cycle-main-frame').height();

  $(window).resize(function() {
    $('.views-slideshow-cycle-main-frame').each(function() {
    
      var ratio = height / width ;
      
      if($(".views-slideshow-cycle-main-frame:has(img)").length > 0) {
        $(this).height($(this).width() * ratio);
      }
    });
  });

  }); // end doc ready
}); // end function


/*

$('.image').live('mouseenter', function(e) {
  if(!$(this).hasClass('slided')) {
    $(this).find('.image-extras').show().stop(true, true).animate({opacity: '1', left: '0'}, 400);
    $(this).addClass('slided');
  } else {
     $(this).find('.image-extras').stop(true, true).fadeIn('normal');
    }
});
$('.image-extras').mouseleave(function(e) {
  $(this).fadeOut('normal');
});
*/