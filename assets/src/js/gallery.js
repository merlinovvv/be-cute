import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs';

// Конфигурация количества картинок на слайд для разных размеров экрана
const SLIDE_CONFIG = {
    desktop: { imagesPerSlide: 5, breakpoint: 1280 },
    tablet: { imagesPerSlide: 3, breakpoint: 780 },
};

let currentConfig = null;
let swiper = null;

// Функция для определения текущей конфигурации
function getCurrentConfig() {
    const width = window.innerWidth;

    if (width >= SLIDE_CONFIG.desktop.breakpoint) {
        return SLIDE_CONFIG.desktop;
    } else if (width >= SLIDE_CONFIG.tablet.breakpoint) {
        return SLIDE_CONFIG.tablet;
    } else {
        return SLIDE_CONFIG.tablet;
    }
}

// Функция для перераспределения картинок по слайдам
function redistributeImages() {
    const newConfig = getCurrentConfig();

    // Если конфигурация не изменилась, ничего не делаем
    if (currentConfig && currentConfig.imagesPerSlide === newConfig.imagesPerSlide) {
        return;
    }

    currentConfig = newConfig;

    const wrapper = document.querySelector('.swiper-wrapper');

    if (wrapper){
        const allImages = Array.from(document.querySelectorAll('.slide-image:not(.slide-buttons)'));
        const buttonsTemplate = document.querySelector('.slide-buttons');

        // Очищаем wrapper, но сохраняем все элементы в памяти
        wrapper.innerHTML = '';

        // Создаем новые слайды с нужным количеством картинок
        const slidesCount = Math.ceil(allImages.length / currentConfig.imagesPerSlide);

        for (let i = 0; i < slidesCount; i++) {
            const slide = document.createElement('div');
            slide.className = 'swiper-slide gallery-slide';

            // Добавляем картинки для текущего слайда
            const startIdx = i * currentConfig.imagesPerSlide;
            const endIdx = startIdx + currentConfig.imagesPerSlide;
            const slideImages = allImages.slice(startIdx, endIdx);

            slideImages.forEach((img, idx) => {
                const imgClone = img.cloneNode(true);
                imgClone.className = `slide-image slide-image-${idx + 1}`;
                slide.appendChild(imgClone);
            });

            // Добавляем кнопки на каждый слайд
            if (buttonsTemplate) {
                console.log(i, slidesCount)
                if (i === slidesCount - 1){
                    const buttonsClone = buttonsTemplate.cloneNode(true);
                    const endBtnsText = document.createElement('p');
                    endBtnsText.classList.add('end-slide-text');
                    endBtnsText.innerHTML = `Вы можете найти <br> больше работ в нашем <a target="_blank" class="underline" href="https://www.instagram.com/becute.pl/">инстаграме</a>`
                    buttonsClone.appendChild(endBtnsText);
                    slide.appendChild(buttonsClone);
                } else {
                    const buttonsClone = buttonsTemplate.cloneNode(true);
                    slide.appendChild(buttonsClone);
                }

            }

            wrapper.appendChild(slide);
        }

        // Если Swiper уже инициализирован, уничтожаем его
        if (swiper) {
            swiper.destroy(true, true); // true,true - полностью очищаем все события и элементы
        }

        // Инициализируем Swiper заново
        swiper = new Swiper('.swiper-gallery', {
            spaceBetween: '33px',
            navigation: {
                nextEl: '.gallery-button-next',
                prevEl: '.gallery-button-prev',
            }
        });
    }
}

// Инициализация при загрузке
document.addEventListener('DOMContentLoaded', () => {
    redistributeImages();
});

// Обновление при изменении размера окна
window.addEventListener('resize', () => {
    redistributeImages();
});
