<?php

$templatepath = get_template_directory();

define('T_FUNCTIONS', $templatepath . '/functions/');
define('T_THEME', get_template_directory_uri());
define('T_JS', get_template_directory_uri() . '/style/js');
define('T_CSS', get_template_directory_uri() . '/style/css');
define('T_TYPE', get_template_directory_uri() . '/style/type');

/* Admin Functionality */

if (is_admin()){
	require_once(T_FUNCTIONS . '/theme_firstinstall.php');
	require_once(T_FUNCTIONS . '/page_options/theme_page_options.php');
	require_once(T_FUNCTIONS . '/theme_options/theme_settings.php');
	require_once(T_FUNCTIONS . '/thundercodes/thundercodes.php');
	require_once(T_FUNCTIONS . '/thundercodes/thundercolumns.php');
	require_once(T_FUNCTIONS . '/thundercodes/thundericons.php');
	require_once(T_FUNCTIONS . '/theme_featured_image_preview.php');
	require_once T_FUNCTIONS . '/theme_plugins.php';
	require_once(T_FUNCTIONS . '/theme_startmessage.php');
//	require_once(T_FUNCTIONS . '/theme_update.php');

}

/* Theme Functionality */
require_once(T_FUNCTIONS . '/theme_functions.php');
require_once(T_FUNCTIONS . '/theme_pagination.php');
require_once(T_FUNCTIONS . '/theme_options/theme_customizer.php');

/* JavaScripts, Widgets, Sidebars, Shortcodes */
require_once(T_FUNCTIONS . '/theme_javascriptcss.php');
require_once(T_FUNCTIONS . '/theme_widgets.php');
require_once(T_FUNCTIONS . '/theme_sidebars.php');
require_once(T_FUNCTIONS . '/theme_shortcodes.php');

/* Post Comments, Custom Post Types */
require_once(T_FUNCTIONS . '/theme_post_comments.php');
require_once(T_FUNCTIONS . '/theme_post_customtypes.php');

/* Theme Language */
require_once(T_FUNCTIONS . '/theme_language.php');

function load_media_box(){
    if(function_exists(wp_enqueue_media())) wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'load_media_box');
?>