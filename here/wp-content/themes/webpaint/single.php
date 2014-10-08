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
		
	//HighlightColor
		$themeoptions["tb_webpaint_highlight_color"] = isset($themeoptions["tb_webpaint_highlight_color"]) ? $themeoptions["tb_webpaint_highlight_color"] : "";

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
	
	//Blog Page Options	
		if (isset($pageoptions["tb_webpaint_sidebar"]) && $pageoptions["tb_webpaint_sidebar"]!="nosidebar"){
			$pageoptions["tb_webpaint_page_blog_image_width"] = 730;
			$full = "full";
		}
		else {
			$pageoptions["tb_webpaint_page_blog_image_width"] = 1040;
			$full = "full";
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
  		<?php if(isset($pageoptions["tb_webpaint_sidebar"]) && $pageoptions["tb_webpaint_sidebar"]!="nosidebar"){ ?>
			 <section class="content">
		<?php } //Sidebar ?>
		
		<?php 
			if(have_posts()) : 
				while(have_posts()) : the_post();	
		    		//Single Post Options
			    			$postoptions = getOptions($post->ID);
		
			    			//Post Top
		        			$post_top="";
		        			
		        			$featuredImage = get_post_thumbnail_id($post->ID);
		        			if(!empty($featuredImage)){
				        		$blogimageurl = aq_resize(wp_get_attachment_url( get_post_thumbnail_id($post->ID) ),$pageoptions["tb_webpaint_page_blog_image_width"]);
								$post_top = '<img src="'.$blogimageurl.'" alt="'.get_the_title().'" /><br>';
							}
							else $post_top = "";
		        			 
	        				if(isset($postoptions["tb_webpaint_post_type"]))
								switch ($postoptions["tb_webpaint_post_type"]) {
									case 'video':
												if(isset($postoptions["tb_webpaint_video_type"])){
													if($postoptions["tb_webpaint_video_type"]=="youtube"){
														$post_top = '<iframe src="http://www.youtube.com/embed/'.$postoptions["tb_webpaint_youtube_id"].'?hd=1&amp;wmode=opaque&amp;autohide=1&amp;showinfo=0" width="'.$postoptions["tb_webpaint_video_width"].'" height="'.$postoptions["tb_webpaint_video_height"].'" style="border:0"></iframe>';
													}
													elseif ($postoptions["tb_webpaint_video_type"]=="vimeo") {
														$post_top = '<iframe src="http://player.vimeo.com/video/'.$postoptions["tb_webpaint_vimeo_id"].'?portrait=0&amp;title=0&amp;byline=0&amp;color='.$themeoptions["tb_webpaint_highlight_color"].'" width="'.$postoptions["tb_webpaint_video_width"].'" height="'.$postoptions["tb_webpaint_video_height"].'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
													}
												}
												else $post_top = "";
												break;
									case 'slider':
												if(get_revslider_property($postoptions["tb_webpaint_slider"],'slider_type')=="fullwidth")
													echo '<style>.featured .fullwidthabanner{height:'.get_revslider_property($postoptions["tb_webpaint_slider"],'height').'px;}</style>'; 
												
												$post_top = '<div class="frame '.$align.'">'.do_shortcode('[rev_slider '.$postoptions["tb_webpaint_slider"].']')."</div>";
												break;	
								} //switch
							else {
								if(!empty($blogimageurl)){
					        		//$blogimageurl = aq_resize(wp_get_attachment_url( get_post_thumbnail_id($post->ID) ),$pageoptions["tb_webpaint_page_blog_image_width"]);
									$post_top = '<div class="overlay"><a href="'.get_permalink().'"><img style="width:100%" src="'.$blogimageurl.'" alt="'.get_the_title().'" /></a></div>';
								}
								else $post_top = "";

							}
							
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
							
							$metainfo = array();
							
							//Category Output
							if (!isset($pageoptions["tb_webpaint_activate_blog_categories"])) $metainfo[] = '<span class="categories">'.__("Under","tb_webpaint").' '. $category_links . '</span>';
							
							//Author Output
							/*ob_start();
							the_author_posts_link();
							$author_link = ob_get_contents();
							ob_end_clean();
							$metainfo[] = '<span>'.__("Posted by","tb_webpaint").' '.$author_link.'</span>';	
							*/
							
							//Comments Output
							if(comments_open())$metainfo[] = '<span class="comments"><a href="' . get_comments_link() . '">' . $numOfComments . '</a></span>';
							
							$metainfo = implode(' <span class="sep">|</span> ', $metainfo);
							
		?>
							<div class="post">
					          <div class="info">
					            <div class="date">
					              <div class="day"><?php echo get_post_time('j', true); ?></div>
					              <div class="month"><?php echo date_i18n('M', strtotime($post->post_date_gmt)); ?></div>
					            </div>
					            <div class="details">
					              <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					              <div class="meta"> <?php echo $metainfo; ?> </div>
					            </div>
					            <div class="clear"></div>
					          </div>
					          <?php echo $post_top; ?>
					          <?php the_content(); ?>
						      <p style="padding-bottom:0"><?php if(has_tag()){?><?php _e("Tags","tb_webpaint"); echo ": "; echo the_tags('', ', ', ''); ?><?php } ?> </p>
						      <div class="clear"></div>
						    </div>
<?php	
		    	endwhile;  //have_posts 
		    	
		   endif;?>   
		   
		   <?php if(!isset($pageoptions["tb_webpaint_activate_related_posts"])) :
		   			
		   			
		   			if(!isset($pageoptions["tb_webpaint_related_posts_attribute"])) $pageoptions["tb_webpaint_related_posts_attribute"]="tags";
		   			
		   			$tags = wp_get_post_tags($post->ID);
		   			$columns = isset($pageoptions["tb_webpaint_sidebar"]) && $pageoptions["tb_webpaint_sidebar"]!="nosidebar" ? 3 : 4;
		   			if($pageoptions["tb_webpaint_related_posts_attribute"]!="category" && $tags){
		        		$tag_ids = array();	        		
						foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
						$args=array(
							'tag__in' => $tag_ids,
							'post__not_in' => array($post->ID),
							'showposts'=> $columns, 
							'ignore_sticky_posts'=>1,
						);
					}
					else {
						$cat = "";
						foreach((get_the_category()) as $category) { 
						    $cat .= ",".$category->cat_ID ;
						} 
						$cat = substr($cat, 1);
						$args=array(
							'cat' => $cat,
							'post__not_in' => array($post->ID),
							'showposts'=> $columns, 
							'ignore_sticky_posts'=>1,
						);
					}
					$temp = $wp_query; 
					$my_query = new wp_query($args);
					if( $my_query->have_posts() ) {						
					?>
					<!-- Begin Related Posts -->
					<div class="clear"></div>
					<div class="grid-wrapper">
						<div class="related-wrapper">
							<?php
								while ($my_query->have_posts()) {
									$my_query->the_post();
									$postcustoms = getOptions($post->ID);
									$blogimageurl = aq_resize(wp_get_attachment_url( get_post_thumbnail_id($post->ID) ),440,270,true);
									$the_title = get_the_title();
									$the_title = strlen($the_title)>25 ? trim(substr($the_title, 0, 25))."..." : $the_title;
									//Categories
									$category_links = "";
									foreach((get_the_category()) as $category) {
										$category_links .= ', <a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>';
									}
									$category_links = substr($category_links, 2);
							?>
							
								<div class="related">
								  <?php if(!empty($blogimageurl)) { ?>
					                <div class="overlay"> <a href="<?php the_permalink(); ?>"><img src="<?php echo $blogimageurl;?>" alt="" />
					                <div></div>
					                </a> </div>
					              <?php } ?>
					              <div class="post-content">
					                <h2><a href="<?php the_permalink(); ?>"><?php echo $the_title;?></a></h2>
					                <div class="meta"> <span class="date"><?php echo date_i18n(get_option('date_format'), strtotime($post->post_date_gmt)); ?></span> <span class="sep">|</span> <span class="comments"> <?php echo $category_links; ?> </span></div>
					              </div>
					            </div>
					           
						        <?php
								}
									$wp_query = null; 
									$wp_query = $temp;
									wp_reset_query();
								?>
						</div>
					</div>
						<!-- End Related Posts -->
						<?php } //if have_posts()
		endif; //if related posts		
	?>
		
		<?php comments_template('', true); ?>

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