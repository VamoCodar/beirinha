<?php 
/*
Template Name: Archives
*/
get_header(); ?>
<?php get_template_part( 'content', 'tmpl_archives' ); ?>
 	
 	
		
		<!--START MEIO-->
		<div class="clear-mb"></div>	
		 <div class="back-button-p">  <p class="botao-back" onclick="history.back();">< <?php _e("VOLTAR","garrafeira")?></p></div>
				<div class="produtos">
                    <div class="col-lg-12">
                        <div class="text-center mx-auto section-main-title">
                            <h1><span class="titleh"><?php _e("Fique a Par","garrafeira")?></span></h1>
                        </div>
                    </div>
                </div>
                <div class="row mt-12 work-filter ">
				
				<?php
                $args = array(
                'post_type'=> 'post',
                'orderby'    => 'ID',
                'post_status' => 'publish',
                'order'    => 'DESC',
                'posts_per_page' => -1 // this will retrive all the post that is published 
                );
                $result = new WP_Query( $args );
                if ( $result-> have_posts() ) : 
           
                while ( $result->have_posts() ) : $result->the_post();
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

                    <div class="col-lg-4  work_item">
                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                                <div class="box-article">
                    
                                <img src="<?php echo $img[0]; ?>" />

                                <div class="content-article">
                                <div class="date-article"><span><?php echo get_the_date( 'd - F - Y' ); ?><span></div>
                                <div class="title-article"><?php echo get_the_title();?> </div>
                                <?php echo excerpt(50); ?>
                                </div>

                                </a>
                                </div>
                    </a>
                    </div>
					
			<?php $i++;  endwhile; wp_reset_postdata(); endif; ?>
                </div>

         

 <div class="clear"> </div>
	
	
<?php get_footer(); ?>

