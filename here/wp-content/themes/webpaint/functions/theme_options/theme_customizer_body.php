<?php
function body_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'body_section',
        array(
            'title' => 'Body',
            'description' => 'Settings according to the Body/Content Area',
            'priority' => 36,
        )
    );
    
    // Body Background Color
		$wp_customize->add_setting(
		    'tb_webpaint_body-background-color',
		    array(
		        'default' => '#ffffff',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_body-background-color',
		        array(
		            'label' => 'Content Background Color',
		            'section' => 'body_section',
		            'settings' => 'tb_webpaint_body-background-color',
		        )
		    )
		); 
	
	// Dark Block Color
		$wp_customize->add_setting(
		    'body-darkblock-background-color',
		    array(
		        'default' => '#f6f6f6',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'body-darkblock-background-color',
		        array(
		            'label' => 'Content Dark Block Color',
		            'section' => 'body_section',
		            'settings' => 'body-darkblock-background-color',
		        )
		    )
		); 
	
	// Headlines Color
		$wp_customize->add_setting(
		    'body-headlines-color',
		    array(
		        'default' => '#616161',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'body-headlines-color',
		        array(
		            'label' => 'Headlines Color',
		            'section' => 'body_section',
		            'settings' => 'body-headlines-color',
		        )
		    )
		);  
	
	// HeadSubline Color
		$wp_customize->add_setting(
		    'tb_webpaint_headsubline-color',
		    array(
		        'default' => '#979797',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_headsubline-color',
		        array(
		            'label' => 'HeadSubline Color',
		            'section' => 'body_section',
		            'settings' => 'tb_webpaint_headsubline-color',
		            'priority' => 1,
		        )
		    )
		);
	
	// Body Text Color
		$wp_customize->add_setting(
		    'body-text1-color',
		    array(
		        'default' => '#262626',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'body-text1-color',
		        array(
		            'label' => 'Text Color',
		            'section' => 'body_section',
		            'settings' => 'body-text1-color',
		        )
		    )
		); 
		
	// HR Color
		$wp_customize->add_setting(
		    'body-hr-color',
		    array(
		        'default' => '#efefef',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'body-hr-color',
		        array(
		            'label' => 'Horizontal Lines Color',
		            'section' => 'body_section',
		            'settings' => 'body-hr-color',
		        )
		    )
		); 
	
    
   if ( $wp_customize->is_preview() && ! is_admin() ){
    	add_action( 'wp_footer', 'body_customizer_preview', 21);
   }
    
}
add_action( 'customize_register', 'body_customizer' );

function body_customizer_preview() {
   ?>
    <script type="text/javascript">
        ( function() {
            wp.customize('tb_webpaint_body-background-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.light-wrapper,.tab.active').css('background-color', to );
                    
                });
            });
            
            wp.customize('body-darkblock-background-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.dark-wrapper').css('background-color', to );
                });
            });
            
            wp.customize('body-text1-color',function( value ) {
                value.bind(function(to) {
                    jQuery('body,.box-wrapper .box p').css('color', to );
                });
            });
            
            wp.customize('body-headlines-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.light-wrapper h1, .light-wrapper h2, .light-wrapper h3, .light-wrapper h4, .light-wrapper h5, .light-wrapper h6, .light-wrapper p.description,.box-wrapper .box h3,.box-wrapper .box i.special').css('color', to );
                });
            });
            
            wp.customize('body-hr-color',function( value ) {
                value.bind(function(to) {
                    jQuery('hr,.post').css('border-bottom', "2px solid " + to );
                    jQuery('.sidebox').css('border-top', "2px solid " + to );
                });
            }); 
            
            wp.customize('tb_webpaint_headsubline-color',function( value ) {
                value.bind(function(to) {
                    jQuery('h4 span').css('color', to );
                    jQuery('.progress-bar li em,#comments .info .meta').css('color', to );
                });
            }); 
        } )( jQuery )
    </script>
<?php
}  // End function example_customize_preview()
?>