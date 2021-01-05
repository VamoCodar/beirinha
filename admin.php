<?php 
function custom_colors() {
   echo '<style type="text/css">
          
            #wp-admin-bar-wp-logo{display:none}
            #wp-admin-bar-comments{display:none}
            #wp-admin-bar-new-content{display:none}
         </style>';
}
add_action('admin_head', 'custom_colors');
function remove_dashboard_meta() {
        remove_action('welcome_panel', 'wp_welcome_panel');
        remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel' );
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');	
        
}
add_action( 'admin_init', 'remove_dashboard_meta' );

function add_custom_dashboard_widgets() {
 
    wp_add_dashboard_widget(
                 'wpexplorer_dashboard_widget', // Widget slug.
                 'Bem-Vindo', // Title.
                 'custom_dashboard_widget_content' // Display function.
        );
}

add_action( 'wp_dashboard_setup', 'add_custom_dashboard_widgets' );

/**
 * Create the function to output the contents of your Dashboard Widget.
 */

function custom_dashboard_widget_content() {
    // Display whatever it is you want to show.
    echo "Caso necessite de ajuda contacte <a href='mailto:web@celeuma.pt'>web@celeuma.pt</a>";
}

/**
 * Plugin Name: Pre-select post specific attachments
 */
add_action( 'admin_footer-post-new.php', 'wpse_76048_script' );
add_action( 'admin_footer-post.php', 'wpse_76048_script' );
add_action('admin_footer-edit.php', 'wpse_76048_script'); 
function wpse_76048_script()
{
    ?>
<script>
jQuery(function($) {
    var called = 0;
    $('#wpcontent').ajaxStop(function() {
        if ( 0 == called ) {
            $('[value="uploaded"]').attr( 'selected', true ).parent().trigger('change');
            called = 1;
        }
    });
});
</script>
    <?php
}

function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/celeuma.png);            
        }
        body.login h1 a{width:auto;background-size:auto;}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return "https://celeuma.pt";
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Celeuma';
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );

function remove_footer_admin () {
echo 'Powered by <a href="http://www.celeuma.pt" target="_blank">Celeuma</a></p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

function my_footer_shh() {
    remove_filter( 'update_footer', 'core_update_footer' ); 
    remove_action( 'admin_notices', 'update_nag', 3 );

}

add_action( 'admin_menu', 'my_footer_shh' );



function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}