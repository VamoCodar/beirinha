<?php 
get_header();
?>
<div class="clear"></div>
<div id="content" class="site-content">
<div class="clear"></div>

  <div class="page">
  
  <h1> <?php the_title() ?> </h1>

      <div class=" clearfix">   

          <div class="row">            

              <div id="primary" class="content-area col-md-12">
                <main id="main" class="site-main" role="main">               

                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                            the_content();
                            endwhile; else: ?>
                        <?php endif; ?>
         
                </main></div>
        </div>
      </div>
  </div>
</div>


<?php get_footer(); ?>