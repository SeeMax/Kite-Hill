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
