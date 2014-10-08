<?php 
	//Theme Options	
		$themeoptions = get_option("tb_webpaint_theme_update_options");

	//Call Update Functions
		if(isset($themeoptions["tb_webpaint_updates_active"])){ add_action('admin_init', 'init_updater'); }
	
	function init_updater()
	{
	    // include the library
	    include_once(T_FUNCTIONS.'/envato-wordpress-toolkit-library/class-envato-wordpress-theme-upgrader.php');
	    $themeoptions = get_option("tb_webpaint_theme_update_options");
	    $upgrader = new Envato_WordPress_Theme_Upgrader( $themeoptions["tb_webpaint_update_user"], $themeoptions["tb_webpaint_update_api"] );
	    $upgrader->check_for_theme_update(); 
	    $upgrader->upgrade_theme();
	}
?>