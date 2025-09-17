document.addEventListener("DOMContentLoaded", () => {
    const el = document.querySelector(".title-no-wrap");
    const parent = el.parentElement;

    function fitText() {
        if (el.classList.contains('w-full')){
            el.classList.replace('w-full', 'w-min')
        }

        const baseSize = parseFloat(window.getComputedStyle(el).fontSize);
        el.style.fontSize = baseSize + "px";
        const newSize = baseSize * (parent.offsetWidth / el.offsetWidth) * 0.99;

        el.style.fontSize = newSize + "px";
        el.classList.replace('w-min', 'w-full')
    }

    window.addEventListener("resize", fitText);
    window.addEventListener("load", fitText);
});
