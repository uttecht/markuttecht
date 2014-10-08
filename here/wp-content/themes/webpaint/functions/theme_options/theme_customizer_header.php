<?php
function head_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'head_section',
        array(
            'title' => 'Header',
            'description' => 'Settings according to the Head Area',
            'priority' => 35,
        )
    );
    
    
    // Head Background Color
		$wp_customize->add_setting(
		    'tb_webpaint_head-background-color',
		    array(
		        'default' => '#262626',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_head-background-color',
		        array(
		            'label' => 'Background Color',
		            'section' => 'head_section',
		            'settings' => 'tb_webpaint_head-background-color',
		        )
		    )
		);
	
	// Logo
		$wp_customize->add_setting( 'tb_webpaint_head-logo' ,array(
		        'transport' => 'postMessage',
		    ));
		$wp_customize->add_control(
		    new WP_Customize_Image_Control(
		        $wp_customize,
		        'tb_webpaint_head-logo',
		        array(
		            'label' => 'Upload Logo',
		            'section' => 'head_section',
		            'settings' => 'tb_webpaint_head-logo'
		        )
		    )
		);
		
	// Logo
		$wp_customize->add_setting( 'tb_webpaint_head-logo-retina' ,array(
		        'transport' => 'postMessage',
		    ));
		$wp_customize->add_control(
		    new WP_Customize_Image_Control(
		        $wp_customize,
		        'tb_webpaint_head-logo-retina',
		        array(
		            'label' => 'Upload Logo Retina (name it like other logo but base extended with @2x , Example logo.png and logo@2x.png)',
		            'section' => 'head_section',
		            'settings' => 'tb_webpaint_head-logo-retina'
		        )
		    )
		);
    
    // Menu Color
		$wp_customize->add_setting(
		    'tb_webpaint_head-menu-color',
		    array(
		        'default' => '#b9b9b9',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_head-menu-color',
		        array(
		            'label' => 'Menu Text Color',
		            'section' => 'head_section',
		            'settings' => 'tb_webpaint_head-menu-color',
		        )
		    )
		);
		
	// SubMenu Background Color
		$wp_customize->add_setting(
		    'tb_webpaint_head-submenu-background-color',
		    array(
		        'default' => '#3d3d3d',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_head-submenu-background-color',
		        array(
		            'label' => 'SubMenu Background Color',
		            'section' => 'head_section',
		            'settings' => 'tb_webpaint_head-submenu-background-color',
		        )
		    )
		);
    
    
   if ( $wp_customize->is_preview() && !is_admin() ){
    	add_action( 'wp_footer', 'head_customizer_preview', 21);
   }
    
}
add_action( 'customize_register', 'head_customizer' );

function head_customizer_preview() {
   ?>
    <script type="text/javascript">
        ( function() {
            wp.customize('tb_webpaint_head-background-color',function( value ) {
                value.bind(function(to) {
                    jQuery('header').css('background-color', to );
                });
            });
            wp.customize('tb_webpaint_head-logo',function( value ) {
                value.bind(function(to) {
                	if(jQuery('.logo a img').length==0)
                		jQuery("nav").first().before('<div class="logo"><a href="#"><img src="'+to+'" alt="" /></a> </div>');
                    else 
                    	jQuery('.logo a img').attr('src', to );
                });
            });
             wp.customize('tb_webpaint_head-menu-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.menu ul li a').css('color', to );
                });
            });
             wp.customize('tb_webpaint_head-submenu-background-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.menu ul li ul li').css('background-color', to );
                });
            });
        } )( jQuery )
    </script>
<?php
}  // End function example_customize_preview()
?>