<?php get_header(); 

global $query_string;

wp_parse_str( $query_string, $search_query );
$search = new WP_Query( $search_query );


?>


    
		<div class="buttons">
            <button class="categorias-mobile">Categorias</button>
            <button class="button-filtro">Filtros</button>
            <div class="filtro-mobile"></div>
		</div>
		
		<div class="row flexNowrap">
            <aside class="aside-container">
                <aside class="categorias">
                    <h2>CATEGORIAS</h2>
                    <form class="accordion" id="accordion-categorias">
                        
                    <a class="promo" href="<?php echo get_site_url(); ?>/categoria/promocoes/"> <h3>Promoções</h3> </a>

                     <?php

                            $exclude_ids   = array();
                            $exclude_names = array("Promoções"); // Categorias para Excluir da Lista do Menu

                            foreach( $exclude_names as $name ){
                                $excluded_term = get_term_by( 'name', $name, 'product_cat' );
                                $exclude_ids[] = (int) $excluded_term->term_id; // Get term_id
                            }

                                    $args = array(
                                        'taxonomy' => 'product_cat',
                                        'hide_empty' => false,
                                        'parent' => 0,
                                        'exclude'  => $exclude_ids
                                    );
                                    $product_cat = get_terms($args);

                                    $i = 1;
                                    foreach ($product_cat as $parent_product_cat)
                                    {

                                        echo '                                        

                                            <a class="nav-link item-accordion" data-toggle="collapse" data-target="#collapse-'.$i.'" aria-controls="collapse-'.$i.'">
                                            ' . $parent_product_cat->name . '
                                            </a>
                                            <div>
                                                <div class="collapse" id="collapse-'.$i.'" data-parent="#accordion-categorias">';

                                                // SubCategorias    
                                                    $child_args = array(
                                                        'taxonomy' => 'product_cat',
                                                        'hide_empty' => false,
                                                        'parent' => $parent_product_cat->term_id
                                                    );
                                                    $child_product_cats = get_terms($child_args);
                                                    foreach ($child_product_cats as $child_product_cat)
                                                    {
                                                        echo '<a href="' . get_term_link($child_product_cat->term_id) . '" class="py-2">' . $child_product_cat->name . '</a>';
                                                    }
                                                    echo '
                                                </div>
                                            </div>
                                            ';
										$i++;
									}
						?>
				</form>
				</aside>
							
			</aside>

<section class="produtos">	
                
	<div class="row mx-0 produtos-container justify-content-center">

	<?php 

	$i=0;
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	
		if($post->post_type == 'product'){
	
	?>  

		<div class="produtos-card beirinha-cart-add card-<?php echo $i ?>">
			<a href="#">
				<h2><?php the_title(); ?></h2>
			</a>
			<span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) );?>">
			<?php echo $product->get_price_html(); ?></span>
			<a href="<?php echo get_permalink();?>"><?php echo woocommerce_get_product_thumbnail();?></a>
			<i class="mais"></i>
			<i class="menos"></i>
			<input type="hidden" class="qty" name="qty" value="1" max="99" min="1" step="1">
			<input type="hidden" value="<?php echo the_ID();?>" name="product_id">
			<input type="hidden" value="<?php echo the_ID();?>" name="variation_id">
			<div class="circulo-verde row add-cart"><a class="add-cart">Comprar</a><i class="badge"></i></div>
			<div class="row">

				<span class="wishlist"></span>
			</div>
		</div>

	<?php $i++; } endwhile;wp_reset_postdata(); endif; ?>
	
	<div class="clear"></div>

	<?php if($i == 0){ echo '<div class="pwidth ml-5"><h2>Nao foram encontrados resultados para sua pesquisa</h2></div>'; } ?>

	</div>
</section>
</div>
	 

<?php get_footer(); ?>

<script>
    //SLIDER
    new JSR(["#jsr-1-1", "#jsr-1-2"], {
        sliders: 2,
        values: [1, 50],
        min: 1.0,
        max: 200.0,
        grid: false,
        labels: {
            formatter: (value) => {
                return value.toString() + " €";
            },
        },
    });
</script>