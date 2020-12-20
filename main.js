$(document).ready(function() {
   $('.gallery').magnificPopup({
        delegate:'.popimg',
        type: 'image',
        gallery:{
            enabled:true 
        }
       
    });
    
    var $gallery = $('.gallery').isotope({
        
    });
    
    $('.filtering').on('click', 'span', function(){
        var filtervalue = $(this).attr('data-filter');
        $gallery.isotope({filter: filtervalue});
    });
    
    $('.filtering').on('click', 'span', function(){
        $(this).addClass('active').siblings().removeClass('active');
    });
    
    
    //Scroll to Top Button.
    
    $(window).scroll(function(){
       if($(this).scrollTop() > 200){
           $('#topBtn').fadeIn();
       }else{
           $('#topBtn').fadeOut();
       }
    });
    
    $("#topBtn").click(function(){
        $('html ,body').animate({scrollTop:0},800);
    });
    
});





















