//função que adiciona a classe mobile ou desktop dependendo do tamanho da tela
let body = document.querySelector("body");
/* const botaoMenuMobile = document.querySelector(".hamburguer");
const botaoMenuMobileA = document.querySelector(".hamburguer a");
const menuMobile = document.querySelector(".menu-mobile"); */
const botaoCategorias = document.querySelector(".categorias-mobile");
const aside = document.querySelector(".aside-container");
const filtro = document.querySelector(".button-filtro");

/* function checagem() {
  if (window.innerWidth >= 993) {
    body.classList.add("desktop");
    body.classList.remove("mobile");
  } else {
    body.classList.add("mobile");
    body.classList.remove("desktop");
  }
}
checagem();

//mesma funçao de checagem só que no resize
function resize() {
  if (window.innerWidth >= 1000) {
    body.classList.add("desktop");
    body.classList.remove("mobile");
  } else {
    body.classList.add("mobile");
    body.classList.remove("desktop");
  }
}
//function add classe carregou
document.addEventListener("DOMContentLoaded", function () {
  let body = document.querySelector("body");
    body.classList.add("carregou")
  });

//função abrir o menu

function abreMenu() {
  if (body.classList.contains("menu-open")) {
    menuMobile.setAttribute("style", "animation: subidaMenu 300ms both ease;");
    //settimout para rolar a animação antes
    setTimeout(() => {
      body.classList.remove("menu-open");
      body.classList.add("menu-closed");
      menuMobile.removeAttribute("style", "animation");
    }, 300);
  } else {
    body.classList.toggle("menu-open");
    body.classList.toggle("menu-closed");
  }
} */
//filtro
function abreFiltro() {
  body.classList.toggle("ativo-filtro");
}
/* //fecha menu e anima
function targetMenu(event) {
  if (event.target != botaoMenuMobile && body.classList.contains("menu-open")) {
    menuMobile.setAttribute("style", "animation: subidaMenu 300ms both ease;");
    setTimeout(() => {
      body.classList.remove("menu-open");
      body.classList.add("menu-closed");
      menuMobile.removeAttribute("style", "animation");
    }, 300);
  }
} */

function abreCatego() {
  body.classList.toggle("ativo");
}
function fechaCatego(event) {
  if (
    event.target != botaoCategorias &&
    !event.path[0].classList.contains("nav-link") &&
    body.classList.contains("ativo")
  ) {
    body.classList.toggle("ativo");
  }
}

function filtroInit() {
  if ($(window).width() <= 1000) {
    $(".filtros").appendTo(".filtro-mobile");
  }
}

$(window).resize(function () {
  filtroInit();
});

$(document).ready(function () {
  filtroInit();
});

/* document.addEventListener("DOMContentLoaded", checagem);
body.addEventListener("click", targetMenu);
botaoMenuMobile.addEventListener("click", abreMenu);
window.addEventListener("resize", resize); */
botaoCategorias.addEventListener("click", abreCatego);
body.addEventListener("click", fechaCatego);
filtro.addEventListener("click", abreFiltro);
//body.addEventListener("click", fechaFiltro);
