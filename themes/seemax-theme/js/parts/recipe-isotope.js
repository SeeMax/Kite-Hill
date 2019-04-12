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
