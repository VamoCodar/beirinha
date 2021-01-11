<!-- carousel inicio ssssss -->
<div id="carousel-header" class="carousel carousel-fade slide" data-ride="carousel">

<ol class="carousel-indicators">

<?php
    $count_sliders = wp_count_posts( $post_type = 'slider' );

    $qtdeSliders = intval($count_sliders->publish);

    for ($i = 1; $i <= $qtdeSliders; $i++) {
        $class = '';
        if($i == 1){$active = 'class="active"';}
        echo '<li data-target="#carousel-header" data-slide-to="'. ($i - 1).'" '.$class.'></li>';
    }
    ?>
</ol>
<div class="carousel-inner">
    
<?php
$args = array(
                'post_type' => 'slider',
                'orderby' => 'post_date',
                'order' => 'DES',
                'posts_per_page' => -1
            );
            $homeSlider = new WP_Query($args);
            $i = 1;
            if ($homeSlider->have_posts()) : while ($homeSlider->have_posts()) : $homeSlider->the_post(); 

            $img_banner = get_post_meta( $post->ID, 'imagem_principal', true); 
            $link_banner = get_post_meta(get_the_ID(), 'link_url', true);
            $url_image = $img_banner[ 'guid' ];
            $botao =  get_post_meta(get_the_ID(), 'botao', true);
            $headline =  get_post_meta(get_the_ID(), 'headline', true);

            //var_dump($img_banner);
            

?>
            <div class="carousel-item <?php if($i === 1){echo 'active';} ?>">
                <img class="d-block w-100" src="<?php echo $url_image; ?>" alt="<?php the_title() ?>">
                <div class="carousel-caption">
					
						<div class="col-md-6">
							<div class="slide-section">
								<h5><?php echo $headline; ?></h5>
								<h2><?php the_title() ?></h2>
								<p><?php echo get_the_content() ?></p>
								<?php if($botao != ""){ ?>
								<button class="comprar">
									<div class="circulo-completo"><span class="circulo-branco"></span><span class="circulo-verde"></span> <i></i></div>
									<a href="<?php echo $link_banner; ?>"><?php echo $botao; ?></a>
								</button>
								<?php } ?>
							</div>
						</div>
					
                </div>
            </div>


        <?php $i++;  endwhile; wp_reset_postdata(); endif; ?>

        </div>

        <a class="carousel-control-prev" href="#carousel-header" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carousel-header" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>

    <section class="slide-section-doly container" id="element-clone">
    </section>
  
 