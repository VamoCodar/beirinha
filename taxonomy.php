
<?php get_header(); ?>

<div class="top-banner-proj">

<div class="pwidth text-top-banner text-light">
	<?php $the_query = new WP_Query( 'page_id=84' ); ?>

<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

                       


    

			<h1> <?php the_title(); ?></h1>
			<h3>
			<?php the_content(); ?>
			</h3>

	</div>
	<?php endwhile;?>


</div>
<div class="gradient2"> </div>
<div class="clear2"> </div>
	<div class="pwidth ">
	
	
	<div class="row marginlr">

				<div class="col-md-5ths text-center top150 tab-skill<?php echo $number;?>">
					<a href="<?php bloginfo('wpurl'); ?>/projetos">  
					<div class="box-skills <?php if(strrpos($_SERVER['REQUEST_URI'], $slug)) echo "skill-active"; ?>">
							<div class="text-skills"> Todos </div>
					</div>
					</a>
				</div> 

			<?php
			$contador = 1 ;
			$terms = get_terms( array(
			'taxonomy' => 'categorias',
			'order' => 'DES',
			'hide_empty' => false,
			)  );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			foreach ( $terms as $term ) {
				$pods = pods( 'categorias', $term->slug );
				$slug = $pods->field( 'slug');
				$name = $pods->field( 'name');
				$description = $pods->field( 'description');
				$link = home_url() . '/categorias/' . $slug;
				$number = $contador++ ;
				?>
		
				<div class="col-md-5ths text-center top150 tab-skill<?php echo $number;?>">
					<a href="<?php echo $link;?>">  
					<div class="box-skills <?php if(strrpos($_SERVER['REQUEST_URI'], $slug)) echo "skill-active"; ?>">
							<div class="text-skills"> <?php echo $name;?>	 </div>
					</div>
					</a>
				</div> 
			
			<?php }} ?>

	 
    </div>
    </div>




<!--START MEIO-->


		<div class="content-center text-center">
			<!-- <div class="txt-box">

				<h1 class="title-skills">
					<?php $term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') ); echo $term->name;?> 
				</h1>
				<h2 class="description-skills"> 
					<?php $term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') ); echo $term->description;?>  
				</h2>

	 		</div> -->



		<div class="row no-margin">
 
		
	
		
						<?php 
						$contador2 = 1 ;
						if (have_posts()) : while (have_posts()) : the_post(); 
						$img = get_post_meta( $post->ID, 'galeria', true);  
						$number2 = $contador2++ ;
						$filename = $img[ 'guid' ];
						?>

						<div class="col-md-3 no-padding">
						<a href="<?php echo get_permalink(); ?> ">
							<div class="portzone">
							<div class="overlay"></div>
							<div class="overlay3"></div>
							<div class="plus">+</div>
							<div class="tax">

							<?php
									$i = 1;
									$terms2 = wp_get_post_terms($post->ID, 'categorias', array("fields" => "all"));
	
									if ( ! empty( $terms2 ) && ! is_wp_error( $terms2 ) ){
	
									foreach ( $terms2 as $term2 ) {
										$pods = pods( 'categorias', $term2->slug );
										$name = $pods->field( 'name');
	
	
									echo  $name ;
									if ($i++ == 1) break;
									}
									}
                            ?> 
							
							
							</div>

							<div class="portitle text-left"><?php echo the_title();?> </div>  

						
						
							<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?> " class="port2"/>	
							
					



							</div>
							</a>
						</div>
						<?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
					
			     


    </div>

                    
   

    

        <!--END MEIO-->
		



<?php get_footer(); ?>