<?php get_header(); ?>
<div class="clear-mb"></div>	 
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
 
 <?php
 
 $categories = get_the_category( );

 
 ?>
  
	<div class="receita-container container">
        <div class="mapa">
		<?php
			if ( ! empty( $categories ) ) {
				echo '<a class="subtitle" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
			}
		?>	 
		<p><?php echo the_title(); ?></p>
		</div>

		<div class="content">
			<?php the_content();?>
		</div>
				
	</div>
	
 <?php endwhile;
 wp_reset_postdata();
endif; ?>


<?php get_footer(); ?>