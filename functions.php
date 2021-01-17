<?php
/**

 *
 * @package Celeuma
 */

if ( ! function_exists( 'celeuma_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function celeuma_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on celeuma, use a find and replace
	 * to change 'celeuma' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'celeuma', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support('align-wide');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'celeuma-large-thumb', 780 );
	add_image_size( 'celeuma-medium-thumb', 400 );



	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'celeuma_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	add_theme_support( 'woocommerce', array(
	'thumbnail_image_width' => 255,
	'single_imagem_width' => 255,
	'product_grid' => array(
		'defautlt_rows' => 10,
		'min_rows' => 5,
		'max_rows' => 10,
		'default_colums' => 1,
		'min_colums' => 1,
		'max_colums' => 1,
		)

	) );

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

}
endif;


add_action('wp_head', 'myplugin_ajaxurl');

function myplugin_ajaxurl() {

   echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}


function get_data() {
		
	global $woocommerce;
	// get total de items do carrinho
	$totalItems = $woocommerce->cart->cart_contents_count;

	echo intval($totalItems);
}

add_action( 'wp_ajax_nopriv_get_data', 'get_data' );
add_action( 'wp_ajax_get_data', 'get_data' );


add_action( 'after_setup_theme', 'celeuma_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

function celeuma_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'celeuma_content_width', 640 );
}
add_action( 'after_setup_theme', 'celeuma_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function celeuma_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'celeuma' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'celeuma' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


}
add_action( 'widgets_init', 'celeuma_widgets_init' );


/* BEIRINHA */


add_filter( 'woocommerce_breadcrumb_defaults', 'wps_breadcrumb_delimiter' );
function wps_breadcrumb_delimiter( $defaults ) {
  $defaults['delimiter'] = ' | ';
  return $defaults;
}

function getProdutosCarrossel($categoria = '', $quantidade, $idsRelacionados = [], $div){

		
		if($categoria == 'Rand'){
			$args = array(
				'post_type' => array('product'),
				'orderby' => 'rand', 
				'posts_per_page' => $quantidade,
				'post_status' => 'publish'
			);
		}else{
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $quantidade,
				'product_cat'    => $categoria,
				'post__in'       => $idsRelacionados
			);
		}

		if($categoria == 'Relacionados'){
			$idsRelacionados = get_field('produtos_relacionados');

			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $quantidade,
				'post__in'       => $idsRelacionados
			);

		}


		$loop = new WP_Query( $args );
		$i = 0;
		while ( $loop->have_posts() ) : $loop->the_post();
			global $product;    
			
		?>

		<div class="<?php echo $div; ?> beirinha-cart-add swiper-slide">
			<a href="<?php echo get_permalink();?>">
				<h2><?php echo get_the_title();?></h2>
			</a>
			<span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) );?>">
				<?php echo $product->get_price_html(); ?>
			</span>
			<a href="<?php echo get_permalink();?>"><?php echo woocommerce_get_product_thumbnail();?></a>
			<i class="mais"></i>
			<i class="menos"></i>
			<input type="hidden" class="qty" name="qty" value="1" max="99" min="1" step="1">
			<input type="hidden" value="<?php echo the_ID();?>" name="product_id">
			<input type="hidden" value="<?php echo the_ID();?>" name="variation_id">
			<div class="circulo-verde row add-cart"><a class="add-cart">Comprar</a><i class="badge"></i></div>
			<div class="row">
				<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
			</div>
		</div>
							
			
<?php   $i++;  endwhile; wp_reset_query(); 

} 


function getProdutosCarrosselRandom($categoria = '', $quantidade, $idsRelacionados = [], $div){

	$args = array(
		'post_type'      => 'product',
		'posts_per_page' => $quantidade,
		'product_cat'    => $categoria,
		'post__in'       => $idsRelacionados
	);

	$loop = new WP_Query( $args );
	$i = 0;
	while ( $loop->have_posts() ) : $loop->the_post();
		global $product;    
		
	?>


		<div class="slick-card beirinha-cart-add">
			<a href="<?php echo get_permalink();?>">
				<h2><?php echo get_the_title();?></h2>
			</a>
			<span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) );?>">
				<?php echo $product->get_price_html(); ?>
			</span>
			<a href="<?php echo get_permalink();?>"><?php echo woocommerce_get_product_thumbnail();?></a>
			<i class="mais"></i>
			<i class="menos"></i>
			<input type="hidden" class="qty" name="qty" value="1" max="99" min="1" step="1">
			<input type="hidden" value="<?php echo the_ID();?>" name="product_id">
			<input type="hidden" value="<?php echo the_ID();?>" name="variation_id">
			<div class="circulo-verde row add-cart"><a class="add-cart">Comprar</a><i class="badge"></i></div>
			<div class="row">
			<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
			</div>
		</div>

		
<?php   $i++;  endwhile; wp_reset_query(); 

} 
			

function categoriasDeProduto(){
?>

<ul id="menu-footer" class="pd0">	
	<?php 							
		$taxonomy     = 'product_cat';
		$orderby      = 'name';  
		$show_count   = 0;      // 1 for yes, 0 for no
		$pad_counts   = 0;      // 1 for yes, 0 for no
		$hierarchical = 1;      // 1 for yes, 0 for no  
		$title        = '';  
		$empty        = 0;
		$args = array(
			'taxonomy'     => $taxonomy,
			'orderby'      => $orderby,
			'show_count'   => $show_count,
			'pad_counts'   => $pad_counts,
			'hierarchical' => $hierarchical,
			'title_li'     => $title,
			'hide_empty'   => $empty     
		);
		$i = 1;     
									
		$product_categories = get_categories($args);
		foreach( $product_categories as $cat ) { 
		if($cat->category_parent == 0) {
		$number2 = $i++; 
		$slug = $cat->slug;
		?>

		<a href="<?php bloginfo('wpurl'); ?>/categoria-produto/<?php echo $slug; ?>" >
		<div class="cats-footer">

			<h3 class="cat-title-footer"> <?php echo $cat->name; ?> <h3>
			
		</div>
		</a>

	<?php }} ?>
								
</ul>
<?php
}



add_action('wp_ajax_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart'); 

add_action('wp_ajax_nopriv_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart');          

function ql_woocommerce_ajax_add_to_cart() {

    $product_id = apply_filters('ql_woocommerce_add_to_cart_product_id', absint($_POST['product_id']));

    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);

    $variation_id = absint($_POST['variation_id']);

    $passed_validation = apply_filters('ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity);

    $product_status = get_post_status($product_id); 

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) { 

        do_action('ql_woocommerce_ajax_added_to_cart', $product_id);

            if ('yes' === get_option('ql_woocommerce_cart_redirect_after_add')) {

                wc_add_to_cart_message(array($product_id => $quantity), true); 

            }

            WC_AJAX :: get_refreshed_fragments(); 

            } else { 

                $data = array(

                    'error' => true,

                    'product_url' => apply_filters('ql_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

                echo wp_send_json($data);

            }

            wp_die();

}











/**
 * Bootstrap
 */
/*
function celeuma_enqueue_bootstrap() { 
	if(strrpos($_SERVER['REQUEST_URI'],'finalizar-compra') || strrpos($_SERVER['REQUEST_URI'],'minha-conta')) { 
	   wp_enqueue_style( 'celeuma-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap2.min.css', array(), true );
	   } else{ 
	   wp_enqueue_style( 'celeuma-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), true );
	   
	} 
   
   
   
}
add_action( 'wp_enqueue_scripts', 'celeuma_enqueue_bootstrap', 9 );
*/

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
//require get_template_directory() . '/inc/header-functions.php';



/**
 * Override theme default specification for product # per row
 */
function loop_columns() {
	return 5; // 3 products per row
	}
	add_filter('loop_shop_columns', 'loop_columns', 999);

#########################################

include dirname(__FILE__)."/admin.php";
add_theme_support( 'post-thumbnails' );
add_image_size( 'list', 605, 335, true );
add_image_size( 'home', 805, 303, true );

  

function get_mintextr($mensagem,$tamanho){
	$mensagem=strip_tags ($mensagem);
    if(strlen($mensagem)>$tamanho){
        $mensagem=  mb_substr($mensagem,0,$tamanho);
        return $mensagem."...";                     
    }
    else
        return $mensagem;
}


function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}


function get_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}				
}





// tn Limit Excerpt Length by number of Words
function excerpt( $limit ) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
	} else {
	$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
	}
	function content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
	array_pop($content);
	$content = implode(" ",$content).'...';
	} else {
	$content = implode(" ",$content);
	}
	$content = preg_replace('/[.+]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
	}
	
	function custom_file_download($url, $type = 'xml'){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    /* Optional: Set headers...
    *    $headers = array();
    *    $headers[] = "Accept-Language: de";
    *    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    */
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
            exit('Error:' . curl_error($ch));
    }
    curl_close ($ch);
    $uploads = wp_upload_dir();
    $filename = $uploads['basedir'] . '/' . strtok(basename($url), "?") . '.' . $type;
    if (file_exists($filename)){
            @unlink($filename);
    }
    /* Optional: Change delimiters for CSV
    *
    *    $result = str_replace("!#", "|", $result);
    *    
    */
    file_put_contents($filename, $result);
    return str_replace($uploads['basedir'], $uploads['baseurl'], $filename);
}



/*Langs*/

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
/*function langlist()
{
    echo "<div class='clang'>";
    if (qtranxf_getLanguage() == 'pt') {
        echo "<div class='clangimgpt'>   <p>PT</p>  <ul class='menuflags3'> <span class='plus'> + </span> <li class='olangs'>  <div class='clangimg'><a  href='" . qtranxf_convertURL($actual_link, 'en', false, true) . "'>EN</a></div>  </li></ul></div>";
    } 
	else if (qtranxf_getLanguage() == 'en') {
        echo "<div class='clangimgpt'>  <p>EN</p> <ul class='menuflags3'> <span class='plus'> + </span> <li class='olangs'>  <div class='clangimg'><a  href='" . qtranxf_convertURL($actual_link, 'pt', false, true) . "'>PT</a></div>  </li></ul></div>";
    } 

	
    echo '</div>';
}
*/

