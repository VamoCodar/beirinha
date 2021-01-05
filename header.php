<!doctype html>
<html lang="pt-pt">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- FONT MONTSERRAT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- SLICK CSS CARROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
	
	
	<!-- swiper CSS CARROUSEL -->
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	
	<!-- Bootstrap CSS customizado -->
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/main-home.css">

	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/principal.css">

	<?php if ( is_product() ){ ?>
		<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/main-produtos.css">
	<?php }?>

	<?php if ( is_archive() ){ ?>
			<!-- slider -->
			<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/jsr.css">

			<!-- Bootstrap CSS customizado -->
			<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/main-categorias.css">
	<?php }	?>

	<?php if ( is_singular('post') ){ ?>
	<!-- CSS Receitas -->
		<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/main-receita-detalhe.css">
	<?php }?>


	

	<title>
		<?php
			if(!strrpos($_SERVER['REQUEST_URI'],'home')) 
				wp_title( '|', true, 'right' );
			// Add the blog name.
			bloginfo( 'name' );
			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";  
			$fb=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'list');
		?>
	</title>
	<?php wp_head(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
</head>

<body <?php body_class('menu-closed'); ?>>

<?php get_template_part( 'inc/header', 'block' ); ?>

<?php if( !is_front_page() ){  ?>
	<div class="space-menu"></div>
	<div class="container mt-5">
		<div class="row">
<?php } ?>
