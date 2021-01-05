
const aside = document.querySelector(".aside-container");
const filtro = document.querySelector(".button-filtro");

//carousel
//iniializa carousel porte gratis
function owlInitialize3() {
  if ($(window).width() >= 960) {
    $(".relacionados-container").slick("unslick");
  } else {
    $(".relacionados-container").slick({
      dots: false,
      infinite: true,
      slidesToShow: 1,
      centerMode: false,
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

