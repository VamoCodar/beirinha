
<?php 
/*
Template Name: About
*/
get_header(); 
?>

<div class="back-button-p">  <p class="botao-back" onclick="history.back();">< <?php _e("VOLTAR","garrafeira")?></p></div>


<div class="page">
<h1> <?php the_title() ?> </h1>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                            the_content();
                            endwhile; else: ?>
                        <?php endif; ?>

</div>
</div>
</div>

<div class="about-banner text-center"> <?php $image_about = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
echo '<img src="' .$image_about; ?> "/>

	<div class="pwidth text-top-banner text-light">


	</div>
	


</div>


 <script src="<?php bloginfo( 'template_url' ); ?>/js/owl.carousel.js"></script>
<script type="text/javascript">
   
</script>
<?php get_footer(); ?>