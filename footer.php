<?php if( !is_front_page() ){  ?>
</div>
</div>
<?php } ?>

<footer>
    <div class="container">
        <div class="row">
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/reclamacoes.png"
                    alt="reclamacoes"></a>
            <p>© COPYRIGHT 2020 Super Estrela, S.A. TODOS OS DIREITOS RESERVADOS.</p>
        </div>
    </div>
</footer>

<!-- BOOTSTRAP JAVASCRIPT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>


<!-- SLICK  CARROUSEL -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous"></script>


<!-- swiper CAROUSEL -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<?php if ( !is_product() ){ ?>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/script-front.js"></script>
<?php }	?>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/script-cart.js"></script>

<?php if ( is_product() ){ ?>
<!-- script vannila-->
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/script-front-produtos.js"></script>
<?php	} ?>


<?php if ( is_archive() ){ ?>
<!-- SLIDER -->
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jsr.js"></script>

<!-- script vannila-->

<?php } ?>

<?php wp_footer(); ?>



</body>


<script>
const botaoMenuMobile = document.querySelector(".hamburguer");
const botaoMenuMobileA = document.querySelector(".hamburguer a");
const menuMobile = document.querySelector(".menu-mobile");

//classe carregou
document.addEventListener("DOMContentLoaded", function() {
    let body = document.querySelector("body");
    body.classList.add("carregou")
});

function checagem() {
    let body = document.querySelector("body");
    if (window.innerWidth >= 1000) {
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
    let body = document.querySelector("body");
    if (window.innerWidth >= 1000) {
        body.classList.add("desktop");
        body.classList.remove("mobile");
    } else {
        body.classList.add("mobile");
        body.classList.remove("desktop");
    }
}
resize()


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
}
//fecha menu e anima
function targetMenu(event) {
    if (event.target != botaoMenuMobile && body.classList.contains("menu-open")) {
        menuMobile.setAttribute("style", "animation: subidaMenu 300ms both ease;");
        setTimeout(() => {
            body.classList.remove("menu-open");
            body.classList.add("menu-closed");
            menuMobile.removeAttribute("style", "animation");
        }, 300);
    }
}
window.addEventListener("resize", resize);
document.addEventListener("DOMContentLoaded", checagem);
botaoMenuMobile.addEventListener("click", abreMenu);
body.addEventListener("click", targetMenu);

</script>

</html>