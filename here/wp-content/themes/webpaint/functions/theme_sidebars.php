<?php
/* ------------------------------------- */
/* SIDEBAR REGISTRATION */
/* ------------------------------------- */

if ( function_exists('register_sidebar')) {
	 
	 //DEFAULT SIDEBARS
	 	register_sidebar(array(
           'name' => "Page",
           'id' => 'sidebar-0',
           'before_widget' => '<div id="%1$s" class="sidebox widget %2$s">',
           'after_widget' => '<div class="clear"></div></div>',
           'before_title' => '<h3>',
           'after_title' => '</h3>'
        )); 
	    register_sidebar(array(
	        'name' => 'Footer 1/1 Column',
	        'id' => 'sidebar-1',
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div><div class="clear"></div>',
	        'before_title' => '<h1>',
	        'after_title' => '</h1>'
	    ));
	    register_sidebar(array(
	        'name' => 'Footer Left 1/3 Column',
	        'id' => 'sidebar-2',
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div><div class="clear"></div>',
	        'before_title' => '<h3>',
	        'after_title' => '</h3>'
	    ));
	    register_sidebar(array(
	        'name' => 'Footer Center 1/3 Column',
	        'id' => 'sidebar-3',
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div><div class="clear"></div>',
	        'before_title' => '<h3>',
	        'after_title' => '</h3>'
	    ));
	    register_sidebar(array(
	        'name' => 'Footer Right 1/3 Column',
	        'id' => 'sidebar-4',
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div><div class="clear"></div>',
	        'before_title' => '<h3>',
	        'after_title' => '</h3>'
	    ));
	    register_sidebar(array(
	        'name' => 'SubFooter',
	        'id' => 'sidebar-5',
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div><div class="clear"></div>',
	        'before_title' => '<h1>',
	        'after_title' => '</h1>'
	    ));
	    
	//CUSTOM SIDEBARS   
	    $sidebars = get_option("webpaint_theme_sidebars_options");
		$i = 0;
	    $j = 1; 
	    if (is_array($sidebars) && !empty($sidebars)) {  
	        foreach($sidebars as $row) {
	        	if($j%2==0){
	        		register_sidebar(array(
		               'name' => $sidebar,
		               'id' => 'sidebar-'.$row,
		               'before_widget' => '<div id="%1$s" class="sidebox widget %2$s">',
			           'after_widget' => '<div class="clear"></div></div>',
			           'before_title' => '<h3>',
			           'after_title' => '</h3>'
		            )); 
	                $j = 0;
		        }
		        else{
			        $sidebar = $row;
			    }
			    $j++;
	        }
	    }

}?>