window.__forceSmoothScrollPolyfill__ = true;

jQuery(document).ready(function($) {
    var $carousel = $('.my-carousel'); // Define $carousel variable

    // Initialize the carousel
    $carousel.slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        speed: 500,
        cssEase: 'linear',
        dots: true, //Dot Navigation
        arrows: false, // remove arrow nav
        responsive: [
            {
                breakpoint: 960,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 670,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    // Hide dots if there's only one page
$carousel.on('init', function(event, slick) {
    setTimeout(function() {
        var slideCount = $carousel.slick('getSlick').slideCount;
        var slidesToShow = $carousel.slick('getSlick').options.slidesToShow;
        if (slideCount <= slidesToShow) {
            $carousel.find('.slick-dots').hide();
        }
    }, 0);
});
});