<?php get_header('404'); ?>





	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Oops!</h1>
				<h2><?php _e("404 - A página não foi encontrada","freixianda")?></h2>
			</div>
			<a href="<?php echo get_bloginfo('url') ?>"><?php _e("Ir para a Home","freixianda")?></a>
		</div>
	</div>


<?php get_footer(); ?>