<?php
function forms_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'forms_section',
        array(
            'title' => 'Forms',
            'description' => 'Settings according to the Footer Area',
            'priority' => 41,
        )
    );
    
	// forms Text Color
		$wp_customize->add_setting(
		    'tb_webpaint_forms-text-color',
		    array(
		        'default' => '#616161',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_forms-text-color',
		        array(
		            'label' => 'Fields Text Color',
		            'section' => 'forms_section',
		            'settings' => 'tb_webpaint_forms-text-color',
		        )
		    )
		); 
	
	// forms Text Color
		$wp_customize->add_setting(
		    'tb_webpaint_forms-input-background-color',
		    array(
		        'default' => '#f9f9f9',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_forms-input-background-color',
		        array(
		            'label' => 'Fields Background Color',
		            'section' => 'forms_section',
		            'settings' => 'tb_webpaint_forms-input-background-color',
		        )
		    )
		); 
	
	// forms Text Color
		$wp_customize->add_setting(
		    'tb_webpaint_forms-input-border-color',
		    array(
		        'default' => '#e7e7e7',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_forms-input-border-color',
		        array(
		            'label' => 'Fields Border Color',
		            'section' => 'forms_section',
		            'settings' => 'tb_webpaint_forms-input-border-color',
		        )
		    )
		); 
		
		// forms Text Color
		$wp_customize->add_setting(
		    'tb_webpaint_forms-input-border-color-focus',
		    array(
		        'default' => '#cccccc',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_forms-input-border-color-focus',
		        array(
		            'label' => 'Fields Border Color Focus',
		            'section' => 'forms_section',
		            'settings' => 'tb_webpaint_forms-input-border-color-focus',
		        )
		    )
		); 
		
   if ( $wp_customize->is_preview() && ! is_admin() ){
    	add_action( 'wp_footer', 'forms_customizer_preview', 21);
    }
    
}
add_action( 'customize_register', 'forms_customizer' );

function forms_customizer_preview() {
   ?>
    <script type="text/javascript">
        ( function() {
            wp.customize('tb_webpaint_forms-input-border-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.forms fieldset .text-input, .wpcf7-form input, .wpcf7-form textarea, .forms fieldset .text-area, .searchform input, #comment-form input, #comment-form textarea,#comments .message').css('border', "1px solid " + to );
                });
            });
            
             wp.customize('tb_webpaint_forms-text-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.forms fieldset .text-input[type=text], .wpcf7-form input[type=text], .wpcf7-form textarea, .forms fieldset .text-area, .searchform input[type=text], #comment-form input[type=text], #comment-form textarea').css('color', to );
                });
            });
            
             wp.customize('tb_webpaint_forms-input-background-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.forms fieldset .text-input, .wpcf7-form input, .wpcf7-form textarea, .forms fieldset .text-area, .searchform input, #comment-form input, #comment-form textarea,#comments .message').css('background-color', to );
                });
            });
            
            wp.customize('tb_webpaint_forms-input-border-color-focus',function( value ) {
                value.bind(function(to) {
                	jQuery("<link/>", {
								id : "customizer_form_hover",
								rel: "stylesheet",
								type: "text/css",
								href: "http://www.thunderbuddies4life.com/webpaint/wp-content/themes/stark/style/css/color/customizer_form_hover.php?highlight="+to.replace("#", "")
							}).appendTo("footer");
                });
            });
            
        } )( jQuery )
    </script>
<?php
}  // End function example_customize_preview()
?>