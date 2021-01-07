<?php

get_header(); ?>

<!-- receitas -->
<div class="receitas col-lg-9">
    <div class="container mt-5">
        <h3>Receitas</h3>

        <div class="receitas-container row">
        <?php
            $recent_posts = wp_get_recent_posts(array(
                'numberposts' => 20,
                'post_status' => 'publish'
            ));
            foreach($recent_posts as $post) :

                $categories = get_the_category($post['ID']);
        ?>

            <div class="receita-item col-md-6 mt-5">
                <a class="container-img" href="<?php echo get_permalink($post['ID']) ?>">
                    <?php echo get_the_post_thumbnail($post['ID'], 'celeuma-medium-thumb'); ?>
                </a>
                <?php
                    if ( ! empty( $categories ) ) {
                        echo '<span><a class="subtitle" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></span>';
                    }
                ?>
               <a href="<?php echo get_permalink($post['ID']) ?>">
                    <h2><?php echo $post['post_title'] ?></h2>
                </a>
                <a class="btn-receita" href="<?php echo get_site_url(); ?>/receitas/">Ver tudo</a>
            </div>
            <?php endforeach; wp_reset_query(); ?>
            
        </div>

    </div>
</div>

<!-- produtos relacionados -->
<div class="produtos-container col-lg-3">
    <h1>Produtos relacionados</h1>
    <div class="row relacionados-container">
        <div class="relacionados-card card-1">
            <a href="#">
                <h2>Go Chill Cappuchino aveia DELTA 230ml (10)</h2>
            </a>
            <span>1,39€</span>
            <a href="#"><img src="img/produtos/capucino.png" alt="capucino"></a>
            <i class="mais"></i>
            <i class="menos"></i>
            <div class="circulo-verde row"> <a href="#">Comprar</a><i class="badge">5</i></div>
            <div class="row">

                <span class="wishlist"></span>
            </div>
        </div>
        <div class="relacionados-card card-2">
            <a href="#">
                <h2>Leite Parmalat UHT M/g 1lt</h2>
            </a>
            <span>1,05€</span>
            <a href="#"><img src="img/produtos/produto-2.png" alt="leite"></a>
            <i class="mais"></i>
            <i class="menos"></i>
            <div class="circulo-verde row"> <a href="#">Comprar</a><i class="badge ativo">1</i></div>
            <div class="row">

                <span class="wishlist"></span>
            </div>
        </div>
        <div class="relacionados-card card-3">
            <a href="#">
                <h2>Leite Est. Atlântico UHT M/g 1lt</h2>
            </a>
            <span>0,50€</span>
            <a href="#"><img src="img/produtos/produto-1.png" alt="leite"></a>
            <i class="mais"></i>
            <i class="menos"></i>
            <div class="circulo-verde row"> <a href="#">Comprar</a><i class="badge ativo">5</i></div>
            <div class="row">

                <span class="wishlist"></span>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>