
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
		769: {
			slidesPerView: 1,
			spaceBetween: 0,
		},
	},
});

$(function () {
  const pagetop = $("top__link-sp");

  pagetop.click(function () {
    $("body,html").animate(
      {
        scrollTop: 0, //上から0pxの位置に戻る
      },
      800
    ); //800ミリ秒かけて上に戻る
  });
});
