<?php get_header(); ?>
<div class="clear-mb"></div>	 
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
  
		<div class="back-button-p">  <p class="botao-back" onclick="history.back();">< <?php _e("VOLTAR","repono")?></p></div>

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