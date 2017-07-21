// Slick Carousal Slider
jQuery(document).on('ready', function() {
  jQuery(".tm-slider").slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    autoplay: true,
    autoplaySpeed: 2000
  });
});