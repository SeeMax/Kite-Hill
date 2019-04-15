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
