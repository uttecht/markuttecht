<?php
function footer_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'footer_section',
        array(
            'title' => 'Footer',
            'description' => 'Settings according to the Footer Area',
            'priority' => 38,
        )
    );
    
    // Footer Hide
		$wp_customize->add_setting(
		    'tb_webpaint_footer-hide',
		    array(
		        'transport' => 'postMessage',
		        
		    )
		);
		$wp_customize->add_control(
		    'tb_webpaint_footer-hide',
		    array(
		        'type' => 'checkbox',
		        'label' => 'Hide Footer',
		        'section' => 'footer_section',
		        'priority' => 1
		    )
		);
		
	// Columns
    	$wp_customize->add_setting(
		    'tb_webpaint_footer-columns',
		    array(
		        'default' => '1',
		        'transport' => 'postMessage'
		    )
		);
		 
		$wp_customize->add_control(
		    'tb_webpaint_footer-columns',
		    array(
		        'type' => 'radio',
		        'label' => 'Footer Columns',
		        'section' => 'footer_section',
		        'choices' => array(
		            '1' => '1 Column',
		            '3' => '3 Columns',
		        ),
		        'priority' => 2
		    )
		);

    
    // Footer Background Color
		$wp_customize->add_setting(
		    'tb_webpaint_footer-background-color',
		    array(
		        'default' => '#2a2a2a',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_footer-background-color',
		        array(
		            'label' => 'Background Color',
		            'section' => 'footer_section',
		            'settings' => 'tb_webpaint_footer-background-color',
		        )
		    )
		); 
	
	// Footer Headline Color
		$wp_customize->add_setting(
		    'footer-headline-color',
		    array(
		        'default' => '#e0e0e0',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'footer-headline-color',
		        array(
		            'label' => 'Headline Color',
		            'section' => 'footer_section',
		            'settings' => 'footer-headline-color',
		        )
		    )
		);	
		
	// Widget Headlines Color
		$wp_customize->add_setting(
		    'footer-link-color',
		    array(
		        'default' => '#bebebe',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'footer-link-color',
		        array(
		            'label' => 'Link Color',
		            'section' => 'footer_section',
		            'settings' => 'footer-link-color',
		        )
		    )
		); 
	
	// Widget Headlines Color
		$wp_customize->add_setting(
		    'footer-headline-color',
		    array(
		        'default' => '#bebebe',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'footer-headline-color',
		        array(
		            'label' => 'Headlines Color',
		            'section' => 'footer_section',
		            'settings' => 'footer-headline-color',
		        )
		    )
		); 
		
	// Footer Text Color
		$wp_customize->add_setting(
		    'footer-text-color',
		    array(
		        'default' => '#bebebe',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'footer-text-color',
		        array(
		            'label' => 'Text Color',
		            'section' => 'footer_section',
		            'settings' => 'footer-text-color',
		        )
		    )
		); 
	
   if ( $wp_customize->is_preview() && ! is_admin() ){
    	add_action( 'wp_footer', 'footer_customizer_preview', 21);
    }
    
}
add_action( 'customize_register', 'footer_customizer' );

function footer_customizer_preview() {
   ?>
    <script type="text/javascript">
        ( function() {
            wp.customize('tb_webpaint_footer-hide',function( value ) {
	            value.bind(function(to) {
	                if(to) jQuery("footer").fadeOut();
	                else jQuery("footer").fadeIn();
	            });
            });
            
            wp.customize('tb_webpaint_footer-background-color',function( value ) {
                value.bind(function(to) {
                    jQuery('footer').css('background-color', to );
                });
            });
            
            wp.customize('footer-text-color',function( value ) {
                value.bind(function(to) {
                    jQuery('footer, footer p.description').css('color', to );
                });
            });
            
            wp.customize('footer-link-color',function( value ) {
                value.bind(function(to) {
                    jQuery('footer a').css('color', to );
                });
            });
            
            wp.customize('footer-headline-color',function( value ) {
                value.bind(function(to) {
                    jQuery('footer h1, footer h2, footer h3, footer h4, footer h5, footer h6').css('color', to );
                });
            });
            
        } )( jQuery )
    </script>
<?php
}  // End function example_customize_preview()

function subfooter_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'subfooter_section',
        array(
            'title' => 'SubFooter',
            'description' => 'Settings according to the Footer Area',
            'priority' => 39,
        )
    );
    
    // SubFooter Hide
		$wp_customize->add_setting(
		    'tb_webpaint_subfooter-hide',
		    array('transport' => 'postMessage')
		);
		$wp_customize->add_control(
		    'tb_webpaint_subfooter-hide',
		    array(
		        'type' => 'checkbox',
		        'label' => 'Hide SubFooter',
		        'section' => 'subfooter_section',
		    )
		);


    
    // SubFooter Background Color
		$wp_customize->add_setting(
		    'subfooter-background-color',
		    array(
		        'default' => '#262626',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'subfooter-background-color',
		        array(
		            'label' => 'Background Color',
		            'section' => 'subfooter_section',
		            'settings' => 'subfooter-background-color',
		        )
		    )
		); 
	
	// SubFooter Text Color
		$wp_customize->add_setting(
		    'subfooter-text-color',
		    array(
		        'default' => '#bebebe',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'subfooter-text-color',
		        array(
		            'label' => 'Text Color',
		            'section' => 'subfooter_section',
		            'settings' => 'subfooter-text-color',
		        )
		    )
		); 
	
	// SubFooter Text Color
		$wp_customize->add_setting(
		    'subfooter-link-color',
		    array(
		        'default' => '#bebebe',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'subfooter-link-color',
		        array(
		            'label' => 'Link Color',
		            'section' => 'subfooter_section',
		            'settings' => 'subfooter-link-color',
		        )
		    )
		); 
		
   if ( $wp_customize->is_preview() && ! is_admin() ){
    	add_action( 'wp_footer', 'subfooter_customizer_preview', 21);
    }
    
}
add_action( 'customize_register', 'subfooter_customizer' );

function subfooter_customizer_preview() {
   ?>
    <script type="text/javascript">
        ( function() {
            wp.customize('tb_webpaint_subfooter-hide',function( value ) {
	            value.bind(function(to) {
	                if(to) jQuery(".subfooter-wrapper").fadeOut();
	                else jQuery(".subfooter-wrapper").fadeIn();
	            });
            });
            
            wp.customize('subfooter-background-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.subfooter-wrapper').css('background-color', to );
                });
            });
            
            wp.customize('subfooter-text-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.subfooter-wrapper').css('color', to );
                });
            });
            
            wp.customize('subfooter-link-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.subfooter-wrapper a').css('color', to );
                });
            });
            
        } )( jQuery )
    </script>
<?php
}  // End function example_customize_preview()
?>