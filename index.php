<?php
/*
Template Name: Home Page
*/

get_header();

$secao1Direita = pods('opcoes_site');
$secao1Slider = pods('opes_home22');
$secao2IconeTexto = pods('opes_home2');
?>

<?php get_template_part( 'inc/slider', 'block' ); ?>

<div class="container">
        <section class="bloco-1 ">


            <div class="cards owl-carousel">

                <button class="card" style="background-image: url(<?php echo $secao1Slider->display('imagem_1'); ?>);">
                <?php if($secao1Slider->display('numero_1') != "" ){ ?>
                    <span><?php echo $secao1Slider->display('numero_1'); ?></span>
                <?php } ?>
                    <div class="card-context">
                        <h5><?php echo $secao1Slider->display('titulo1'); ?></h5>
                        <p><?php echo $secao1Slider->display('subtitulo_1'); ?></p>
                        <i class="left"></i> <i class="right"></i>
                    </div>
                </button>
                <?php if($secao1Slider->display('titulo2') != "" ){ ?>
                    <button class="card" style="background-image: url(<?php echo $secao1Slider->display('imagem_2'); ?>);">
                        <?php if($secao1Slider->display('numero_2') != "" ){ ?>
                            <span><?php echo $secao1Slider->display('numero_2'); ?></span>
                        <?php } ?>
                            <div class="card-context">
                                <h5><?php echo $secao1Slider->display('titulo2'); ?></h5>
                                <p><?php echo $secao1Slider->display('subtitulo_2'); ?></p>
                                <i class="left"></i> <i class="right"></i>
                            </div>
                    </button>
                <?php } ?>
                <?php if($secao1Slider->display('titulo3') != "" ){ ?>
                    <button class="card" style="background-image: url(<?php echo $secao1Slider->display('imagem_3'); ?>);">
                        <?php if($secao1Slider->display('numero_3') != "" ){ ?>
                            <span><?php echo $secao1Slider->display('numero_3'); ?></span>
                        <?php } ?>
                            <div class="card-context">
                                <h5><?php echo $secao1Slider->display('titulo3'); ?></h5>
                                <p><?php echo $secao1Slider->display('subtitulo_3'); ?></p>
                                <i class="left"></i> <i class="right"></i>
                            </div>
                    </button>
                <?php } ?>
            </div>

            <div class="padaria">
                <p><?php echo $secao1Direita->display('bloco_1_direita_titulo'); ?></p>
                <h5><?php echo $secao1Direita->display('bloco_1_direita_subtitulo'); ?></h5>
                <?php if($secao1Direita->display('bloco_1_texto_botao') != "" ){ ?>
                <button class="comprar">
                    <div class="circulo-completo"><span class="circulo-branco"></span><span class="circulo-verde"></span> <i></i></div>
                        <a href="<?php echo $secao1Direita->display('bloco_1_link_do_botao'); ?>"><?php echo $secao1Direita->display('bloco_1_texto_botao'); ?></a>
                </button>
                <?php } ?>
                <span class="pao" style="background-image: url(<?php echo $secao1Direita->display('bloco_1_imagem'); ?>);"></span>
            </div>

            <div class="slick-container row owl-carousel-2">
                <?php getProdutosCarrosselRandom('Mercearia', 10, '', ''); ?>
            </div>

        </section>
    </div>
    <!-- fim bloco dos produtos e mulher -->
    <section class="bloco-2 ">
        <div class="container ">
            <div class=" row align-items-center text-white portes-gratis">
                <ul>
                    <li><img src="<?php echo $secao2IconeTexto->display('imagem_1'); ?>" alt="<?php echo $secao2IconeTexto->display('titulo1'); ?>"></li>
                    <li>
                        <h2><?php echo $secao2IconeTexto->display('titulo1'); ?></h2>
                    </li>
                    <li>
                        <p><?php echo $secao2IconeTexto->display('subtitulo_1'); ?></p>
                    </li>
                </ul>
                <ul>
                    <li><img src="<?php echo $secao2IconeTexto->display('imagem_2'); ?>" alt="<?php echo $secao2IconeTexto->display('titulo2'); ?>"></li>
                    <li>
                        <h2><?php echo $secao2IconeTexto->display('titulo2'); ?></h2>
                    </li>
                    <li>
                        <p><?php echo $secao2IconeTexto->display('subtitulo_2'); ?></p>
                    </li>
                </ul>
                <ul>
                    <li><img src="<?php echo $secao2IconeTexto->display('imagem_3'); ?>" alt="<?php echo $secao2IconeTexto->display('titulo3'); ?>"></li>
                    <li>
                        <h2><?php echo $secao2IconeTexto->display('titulo3'); ?></h2>
                    </li>
                    <li>
                        <p><?php echo $secao2IconeTexto->display('subtitulo_3'); ?></p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- categorias -->
    <section class="bloco-3 ">
        <div class="bg-azul"></div>
        <div class="container js-scroll">
            <h2>Categorias</h2>
            <a href="<?php echo get_site_url(); ?>/categoria/promocoes/" class="todas">Ver todas as categorias</a>
            <div class="container-cartao">
                <ul class="categoria-cartao col-3">
                    <li>
                        <h3><a href="<?php echo get_site_url(); ?>/categoria/mercearia">Mercearia</a></h3>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/mercearia/cafes/">Cafés</p>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/mercearia/chas/">Chás</p>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/mercearia/cereais-e-far-lacteas/">Cereais e Far. Lácteas</p>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/mercearia/acucar/">Açúcar</p>
                    </li>
                    <li><a href="<?php echo get_site_url(); ?>/categoria/mercearia" class="button">Ver tudo</a></li>
                </ul>
                <ul class="categoria-cartao col-3 cartao-2">
                    <li>
                    <h3><a href="<?php echo get_site_url(); ?>/categoria/frescos-e-laticinios/">Laticínios</a></h3>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/frescos-e-laticinios/charcutaria/">Charcutaria</p>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/frescos-e-laticinios/leites/">Leites</p>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/frescos-e-laticinios/natas-e-bebidas-vegetais/">Natas e bebidas</p>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/frescos-e-laticinios/queijos/">Queijos</p>
                    </li>
                    <li><a href="<?php echo get_site_url(); ?>/categoria/frescos-e-laticinios/" class="button">Ver tudo</a></li>
                </ul>
                <ul class="categoria-cartao col-3 cartao-3">
                    <li>
                    <h3><a href="<?php echo get_site_url(); ?>/categoria/bebidas/">Bebidas</a></h3>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/bebidas/cervejas-e-sidras/">Cervejas e sidras</p>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/bebidas/sumos/">Sumos</p>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/bebidas/nectares-e-refrigerantes/">Néctares</p>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/bebidas/agua/">Água</p>
                    </li>
                    <li><a href="<?php echo get_site_url(); ?>/categoria/bebidas/" class="button">Ver tudo</a></li>
                </ul>
                <ul class="categoria-cartao col-3 cartao-4">
                    <li>
                    <h3><a href="<?php echo get_site_url(); ?>/categoria/congelados/">Congelados</a></h3>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/congelados/legumes-e-frutas/">Legumes e frutas</p>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/congelados/gelados">Gelados</p>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/congelados/refeicoes-prontas/">Refeições Prontas</p>
                    </li>
                    <li>
                        <p class="subcategoria"><a href="<?php echo get_site_url(); ?>/categoria/congelados/aperitivos">Aperitivos</p>
                    </li>
                    <li><a href="<?php echo get_site_url(); ?>/categoria/congelados/" class="button">Ver tudo</a></li>
                </ul>

            </div>
        </div>
        <i class="prox"></i>
        <i class="ant"></i>
    </section>
    <!-- promoçoes -->

    <?php get_template_part( 'inc/promocoes', 'block' ); ?>

    <section class="bloco-5  ">
        <div class="relative-5">
            <div class="bg-azul"></div>

            <div class="container js-scroll">
                <h3>Receitas</h3>
                <div class="row texto">
                    <p>Dê uma olhada nas nossas receitas e faça diretamente a sua encomenda</p>
                    <a class="ml-auto" href="<?php echo get_site_url(); ?>/receitas/">Ver todas as receitas</a>
                </div>

                <div class="receitas-container row">
                    <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 3,
                        'post_status' => 'publish'
                    ));
                    foreach($recent_posts as $post) :
                    
                        $categories = get_the_category($post['ID']);
                        
                        ?>
                        <div class="receita-item col-md-4">
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
                            <a class="btn-receita" href="<?php echo get_permalink($post['ID']) ?>">Ver tudo</a>
                        </div>
                    <?php endforeach; wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </section>
    	
<?php get_footer(); ?>