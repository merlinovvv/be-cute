const servicesArea = document.getElementById('servicesArea');
const servicesTypes = document.querySelectorAll('.service-type-btn')
const services = document.querySelectorAll('.service-item')

servicesTypes.forEach((typeBtn, i) => {
    const serviceType = typeBtn.dataset.serviceType

    if (i === 0) {
        selectServiceType(serviceType, typeBtn);
    }

    typeBtn.addEventListener('click', () => {
        selectServiceType(serviceType, typeBtn);
    });
});

function selectServiceType(serviceTypeBtn, activeButton) {
    // Удаляем "active" класс у всех кнопок
    document.querySelectorAll('.service-type-btn').forEach(btn => {
        btn.classList.remove('service-type-active-btn');
    });

    // Добавляем "active" класс к текущей
    activeButton.classList.add('service-type-active-btn');

    services.forEach(service => {
        if (service.dataset.serviceType !== serviceTypeBtn){
            service.classList.add('hidden')
            service.classList.remove('flex')
        } else {
            service.classList.add('flex')
            service.classList.remove('hidden')
        }
    })
}

const scrollUpBtn = document.getElementById('scrollUpBtn');
const scrollDownBtn = document.getElementById('scrollDownBtn');

const SCROLL_STEP = 300; // сколько пикселей прокручивать

scrollUpBtn?.addEventListener('click', () => {
    servicesArea.scrollBy({ top: -SCROLL_STEP, behavior: 'smooth' });
});

scrollDownBtn?.addEventListener('click', () => {
    servicesArea.scrollBy({ top: SCROLL_STEP, behavior: 'smooth' });
});
