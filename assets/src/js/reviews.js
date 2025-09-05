import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs';

new Swiper('.swiper-reviews', {
    spaceBetween: '10px',
    slidesPerView: "auto",
    navigation: {
        nextEl: '.reviews-button-next',
        prevEl: '.reviews-button-prev',
    },
    pagination: {
        el: '.reviews-swiper-pagination',
        type: 'bullets',
    },
    breakpoints: {
        // when window width is >= 1300px
        1300: {
            slidesPerView: 4,
            spaceBetween: '33px',
        },
        1540: {
            slidesPerView: 5,
            spaceBetween: '33px',
        },
    }
});
