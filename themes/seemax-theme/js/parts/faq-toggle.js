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
