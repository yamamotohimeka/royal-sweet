document.addEventListener("DOMContentLoaded", function() {
  const sliderThumbnail = new Swiper(".slider-thumbnail", {
    slidesPerView: 3,
  });
  const slider = new Swiper(".slider.author-img__main", {
    loop: true,
    thumbs: {
      swiper: sliderThumbnail,
    },
  });
});