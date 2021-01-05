<?php get_header(); ?>

 	
 	
		
		<!--START MEIO-->
		<div class="clear-mb"></div>	
		 <div class="back-button-p">  <p class="botao-back" onclick="history.back();">< <?php _e("VOLTAR","repono")?></p></div>
				<div class="produtos">
                    <div class="col-lg-12">
                        <div class="text-center mx-auto section-main-title">
                            <h1><span class="titleh"><?php _e("Artigos","repono")?></span></h1>
                        </div>
                    </div>
                </div>
                <div class="row mt-12 work-filter ">
				
				<?php
       
           
            if (have_posts()) : while (have_posts()) :the_post(); 
            $img = get_post_meta( $post->ID, 'imagem', true); ?>

                    <div class="col-lg-4  work_item">
                    <a href="<?php echo get_permalink();?>">
                    <div class="box-article">
          
          <img src="<?php echo $img[ 'guid' ]; ?>"/>

          <div class="content-article">
          <div class="date-article"><span><?php echo get_the_date( 'd - F - Y' ); ?><span></div>
          <div class="title-article"><?php echo get_the_title();?> </div>
          <?php the_content() ;?>
          </div>
           <div class="button-cart text-center article-bt">
               <small class="button-txt"> + </small> 
           </div>
           <div class="button-cart text-center article-bt sharebt">

               <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                   <path fill="#FFF" d="M11.842 8.18c-.99 0-1.864.489-2.41 1.232L6.707 8.049c.084-.277.143-.564.143-.868 0-.304-.06-.591-.143-.868L9.432 4.95c.546.744 1.42 1.233 2.41 1.233 1.652 0 2.995-1.344 2.995-2.996 0-1.651-1.343-2.995-2.995-2.995-1.652 0-2.995 1.344-2.995 2.995 0 .304.059.592.143.868L6.264 5.418c-.546-.743-1.419-1.232-2.41-1.232C2.203 4.186.86 5.529.86 7.18c0 1.652 1.344 2.995 2.996 2.995.99 0 1.863-.489 2.409-1.232l2.726 1.363c-.084.277-.143.564-.143.868 0 1.651 1.343 2.995 2.995 2.995 1.652 0 2.995-1.344 2.995-2.995 0-1.652-1.343-2.996-2.995-2.996zm0-6.99c1.101 0 1.997.897 1.997 1.997 0 1.101-.896 1.997-1.997 1.997s-1.997-.896-1.997-1.997c0-1.1.896-1.996 1.997-1.996zM3.855 9.179c-1.102 0-1.997-.896-1.997-1.997 0-1.1.895-1.997 1.997-1.997 1.1 0 1.996.896 1.996 1.997 0 1.1-.895 1.997-1.996 1.997zm7.987 3.994c-1.101 0-1.997-.896-1.997-1.997s.896-1.997 1.997-1.997 1.997.896 1.997 1.997c0 1.1-.896 1.997-1.997 1.997z"/>
               </svg>

           </div>
         </div>
         </a>
                    </div>
					
			<?php $i++;  endwhile; wp_reset_postdata(); endif; ?>
                </div>

         

 <div class="clear"> </div>
	
	
<?php get_footer(); ?>

