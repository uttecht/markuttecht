<!DOCTYPE HTML>
<?php
	//Basic Info
		global $wp_query;
	    $content_array = $wp_query->get_queried_object();
		if(isset($content_array->ID)){
	    	$post_id = $content_array->ID;
		}
		else $post_id=0;
		
		$template_uri = get_template_directory_uri();
	
	//Theme Options
		$themeoptions = getThemeOptions();

	//Page Options
		$pageoptions = getOptions($post_id);
	
	//Layout
		$layout = get_theme_mod( 'tb_webpaint_layout','full');
		$responsive = get_theme_mod( 'tb_webpaint_responsive','yes'); 
		
?>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<?php if($responsive=="yes"){ ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php } ?>
<meta http-equiv="Content-Type" content="<?php echo get_bloginfo('html_type'); ?>; charset=<?php echo get_bloginfo('charset'); ?>" />
<meta name="robots" content="index, follow" />
<!--meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" /-->
<!--meta http-equiv="X-UA-Compatible" content="IE=edge" /-->
<title><?php echo wp_title(" &raquo; ",1,'right'); ?><?php echo get_bloginfo('name'); ?></title>
<?php
		//Customizer Options
		$themeoptions["tb_webpaint_header_logo"] = get_theme_mod( 'tb_webpaint_head-logo','');
?>
<?php wp_head(); ?>
</head>
<body <?php body_class( $layout."-layout" ); ?>>
<?php echo returnCustomizerCSS(); ?>
<style id="customizercss"></style>
<!-- Begin Body Wrapper -->
<div class="body-wrapper"> 
  <!-- Begin Top Wrapper -->
  <div class="top-wrapper">
    <header>
      <div class="inner">
      	<?php if (is_page() && basename(get_page_template())=="one_page.php"){ ?>
        	<?php if (!empty($themeoptions["tb_webpaint_header_logo"])) { ?><div class="logo scroll"><a href="#home"><img src="<?php echo $themeoptions["tb_webpaint_head-logo"];?>" alt="" /></a> </div><?php } ?>
        <?php } else { ?>
        	<?php if (!empty($themeoptions["tb_webpaint_header_logo"])) { ?><div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo $themeoptions["tb_webpaint_head-logo"];?>" alt="" /></a> </div><?php } ?>
        <?php } ?>
      <nav>
	    <!-- Begin Menu -->
	    <div class="menu" id="menu">
	    <?php 
	    if (!is_page() || (is_page() && basename(get_page_template())!="one_page.php")){
			    $defaults = array(
					'theme_location'  => 'navigation',
					'container'       => '', 
					'container_class' => '', 
					'container_id'    => '',
					'menu_class'      => '', 
					'menu_id'    	  => 'tiny',
					'fallback_cb'     => 'wp_page_menu'
				);
		}
		else{
			if(isset($pageoptions["tb_webpaint_onepage_menu"])) {
				add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
				function your_custom_menu_item ( $items, $args ) {
				    $items = '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="#home" class="current">'.__("Home","tb_webpaint").'</a></li>'.$items;
				   return $items;
				}

			
				$defaults = array(
				'menu'  => $pageoptions["tb_webpaint_onepage_menu"],
				'container'       => '', 
				'container_class' => '', 
				'container_id'    => '',
				'menu_class'      => '', 
				'menu_id'    	  => 'tiny',
				'fallback_cb'     => 'wp_page_menu',
				'walker' => new description_walker()
			);}
			else $defaults ="";
		}
		wp_nav_menu( $defaults ); ?>
	    </div>
	    <!-- End Menu -->
	  </nav>
        <!-- End Menu -->
        <div class="clear"></div>
        <?php
        	if (is_page() && basename(get_page_template())=="one_page.php"){?>	
        	<div class="resp-navigator reversefadeitem"><i class="icon-menu-1"></i></div>
        <?php }
        ?>
      </div>
    </header>
  </div>
  <!-- End Top Wrapper --> 