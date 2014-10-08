<?php
/*
Template Name: Portfolio Carousel
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
		if(!is_array($pageoptions["tb_webpaint_portfolio_categories"]) || in_array("all", $pageoptions["tb_webpaint_portfolio_categories"])){
			$pageoptions["tb_webpaint_portfolio_categories"] = array();
			$tax_terms = get_terms("category_portfolio");
			foreach($tax_terms as $tax_term){	
				$pageoptions["tb_webpaint_portfolio_categories"][] = $tax_term->slug; 
			}
		}
	
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
     
  <?php 
  	foreach($pageoptions["tb_webpaint_portfolio_categories"] as $category_slug){
  		$term = get_term_by('slug', $category_slug, 'category_portfolio');
  		$description = "<p>".$term->description."</p>";
  		$name="<h3>".$term->name."</h3>";
	  	echo do_shortcode("[latest_projects_carousel number=99 cat_slugs='$category_slug' lightbox='yes' parent=$post_id]".$name.$description."[/latest_projects_carousel]");
  	}
  ?>   
     
  <?php if($pageoptions["tb_webpaint_portfolio_content_display"] == "below") echo do_shortcode($content); ?>	  		 
		<div class="clear"></div>
    </div>
    <!-- End Inner --> 
  </div>
  <!-- End Light Wrapper --> 
  <?php get_footer(); ?>