import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs';

const swiper = new Swiper('.swiper-reviews', {
    spaceBetween: '33px',
    slidesPerView: 4,
    navigation: {
        nextEl: '.reviews-button-next',
        prevEl: '.reviews-button-prev',
    },
    pagination: {
        el: '.reviews-swiper-pagination',
        type: 'bullets',
    },
});
