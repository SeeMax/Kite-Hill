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
		setupTL.set($('.story-segment'), {opacity:1});

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
