const servicesArea = document.getElementById('servicesArea');
const servicesTypes = document.querySelectorAll('.service-type-btn')

servicesTypes.forEach((typeBtn, i) => {
    const services = JSON.parse(typeBtn.dataset.services)

    if (i === 0) {
        selectServiceType(services, typeBtn);
    }

    typeBtn.addEventListener('click', () => {
        selectServiceType(services, typeBtn);
    });
});

function selectServiceType(services, activeButton) {
    // Удаляем "active" класс у всех кнопок
    document.querySelectorAll('.service-type-btn').forEach(btn => {
        btn.classList.remove('service-type-active-btn');
    });

    // Добавляем "active" класс к текущей
    activeButton.classList.add('service-type-active-btn');

    const bookLink = JSON.parse(activeButton.dataset.bookLink)

    if (!!servicesArea.innerHTML){
        // Очищаем область перед рендером новых услуг
        servicesArea.innerHTML = '';
    }


    // Добавляем новые услуги
    services.forEach(({ name, desc, price, image, currency }) => {
        const service = `
			<div class="flex xl:gap-2.5 w-full items-center">
                <div
                    aria-label="${name}"
                    style="background-image: url('${image?.url}');"
                    class="bg-center bg-cover mobile:w-[291px] w-[116px] h-full mobile:border-[10px] border-[4px] border-white mobile:rounded-[30px] rounded-[12.78px] flex-none"
                ></div>
                    <div
                        class="h-full border-y border-r border-white mobile:pl-[10px] pl-[7px] mobile:py-[20px] py-[10px] mobile:pr-[20px] pr-[5px] rounded-r-[30px] flex flex-col 2xl:gap-[42px] mobile:gap-5 gap-[9px] w-full">
                        <h3>
                            ${name}
                        </h3>
                        <div class="flex justify-between 2xl:items-end items-start 2xl:flex-row flex-col 2xl:gap-0 mobile:gap-5 gap-[15px]">
                            <div class="small-text 2xl:max-w-[207px]">
                                ${desc}
                            </div>
                            <div class="flex 2xl:flex-col mobile:flex-row flex-col justify-between gap-[7px] 2xl:items-end mobile:items-center items-start w-full 2xl:flex-nowrap flex-wrap">
                                <div class="3xl:text-[45px]/[100%] 2xl:text-[40px]/[100%] mobile:text-[30px]/[100%] text-[17px]/[100%] font-medium lowercase text-primary text-nowrap">
                                    ${price} ${currency}
                                </div>
                                <a class="service-btn text-white!" target="_blank" href="${bookLink?.url}">
                                    ${bookLink?.title}
                                    <svg class="mobile:w-auto w-[12px]" width="23" height="23" viewBox="0 0 23 23" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <mask id="path-1-inside-1_32_2201" fill="white">
                                            <path
                                                d="M5.53846 12.4335C4.91963 11.8147 4.91963 10.8113 5.53846 10.1925L13.522 2.20899L21.5055 10.1925C22.1243 10.8113 22.1243 11.8146 21.5055 12.4335L13.522 20.417L5.53846 12.4335Z"/>
                                        </mask>
                                        <path
                                            d="M4.41797 11.313L13.522 2.20899L4.41797 11.313ZM22.2126 9.48539C23.2219 10.4947 23.2219 12.1312 22.2126 13.1406L14.2291 21.1241L12.8149 19.7099L20.7984 11.7264C21.0267 11.4981 21.0267 11.1279 20.7984 10.8996L22.2126 9.48539ZM13.522 20.417L4.41797 11.313L13.522 20.417ZM14.2291 1.50188L22.2126 9.48539C23.2219 10.4947 23.2219 12.1312 22.2126 13.1406L20.7984 11.7264C21.0267 11.4981 21.0267 11.1279 20.7984 10.8996L12.8149 2.9161L14.2291 1.50188Z"
                                            fill="white" mask="url(#path-1-inside-1_32_2201)"/>
                                        <path d="M0 11.313H15.2028" stroke="white"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
            `
        servicesArea.innerHTML += service;
    });
}

const scrollUpBtn = document.getElementById('scrollUpBtn');
const scrollDownBtn = document.getElementById('scrollDownBtn');

const SCROLL_STEP = 300; // сколько пикселей прокручивать

scrollUpBtn.addEventListener('click', () => {
    servicesArea.scrollBy({ top: -SCROLL_STEP, behavior: 'smooth' });
});

scrollDownBtn.addEventListener('click', () => {
    servicesArea.scrollBy({ top: SCROLL_STEP, behavior: 'smooth' });
});
