<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(  ); ?>

<div class="buttons">
    <button class="categorias-mobile">Categorias</button>
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

                                        /* <div class="categoria__row">
                                        <a class="categoria-item-link" href="' . get_term_link($parent_product_cat->term_id) . '"> ' . $parent_product_cat->name . ' </a>

                                            <a class="nav-link item-accordion" data-toggle="collapse" data-target="#collapse-' . $i . '" aria-controls="collapse-' . $i . '">
                                            
                                            </a>
                                            </div>
                                            <div class="collapse" id="collapse-' . $i . '" data-parent="#accordion-categorias">'; */

                                        echo '                                        

                                            <div class="categoria__row">
                                            
                                            <a class="categoria-item-link" href="' . get_term_link($parent_product_cat->term_id) . '"> ' . $parent_product_cat->name . ' </a>

                                            <a class="nav-link item-accordion" data-toggle="collapse" data-target="#collapse-' . $i . '" aria-controls="collapse-' . $i . '">
                                            
                                            </a>
                                            
                                            </div>

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
            <!-- fim categorias -->
            <section class="item-ativo">

            <?php
                $args = array(
                        'delimiter' => ' | ',
                        'home' => false
                );
            ?>
            <div class="mapa-produto row align-items-center">
                <?php woocommerce_breadcrumb( $args );
                ?>
            </div>

            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>
            
                <div class="produto-central row" id="<?php echo the_ID(); ?>">

                    <div class="imagem-produto col-md-6">
                        
                    <?php 
                    // PRODUCT IMAGE

                    $columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
                    $post_thumbnail_id = $product->get_image_id();
                    $wrapper_classes   = apply_filters(
                        'woocommerce_single_product_image_gallery_classes',
                        array(
                            'woocommerce-product-gallery',
                            'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
                            'woocommerce-product-gallery--columns-' . absint( $columns ),
                            'images',
                        )
                    );
                    ?>
                    <div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
                        <figure class="woocommerce-product-gallery__wrapper">
                            <?php
                            if ( $product->get_image_id() ) {
                                $html = wc_get_gallery_image_html( $post_thumbnail_id, true );
                            } else {
                                $html  = '<div class="woocommerce-product-gallery__image--placeholder">';
                                $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
                                $html .= '</div>';
                            }

                            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

                            //do_action( 'woocommerce_product_thumbnails' );

                            // Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
                                if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
                                    return;
                                }

                                global $product;

                                $attachment_ids = $product->get_gallery_image_ids();

                                if ( $attachment_ids && $product->get_image_id() ) {
                                    foreach ( $attachment_ids as $attachment_id ) {
                                        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id ), $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
                                    }
                                }

                            ?>
                        </figure>
                    </div>
                                        
                    </div>

                    <div class="detalhes col-md-6">

                        <span class="referencia">Referência: <?php echo $product->get_sku(); ?></span>
                        <a href="#" class="nome-item">
                            <h3><?php the_title(); ?></h3>
                        </a>

                        <?php if ($product->stock_status == 'instock'){ ?>
                            <span class="disponivel">Produto Disponivel</span>
                            <?php }else{ ?>
                            <span class="indisponivel">Produto Indisponível</span>
                        <?php }?>

                        

                        <span class="valor"><p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p></span>
                        <div class="favorito"> <span></span> Adicionar aos favoritos</div>
                       
                        <div class="row linha beirinha-cart-add">
                            <span class="single-menos"></span>
                            <p class="labelqty">1</p>
                                <input type="hidden" class="qty" name="qty" value="1" max="99" min="1" step="1">
			                    <input type="hidden" value="<?php echo the_ID();?>" name="product_id">
			                    <input type="hidden" value="<?php echo the_ID();?>" name="variation_id">
                            <span class="single-mais"></span>
                            <span class="sacola add-cart">
                                <p>Comprar</p>
                            </span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section class="relacionados">
            <h2 class="tit">Produtos Relacionados</h2>

            <?php
                $produtosRelated = wc_get_related_products( $product->id, '10');
            ?>
            <div class="container">

                <div id="swiper-container">

                    <div class="swiper-wrapper relacionados-container">
                        <?php echo getProdutosCarrossel('', 10, $produtosRelated, 'relacionados-card'); ?>
                    </div>

                </div>
            </div>

        </section>

        <?php endwhile; ?>

        
<?php

get_footer(  );

?>
