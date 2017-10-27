/*====メニュー============================================*/
			$(function() {
				$("#menu").mmenu({
					offCanvas: {
						position: "right",
						zposition: "next"
					},
					extensions: [
						"theme-dark",
						"pagedim-black"
					]
				});
			});

/*========================================================*/


/*====ハンバーガーメニュー============================================*/
$(window).on('load scroll resize', function(){
    $(window).scroll(function() {
		var scroll = $(window).scrollTop() - 55;
		$(".menu_border1").css({
			background: "linear-gradient(0, white 0%, white " + (0 + scroll * 16) + "%, #777 " + (0 + scroll * 16) + "%, #777 100%)"

		});

		var scroll = $(window).scrollTop() - 40;
		$(".menu_border2").css({
			background: "linear-gradient(0, white 0%, white " + (0 + scroll * 16) + "%, #777 " + (0 + scroll * 16) + "%, #777 100%)"

		});

		var scroll = $(window).scrollTop() - 25;
		$(".menu_border3").css({
			background: "linear-gradient(0, white 0%, white " + (0 + scroll * 16) + "%, #777 " + (0 + scroll * 16) + "%, #777 100%)"

		});
	});
});

/*========================================================*/


/*====トップへ戻る========================================*/
$(document).ready(function() {
	var pagetop = $('.pagetop');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			pagetop.fadeIn();
		} else {
			pagetop.fadeOut();
		}
	});
	pagetop.click(function () {
		$('body, html').animate({ scrollTop: 0 }, 500);
		return false;
	});
});

/*========================================================*/
