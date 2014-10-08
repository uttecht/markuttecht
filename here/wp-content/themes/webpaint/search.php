<?php
	//Post ID
		global $wp_query;
	    $content_array = $wp_query->get_queried_object();
		if(isset($content_array->ID)){
	    	$post_id = $content_array->ID;
		}
		else $post_id=0;

	$template_uri = get_template_directory_uri();

	//Language Options
		$tb_webpaint_readmore = __('Read More', 'tb_webpaint');
		$tb_webpaint_sharethis = __('Share This', 'tb_webpaint');
		$tb_webpaint_archive = __('Archive', 'tb_webpaint');
		$tb_webpaint_tags = __('Tag Archive', 'tb_webpaint');
		$tb_webpaint_category = __('Category', 'tb_webpaint');

	//Page Options
		if(have_posts()) $pageoptions = getOptions($post_id);	

	//Theme Options	
		$themeoptions = getThemeOptions(); 

	//Page Head Area
		if(isset($pageoptions['tb_webpaint_activate_page_title'])){ 
			$headline = false;
		} 
		else {
			$headline = true;
		}
		
	//Search
		$allsearch = &new WP_Query("s=$s&showposts=-1");
		$count = $allsearch->post_count;
		wp_reset_query();
		$hits = $count == 1 ? $count." ".__("hit for","tb_webpaint") : $count." ".__("hits for","tb_webpaint");

	get_header();
?>

<!-- Begin Light Wrapper -->
  <div class="light-wrapper"> 
    <!-- Begin Inner -->
    <div class="inner">
		<?php if($headline){ ?>
  			<h1 class="aligncenter"><?php _e("Search","tb_webpaint"); ?></h1>
  			<p class="description aligncenter"><?php echo $hits; ?> "<?php the_search_query(); ?>"</p>
			<br />
		<?php } ?>
		
		<?php 
		    			$paged =
		    				( get_query_var('paged') && get_query_var('paged') > 1 )
		    				? get_query_var('paged')
		    				: 1;
		    			$args = array(
		    				'posts_per_page' => 10,
		    				'paged' => $paged
		    			);
		    			$args =
		    				( $wp_query->query && !empty( $wp_query->query ) )
		    				? array_merge( $wp_query->query , $args )
		    				: $args;
		    			query_posts( $args );
		    			?>

		
		<?php if (have_posts()) : ?>
		    		    <?php while (have_posts()) : the_post(); ?>
		    		
		    			<?php
		    			$timevar = get_post_time('F jS,Y', true); 

		    				if(get_post_type()!="post" && get_post_type()!="page"){
			    					$post_content_org = do_shortcode(get_the_content());
					    			$post_content = strip_tags(substr($post_content_org, 0 , 250));
					    			if(strlen($post_content_org)>250) $post_content .= "...";
			    					$post_link = '<a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a>';
			    			}
			    			else{
				    			$post_content_org = do_shortcode(get_the_content());
				    			$post_content = strip_tags(substr($post_content_org, 0 , 250));
				    			if(strlen($post_content_org)>250) $post_content .= "...";
				    			 $post_link = '<a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a>';
				    		} 
			    		
		    			//
		    			?>
		    					<article>
		    		                <h5 style="padding:0"><?php echo $post_link; ?></h5>
		    		                <p><?php echo $post_content;?></p>
		    		                <hr/>
		    					</article>
		    					<?php endwhile; ?>
		 <?php  endif; ?>   
	  </div>
	  <!-- End Inner --> 
	</section> 
	</div>
	<!-- End White Wrapper --> 
	<div class="divider white-wrapper"></div>
<?php get_footer(); ?>