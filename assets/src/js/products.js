import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs';

new Swiper('.swiper-products', {
    slidesPerView: 1,
    spaceBetween: '36px',
    navigation: {
        nextEl: '.products-button-next',
        prevEl: '.products-button-prev',
    },
    pagination: {
        el: '.products-swiper-pagination',
        type: 'bullets',
    },
    breakpoints: {
        // when window width is >= 1300px
        780: {
            slidesPerView: 2,
            spaceBetween: '36px',
        },
        1540: {
            slidesPerView: 3,
            spaceBetween: '36px',
        },
    }
});
