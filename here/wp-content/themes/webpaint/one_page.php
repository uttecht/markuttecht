<?php
/*
Template Name: OnePage Main
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
		<div class="top-wrapper"> 
		 <div id="home" class="borderline">  
		 	<div class="bannercontainer">
			   	<?php echo do_shortcode('[rev_slider '.$pageoptions["tb_webpaint_header_slider"].']'); ?>
			</div>
		 </div>
		</div>
	<!-- End Revolution Slider -->
	<?php } ?>
<div class="onepagecontent">		
	  <?php if(have_posts()) : 
		    	while(have_posts()) : the_post();	
		    	if (empty($pageoptions["tb_webpaint_header_slider"])) echo '<section id="home" class="first">';	
		    		the_content();	
		    	if (empty($pageoptions["tb_webpaint_header_slider"])) echo '</section>';
		    	endwhile;  //have_posts 
		    	
	   endif;?> 
	  <?php  
	  	if(isset($pageoptions["tb_webpaint_onepage_menu"])){
		    $menu_obj = $pageoptions["tb_webpaint_onepage_menu"];
			$menu_items = wp_get_nav_menu_items( $menu_obj);
			foreach ( (array) $menu_items as $key => $menu_item ) {
				if ($menu_item->type == "post_type") {
					$pageoptions = getOptions($menu_item->object_id);
					if(!isset($pageoptions['tb_webpaint_activate_page_title'])){
					  			$content = '<h1 class="aligncenter">'.get_the_title($menu_item->object_id).'</h1>';
					  			if(!empty($pageoptions["tb_webpaint_page_intro"])){ 
									$content .='	<p class="description aligncenter">'.do_shortcode($pageoptions["tb_webpaint_page_intro"]).'</p><br />';
								}
					} 
					else $content = "";
					$content .= do_shortcode(get_post_field('post_content', $menu_item->object_id));
					$content_wrapper = isset($pageoptions["tb_webpaint_one_page_background"]) ? $pageoptions["tb_webpaint_one_page_background"] : "light-wrapper";

					$parallax = isset($pageoptions["tb_webpaint_parallax_background"]) ? $pageoptions["tb_webpaint_parallax_background"] : "";
					if($content_wrapper =="parallax" && !empty($parallax)){
						$parallax = wp_get_attachment_image_src($parallax,"full");
						$parallax = $parallax[0];
						echo '<section id="'.sanitize_title($menu_item->title).'" class="parallax" style="background-image:url('.$parallax.')"><div class="inner">'.$content."</div></section>";
					} 
				    else{	
				    	echo '<section id="'.sanitize_title($menu_item->title).'"><div class="'.$content_wrapper.'"><div class="inner">'.$content.'</div></div></section>';
				    }
			    }
			    elseif($menu_item->url=="#"){
			    	echo '<div id="'.sanitize_title($menu_item->title).'"></div>';    
			    }
			}
		}
		?>   	 
      <div class="clear"></div>
    </div>
    <!-- End Inner --> 
  <!-- Begin Responsive Menu -->
<div class="responsive_wrapper">
  <div id="responsive-menu">
    <div class="resp-closer"><i class="icon-cancel-1"></i></div>
    <ul>
    </ul>
  </div>
</div>
<!-- End Responsive Menu -->
  <style>
  	header {
	    display: block;
	    position: fixed;
	    width: 100%;
	    z-index: 1001;
	}
		 
	.current a{
		color : <?php echo get_theme_mod( 'tb_webpaint_highlight-color', '#ff6760' ); ?> !important;
	}
	
	.first.borderline {
		padding-top: 97px;
	}
	
	.testimonials .panel-container {
		border-top: 0;
	}
	
	</style>
  <script>
  		/*-----------------------------------------------------------------------------------*/
		/*	ANCHOR SCROLL
		/*-----------------------------------------------------------------------------------*/
		/**
		* jQuery.LocalScroll - Animated scrolling navigation, using anchors.
		* Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
		* Dual licensed under MIT and GPL.
		* Date: 3/11/2009
		* @author Ariel Flesler
		* @version 1.2.7
		**/
		(function(){var l=location.href.replace(/#.*/,'');var g=jQuery.localScroll=function(a){jQuery('body').localScroll(a)};g.defaults={duration:1e3,axis:'y',event:'click',stop:true,target:window,reset:true};g.hash=function(a){if(location.hash){a=jQuery.extend({},g.defaults,a);a.hash=false;if(a.reset){var e=a.duration;delete a.duration;jQuery(a.target).scrollTo(0,a);a.duration=e}i(0,location,a)}};jQuery.fn.localScroll=function(b){b=jQuery.extend({},g.defaults,b);return b.lazy?this.bind(b.event,function(a){var e=jQuery([a.target,a.target.parentNode]).filter(d)[0];if(e)i(a,e,b)}):this.find('a,area').filter(d).bind(b.event,function(a){i(a,this,b)}).end().end();function d(){return!!this.href&&!!this.hash&&this.href.replace(this.hash,'')==l&&(!b.filter||jQuery(this).is(b.filter))}};function i(a,e,b){var d=e.hash.slice(1),f=document.getElementById(d)||document.getElementsByName(d)[0];if(!f)return;if(a)a.preventDefault();var h=jQuery(b.target);if(b.lock&&h.is(':animated')||b.onBefore&&b.onBefore.call(b,a,f,h)===false)return;if(b.stop)h.stop(true);if(b.hash){var j=f.id==d?'id':'name',k=jQuery('<a> </a>').attr(j,d).css({position:'absolute',top:jQuery(window).scrollTop(),left:jQuery(window).scrollLeft()});f[j]='';jQuery('body').prepend(k);location=e.hash;k.remove();f[j]=d}h.scrollTo(f,b).trigger('notify.serialScroll',[f])}})(jQuery);
		/**
		 * Copyright (c) 2007-2012 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
		 * Dual licensed under MIT and GPL.
		 * @author Ariel Flesler
		 * @version 1.4.5 BETA
		 */
		;(function(){var h=jQuery.scrollTo=function(a,b,c){jQuery(window).scrollTo(a,b,c)};h.defaults={axis:'xy',duration:parseFloat(jQuery.fn.jquery)>=1.3?0:1,limit:true};h.window=function(a){return jQuery(window)._scrollable()};jQuery.fn._scrollable=function(){return this.map(function(){var a=this,isWin=!a.nodeName||jQuery.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!isWin)return a;var b=(a.contentWindow||a).document||a.ownerDocument||a;return/webkit/i.test(navigator.userAgent)||b.compatMode=='BackCompat'?b.body:b.documentElement})};jQuery.fn.scrollTo=function(e,f,g){if(typeof f=='object'){g=f;f=0}if(typeof g=='function')g={onAfter:g};if(e=='max')e=9e9;g=jQuery.extend({},h.defaults,g);f=f||g.duration;g.queue=g.queue&&g.axis.length>1;if(g.queue)f/=2;g.offset=both(g.offset);g.over=both(g.over);return this._scrollable().each(function(){if(e==null)return;var d=this,$elem=jQuery(d),targ=e,toff,attr={},win=$elem.is('html,body');switch(typeof targ){case'number':case'string':if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=jQuery(targ,this);if(!targ.length)return;case'object':if(targ.is||targ.style)toff=(targ=jQuery(targ)).offset()}jQuery.each(g.axis.split(''),function(i,a){var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=h.max(d,a);if(toff){attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);if(g.margin){attr[key]-=parseInt(targ.css('margin'+b))||0;attr[key]-=parseInt(targ.css('border'+b+'Width'))||0}attr[key]+=g.offset[pos]||0;if(g.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*g.over[pos]}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c}if(g.limit&&/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);if(!i&&g.queue){if(old!=attr[key])animate(g.onAfterFirst);delete attr[key]}});animate(g.onAfter);function animate(a){$elem.animate(attr,f,g.easing,a&&function(){a.call(this,e,g)})}}).end()};h.max=function(a,b){var c=b=='x'?'Width':'Height',scroll='scroll'+c;if(!jQuery(a).is('html,body'))return a[scroll]-jQuery(a)[c.toLowerCase()]();var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);
		jQuery(document).ready(function(){ 
		    menuHandler();
		    jQuery('#tiny, .scroll, #responsive-menu').localScroll({
			    offset: {top:-jQuery("header").height(), left:0}
		    });
		  });
  		
  		/*-----------------------------------------------------------------------------------*/
		/*	RESPONSIVE MENU
		/*-----------------------------------------------------------------------------------*/
		function menuHandler() {
			var defpar = jQuery('#tiny').parents().length;
			jQuery('#tiny li').each(function(i) {
				var li = jQuery(this);
				var depth = li.parents("ul").size();
			});
			jQuery('#tiny li').each(function(i) {
				var main = jQuery(this);
				var newtxt = jQuery("<div>" + main.text() + "</div>").text();
				if (main.find('ul').length > 0) {
					newtxt = main.html().split('</a>')[0];
					newtxt = newtxt.split(">")[1];
					jQuery('#responsive-menu ul').append('<li class="rev-toplevel">' + newtxt + '</li>');
				} else {
					if (main.parents("ul").size() == 1) jQuery('#responsive-menu ul').append('<a href="' + main.find('a').attr('href') + '"><li class="rev-toplevel">' + newtxt + '</li></a>');
				}
				main.find('>ul>li').each(function() {
					var sub = jQuery(this);
					var newtxt = jQuery("<div>" + sub.html() + "</div>").html().split('<ul')[0];
					jQuery('#responsive-menu ul').append('<li class="rev-sublevel">' + newtxt + '</li>');
					sub.find('>ul>li').each(function() {
						var subsub = jQuery(this);
						var newtxt = jQuery("<div>" + subsub.html() + "</div>").html().split('<ul')[0];
						jQuery('#responsive-menu ul').append('<li class="rev-subsublevel">' + newtxt + '</li>');
					});
				});
			});
			jQuery('.resp-navigator').click(function() {
				setTimeout(function() {
					jQuery('#responsive-menu').addClass('active');
				}, 100);
				jQuery('.responsive_wrapper').addClass('active');
				setTimeout(function() {
					jQuery('.responsive_wrapper').height(jQuery('#responsive-menu').height() + 500)
				}, 600);
			})
			jQuery('#responsive-menu a').each(function() {
				jQuery(this).click(function() {
					jQuery('.resp-closer').click();
				});
			});
			jQuery('.resp-closer').click(function() {
				jQuery('#responsive-menu').removeClass('active');
				setTimeout(function() {
					jQuery('.responsive_wrapper').removeClass('active');
				}, 1000);
			})
		}	
  		
  		/*-----------------------------------------------------------------------------------*/
		/*	SCROLL NAV
		/*-----------------------------------------------------------------------------------*/
		jQuery(document).ready(function() {
		
			jQuery(".inner").each(function(){
				if(jQuery(this).html().length<2) {
					jQuery(this).remove();
				}
			jQuery("section").first().css("padding","0");	
			});

			jQuery(".top-wrapper .borderline, section.first").first().css("padding-top",jQuery(".inner").first().outerHeight()+"px");
			
			headerWrapper		= parseInt(jQuery('header').height());
			offsetTolerance	= 60;
			
			//Detecting user's scroll
			jQuery(window).scroll(function() {
			
				//Check scroll position
				scrollPosition	= parseInt(jQuery(this).scrollTop());
				
					//Move trough each menu and check its position with scroll position then add current class
					jQuery('#tiny li a').each(function() {
						thisHref = jQuery(this).attr('href');
						if(thisHref.lastIndexOf("#")==0)
							thisTruePosition	= parseInt(jQuery(thisHref).offset().top);
						else thisTruePosition=-1;
						thisPosition 		= thisTruePosition - headerWrapper - offsetTolerance;
						
						if(scrollPosition >= thisPosition && thisTruePosition > -1) {
							jQuery('.current').removeClass('current');
							if (jQuery('#tiny a[href='+ thisHref +']').closest(".sub-menu").length>0){
								jQuery('#tiny a[href='+ thisHref +']').closest('.sub-menu').closest("li").addClass('current');	
							}
							else
								jQuery('#tiny a[href='+ thisHref +']').closest('li').addClass('current');
						}
						
					});
				
					//If we're at the bottom of the page, move pointer to the last section
					bottomPage	= parseInt(jQuery(document).height()) - parseInt(jQuery(window).height());
					
					if(scrollPosition == bottomPage || scrollPosition >= bottomPage) {
					
						jQuery('.current').removeClass('current');
						jQuery('#tiny a:last').parent('li').addClass('current');
					}
			});
		});

  		
  		/*-----------------------------------------------------------------------------------*/
		/*	PARALLAX MOBILE
		/*-----------------------------------------------------------------------------------*/
		jQuery(document).ready(function() {
		if( navigator.userAgent.match(/Android/i) || 
			navigator.userAgent.match(/webOS/i) ||
			navigator.userAgent.match(/iPhone/i) || 
			navigator.userAgent.match(/iPad/i)|| 
			navigator.userAgent.match(/iPod/i) || 
			navigator.userAgent.match(/BlackBerry/i)){
					jQuery('.parallax').addClass('mobile');
		}
		});  
  </script>
  <?php get_footer(); ?>