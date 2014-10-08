<?php
/*
Template Name: OnePage Single
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

	get_header();
?>

	<?php if (!empty($pageoptions["tb_webpaint_header_slider"])){?>
	<!-- Begin Revolution Slider -->
		   <div class="bannercontainer">
			   <?php echo do_shortcode('[rev_slider '.$pageoptions["tb_webpaint_header_slider"].']'); ?>
		   </div>
	<!-- End Revolution Slider -->
	<?php } ?>

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
     
		<?php if(isset($pageoptions["tb_webpaint_sidebar"]) && $pageoptions["tb_webpaint_sidebar"]!="nosidebar"){ ?>
			 <section class="content">
		<?php } //Sidebar ?>
		
		<?php if(have_posts()) : 
		    	while(have_posts()) : the_post();	
		    		the_content();	
		    	endwhile;  //have_posts 
		    	
		   endif;?>   
		   <div class="clear"></div>
		<?php if(isset($pageoptions["tb_webpaint_sidebar"]) && $pageoptions["tb_webpaint_sidebar"]!="nosidebar"):?>
			 </section>
			<aside class="sidebar">
		    <!-- Begin Sidebar --> 
		    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($pageoptions["tb_webpaint_sidebar"]) ) : ?>
			    
				    <div class="sidebox">
				      <h3>Sidebar Widget</h3>
				      Please configure this Widget Area in the Admin Panel under Appearance -> Widgets
				    </div>
			<?php endif; ?>
			</div>
		    <div class="clear"></div>
		    <!-- End Sidebar --> 
			 </aside>
		<?php endif; //Sidebar ?>	 
      <div class="clear"></div>
    </div>
    <!-- End Inner --> 
  </div>
  <!-- End Light Wrapper --> 
  <?php get_footer(); ?>