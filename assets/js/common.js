/////////////// トップ動画のスクロールアニメーション
let videoscroll = (function () {
	if (document.querySelector(".top-video-wrap") != null) {
		var video = document.querySelector(".top-video");
		var target = false;

		//PC用
		window.addEventListener(
			"scroll",
			function (e) {
				video.classList.add("scrollable");
			},
			{
				once: true,
			}
		);

		//スマホ・タブレット用
		window.addEventListener(
			"touchstart",
			function (e) {
				e.preventDefault();
				document.addEventListener("touchmove", noScroll, { passive: false });
				document.addEventListener("mousewheel", noScroll, { passive: false });
				// window.scrollTo(0, 10);///////スマホで効かない！！！
				window.scroll({
					top: 100,
					behavior: "smooth",
				});

				setTimeout(function () {
					document.removeEventListener("touchmove", noScroll, { passive: false });
					document.removeEventListener("mousewheel", noScroll, { passive: false });
				}, 1000);
				video.classList.add("scrollable");

				function noScroll(event) {
					event.preventDefault();
				}

				function stopScroll() {
					// 現在のスクロール量
					var scrollOffsetY = window.pageYOffset;
					window.scrollTo(0, scrollOffsetY);
				}
			},
			{
				once: true,
			}
		);
	}
})();

/////////////// ハンバーガーメニューアニメーション

//スクロール禁止処理
function noScroll(event) {
	event.preventDefault();
}

$(function () {
	$("#menu-btn-check").click(function () {
		$(".nav-container li").toggleClass("nav-active");
		if ($(".nav-container li").hasClass("nav-active")) {
			document.addEventListener("touchmove", noScroll, { passive: false });
			document.addEventListener("mousewheel", noScroll, { passive: false });
		} else {
			document.removeEventListener("touchmove", noScroll, { passive: false });
			document.removeEventListener("mousewheel", noScroll, { passive: false });
		}
	});
});

// window.addEventListener(
// 	"load",
// 	function (event) {
// 		var touchStartX;
// 		var touchStartY;
// 		var touchMoveX;
// 		var touchMoveY;
// 		var burgercheck = document.getElementById("menu-btn-check");
// 		var bnrSwiper = document.getElementById("bnr-swiper");
// 		var toucharea = document.querySelectorAll(".touch-area");

// 		toucharea.forEach(function (target) {
// 			// 開始時
// 			target.addEventListener(
// 				"touchstart",
// 				function (event) {
// 					// event.preventDefault();
// 					// 座標の取得
// 					touchStartX = event.touches[0].pageX;
// 					touchStartY = event.touches[0].pageY;
// 				},
// 				false
// 			);
// 			// 移動時
// 			target.addEventListener(
// 				"touchmove",
// 				function (event) {
// 					// event.preventDefault();
// 					// 座標の取得
// 					touchMoveX = event.changedTouches[0].pageX;
// 					touchMoveY = event.changedTouches[0].pageY;
// 				},
// 				false
// 			);

// 			// 終了時
// 			target.addEventListener(
// 				"touchend",
// 				function (event) {
// 					// 移動量の判定
// 					if (touchStartX > touchMoveX) {
// 						if (touchStartX > touchMoveX + 50) {
// 							//右から左に指が移動した場合
// 							burgercheck.checked = true;
// 							$(".nav-container li").addClass("nav-active");
// 							if ($(".nav-container li").hasClass("nav-active")) {
// 								document.addEventListener("touchmove", noScroll, { passive: false });
// 								document.addEventListener("mousewheel", noScroll, { passive: false });
// 							} else {
// 								document.removeEventListener("touchmove", noScroll, { passive: false });
// 								document.removeEventListener("mousewheel", noScroll, { passive: false });
// 							}
// 						}
// 					} else if (touchStartX < touchMoveX) {
// 						if (touchStartX + 50 < touchMoveX) {
// 							//左から右に指が移動した場合
// 							burgercheck.checked = false;
// 							$(".nav-container li").removeClass("nav-active");
// 							if ($(".nav-container li").hasClass("nav-active")) {
// 								document.addEventListener("touchmove", noScroll, { passive: false });
// 								document.addEventListener("mousewheel", noScroll, { passive: false });
// 							} else {
// 								document.removeEventListener("touchmove", noScroll, { passive: false });
// 								document.removeEventListener("mousewheel", noScroll, { passive: false });
// 							}
// 						}
// 					}
// 				},
// 				false
// 			);
// 		});
// 	},
// 	false
// );

///////////////// フッターメニュー表示アニメーション

if (window.matchMedia("(max-width: 768px)").matches) {
	$(function () {
		var listwrap = $(".footer-sp-listwrap");
		// ボタン非表示
		listwrap.hide();

		// 100px スクロールしたらボタン表示
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				listwrap.fadeIn();
				$(".menu-btn").addClass("menu-btn-bg");
			} else {
				listwrap.fadeOut();
				$(".menu-btn").removeClass("menu-btn-bg");
			}
		});
	});
} else {
}

let swiper = new Swiper(".swiper-container", {
	centeredSlides: true,
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	loop: true,
	autoplay: {
		delay: 2000,
		disableOnInteraction: false,
	},
	slidesPerView: 1,
	spaceBetween: 10,
	breakpoints: {
		// 980px以上の場合
		980: {
			slidesPerView: 1,
			spaceBetween: 0,
		},
		1240: {
			slidesPerView: 1.3,
			spaceBetween: 32,
		},
		1500: {
			slidesPerView: 1.5,
			spaceBetween: 32,
		},
		1710: {
			slidesPerView: 1.7,
			spaceBetween: 32,
		},
	},
});

let swiper02 = new Swiper(".swiper-container02", {
	centeredSlides: true,
	navigation: {
		nextEl: ".swiper-button-next02",
		prevEl: ".swiper-button-prev02",
	},
	loop: true,
	autoplay: {
		delay: 2000,
		disableOnInteraction: false,
	},
	slidesPerView: 1.7,
	spaceBetween: 0,
	breakpoints: {
		// 650: {
		// 	slidesPerView: 1,
		// 	spaceBetween: 5,
		// },
		769: {
			slidesPerView: 1,
			spaceBetween: 0,
		},
	},
});

$(function () {
	$(".profile-box__left--thumb img").hover(function () {
		img = $(this).attr("src");
		$(".profile-box__left--bigimg img").attr("src", img);
	});
});

function change() {
	radio = document.getElementsByName("tab-item");
	if (radio[0].checked) {
		document.getElementById("mon-content").style.display = "block";
		document.getElementById("tue-content").style.display = "none";
		document.getElementById("wed-content").style.display = "none";
		document.getElementById("thu-content").style.display = "none";
		document.getElementById("fri-content").style.display = "none";
		document.getElementById("sat-content").style.display = "none";
		document.getElementById("sun-content").style.display = "none";
	} else if (radio[1].checked) {
		document.getElementById("mon-content").style.display = "none";
		document.getElementById("tue-content").style.display = "block";
		document.getElementById("wed-content").style.display = "none";
		document.getElementById("thu-content").style.display = "none";
		document.getElementById("fri-content").style.display = "none";
		document.getElementById("sat-content").style.display = "none";
		document.getElementById("sun-content").style.display = "none";
	} else if (radio[2].checked) {
		document.getElementById("mon-content").style.display = "none";
		document.getElementById("tue-content").style.display = "none";
		document.getElementById("wed-content").style.display = "block";
		document.getElementById("thu-content").style.display = "none";
		document.getElementById("fri-content").style.display = "none";
		document.getElementById("sat-content").style.display = "none";
		document.getElementById("sun-content").style.display = "none";
	} else if (radio[3].checked) {
		document.getElementById("mon-content").style.display = "none";
		document.getElementById("tue-content").style.display = "none";
		document.getElementById("wed-content").style.display = "none";
		document.getElementById("thu-content").style.display = "block";
		document.getElementById("fri-content").style.display = "none";
		document.getElementById("sat-content").style.display = "none";
		document.getElementById("sun-content").style.display = "none";
	} else if (radio[4].checked) {
		document.getElementById("mon-content").style.display = "none";
		document.getElementById("tue-content").style.display = "none";
		document.getElementById("wed-content").style.display = "none";
		document.getElementById("thu-content").style.display = "none";
		document.getElementById("fri-content").style.display = "block";
		document.getElementById("sat-content").style.display = "none";
		document.getElementById("sun-content").style.display = "none";
	} else if (radio[5].checked) {
		document.getElementById("mon-content").style.display = "none";
		document.getElementById("tue-content").style.display = "none";
		document.getElementById("wed-content").style.display = "none";
		document.getElementById("thu-content").style.display = "none";
		document.getElementById("fri-content").style.display = "none";
		document.getElementById("sat-content").style.display = "block";
		document.getElementById("sun-content").style.display = "none";
	} else if (radio[6].checked) {
		document.getElementById("mon-content").style.display = "none";
		document.getElementById("tue-content").style.display = "none";
		document.getElementById("wed-content").style.display = "none";
		document.getElementById("thu-content").style.display = "none";
		document.getElementById("fri-content").style.display = "none";
		document.getElementById("sat-content").style.display = "none";
		document.getElementById("sun-content").style.display = "block";
	}
}
window.onload = change;

//スケジュール切り替え
let schedulechange = (function () {
	$(function () {
		//スケジュール切り替え
		let girl = $(".schedule-list");
		let day0 = $(".day0");
		let = day1 = $(".day1");
		let = day2 = $(".day2");
		let = day3 = $(".day3");
		let = day4 = $(".day4");
		let = day5 = $(".day5");
		let = day6 = $(".day6");
		let tab0 = $(".tab0");
		let tab1 = $(".tab1");
		let tab2 = $(".tab2");
		let tab3 = $(".tab3");
		let tab4 = $(".tab4");
		let tab5 = $(".tab5");
		let tab6 = $(".tab6");

		tab0.on("click", function () {
			girl.css("display", "none");
			day0.css("display", "block");
		});

		tab1.on("click", function () {
			girl.css("display", "none");
			day1.css("display", "block");
		});

		tab2.on("click", function () {
			girl.css("display", "none");
			day2.css("display", "block");
		});

		tab3.on("click", function () {
			girl.css("display", "none");
			day3.css("display", "block");
		});

		tab4.on("click", function () {
			girl.css("display", "none");
			day4.css("display", "block");
		});

		tab5.on("click", function () {
			girl.css("display", "none");
			day5.css("display", "block");
		});

		tab6.on("click", function () {
			girl.css("display", "none");
			day6.css("display", "block");
		});
	});
})();
