<?php get_header(); ?>


    
	<div class="woocommerce searchpage">
	    <div class="hometitle"><h1><?php post_type_archive_title(); ?></h1></div>
		

<ul class="products columns-3">
	<?php 
	$i=0;
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  

	<li class="card columns-4 li product">
     
      <a href="<?php echo get_permalink();?>"class="img-products"> <?php echo woocommerce_get_product_thumbnail();?></a>
        <div class="card-body">
        <h5 class="card-title"><?php echo get_the_title();?></h5>
          <div class="price"> <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price2' ) );?>"><?php //echo $product->get_price_html(); ?> </p> </div>
       
        </div>
    
      </li>

	<?php $i++;endwhile;wp_reset_postdata();else : echo '<div class="pwidth"><h2>Nao foram encontrados resultados</h2></div>'; endif; ?>
	</ul>
	<div class="clear"></div>


	</div>
	</div>
    


<script type="text/javascript">
    $(document).ready(function() {	
	    	
    });
</script>
<?php get_footer(); ?>