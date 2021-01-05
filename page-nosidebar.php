<?php
/*
Template Name: No Sidebar
*/
?>

<?php 
get_header(); 
?>
<div class="clear-mb"></div>	
<div class="back-button-p">  <p class="botao-back" onclick="history.back();">< <?php _e("VOLTAR","repono")?></p></div>
          <div class="row">
              


              <div id="primary" class="content-area col-md-12">
                <main id="main" class="site-main" role="main">
                  

                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                            the_content();
                            endwhile; else: ?>
                        <?php endif; ?>

          
                
                </main></div>
        </div>
 






 <script src="<?php bloginfo( 'template_url' ); ?>/js/owl.carousel.js"></script>
<script type="text/javascript">
   
</script>
<?php get_footer(); ?>
