<?php
/*
Template Name: Blog II
*/
?>
<?php
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
	
	//Posts per Page
		//Default Setting WP
		$posts_per_page = get_option('posts_per_page');
		if(!empty($pageoptions["tb_webpaint_posts_per_page"])) $posts_per_page = $pageoptions["tb_webpaint_posts_per_page"];
	
	//Blog Page Options	
		if (isset($pageoptions["tb_webpaint_sidebar"]) && $pageoptions["tb_webpaint_sidebar"]!="nosidebar"){
			$full = "full";
			$rowcount = 2;
		}
		else {
			$pageoptions["tb_webpaint_page_blog_image_width"] = 1040;
			$rowcount = 3;
		}
		
		//Excerpt Length
		$pageoptions["tb_webpaint_page_blog_excerpt"] = empty($pageoptions["tb_webpaint_page_blog_excerpt"]) ? 55 : $pageoptions["tb_webpaint_page_blog_excerpt"];

		//Modify the length of the_excerpt
		function new_excerpt_length($length) {
			global $pageoptions;
		    return $pageoptions["tb_webpaint_page_blog_excerpt"];
		}
		add_filter('excerpt_length', 'new_excerpt_length');

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
  			<h1 class="aligncenter"><?php echo get_the_title($post_id); ?></h1>
  			<?php if(!empty($pageoptions["tb_webpaint_page_intro"])){ ?>	
					<p class="description aligncenter"><?php echo do_shortcode($pageoptions["tb_webpaint_page_intro"]); ?></p>
			<?php } ?>
			<br />
  <?php } ?>
     
		<?php if(isset($pageoptions["tb_webpaint_sidebar"]) && $pageoptions["tb_webpaint_sidebar"]!="nosidebar"){ ?>
			 <section class="content">
		<?php } //Sidebar ?>
			<div class="grid-wrapper">
				<div class="blog-grid">
		<?php 
			$postcounter = 1;
			//Custom Blog WP Query
			if(!is_front_page())
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			else
				$paged = (get_query_var('page')) ? get_query_var('page') : 1;
			$args = array('offset'=> 0, 'paged'=>$paged, 'posts_per_page'=>$posts_per_page);
			$wp_query = new WP_Query($args);
		
			if(have_posts()) : 
				while(have_posts()) : the_post();	
		    		//Single Post Options
			    			$postoptions = getOptions($post->ID);
		
			    			//Post Top
			    			$featuredImage = get_post_thumbnail_id($post->ID);
		        			if(!empty($featuredImage)){
				        		$blogimageurl = aq_resize(wp_get_attachment_url( get_post_thumbnail_id($post->ID) ),440,270,true);
				        		if(!empty($blogimageurl))
									$post_top = '<div class="overlay"><a href="'.get_permalink().'"><img style="width:100%" src="'.$blogimageurl.'" alt="'.get_the_title().'" /></a></div>';
								else $post_top = "";
							}
							else $post_top = "";
		        			
							//Categories
							$category_links = "";
							foreach((get_the_category()) as $category) {
								$category_links .= ', <a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>';
							}
							$category_links = substr($category_links, 2);
							
							//Comments
							$numOfComments = get_comments_number();
							$numOfComments = $numOfComments == 0 ? "No" : $numOfComments;
							$numOfComments = $numOfComments == 1 ? __("1 Comment","tb_webpaint") : $numOfComments . __(" Comments","tb_webpaint");
							
							$metainfo = array('<span>'.date_i18n(get_option('date_format'),strtotime($post->post_date_gmt)).'</span>');
							
							//Category Output
							if (!isset($pageoptions["tb_webpaint_activate_blog_categories"])) $metainfo[] = '<span class="categories">'.__("Under","tb_webpaint").' '. $category_links . '</span>';
							
							//Author Output
							if (!isset($pageoptions["tb_webpaint_activate_blog_author"])){
								ob_start();
								the_author_posts_link();
								$author_link = ob_get_contents();
								ob_end_clean();
								$metainfo[] = '<span>'.__("Posted by","tb_webpaint").' '.$author_link.'</span>';	
							} 
							
							//Comments Output
							if(!isset($pageoptions["tb_webpaint_activate_blog_comments"]))$metainfo[] = '<span class="comments"><a href="' . get_comments_link() . '">' . $numOfComments . '</a></span>';
							
							$metainfo = implode(' <span class="sep">|</span> ', $metainfo);
							
		?>
							<div <?php post_class('post'); ?>>
							  <?php echo $post_top; ?>
					          <div class="info">
					              <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					              <div class="meta"> <?php echo $metainfo; ?> </div>
					          </div>
					          <?php the_excerpt(); ?>
					           <a href="<?php the_permalink(); ?>" class="more"><?php _e("Continue reading","tb_webpaint");?> →</a>  
					        </div>
<?php				
				if($postcounter%$rowcount == 0 && $postcounter != $posts_per_page){
					echo "<div style='clear:both'></div><hr />";
				}
				$postcounter++;
					
		    	endwhile;  //have_posts 
		    	
		   endif;?>   
		   <!-- Begin Page Navi -->
			<div style="clear:both"></div>
			</div></div> <!-- grid -->
			<hr />
			<?php if(function_exists('pagination')){ spec_pagination($wp_query); }else{ paginate_links(); } ?>    
		    <!-- End Page Navi -->
		    
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