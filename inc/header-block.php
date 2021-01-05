<?php 

global $woocommerce;
// get total de items do carrinho
$totalItems = $woocommerce->cart->cart_contents_count;

// Coloca o badge com o total
if($totalItems > 0): $class = 'ativo'; else: $class = ''; endif; 
// fix para a quantidade ser maior que 100 itens
if($totalItems > 99): $totalItems = '+99'; else: $totalItems; endif;

?>

<!-- subMenu  BRANCO DESKTOP  -->
<div class=" fixed-top sub-navbar-desktop py-2">
        <div class="container">
            <div class="row justify-content-between align-items-center mx-0">
                <a href="<?php echo get_site_url(); ?>" class="logo" title="<?php echo get_bloginfo( 'name' ); echo ' | '; echo get_bloginfo( 'description' ); ?>"></a>
                <div class="itens-sub-nav row">
                    <!-- sociais -->
                    <a href="#"><span class="youtube"></span></a>
                    <a href="#"><span class="facebook"></span></a>
                    <a href="#"><span class="instagram"></span></a>
                    <!-- lingua dropdown 
                    <div class="linguagem">
                        <div class="dropdown text-black show">
                            <a class="btn-dropdown dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                PT
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">lingua -1</a>
                                <a class="dropdown-item" href="#">Lingua-2</a>

                            </div>
                        </div>
                    </div>-->
                    <!-- encomendas -->
                    <div class="encomendas">
                        <a href="<?php echo get_site_url(); ?>/minha-conta/orders/"><span class="icon-encomendas"></span>Encomendas</a>
                    </div>
                    <!-- minha conta -->
                    <div class="minha-conta">
                        <a class="minha-conta-link" href="<?php echo get_site_url(); ?>/minha-conta/"><span class="icon-conta"></span>Minha Conta</a>
                        <a href="<?php echo get_site_url(); ?>/wishlist/"><span class="favoritas"><i class="badge">1</i></span></a>
                        <a href="<?php echo get_site_url(); ?>/carrinho/">
                            <span id="cart" class="sacola">
                                <i id="badgeHeader" class="<?php echo $class;?> badge"><?php echo $totalItems; ?></i>
                                <div id="cart-tooltip" class="tooltip bs-tooltip-top" role="tooltip">
                                    <div class="arrow"></div>
                                    <div id="cart-message" class="tooltip-inner">Produtos</div>
                                </div>
                            </span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- submenu BRANCO MOBILE -->
    <div class="fixed-top sub-navbar-mobile py-2">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <a href="index.html" class="logo"></a>
                <div class="itens-sub-nav row">
                    <div class="minha-conta">
                        <a class="minha-conta-link" href="<?php echo get_site_url(); ?>/minha-conta/"><span class="icon-conta"></span></a>

                        <a class="sacola-link" href="<?php echo get_site_url(); ?>/carrinho/"><span class="sacola"><i id="badgeHeader" class="ativo badge">4</i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- menuVerde DESKTOP MOBILE e categorias -->
    <nav class="navbar-desktop fixed-top ">
        <div class="container">
            <div class="row align-items-center margin-mobile ">

                <!-- CATEGORIAS DROPDOWN -->
                <?php
                if ( !is_product() ) {
                    
                    if ( !is_archive( ) ) {
                        
                        ?>

                <div class=" navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="categorias nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categorias
                            </a>
                            <div class="dropdown-menu dropbottom">
                                <form class="accordion" id="accordion-categorias">


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

                                    $i = 0;
                                    foreach ($product_cat as $parent_product_cat)
                                    {

                                        echo '

                                        <div class="categoria-item">
                                            <a class="nav-link item-accordion" data-toggle="collapse" data-target="#collapse-'.$i.'" aria-controls="collapse-'.$i.'">
                                            ' . $parent_product_cat->name . '
                                            </a>
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
                                                    echo '<a href="' . get_term_link($child_product_cat->term_id) . '" class="collapse px-3 ">' . $child_product_cat->name . '</a>';
                                                }
                                                 echo '
                                            </div>
                                        </div>
                                            ';
                                            $i++;
                                        }
                                ?>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            <?php 	
                } }
            ?>
                <div class="menu-items ml-auto">
                    <ul class="row">
                        <li><a href="<?php echo get_site_url(); ?>/sobre-nos/">Sobre nós</a></li>
                        <li><a href="<?php echo get_site_url(); ?>/receitas/">Receitas</a></li>
                        <li><a href="<?php echo get_site_url(); ?>/categoria/promocoes/">Promoçoes</a></li>
                    </ul>
                </div>
                <form action="<?php echo get_site_url(); ?>/" method="get" class="input-group busca ml-auto">
                    <div class="input-group busca ml-auto">                
                        <input type="text" class="form-control" name="s" placeholder="Digite o produto aqui" aria-label="Digite o produto aqui" aria-describedby="button-addon2" required> 
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit" id="button-addon2">Pesquisar</button>
                        </div>                
                    </div>
                </form>
                <div class="ml-auto row mr-3 align-items-center hamburguer-group">
                    <p class="menu-text">menu</p><span class="hamburguer "></span>
                </div>
            </div>
        </div>
        <ul class="menu-mobile">
            <li><a href="sobre.html">Sobre nós</a></li>
            <li><a href="receitas.html">Receitas</a></li>
            <li><a href="produtos.html">Promoções</a></li>

        </ul>


        </div>
        </div>
    </nav>