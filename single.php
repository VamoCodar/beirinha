<?php get_header(); ?>
<div class="clear-mb"></div>	 
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
  
	<div class="receita-container container">
        <div class="mapa"><a href="#">Receitas</a> <a href="#">Entradas </a>
            <p>Camenber no Forno</p>
        </div>
        <div class="row">
            <div class="detalhes col-md-6">
                <span>Entrada</span>
                <h2>Camembert no forno com compota e nozes pecan caramelizadas, o aperitivo que vai derreter na sua boca</h2>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div class="image col-md-6">
                <img src="img/receita-3.jpg" alt="cramenbert">
            </div>
        </div>
	</div>

	<div class="parte-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ingredientes">
                    <div class="segura">
                        <h2>INGREDIENTES:</h2>
                        <ul>
                            <li>Lorem Ipsum is simply dummy t</li>
                            <li>Lorem Ipsum is simply dummy t</li>
                            <li>Lorem Ipsum is simply dummy t</li>
                            <li>Lorem Ipsum is simply dummy t</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 preparacao">
                    <div>
                        <h2>preparação:</h2>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	




<div class="row">
	<div class="page-content col-md-12">
	    <div class="hometitle hometitleh roboto"><h1><?php the_title()?></h1></div>
	    <div class="fullbar"></div>

	    <div class="pcontent">
			<div class="campanha_img">
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			
			<img src="<?php echo $image[0]; ?>" />

			</div>
			<?php endif; ?>
		
	    
	    
  			</br>
	   		<?php the_content();?>
			<div class="clear"></div>
		</div>
	</div>
	
</div>
 

 <?php endwhile;wp_reset_postdata(); endif; ?>

 <script src="<?php bloginfo( 'template_url' ); ?>/js/owl.carousel.js"></script>
<script type="text/javascript">
    $(document).ready(function() {	
	    
	$("#owl-demo").owlCarousel({
	    items : 1,
	    navigation : true,
	    slideSpeed : 300,
	    paginationSpeed : 400,
	    singleItem : true,
	    autoPlay : 5000,
	    stopOnHover :true,	    
	    video:true
	});		
    });
</script>
<?php get_footer(); ?>