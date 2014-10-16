<?php 

//////////////////////////////////////////////////////////////////////////
///              Função mostra no rodapé qual pagina vc está          ///
////////////////////////////////////////////////////////////////////////  

add_action('admin_bar_menu', 'show_template');
function show_template() { 
global $template;
print_r($template);
}



//////////////////////////////////////////////////////////////////////////
///        FUNCAO VERIFICA LOGIN                                    /////
////////////////////////////////////////////////////////////////////////

function verifica_login()
{
	if( ! is_user_logged_in() )
	wp_redirect( get_bloginfo('siteurl').'/wp-login.php' );
}
//add_action( 'get_header', 'verifica_login' );



//////////////////////////////////////////////////////////////////////////
///        DECLARANDO SUPORTE "IMAGEM DESTACADA"                    /////
////////////////////////////////////////////////////////////////////////

	//indica que temos suporte aos 03 tamanhos dos thumbs.
	add_theme_support( 'post-thumbnails' );

		
	
//////////////////////////////////////////////////////////////////////////
///        FUNCAO PARA LIMITAR OS CARACTERES                        /////
////////////////////////////////////////////////////////////////////////

	function custom_excerpt_length($lenght){
		// O numero de caracteres
		return 10;
	}
	add_filter('excerpt_length', 'custom_excerpt_length');

//////////////////////////////////////////////////////////////////////////
///        Inserindo a imagem de destaque para o FEED               /////
////////////////////////////////////////////////////////////////////////
	
add_filter('the_content_feed', 'rss_post_thumbnail');
function rss_post_thumbnail($content) {
	global $post;
	if( has_post_thumbnail($post->ID) )
		$content = '<p>' . get_the_post_thumbnail($post->ID, 'thumbnail') . '</p>' . $content;
	return $content;
}


//////////////////////////////////////////////////////////////////////////
///        FUNCAO PARA TROCAR BACKGROUND                            /////
////////////////////////////////////////////////////////////////////////

	add_theme_support('custom-background');
	$defaults = array(
		'default-color' => '',
		'default-image' => '',
		'wp-head-callback' => '_custom_background_cb',
		'admin-head-callback' => '',
		'admin-preview-callback' => ''
	);
	add_theme_support('custom-background', $defaults);
	
//////////////////////////////////////////////////////////////////////////
///        FUNCAO HEADER, PARA TROCAR O LOGOTIPO 					/////
////////////////////////////////////////////////////////////////////////	
	
	add_theme_support( 'custom-header' );
	$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );

//////////////////////////////////////////////////////////////////////////
///        FUNCAO REMOVER AVISOS DE UPDATE                          /////
////////////////////////////////////////////////////////////////////////
// REMOVE THE WORDPRESS UPDATE NOTIFICATION FOR ALL USERS EXCEPT SYSADMIN
       global $user_login;
       get_currentuserinfo();
       if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins
        add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
        add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}


//////////////////////////////////////////////////////////////////////////
///        FUNCAO ADICIONAR GOOGLE ANAYTICS                         /////
////////////////////////////////////////////////////////////////////////
// add google analytics to footer
function add_google_analytics() {
	echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');



//////////////////////////////////////////////////////////////////////////
///        FUNCAO ALTERA LOGO E COR DO BACKGROUND DO ADMIN /////
////////////////////////////////////////////////////////////////////////
function custom_login_logo() {
	//Altera o logo
	echo '<style type="text/css">
	h1 a { background-image: url('.get_bloginfo('template_directory').'/img/logo_admin.png) !important; }
	</style>';
	
	//Altera a Cor do Background
	echo '<style type="text/css">
	body { background-color: #ccc !important; }
	</style>';
	
	//Altera a Imagem do Background
	echo '<style type="text/css">
	body { background-image: url('.get_bloginfo('template_directory').'/img/bg_layout.jpg) !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');
