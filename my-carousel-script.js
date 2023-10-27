// kick off the polyfill!
window.__forceSmoothScrollPolyfill__ = true;

jQuery(document).ready(function($) {
    // Initialize the carousel
    $('.my-carousel').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        speed: 500,
        cssEase: 'linear',
        dots: true, // Add this line
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
});