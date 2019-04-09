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

});})(jQuery, this);
