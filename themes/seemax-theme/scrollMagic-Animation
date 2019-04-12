$(".single-salad").each( function(){

  var setupTL = new TimelineMax(),
      masterTL = new TimelineMax(),
      controller = new ScrollMagic.Controller(),
      saladNum = $(this).find(".salad-order-number"),
      saladOrder = $(this).find(".salad-order");

      var textureBar = $(this).find('.textureBar'),
      dressingBar = $(this).find('.dressingBar'),
      greensBar = $(this).find('.greensBar'),
      textureLength = $(textureBar).data('length')*100,
      dressingLength = $(dressingBar).data('length')*100,
      greensLength = $(greensBar).data('length')*100,
      greensFill = $(greensBar).find('rect'),
      textureFill = $(textureBar).find('rect'),
      dressingFill = $(dressingBar).find('rect');

  setupTL.set(saladNum, {opacity:0, scale:6})
         .set(saladOrder, {transformPerspective:300, transformOrigin:"50% 0%"});

  function numberPunch() {
    var tl = new TimelineMax();

    tl.to(saladNum, 0.2, {scale:1, opacity:1})
      .to(saladOrder, 0.1, {rotationX:-30})
      .to(saladOrder, 0.1, {rotationX:30})
      .to(saladOrder, 0.1, {rotationX:0});

    return tl;
  }

  function barsOut() {
    var tl = new TimelineMax();

    tl.to(textureFill, 0.6, {attr:{width:textureLength}, ease:Elastic.easeOut.config(1, 1)}, "fillOut")
      .to(dressingFill, 0.6, {attr:{width:dressingLength}, ease:Elastic.easeOut.config(1, 1)}, "fillOut+=0.2")
      .to(greensFill, 0.6, {attr:{width:greensLength}, ease:Elastic.easeOut.config(1, 1)}, "fillOut+=0.4");

    return tl;
  }

  masterTL.add(numberPunch())
          .add(barsOut(),"-=0.3");



  if (screen.width >= 1023){
    var numberPunchScene = new ScrollMagic.Scene({
      triggerElement: this,
      offset:-80,
      reverse: false,
    }).setTween(masterTL);

    controller.addScene(numberPunchScene);
  } else {
    var numberPunchScene2 = new ScrollMagic.Scene({
      triggerElement: this,
      offset:-50,
      reverse: false,
    }).setTween(masterTL);

    controller.addScene(numberPunchScene2);
  }




});//End Each Salad Function
