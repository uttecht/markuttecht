<?php
/* ------------------------------------- */
/* OPTION TREE INSTALL NOTICE */
/* ------------------------------------- */

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );
require_once( $path_to_wp.'/wp-includes/functions.php');

$template_url_first = get_template_directory_uri();

if(get_option('tb_webpaint_first_import')!="on"){
	//tb_webpaint_first_import_check();
}

function tb_webpaint_first_import_check(){
	global $template_url_first;
/*	update_option('tb_webpaint_first_import','on');

	update_option('tb_webpaint_theme_general_options',array("tb_webpaint_responsive_active" => "1", "tb_webpaint_main_style" => "light", "tb_webpaint_highlight_color" => "88D5C2", "tb_webpaint_highlight_hover_color" => "CD5465", "tb_webpaint_main_font" => "http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic", "tb_webpaint_main_fontfamily" => "font-family: 'Lato', sans-serif;", "tb_webpaint_favicon_icon" => $template_url_first."/style/images/favicon.png", "tb_webpaint_css" => "", "tb_webpaint_analytics" => ""));
	
	
	update_option('tb_webpaint_theme_header_options',array("tb_webpaint_header_logo" => $template_url_first."/style/images/logo.png", "tb_webpaint_header_logo_responsive" => $template_url_first."/style/images/logo@2x.png"));
	
	
	update_option('tb_webpaint_theme_body_options',array("tb_webpaint_body_background_image" => $template_url_first."/style/bg/bg7.jpg"));
	
	
	update_option('tb_webpaint_theme_footer_options',array("tb_webpaint_footer" => "1", "tb_webpaint_subfooter" => "1"));
	
	update_option('tb_webpaint_theme_sidebar_options',array("sidebar_builder_name-0" => "Blog Sidebar", "sidebar_builder_slug-0" => "sidebar_508e8d92f34d8", "sidebar_builder_name-1" => "Page Sidebar", "sidebar_builder_slug-1" => "sidebar_1351519948", "sidebar_builder_name-2" => "Contact Sidebar", "sidebar_builder_slug-2" => "sidebar_1359577781"));
	
	
	update_option('tb_webpaint_theme_update_options',array("tb_webpaint_update_user" => "", "tb_webpaint_update_api" => ""));*/
}
?>