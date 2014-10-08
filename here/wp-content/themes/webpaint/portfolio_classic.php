<?php
/*
Template Name: Portfolio Classic
*/

	//Post ID
		global $wp_query;
	    $content_array = $wp_query->get_queried_object();
		if(isset($content_array->ID)){
	    	$post_id = $content_array->ID;
		}
		else $post_id=0;

	$template_uri = get_template_directory_uri();

	//Page Options
		$pageoptions = getOptions();	

	//Theme Options	
		$themeoptions = getThemeOptions(); 

	//Page Head Area
		if(isset($pageoptions['tb_webpaint_activate_page_title'])){ 
			$headline = false;
		} 
		else {
			$headline = true;
		}
		
	//Portfolio Categories 
		$categories = empty($pageoptions["tb_webpaint_portfolio_categories"]) ? "" : implode(",", $pageoptions["tb_webpaint_portfolio_categories"]);

	//Portfolio Page Content
		$pageoptions["tb_webpaint_portfolio_content_display"] = isset($pageoptions["tb_webpaint_portfolio_content_display"]) ? $pageoptions["tb_webpaint_portfolio_content_display"] : "above";

	get_header();
?>

<?php if(have_posts()) : 
	    	while(have_posts()) : the_post();	
	    		$content = get_the_content();	
	    	endwhile;  //have_posts 
	    	
	   endif;
?>

  <!-- Begin Light Wrapper -->
  <div class="light-wrapper"> 
    <!-- Begin Inner -->
    <div class="inner">
	  <?php if($headline){ ?>
	  			<h1 class="aligncenter"><?php the_title(); ?></h1>
	  			<?php if(!empty($pageoptions["tb_webpaint_page_intro"])){ ?>	
						<p class="description aligncenter"><?php echo do_shortcode($pageoptions["tb_webpaint_page_intro"]); ?></p>
				<?php } ?>
				<br />
	  <?php } ?>
     
	  <?php if($pageoptions["tb_webpaint_portfolio_content_display"] == "above") echo do_shortcode($content); ?>
     	
	  <?php echo do_shortcode("[portfolio_classic number=99 cat_slugs='$categories' parent=$post_id]"); ?>   
	
	   <?php if($pageoptions["tb_webpaint_portfolio_content_display"] == "below") echo do_shortcode($content); ?>
	
		<div class="clear"></div>
    </div>
    <!-- End Inner --> 
  </div>
  <!-- End Light Wrapper --> 
  <?php get_footer(); ?>