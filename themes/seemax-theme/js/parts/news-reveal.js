function newsHide() {
	var tl = new TimelineMax(),
			moreNews = $(".moreNews"),
			fullHeight = moreNews.height();

			console.log(fullHeight);

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
