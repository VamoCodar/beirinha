let body = document.querySelector("body");

//animar ao scroll subida
var lastScrollTop = 0;

$(window).scroll(function () {
  var st = $(this).scrollTop();
  if (st > lastScrollTop) {} else {
    sections.forEach((section) => {
      const sectionTop = section.getBoundingClientRect().top;
      if (sectionTop >= 400 && section.classList.contains("passou")) {
        section.setAttribute("style", "animation: voltanenem 400ms both ease;");
        setTimeout(() => {
          section.classList.remove("passou");
          section.removeAttribute("style", "animation");
        }, 400);
      }
    });
  }
  lastScrollTop = st;
});

//animar descida
const sections = document.querySelectorAll(".js-scroll");

function animaScroll() {
  sections.forEach((section) => {
    const sectionTop = section.getBoundingClientRect().top;
    if (sectionTop < 700) {
      section.classList.add("passou");
    }
  });
}


var swiper = new Swiper('#swiper-container', {
  slidesPerView: 'auto',
  centeredSlides: false,
  breakpoints: {

      640: {
          slidesPerView: 1,
          centeredSlides: true,
          spaceBetween: 10,
      },

      800: {
          slidesPerView: 1,
          centeredSlides: false,
          spaceBetween: 20,
      },
      1024: {
          slidesPerView: 'auto',
          centeredSlides: false,
          spaceBetween: 30,
      },
  }
});

//carousel
function CarouselCheck() {
  if ($(window).width() <= 1000) {
    $(".carousel").on("slid.bs.carousel", function () {
      $("#element-clone .slide-section").detach();
      $(".active .slide-section").clone().appendTo(".slide-section-doly");
    });
  }
}

function CarouselChekInit() {
  if ($(window).width() <= 1000) {
    $(".active .slide-section").clone(true).appendTo(".slide-section-doly");
  }
}

//carrousel bootstrap
$(".carousel").carousel({
  interval: 5000, //depois ajustar, pra n ficar passando
});

//carrousel slick
//slide mulher
$(".owl-carousel").slick({
  dots: false,
  arrows: false,
  slidesToShow: 1,
});


//slide produtos
$(".slick-container").slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 2,
  centerMode: false,
  centerPadding: "0px",
  arrows: false,
  slidesToScroll: 1,

  responsive: [{
      breakpoint: 1000,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        dots: false,
        centerMode: false,
        variableWidth: true,
      },
    },


  ],
});

//categorias

function owlInitialize() {
  if ($(window).width() > 1110) {
    $(".container-cartao").slick("unslick");
  } else {
    $(".container-cartao").slick({
      dots: false,
      infinite: false,
      slidesToShow: 4,
      centerMode: true,
      centerPadding: "0px",
      arrows: false,
      responsive: [{
          breakpoint: 1156,
          settings: {
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            centerMode: false,
            centerPadding: "0px",
            arrows: false,
          },
        },
        {
          breakpoint: 1000,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            dots: false,
            centerMode: false,
            variableWidth: true,
          },
        },
        {
          breakpoint: 450,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            dots: false,
            centerMode: false,
            variableWidth: true,
          },
        },

        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ],
    });
  }
}

//iniializa carousel receitas
function owlInitialize2() {
  if ($(window).width() >= 1000) {
    $(".receitas-container").slick("unslick");
  } else {
    $(".receitas-container").slick({
      dots: false,
      infinite: false,
      slidesToShow: 2,
      centerMode: false,
      centerPadding: "0px",
      arrows: false,
      responsive: [{
        breakpoint: 780,
        settings: {
          dots: false,
          infinite: false,
          slidesToShow: 1,
          centerMode: false,
          slidesToScroll: 1,
          centerPadding: "0px",
          variableWidth: true,
        },
      }, ],
    });
  }
}

//iniializa carousel porte gratis
function owlInitialize3() {
  if ($(window).width() >= 1000) {
    $(".portes-gratis").slick("unslick");
  } else {
    $(".portes-gratis").slick({
      dots: false,
      infinite: true,
      slidesToShow: 1,
      centerMode: true,
      centerPadding: "0px",
      arrows: false,
      variableWidth: true,
      slidesToScroll: 1,
    });
  }
}




//só tem carousel apartir de tal tamanho
//receitas
$(document).ready(function () {
  owlInitialize3();
});
$(window).resize(function () {
  owlInitialize3();
});
$(document).ready(function () {
  owlInitialize2();
});
$(window).resize(function () {
  owlInitialize2();
});
//categorias
$(document).ready(function () {
  owlInitialize();
});
$(window).resize(function () {
  owlInitialize();
});
$(document).ready(function () {
  CarouselCheck();
});
$(window).resize(function () {
  CarouselCheck();
});

$(document).ready(function () {
  CarouselChekInit();
});

// trocar arrows do slick
$(".prox").click(function () {
  $(".container-cartao").slick("slickNext");
});
$(".ant").click(function () {
  $(".container-cartao").slick("slickPrev");
});
//CARTAO BLOCO 1 ARROW
$(".right").click(function () {
  $(".owl-carousel").slick("slickNext");
});
$(".left").click(function () {
  $(".owl-carousel").slick("slickPrev");
});

//

let doly = document.querySelector(".slide-section-doly");

if(doly){
let elemento = doly.firstElementChild;
let dolyItem = document.querySelector(".slide-section");
}

window.addEventListener("scroll", animaScroll);
//window.addEventListener("resize", resize);