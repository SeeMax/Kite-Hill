(function ($, root, undefined) {$(function () {
'use strict';
$('.homeHeroCarousel').slick({
  dots:true,
  autoplay:true,
  autoplaySpeed:3000,
  arrows: false,
});

(function toggleQA() {
  $('.qaAnswer').hide();

  $('.qaToggle').on('click', function(){
      var tl = new TimelineMax();
      var $this = $(this);
      var closeX = $(this).find('.qaClose');
      var answer = $(this).parent().find('.qaAnswer');


      if ($this.hasClass('openQ')) {
        $this.removeClass('openQ');
        tl.to(closeX, 0.2, {rotation:0, transformOrigin:'50% 50%'});
        answer.slideUp(200);
      } else {
        $this.addClass('openQ');
        tl.to(closeX, 0.2, {rotation:45, transformOrigin:'50% 50%'});
        answer.slideDown(200);
      }


  });
}());

// UNCOMMENT FOR FIXED HEADER
(function fixedHeaderAdjust() {

  // // Move the Main Section down based on header height
  // function headerPadding() {
  //   var tl = new TimelineMax();
  //   var headerHeight = $('.header').height();
  //
  //   tl.set($('main'), {marginTop:headerHeight});
  // }
  //
  // // Set Up The Main Section Padding on Load
  // headerPadding();
  //
  // // Readjust main padding when window is resized
  // $(window).on('resize', function(){
  //   headerPadding();
  // });

}());

$('.single-product').each(function(i){
  var count=i+1;
  var $this = $(this);
  var imageCount = $($this).find('.image-nav img').length;

  // console.log(imageCount);

  $('.slider-for-'+count).slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   arrows: false,
   fade: true,
   asNavFor: '.slider-nav-'+count
  });
  $('.slider-nav-'+count).slick({
   slidesToShow: imageCount,
   asNavFor: '.slider-for-'+count,
   dots: false,
   arrows:false,
   focusOnSelect: true
  });
});

//USE THE BELOW AS TEMPLATE FOR FUNCTION FILES

$(function mobileMenu() {

	$(".menuToggle").on('click', function() {
		// console.log("click")

		var tl = new TimelineMax(),
				$this = $(this),
				fullMenu = $(".main-nav"),
				links = $(".nav li"),
				ham1 = $(".hamTop"),
				ham2 = $(".hamMid"),
				ham3 = $(".hamBot"),
				uniTime2 = 0.15;

		if ($this.hasClass("navOpen")) {
			$this.removeClass("navOpen");
			tl.set($(".wrapper"), {height:"auto",overflow:"visible"})
				.to(fullMenu, 0.3, {left:"101%"}, "menuClose")
				.staggerTo(links, 0.3, {opacity:0, x:"50%"}, 0.03, "menuClose")
				.to(ham1, uniTime2, {width:"100%", rotation:0, y:0}, "menuClose")
				.to(ham2, uniTime2, {width:"100%", x:0, opacity:1}, "menuClose")
				.to(ham3, uniTime2, {width:"100%", rotation:0, y:0}, "menuClose");


		} else {
			$this.addClass("navOpen");
			tl.set($(".wrapper"), {height:"100%", overflow:"hidden"})
				.set(links, {opacity:0, x:"50%"})
				.to(fullMenu, 0.3, {left:"0%"}, "menuOpen")
				.staggerTo(links, 0.1, {opacity:1, x:"0%"}, 0.03, "menuOpen")
				.to(ham1, uniTime2, {rotation:227, y:5, width:"50%"}, "menuOpen")
				.to(ham2, uniTime2, {width:"70%", x:5, opacity:0}, "menuOpen")
				.to(ham3, uniTime2, {rotation:-227, y:-5, width:"50%"}, "menuOpen");
		}
	});

});

(function subNavStuff() {

  var ourFoodLI = $('.menu-item:contains("Our Foods")');
    ourFoodLI.find(".sub-menu").prepend("<div class='sub-menu-title'>ALL PRODUCTS</div>");
    
  if ($(window).width() > 1025) {



    var tl = new TimelineMax();
    tl.set(".sub-menu", {opacity:0, zIndex:-1});

    $('.menu-item-has-children').on({
      mouseenter: function() {
        var subMenu = $(this).find('.sub-menu');
        var tl = new TimelineMax();
        tl.to(subMenu, 0.3, {opacity:1,zIndex:100});
      },
      mouseleave: function() {
        var subMenu = $(this).find('.sub-menu');
        var tl = new TimelineMax();
        tl.to(subMenu, 0.3, {opacity:0,zIndex:-1});
      }
    });
  }

}());

function newsHide() {
	var tl = new TimelineMax(),
			moreNews = $(".moreNews"),
			fullHeight = moreNews.height();

	tl.set(moreNews, {height:0});

	$(".showMoreNews").on('click', function() {
		var tl = new TimelineMax(),
				$this = $(this);

		if ($this.hasClass("newsOpen")) {
			$this.removeClass("newsOpen");
			tl.to(moreNews, 0.3, {height:0, opacity:0}, "newsClose");
			$this.html('See More');
		} else {
			$this.addClass("newsOpen");
			tl.to(moreNews, 0.3, {height:fullHeight, opacity:1}, "newsOpen");
			$this.html('See Less');
		}
	});
}
newsHide();

$(window).on('load', function() {
	// if (screen.width >= 1025){

		var setupTL = new TimelineMax();
		setupTL.set($('.date-dot'), {opacity:0,scale:3});
		setupTL.set($('.story-line'), {height:0});
		setupTL.set($('.full-story-line'), {height:0});
		setupTL.set($('.date-number'), {x:10, opacity:0});
		setupTL.set($('.segment-count'), {x:-10, opacity:0});
		setupTL.set($('.segmentActor img'), {rotationY:-45,opacity:0,transformOrigin:'center top'});
		setupTL.set($('.segmentActor h2'), {rotationX:20,y:-3,opacity:0,transformOrigin:'left top'});
		setupTL.set($('.segmentActor h3'), {rotationX:20,y:-3,opacity:0,transformOrigin:'left top'});
		setupTL.set($('.segmentActor p'), {rotationX:20,y:-3,opacity:0,transformOrigin:'center top'});

		$('.story-segment').each(function(){

			var tl = new TimelineMax();
			var tl2 = new TimelineMax();
			var controller = new ScrollMagic.Controller();
	    var currentStory = this;
			var thisDate = $(currentStory).find('.date-number');
			var thisDot = $(currentStory).find('.date-dot');
			var thisLine = $(currentStory).find('.story-line');
			var thisCount = $(currentStory).find('.segment-count');
			var thisImg = $(currentStory).find('img');
			var thisH2 = $(currentStory).find('h2');
			var thisH3 = $(currentStory).find('h3');
			var thisP = $(currentStory).find('p');
			var uniEase1 = Circ.easeOut;
		  var uniEase2 = Power4.easeIn;

	    tl.to(thisDot, 0.3, {opacity:1,scale:1,ease:uniEase1});
			tl.to(thisDate, 0.3, {x:0, opacity:1,ease:uniEase1}, "open1");
			tl.to(thisCount, 0.3, {x:0, opacity:1,ease:uniEase1}, "open1");
			tl.to(thisImg, 0.5, {rotationY:0,opacity:1,transformPerspective:-10000,transformOrigin:'center top',ease:uniEase1}, "open1+=0.15");
			tl.to(thisH2, 0.4, {rotationX:0,y:0,opacity:1,transformPerspective:-5000,transformOrigin:'left top',ease:uniEase1}, "open1+=0.15");
			tl.to(thisP, 0.4, {rotationX:0,y:0,opacity:1,transformPerspective:-5000,transformOrigin:'left top',ease:uniEase1}, "open1+=0.25");
			tl.to(thisH3, 0.4, {rotationX:0,y:0,opacity:1,transformPerspective:-5000,transformOrigin:'left top',ease:uniEase1}, "open1+=0.25");

	    var scene1 = new ScrollMagic.Scene({
				triggerElement: currentStory,
				offset:-120,
			}).setTween(tl).addTo(controller);

			tl2.to(thisLine, 0.5, {height:'100%'});

			var scene2 = new ScrollMagic.Scene({
				triggerElement: currentStory,
				offset:-120,
				duration: $(currentStory).outerHeight(),
			}).setTween(tl2).addTo(controller);

		});
	// }// End Screen Width Scope
});

// // $('.all-recipes-container').imagesLoaded()
// //   .always( function( instance ) {
// //     console.log('all images loaded');
// //   })
// //   .done( function( instance ) {
// //     $('.all-recipes-container').isotope({
// //       itemSelector: '.single-all-recipe',
// //       layoutMode: 'fitRows',
// //     });
// //   })
//
//   //-------------------------------------//
//   // init Isotope
//
//   var $grid = $('.grid').isotope({
//     itemSelector: 'none', // select none at first
//     stagger: 30,
//     layoutMode: 'fitRows',
//     // nicer reveal transition
//     visibleStyle: { transform: 'translateY(0)', opacity: 1 },
//     hiddenStyle: { transform: 'translateY(100px)', opacity: 0 },
//   });
//
//   // initial items reveal
//   $grid.imagesLoaded( function() {
//     $grid.removeClass('are-images-unloaded');
//     $grid.isotope( 'option', { itemSelector: '.grid__item' });
//     var $items = $grid.find('.grid__item');
//     $grid.isotope( 'appended', $items );
//   });
//
//
//
//   //-------------------------------------//
//   // init Infinte Scroll
//
//   // get Isotope instance
//   var iso = $grid.data('isotope');
//
//   $grid.infiniteScroll({
//     path: '.pagination__next',
//     append: '.grid__item',
//     outlayer: iso,
//     status: '.page-load-status',
//   });
//
// InfiniteScroll.imagesLoaded = imagesLoaded;
//
//   // with Masonry & jQuery
//   // init Masonry
//   var $grid = $('.grid').masonry({
//     // Masonry options...
//     itemSelector: '.grid__item',
//     layoutMode: 'fitRows',
//   });
//
//
//
//   // get Masonry instance
//   var msnry = $grid.data('masonry');
//
//   // init Infinite Scroll
//   $grid.infiniteScroll({
//     // Infinite Scroll options...
//     append: '.grid__item',
//     outlayer: msnry,
//   });


//-------------------------------------//
// init Masonry

var $grid = $('.grid').masonry({
  itemSelector: 'none', // select none at first
  layoutMode: 'fitRows',

  percentPosition: true,
  stagger: 30,
  // nicer reveal transition
  visibleStyle: { transform: 'translateY(0)', opacity: 1 },
  hiddenStyle: { transform: 'translateY(100px)', opacity: 0 },
});

// get Masonry instance
var msnry = $grid.data('masonry');

// initial items reveal
$grid.imagesLoaded( function() {
  $grid.removeClass('are-images-unloaded');
  $grid.masonry( 'option', { itemSelector: '.grid__item' });
  var $items = $grid.find('.grid__item');
  $grid.masonry( 'appended', $items );
});

var itemClasses =[
  'grid__item grid__item--height2',
'grid__item grid__item--height2',
'grid__item grid__item--height3',
'grid__item grid__item--height1',
'grid__item grid__item--height2',
'grid__item',
'grid__item grid__item--height1',
'grid__item grid__item--height3',
'grid__item grid__item--height1',
'grid__item grid__item--height3',
'grid__item grid__item--height1',
'grid__item grid__item--height1',
'grid__item grid__item--height2',
'grid__item grid__item--height2',
'grid__item grid__item--height2',
'grid__item grid__item--height3',
'grid__item grid__item--height1',
'grid__item grid__item--height2',
'grid__item grid__item--height2',
'grid__item grid__item--height2',
'grid__item grid__item--height1',
'grid__item grid__item--height3',
'grid__item grid__item--height1',
'grid__item grid__item--height2',
'grid__item grid__item--height2',
'grid__item grid__item--height3',
'grid__item',
'grid__item grid__item--height1',
'grid__item grid__item--height2',
'grid__item grid__item--height2',
'grid__item grid__item--height1',
'grid__item grid__item--height3',
'grid__item grid__item--height3',
'grid__item grid__item--height1',
'grid__item grid__item--height2',
'grid__item grid__item--height2',
'grid__item grid__item--height1',
'grid__item grid__item--height1',
'grid__item grid__item--height2',
'grid__item grid__item--height1',
'grid__item grid__item--height2',
'grid__item grid__item--height2',
'grid__item grid__item--height2',
'grid__item grid__item--height1',
'grid__item grid__item--height1',
'grid__item grid__item--height2',
'grid__item grid__item--height1',
'grid__item grid__item--height1',
'grid__item grid__item--height3',
'grid__item grid__item--height1',
'grid__item grid__item--height2',
'grid__item grid__item--height2',
'grid__item grid__item--height2',
'grid__item grid__item--height1',
'grid__item grid__item--height3',
'grid__item grid__item--height1',
'grid__item grid__item--height2',
'grid__item grid__item--height2',
'grid__item grid__item--height3',
'grid__item grid__item--height2',
'grid__item grid__item--height1',
'grid__item grid__item--height2',
'grid__item grid__item--height2',
'grid__item grid__item--height1',
'grid__item grid__item--height3',
'grid__item grid__item--height3',
'grid__item grid__item--height1',
'grid__item grid__item--height2',
]

//-------------------------------------//
// init Infinte Scroll

$grid.infiniteScroll({
  path: 'page{{#}}', // hack
  loadOnScroll: false, // disable loading
  history: false,
});

$grid.on( 'scrollThreshold.infiniteScroll', function() {
  // add grid items
  var pageItemClasses = itemClasses.splice( 0, 15 );
  if ( !pageItemClasses.length ) {
    return;
  }
  var itemsHTML = pageItemClasses.map( function( itemClass ) {
    return '<div class="' + itemClass + '"></div>';
  });
  var $items = $( itemsHTML.join('') );
  // add $items to masonry
  $items.imagesLoaded( function() {
    $grid.append( $items );
    $grid.masonry( 'appended', $items );
  });
});

});})(jQuery, this);
