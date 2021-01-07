<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

global $query_string;

?>

<?php
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$link = substr($link, 0, strpos($link, "?"));


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
				
				<aside>
                    <div class="filtros">
                        <h2>Filtros</h2>
                        <form class="accordion" id="accordion-filtro">
                            <div>
                                <a class="nav-link item-accordion" data-toggle="collapse" data-target="#collapse-price" aria-controls="collapse">
                                    Preço
                                </a>
                                <form action="<?php echo $query_string; ?>&" type="GET">
                                    <div id="collapse-price" class="collapse collapse-item px-3 collapse-price" data-parent="#collapse-price">
                                        <input id="jsr-1-1" name="min_price" type="range" min="1" max="999" step="1" value="25">
                                        <input id="jsr-1-2" name="max_price" type="range" min="20" max="1000" step="1" value="50">
                                        <button type="submit">Aplicar</button>
                                    </div>
                                </form>
                                <a class="nav-link item-accordion" data-toggle="collapse" data-target="#collapse-ordenar" aria-controls="collapse">
                                    Ordenar
                                </a>
                                <div id="collapse-ordenar" class="collapse collapse-item px-3 " data-parent="#collapse-ordenar">
									<a href="<?php echo $link; ?>/?orderby=menu_order" class="popular">Ordenar Padrão</a>
									<a href="<?php echo $link; ?>?orderby=popularity" class="popular">Mais Popular</a>
									<a href="<?php echo $link; ?>?orderby=rating" class="rating">Melhor Avaliados</a>
									<a href="<?php echo $link; ?>?orderby=date" class="recente">Mais Recente</a>
									<a href="<?php echo $link; ?>?orderby=price" class="crescente">Por preço (crescente)</a>
                                    <a href="<?php echo $link; ?>?orderby=price-desc" class="decrescente">Por preço (decrescente)</a>                              
                                </div>

                            </div>
                        </form>
                    </div>
				</aside>			
			</aside>
			
			<section class="produtos">
                <div class="mapa-produto row align-items-center"> <?php //do_action( 'woocommerce_before_main_content' ); ?>
                </div>
                
                <div class="row mx-0 produtos-container justify-content-center">
				
				<?php
					if ( woocommerce_product_loop() ) {

						/**
						 * Hook: woocommerce_before_shop_loop.
						 *
						 * @hooked woocommerce_output_all_notices - 10
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						//do_action( 'woocommerce_before_shop_loop' );
						$i = 1;
						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
                                the_post();

                                //echo  $post->id;
                                $postId =  get_the_ID();
                                $product = wc_get_product( $postId );                                

                                //$product->get_regular_price();
                                //$product->get_sale_price();
                                //$product->get_price();

                                // template produtos

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
                        <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                        </div>
                    </div>


                                <?php
                                

								
							}
						}


						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						
                        ?>
                        
                </div>

                <?php do_action( 'woocommerce_after_shop_loop' ); ?>
                            

                <!-- <nav aria-label="Page-navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="#">Proxima</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                    </ul>
				</nav> -->
				
                <?php
                $i++; 
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				}
				
				/**
				 * Hook: woocommerce_after_main_content.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
				
				?>

				
			</section>
			
		</div>
<?php

get_footer( );

?>
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