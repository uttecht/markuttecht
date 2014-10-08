<?php
function element_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'element_section',
        array(
            'title' => 'Elements',
            'description' => 'Settings concerning special elements',
            'priority' => 40,
        )
    );
	// Headline
		$wp_customize->add_setting( 'html' );
		$wp_customize->add_control(
		    new tb_html_Control(
		        $wp_customize,
		        'testimonial',
		        array(
		            'label' => '<h3 style="text-align:right">Testimonials</h3><hr>',
		            'section' => 'element_section',
		            'settings' => 'html',
		            'priority' => 2,
		        )
		    )
		);	
		
	// Testimonial Color
		$wp_customize->add_setting(
		    'tb_webpaint_testimonial-quote-color',
		    array(
		        'default' => '#d0d0d0',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_testimonial-quote-color',
		        array(
		            'label' => 'Testimonial Elements Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_testimonial-quote-color',
		            'priority' => 3
		        )
		    )
		);

		
	// Headline
		$wp_customize->add_setting( 'html' );
		$wp_customize->add_control(
		    new tb_html_Control(
		        $wp_customize,
		        'tabs',
		        array(
		            'label' => '<h3 style="text-align:right">Tabs</h3><hr>',
		            'section' => 'element_section',
		            'settings' => 'html',
		            'priority' => 4,
		        )
		    )
		);	
			
	// Tabs Background
		$wp_customize->add_setting(
		    'tb_webpaint_tabs-background-color',
		    array(
		        'default' => '#f9f9f9',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_tabs-background-color',
		        array(
		            'label' => 'Inactive Tab Background Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_tabs-background-color',
		            'priority' => 5,
		        )
		    )
		); 
		
	// Tabs Link Color
		$wp_customize->add_setting(
		    'tb_webpaint_tabs-link-color',
		    array(
		        'default' => '#616161',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_tabs-link-color',
		        array(
		            'label' => 'Tab Head Text Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_tabs-link-color',
		            'priority' => 6
		        )
		    )
		); 
		
	// Tabs Border Color
		$wp_customize->add_setting(
		    'tb_webpaint_tabs-border-color',
		    array(
		        'default' => '#e7e7e7',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_tabs-border-color',
		        array(
		            'label' => 'Tab Border Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_tabs-border-color',
		            'priority' => 7
		        )
		    )
		);
	// Headline
		$wp_customize->add_setting( 'html' );
		$wp_customize->add_control(
		    new tb_html_Control(
		        $wp_customize,
		        'toggles',
		        array(
		            'label' => '<h3 style="text-align:right">Toggles</h3><hr>',
		            'section' => 'element_section',
		            'settings' => 'html',
		            'priority' => 8
		        )
		    )
		);
		
	// toggles Background
		$wp_customize->add_setting(
		    'tb_webpaint_toggles-background-color',
		    array(
		        'default' => '#f9f9f9',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_toggles-background-color',
		        array(
		            'label' => 'Toggle Background Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_toggles-background-color',
		            'priority' => 9
		        )
		    )
		); 
		
	// toggles Link Color
		$wp_customize->add_setting(
		    'tb_webpaint_toggles-link-color',
		    array(
		        'default' => '#616161',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_toggles-link-color',
		        array(
		            'label' => 'Toogle Head Text Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_toggles-link-color',
		            'priority' => 10
		        )
		    )
		); 
		
	// toggles Border Color
		$wp_customize->add_setting(
		    'tb_webpaint_toggles-border-color',
		    array(
		        'default' => '#e7e7e7',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_toggles-border-color',
		        array(
		            'label' => 'Toggle Border Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_toggles-border-color',
		            'priority' => 11
		        )
		    )
		);
		
		// Headline
		$wp_customize->add_setting( 'html' );
		$wp_customize->add_control(
		    new tb_html_Control(
		        $wp_customize,
		        'Price Tables',
		        array(
		            'label' => '<h3 style="text-align:right">Price Tables</h3><hr>',
		            'section' => 'element_section',
		            'settings' => 'html',
		            'priority' => 12
		        )
		    )
		);
		
		// Price Table Border Color
		$wp_customize->add_setting(
		    'tb_webpaint_pricetable-border-color',
		    array(
		        'default' => '#e9e9e9',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_pricetable-border-color',
		        array(
		            'label' => 'Price Table Border Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_pricetable-border-color',
		            'priority' => 13
		        )
		    )
		);
		
		// Price Table 2nd Background Color
		$wp_customize->add_setting(
		    'tb_webpaint_pricetable-background-color',
		    array(
		        'default' => '#f6f6f6',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_pricetable-background-color',
		        array(
		            'label' => 'Price Table 2nd Background Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_pricetable-background-color',
		            'priority' => 14
		        )
		    )
		);
		
		//Buttons
		// Headline
		$wp_customize->add_setting( 'html' );
		$wp_customize->add_control(
		    new tb_html_Control(
		        $wp_customize,
		        'Buttons',
		        array(
		            'label' => '<h3 style="text-align:right">Buttons</h3><hr>',
		            'section' => 'element_section',
		            'settings' => 'html',
		            'priority' => 15
		        )
		    )
		);
		
		// Button Color
		$wp_customize->add_setting(
		    'tb_webpaint_button-color',
		    array(
		        'default' => '#ffffff',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_button-color',
		        array(
		            'label' => 'Button Text Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_button-color',
		            'priority' => 16
		        )
		    )
		); 
		// Button Hover Background Color
		$wp_customize->add_setting(
		    'tb_webpaint_button-hover-color',
		    array(
		        'default' => '#616161',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_button-hover-color',
		        array(
		            'label' => 'Button Hover Back Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_button-hover-color',
		            'priority' => 17
		        )
		    )
		); 
		
		// Headline
		$wp_customize->add_setting( 'html' );
		$wp_customize->add_control(
		    new tb_html_Control(
		        $wp_customize,
		        'Typography',
		        array(
		            'label' => '<h3 style="text-align:right">Typography</h3><hr>',
		            'section' => 'element_section',
		            'settings' => 'html',
		            'priority' => 18
		        )
		    )
		);
		// Blockquote Border Color
		$wp_customize->add_setting(
		    'tb_webpaint_blockquote-color',
		    array(
		        'default' => '#efefef',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_blockquote-color',
		        array(
		            'label' => 'Blockquote Border Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_blockquote-color',
		            'priority' => 19
		        )
		    )
		); 
		// Second Highlight Background Color
		$wp_customize->add_setting(
		    'tb_webpaint_2ndhighlight-color',
		    array(
		        'default' => '#fefac7',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_2ndhighlight-color',
		        array(
		            'label' => '2nd Highlight Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_2ndhighlight-color',
		            'priority' => 20
		        )
		    )
		); 
		
		// Code Section
		$wp_customize->add_setting(
		    'tb_webpaint_code-border-color',
		    array(
		        'default' => '#e7e7e7',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_code-border-color',
		        array(
		            'label' => 'Code/Pre Border Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_code-border-color',
		            'priority' => 21
		        )
		    )
		); 
		
		// Code Section
		$wp_customize->add_setting(
		    'tb_webpaint_code-back-color',
		    array(
		        'default' => '#f7f7f7',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_code-back-color',
		        array(
		            'label' => 'Code/Pre Back Color',
		            'section' => 'element_section',
		            'settings' => 'tb_webpaint_code-back-color',
		            'priority' => 22
		        )
		    )
		); 
	
	
   if ( $wp_customize->is_preview() && ! is_admin() ){
    	add_action( 'wp_footer', 'element_customizer_preview', 21);
    }
    
}
add_action( 'customize_register', 'element_customizer' );

function element_customizer_preview() {
   ?>
    <script type="text/javascript">
        ( function() {
             wp.customize('tb_webpaint_testimonial-quote-color',function( value ) {
                value.bind(function(to) {
                	jQuery("<link/>", {
								id : "customizer_testimonial",
								rel: "stylesheet",
								type: "text/css",
								href: "http://www.thunderbuddies4life.com/webpaint/wp-content/themes/stark/style/css/color/customizer_testimonial.php?highlight="+to.replace("#", "")
							}).appendTo("footer");
                });
            });
            wp.customize('tb_webpaint_tabs-background-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.normtabs .tab').each(function(){
	                   if(!jQuery(this).hasClass("active")) jQuery(this).css('background-color',to);
                    });
                });
            });  
            wp.customize('tb_webpaint_tabs-link-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.normtabs .tab').each(function(){
                   	 if(!jQuery(this).hasClass("active")) jQuery(this).find("a").css('color', to );
                    });
                });
            });
            wp.customize('tb_webpaint_tabs-border-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.normtabs .tab').css('border','1px solid ' + to );
                    jQuery('.normtabs .panel-container').css('border-top','1px solid ' + to );
                });
            });
            wp.customize('tb_webpaint_toggles-background-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.toggle h4.title').each(function(){
	                   if(!jQuery(this).hasClass("active")) jQuery(this).css('background-color',to);
	                   jQuery('.togglebox').css('background-color',to);
                    });
                });
            });  
            wp.customize('tb_webpaint_toggles-link-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.toggle h4.title').each(function(){
                   	 if(!jQuery(this).hasClass("active")) jQuery(this).css('color', to );
                    });
                });
            });
            wp.customize('tb_webpaint_toggles-border-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.toggle h4.title').css('border','1px solid ' + to );
                    jQuery('.togglebox').css('border','1px solid ' + to );
                });
            });
            wp.customize('tb_webpaint_pricetable-border-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.pricing .plan').css('border','1px solid ' + to );
                });
            });
            wp.customize('tb_webpaint_pricetable-background-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.pricing .plan li:nth-child(2n), .pricing .plan h4, .pricing .select ').css('background-color', to );
                });
            });
            
            wp.customize('tb_webpaint_button-color',function( value ) {
                value.bind(function(to) {
                	jQuery("a.button, .forms fieldset .btn-submit, #comment-form .btn-submit, .wpcf7-form .wpcf7-submit, .filter li a, .page-navi ul li a").css("color",to);
                });
            });
            wp.customize('tb_webpaint_button-hover-color',function( value ) {
                value.bind(function(to) {
                	jQuery("<link/>", {
								id : "customizer_button_hover",
								rel: "stylesheet",
								type: "text/css",
								href: "http://www.thunderbuddies4life.com/webpaint/wp-content/themes/stark/style/css/color/customizer_button_hover.php?highlight="+to.replace("#", "")
							}).appendTo("footer");
                });
            });
            wp.customize('tb_webpaint_blockquote-color',function( value ) {
                value.bind(function(to) {
                	jQuery("blockquote p").css("border-left","2px solid " + to);
                });
            });
            wp.customize('tb_webpaint_2ndhighlight-color',function( value ) {
                value.bind(function(to) {
                	jQuery(".lite2").css("background", to);
                });
            });
            wp.customize('tb_webpaint_code-border-color',function( value ) {
                value.bind(function(to) {
                	jQuery("pre").css("border","1px solid " + to);
                });
            });
            wp.customize('tb_webpaint_code-back-color',function( value ) {
                value.bind(function(to) {
                	jQuery("pre").css("background", to);
                });
            });
        } )( jQuery )
    </script>
<?php
}  // End function example_customize_preview()
?>