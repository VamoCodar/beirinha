<?php

get_header(); ?>

<!-- receitas -->
<div class="receitas col-lg-9">
    <div class="container mt-5">
        <h3>Receitas</h3>

        <div class="receitas-container row">
		<?php

		global $post;

            
			while ( have_posts() ) : the_post();
			
			setup_postdata( $post );

			$categories = get_the_category($post->ID);
        ?>

            <div class="receita-item col-md-6 mt-5">
                <a class="container-img" href="<?php echo get_permalink($post->ID) ?>">
                    <?php echo get_the_post_thumbnail($post->ID, 'celeuma-medium-thumb'); ?>
                </a>
                <?php
                    if ( ! empty( $categories ) ) {
                        echo '<span><a class="subtitle" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></span>';
                    }
                ?>
               <a href="<?php echo get_permalink($post->ID) ?>">
                    <h2><?php echo the_title(); ?></h2>
                </a>
                <a class="btn-receita" href="<?php echo get_site_url(); ?>/receitas/">Ver tudo</a>
            </div>
            <?php endwhile; ?>
            
        </div>

    </div>
</div>

<!-- produtos relacionados -->
<div class="produtos-container col-lg-3">
    <h1>Produtos relacionados</h1>
    <div class="row relacionados-container">

	<?php echo getProdutosCarrossel('Rand', 3, '', 'relacionados-card'); ?>
       
    </div>
</div>

<?php get_footer(); ?>