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