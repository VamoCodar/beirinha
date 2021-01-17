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

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/flexslider.css" type="text/css" media="screen" />

	<!-- Bootstrap CSS customizado -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main-home.css">

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/principal.css">

	<?php if (is_product()) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main-produtos.css">
	<?php } ?>

	<?php if (is_archive() || is_search()) {
		
				if( is_product_category() ) {
					?>
				<!-- slider -->
				<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jsr.css">

				<!-- Bootstrap CSS customizado -->
				<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main-categorias.css">
				<?php
				}else{
				?>
					<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main-receitas.css">
				<?php }
		
	 		}?>


	<?php if (is_singular('post')) { ?>
		<!-- CSS Receitas -->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main-receita-detalhe.css">
	<?php } ?>
	<?php if (is_page_template('page-sobre-nos.php')) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main-sobre.css">
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
		<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
	<?php } ?>
	<?php if (is_page_template(array('default'))) {

		if (!is_product()) {

			if (!is_cart()) {

	?>
				<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main-sobre.css">
	<?php }
		}
	} ?>
	<?php if (is_page() && !is_page_template()) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main-receitas.css">
	<?php } ?>

	<?php if (is_page_template('page-receitas.php')) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main-receitas.css">
	<?php } ?>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- javascript -->

	<title>
		<?php
		if (!strrpos($_SERVER['REQUEST_URI'], 'home'))
			wp_title('|', true, 'right');
		// Add the blog name.
		bloginfo('name');
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page()))
			echo " | $site_description";
		$fb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'list');
		?>
	</title>
	<?php wp_head(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>

<body <?php body_class('menu-closed'); ?>>

	<!-- Load Facebook SDK for JavaScript -->

	<div id="fb-root"></div>
	<!-- Your Chat Plugin code -->
	<div class="fb-customerchat" attribution=install_email page_id="114930543762393" theme_color="#ff7e29" logged_in_greeting="Olá! Como podemos ajudar?" logged_out_greeting="Olá! Como podemos ajudar?">
	</div>


	<?php get_template_part('inc/header', 'block'); ?>

	<?php if (!is_front_page()) {  ?>
		<div class="space-menu"></div>
		<div class="container mt-5">
			<div class="row">
			<?php } ?>