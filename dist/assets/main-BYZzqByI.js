import v from"https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs";const p=document.getElementById("servicesArea"),h=document.querySelectorAll(".service-type-btn");h.forEach((e,i)=>{const t=JSON.parse(e.dataset.services);i===0&&w(t,e),e.addEventListener("click",()=>{w(t,e)})});function w(e,i){document.querySelectorAll(".service-type-btn").forEach(s=>{s.classList.remove("service-type-active-btn")}),i.classList.add("service-type-active-btn");const t=JSON.parse(i.dataset.bookLink);p.innerHTML&&(p.innerHTML=""),e.forEach(({name:s,desc:d,price:r,image:l,currency:m})=>{const x=`
			<div class="flex xl:gap-2.5 w-full items-center">
                <div
                    aria-label="${s}"
                    style="background-image: url('${l==null?void 0:l.url}');"
                    class="bg-center bg-cover mobile:w-[291px] w-[116px] h-full mobile:border-[10px] border-[4px] border-white mobile:rounded-[30px] rounded-[12.78px] flex-none"
                ></div>
                    <div
                        class="h-full border-y border-r border-white mobile:pl-[10px] pl-[7px] mobile:py-[20px] py-[10px] mobile:pr-[20px] pr-[5px] rounded-r-[30px] flex flex-col 2xl:gap-[42px] mobile:gap-5 gap-[9px] w-full">
                        <h3>
                            ${s}
                        </h3>
                        <div class="flex justify-between 2xl:items-end items-start 2xl:flex-row flex-col 2xl:gap-0 mobile:gap-5 gap-[15px]">
                            <div class="small-text 2xl:max-w-[207px]">
                                ${d}
                            </div>
                            <div class="flex 2xl:flex-col mobile:flex-row flex-col justify-between gap-[7px] 2xl:items-end mobile:items-center items-start w-full 2xl:flex-nowrap flex-wrap">
                                <div class="3xl:text-[45px]/[100%] 2xl:text-[40px]/[100%] mobile:text-[30px]/[100%] text-[17px]/[100%] font-medium lowercase text-primary text-nowrap">
                                    ${r} ${m}
                                </div>
                                <a class="service-btn text-white!" target="_blank" href="${t==null?void 0:t.url}">
                                    ${t==null?void 0:t.title}
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
            `;p.innerHTML+=x})}const L=document.getElementById("scrollUpBtn"),y=document.getElementById("scrollDownBtn"),g=300;L.addEventListener("click",()=>{p.scrollBy({top:-g,behavior:"smooth"})});y.addEventListener("click",()=>{p.scrollBy({top:g,behavior:"smooth"})});const n={desktop:{imagesPerSlide:5,breakpoint:1280},tablet:{imagesPerSlide:4,breakpoint:780},mobile:{imagesPerSlide:3,breakpoint:550}};let a=null,u=null;function C(){const e=window.innerWidth;return e>=n.desktop.breakpoint?n.desktop:e>=n.tablet.breakpoint?n.tablet:(e>=n.mobile.breakpoint,n.mobile)}function f(){const e=C();if(a&&a.imagesPerSlide===e.imagesPerSlide)return;a=e;const i=document.querySelector(".swiper-wrapper");if(i){const t=Array.from(document.querySelectorAll(".slide-image:not(.slide-buttons)")),s=document.querySelector(".slide-buttons");i.innerHTML="";const d=Math.ceil(t.length/a.imagesPerSlide);for(let r=0;r<d;r++){const l=document.createElement("div");l.className="swiper-slide gallery-slide";const m=r*a.imagesPerSlide,x=m+a.imagesPerSlide;if(t.slice(m,x).forEach((o,c)=>{const b=o.cloneNode(!0);b.className=`slide-image slide-image-${c+1}`,l.appendChild(b)}),s)if(console.log(r,d),r===d-1){const o=s.cloneNode(!0),c=document.createElement("p");c.classList.add("end-slide-text"),c.innerHTML='Вы можете найти <br> больше работ в нашем <a target="_blank" class="underline" href="https://www.instagram.com/becute.pl/">инстаграме</a>',o.appendChild(c),l.appendChild(o)}else{const o=s.cloneNode(!0);l.appendChild(o)}i.appendChild(l)}u&&u.destroy(!0,!0),u=new v(".swiper-gallery",{navigation:{nextEl:".gallery-button-next",prevEl:".gallery-button-prev"}})}}document.addEventListener("DOMContentLoaded",()=>{f()});window.addEventListener("resize",()=>{f()});new v(".swiper-reviews",{spaceBetween:"33px",slidesPerView:5,navigation:{nextEl:".reviews-button-next",prevEl:".reviews-button-prev"},pagination:{el:".reviews-swiper-pagination",type:"bullets"}});console.log("Vite + Tailwind ready");
