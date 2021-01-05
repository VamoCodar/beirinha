<?php if( !is_front_page() ){  ?>
	</div>
</div>
<?php } ?>

<footer>
	<div class="container">
		<div class="row">
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/reclamacoes.png" alt="reclamacoes"></a>
			<p>© COPYRIGHT 2020 Super Estrela, S.A. TODOS OS DIREITOS RESERVADOS.</p>
		</div>
	</div>
</footer>
	  
<!-- BOOTSTRAP JAVASCRIPT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


<!-- SLICK  CARROUSEL -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>


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

 <!-- Initialize Swiper -->
 <script>
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
</script>
</html>