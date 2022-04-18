$(document).ready(function(){
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 'auto',
        
        slidesOffsetAfter: 220,
        slidesOffsetBefore: 220,
        // centeredSlides: true,
        spaceBetween: 100,
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
});