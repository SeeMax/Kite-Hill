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
