// Custom Scripts

// Sticky Relocate

function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var headerHeight = 250;
    if (window_top > 147) {
        $('.bottom-header').addClass('stick');
    } else {
        $('.bottom-header').removeClass('stick');
    }
}


// function fix_scroll(){
//     var content_top = $('.content-para').offset().top;
//     var div_top = $('.related-cat-groups').offset().top - headerHeight;
//     if (window_top > div_top || window_top < content_top ) 
// {            $('.share-section').css('position', 'static');
//         }else{$('.share-section').css({
//                 "position": "fixed",
//                 "top": "8%"
//             });
//         }
//     }

function lazyload(){
   var wt = $(window).scrollTop();    //* top of the window
   var wb = wt + $(window).height();  //* bottom of the window

   $(".lazy-load").each(function(){
      var ot = $(this).offset().top;  //* top of object (i.e. advertising div)
      var ob = ot + $(this).height(); //* bottom of object

      if(!$(this).attr("loaded") && wt<=ob && wb >= ot){
         $(this).html("here goes the iframe definition");
         $(this).attr("loaded",true);
      }
   });
}

jQuery(document).ready( function($) {


$(window).scroll(lazyload);
   lazyload();

// browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        //grab the "back to top" link
        $back_to_top = $('.cd-top');

    //hide or show the "back to top" link
    $(window).scroll(function () {
        ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if ($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function (event) {
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0,
        }, scroll_top_duration);
    });

// $("img.lazy-load").lazyload({
//     effect : "fadeIn"
// });


    $(window).scroll(sticky_relocate);
    sticky_relocate();

    // $(window).scroll(fix_scroll);
  
    // if($('body').find('.share-section').length > 0){
    //     fix_scroll();
    // }

    if($('body').find('.share-section').length > 0){
        $(".share-section").stick_in_parent();
    }


    // OWl carousel
    $('.gallery-slider').owlCarousel({
        items:1,
        merge:true,
        loop:true,
        margin:0,
        video:true,
        autoplay:true,
        autoplayTimeout:5000,
        smartSpeed: 1000,
        nav:true,
        navText:["<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"],
        dots: false,
        lazyLoad:true,
        center:true
    })

// slideshow

    $('.slideshow').owlCarousel({
        loop:true,
        nav:true,
        margin:0,
        items:1,
        nav: false
    })

// Featured 
    $('.featured-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        navText:["<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"],
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })

// Bootstrap Responsive Tabs into Accordion
    $('.global-res-tabs, #cat-sect').responsiveTabs({
        accordionOn: ['xs', 'sm']// xs, sm, md, lg
    });

    // Toggle Search field
    $('.search-icon').click(function(e){ // <----you missed the '.' here in your selector.
        e.stopPropagation();
        $('.search-form').slideToggle();
    });
    $('.search-form').click(function(e){
        e.stopPropagation();
    });

    $(document).click(function(){
         $('.search-form').slideUp();
    });

// Grid and list View

    $('#list').click(function(event){
        event.preventDefault();
        $('#news .item').addClass('list-group-item', 1000);
    });
    $('#grid').click(function(event){
        event.preventDefault();
        $('#news .item').removeClass('list-group-item', 1000);
        $('#news .item').addClass('grid-group-item', 1000);
    });

    // Equal heights
    // Select and loop the container element of the elements you want to equalise
    // jQuery('.row').each(function(){
    // Cache the highest
    var highestBox = 0;
    // Select and loop the elements you want to equalise
    jQuery('.row .item, .thumb-post', this).each(function(){
    // If this box is higher than the cached highest then store it
    if(jQuery(this).height() > highestBox) {
    highestBox = jQuery(this).height();
    }
    
    });
    
    // Set the height of all those children to whichever was highest
    jQuery('.row .item, .thumb-post',this).css('min-height', highestBox);
    // });

});


var svg = function () {
    /*
     * Replace all SVG images with inline SVG
     */
    jQuery('img.svg').each(function () {
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        jQuery.get(imgURL, function (data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');

            // Add replaced image's ID to the new SVG
            if (typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if (typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass + ' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');

    });
};

jQuery(window).load( function(){
    $('#primary-nav').meanmenu({
        meanScreenWidth: "767"
    });

    svg();
});
