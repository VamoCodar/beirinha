<?php
/**
 * Header functions
 *
 * @package celeuma
 */


/**
 * Site branding
 */


/**
 * Main navigation
 */

function celeuma_main_navigation() {
	?>



		<?php $show_menu_additions = get_theme_mod( 'celeuma_show_menu_additions', 1 ); ?>
		<?php if ( $show_menu_additions ) : ?>
		<ul class="nav-link-right">
			<li class="nav-link-account">

				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					<?php if ( is_user_logged_in() ) { ?>
						<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="Account"><span class="prefix">

						<svg xmlns="http://www.w3.org/2000/svg" width="13" height="16" viewBox="0 0 13 16">
							<g fill="#FFF">
								<path d="M5.822 6.758c-1.784 0-3.235-1.516-3.235-3.379S4.038 0 5.822 0C7.605 0 9.056 1.516 9.056 3.38s-1.45 3.379-3.234 3.379zm0-5.744c-1.248 0-2.264 1.06-2.264 2.365 0 1.304 1.016 2.365 2.264 2.365 1.248 0 2.264-1.06 2.264-2.365 0-1.304-1.016-2.365-2.264-2.365zM11.159 14.19H.485c-.268 0-.485-.226-.485-.506v-2.365c0-1.77 1.378-3.21 3.073-3.21H8.57c1.694 0 3.073 1.44 3.073 3.21v2.365c0 .28-.217.507-.485.507zM.97 13.178h9.704V11.32c0-1.211-.944-2.196-2.103-2.196H3.073c-1.16 0-2.103.985-2.103 2.196v1.858z" transform="translate(.485 .956)"/>
							</g>
						</svg>

						</span> <span class="suffix ion-person"></span></a>
					<?php } 
				else { ?>

					<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="Login"><span class="prefix">

						<svg xmlns="http://www.w3.org/2000/svg" width="13" height="16" viewBox="0 0 13 16">
							<g fill="#FFF">
								<path d="M5.822 6.758c-1.784 0-3.235-1.516-3.235-3.379S4.038 0 5.822 0C7.605 0 9.056 1.516 9.056 3.38s-1.45 3.379-3.234 3.379zm0-5.744c-1.248 0-2.264 1.06-2.264 2.365 0 1.304 1.016 2.365 2.264 2.365 1.248 0 2.264-1.06 2.264-2.365 0-1.304-1.016-2.365-2.264-2.365zM11.159 14.19H.485c-.268 0-.485-.226-.485-.506v-2.365c0-1.77 1.378-3.21 3.073-3.21H8.57c1.694 0 3.073 1.44 3.073 3.21v2.365c0 .28-.217.507-.485.507zM.97 13.178h9.704V11.32c0-1.211-.944-2.196-2.103-2.196H3.073c-1.16 0-2.103.985-2.103 2.196v1.858z" transform="translate(.485 .956)"/>
							</g>
						</svg>
					
					</span> <span class="suffix ion-person"></span></a>
				<?php } ?>

				<?php else : ?>
					<a href="<?php echo esc_url( wp_login_url() ); ?>" title="Login"><span class="prefix"><?php esc_html_e( 'Login / Register', 'celeuma' ); ?></span> <span class="suffix ion-person"></span></a>
				<?php endif; ?>
			</li>

			<?php if ( class_exists( 'Woocommerce' ) ) : ?>

			<?php $cart_content = WC()->cart->cart_contents_count; ?>

			<li class="nav-link-cart">

			<!--<span class="cart-count">(<?php echo intval($cart_content); ?>)</span>-->
				<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header-cart-link">

				<svg xmlns="http://www.w3.org/2000/svg" width="13" height="16" viewBox="0 0 13 16">
					<path fill="#FFF" stroke="#FFF" stroke-width=".3" d="M11.134 15.754H2.36c-.779 0-1.392-.651-1.323-1.406l.809-8.917c.06-.672.63-1.179 1.323-1.179h.821V2.928C3.99 1.449 5.227.246 6.747.246S9.505 1.45 9.505 2.928v1.324h1.349c.147 0 .266.116.266.259 0 .143-.12.258-.266.258h-1.35v1.163c0 .143-.118.259-.265.259-.147 0-.266-.116-.266-.259V4.77h-5.02c-.147 0-.266-.115-.266-.258 0-.143.119-.259.265-.259h5.021V2.928c0-1.194-.998-2.165-2.226-2.165-1.227 0-2.225.971-2.225 2.165v3.004c0 .143-.12.259-.266.259-.147 0-.266-.116-.266-.259V4.77h-.82c-.417 0-.758.304-.795.707l-.809 8.917c-.041.455.326.844.794.844h8.774c.47 0 .836-.39.795-.844l-.81-8.917c-.012-.142.096-.267.242-.28.146-.012.275.093.288.235l.81 8.917c.068.755-.545 1.406-1.325 1.406z"/>
				</svg>

				</a>

				<div class="sub-menu cart-mini-wrapper">
					<div class="cart-mini-wrapper__inner">
					<?php woocommerce_mini_cart(); ?>
					</div>
				</div>

			</li>
			<?php endif; //end Woocommerce class_exists check ?>
			


		</ul>
		<?php endif; ?>

	<?php
}
add_action( 'celeuma_inside_header', 'celeuma_main_navigation', 9 );

/**
 * Mobile menu
 */
function celeuma_mobile_menu() {
	?>
	<div class="mobile-menu">
		<div class="container-full">
			<div class="mobile-menu__search">
				
				<?php get_search_form(); ?>

			</div><!-- /.mobile-menu__search -->

			<nav class="mobile-menu__navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
			</nav><!-- /.mobile-menu__navigation -->
		</div>
	</div><!-- /.mobile-menu -->
	<?php
}
add_action( 'celeuma_before_page', 'celeuma_mobile_menu' );

/**
 * Banner for pages and shop archives
 */
function celeuma_page_banner() {
	
	if ( is_home() || is_front_page() || is_page_template( 'page-templates/template_page-builder.php') ) {
		return;
	}

	$wc_check = class_exists( 'WooCommerce' );

	if ( $wc_check && is_shop() ) {	
		$hero = get_the_post_thumbnail_url( get_option( 'woocommerce_shop_page_id' ) );
	} elseif ( $wc_check &&  ( is_product_category() || is_product_tag() ) ) {
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $hero = wp_get_attachment_url( $thumbnail_id );
	} elseif ( is_page() ) {
		global $post;
		$hero = get_the_post_thumbnail_url( $post->ID );
	} else {
		return;
	}

	if ( $hero != '' ) {
		$has_background = 'has-background';
	} else {
		$has_background = '';
	}

	?>
	<div class="page-header text-center">
		<div class="container">
			<?php if ( class_exists( 'WooCommerce' ) && is_woocommerce() ) : ?>
			<div class="page-breadcrumbs">
				<nav class="breadcrumbs">
					<?php woocommerce_breadcrumb(); ?>
				</nav>
			</div>
			<?php endif; ?>
			<?php if ( is_home() ) : ?>
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			<?php elseif ( is_page() ) : ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php elseif ( class_exists( 'Woocommerce') && is_woocommerce() ) : ?>
				<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
			<?php endif; ?>
		</div>
	</div>		
	<?php
}
add_action( 'celeuma_after_header', 'celeuma_page_banner' );

/**
 * Page header for archives
 */
function celeuma_archives_header() {

	if ( ( !is_home() && !is_archive() ) || is_front_page() || ( class_exists( 'WooCommerce' ) && is_woocommerce() ) ) {
		return;
	}

	?>
	<div class="page-header text-center">
		<div class="container">
		<?php if ( is_archive() ) : ?>
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php elseif ( is_home() ) : ?>
			<h1 class="entry-title"><?php single_post_title(); ?></h1>
		<?php endif; ?>		
		</div>
	</div><!-- /.page-header -->

	<?php
}
add_action( 'celeuma_after_header', 'celeuma_archives_header', 11 );


/**
 * Slider defaults
 */
function celeuma_slider_defaults() {
	$defaults = array(
		array(
			'slider_image' 			=> get_stylesheet_directory_uri() . '/images/1.jpeg',
			'slider_text'			=> __( 'Welcome to our site', 'celeuma'),
			'slider_smalltext'		=> __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'celeuma'),
			'slider_button_link'	=> '#primary',
			'slider_button_text'	=> __( 'I am ready', 'celeuma'),
		),
		array(
			'slider_image' 			=> get_stylesheet_directory_uri() . '/images/2.jpg',
			'slider_text'			=> __( 'Welcome to our site', 'celeuma'),
			'slider_smalltext'		=> __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'celeuma'),
			'slider_button_link'	=> '#primary',
			'slider_button_text'	=> __( 'I am ready', 'celeuma'),	
		),			
	);
	return $defaults;
}

/**
 * Hero area for the homepage
 */
function celeuma_hero_slider() {

	if ( !is_front_page() ) {
		return;
	} ?>

	
<?php }
add_action( 'celeuma_after_header', 'celeuma_hero_slider' );
