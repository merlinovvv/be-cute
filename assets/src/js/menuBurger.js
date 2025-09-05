const menuBurgerBtn = document.querySelector('.menu-burger-btn');
const menuHeader = document.querySelector('.menu-header')

menuBurgerBtn.addEventListener('click', () => {
    menuHeader.classList.toggle('open');
    menuBurgerBtn.classList.toggle('open');
})

const menu = document.querySelector(".menu-langs");
menu.querySelector(".trigger").addEventListener("click", () => {
    menu.classList.toggle("open");
});
