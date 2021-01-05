<?php get_header(); ?>

<div class="clear-mb"></div>	
		
		<!--START MEIO-->
		<div class="pwidth">
		 <div class="back-button-p">  <p class="botao-back" onclick="history.back();">< <?php _e("VOLTAR","takemedia")?></p></div>
				<div class="produtos">
                    <div class="col-lg-12">
                        <div class="text-center mx-auto section-main-title">
                            <h1><span class="titleh"><?php _e("Promoções","repono")?></span></h1>
                        </div>
                    </div>
                </div>
                <div class="row mt-12 work-filter ">
				
				<?php
       
           
            if (have_posts()) : while (have_posts()) :the_post();
            $img_banner = get_post_meta( $post->ID, 'banner', true); 
            $link =  get_post_meta(get_the_ID(), 'link', true); ?>  

                    <div class="col-lg-4  work_item">
		                 <a href="<?php echo $link; ?>" class="link-novidades">
					<div class="box-jobs">
					        <div class="work_box">
								<div class="text-jobs">
                                <img src="<?php echo $img_banner[ 'guid' ]; ?>" />
                                     <h2><?php the_title() ?></h2>     
                                </div>
                                <div class="jobs-content">
									<?php the_content();?> 
                                </div>
                            </div>
    <div class="triangle">
	
	</div>
                    </div>
				        </a>
                    </div>
					
			<?php $i++;  endwhile; wp_reset_postdata(); endif; ?>
                </div>

            </div>

 <div class="clear"> </div>
	
	
<?php get_footer(); ?>