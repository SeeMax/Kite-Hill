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

(function recipeIsotopeFunc(){

  // Set the intial number of recipes to show
  var isotopeLoadNumber = 8;
  // Wait for images to Load
  var $grid = $('.all-recipes-container').imagesLoaded()
    .done( function( instance ) {
      // Initiate Isotope
      $grid.isotope({
        itemSelector: '.single-all-recipe',
        layoutMode: 'fitRows',
        // Show the number of recipes listed above
        filter: function() {
          return $(this).index() < isotopeLoadNumber;
        },
      });
  });// End of the Init


  // Load More Recipes on click
  $( ".loadMoreRecipes" ).on( "click", function() {
    // Add This many recipes on each click
    isotopeLoadNumber += 8;
        
    $grid.isotope({
      itemSelector: '.single-all-recipe',
      layoutMode: 'fitRows',
      filter: function() {
        return $(this).index() < isotopeLoadNumber;
      }
    });

    // Variables for the number of visible elements vs the total number of elements
    var visibleRecipes = $grid.isotope('getFilteredItemElements');
    var allRecipes = $grid.isotope('getItemElements');
    // If The Number of Shown Elements is the same as the total number of elements hide the load more button
    if (visibleRecipes.length == allRecipes.length) {
      $(this).hide();
    }
  });// End of the Load More Button


  // Show All The Recipes, not a dynamic button
  $('.all-recipe-button').on("click", function() {

    // Make the clicke dbutton have the active class
    $('.recipe-filter-button').removeClass('active-recipe-filter');
    $(this).addClass('active-recipe-filter');

    // Clear the search bar
    $('.all-recipes-section input:text').val('');

    $grid.isotope({
      itemSelector: '.single-all-recipe',
      layoutMode: 'fitRows',
      filter: function() {
        // Show The Number That Was Shwoing Before
        return $(this).index() < isotopeLoadNumber;
      }
    });

    var tl = new TimelineMax();
    // Reshow the load more recipes button
    tl.to($('.loadMoreRecipesSection'), 0.1, {opacity:1, height:"100%"});
    // Clear the no-recipes warning
    $('.noRecipeResults').hide();
  }); // End of Show All Recipes


  // Find Each Filter Button and Get The FIlter Name from Data
  $('.recipeFilterTaxonomy').each( function() {
    $(this).on("click", function() {

      // Clear the search bar
      $('.all-recipes-section input:text').val('');

      var filterName = $(this).attr("data-filter-name");

      // Make the clicke dbutton have the active class
      $('.recipe-filter-button').removeClass('active-recipe-filter');
      $(this).addClass('active-recipe-filter');

      // Filter The Grid Items of the same name, use class filters adding a .
      $grid.isotope({
        filter:'.'+filterName,
      });

      var tl = new TimelineMax();
      // Hide the load more button and the no results
      tl.to($('.loadMoreRecipesSection'), 0.1, {opacity:0, height:"0%"});
      $('.noRecipeResults').hide();
    });
  });



  // ** SEARCH THE GRID || quick search regex from https://codepen.io/desandro/pen/wfaGu ** //
  var qsRegex;
  // use value of search field to filter
  var $quicksearch = $('.quicksearch').keyup( debounce( function() {
    qsRegex = new RegExp( $quicksearch.val(), 'gi' );

    // Remove the active class from all buttons
    $('.recipe-filter-button').removeClass('active-recipe-filter');

    // If they clear the Search Only show all that were showing before
    if ($quicksearch.val() == "") {

      // Reshow the Loadmore Button
      var tl = new TimelineMax();
      tl.to($('.loadMoreRecipesSection'), 0.1, {opacity:1, height:"100%"});

      $grid.isotope({
        itemSelector: '.single-all-recipe',
        layoutMode: 'fitRows',
        filter: function() {
          // The Index is the global variable so it reshows the number of recipes that were showing before the search
          return $(this).index() < isotopeLoadNumber;
        },
      });
    // If They Search Filter the results as intended
    } else {

      // Hide the load more button
      var tl2 = new TimelineMax();
      tl2.to($('.loadMoreRecipesSection'), 0.1, {opacity:0, height:"0%"});

      $grid.isotope({
        itemSelector: '.single-all-recipe',
        layoutMode: 'fitRows',
        filter: function() {
          return qsRegex ? $(this).text().match( qsRegex ) : true;
        },
      });

      // Show the no results alert if nothing comes up for the search
      if ( $grid.data('isotope').filteredItems.length > 0) {
        $('.noRecipeResults').hide();
      } else {
        $('.noRecipeResults').show();
      }
    }
  }, 200 ) );

  // debounce so filtering doesn't happen every millisecond
  // Stock from https://codepen.io/desandro/pen/wfaGu
  function debounce( fn, threshold ) {
    var timeout;
    threshold = threshold || 100;
    return function debounced() {
      clearTimeout( timeout );
      var args = arguments;
      var _this = this;
      function delayed() {
        fn.apply( _this, args );
      }
      timeout = setTimeout( delayed, threshold );
    };
  }
}()); // End of the search field


// Only Load Images When they are available on the screen. Hides background reduces load time
var lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
});

});})(jQuery, this);
