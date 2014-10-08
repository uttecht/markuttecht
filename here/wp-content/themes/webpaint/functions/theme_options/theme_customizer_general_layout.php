<?php
function layout_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'layout_section',
        array(
            'title' => 'General Layout',
            'description' => 'Overall Layout Settings',
            'priority' => 33,
        )
    );
    
    // Layout
    	$wp_customize->add_setting(
		    'tb_webpaint_layout',
		    array(
		        'default' => 'full',
		        'transport' => 'postMessage'
		    )
		);
		 
		$wp_customize->add_control(
		    'tb_webpaint_layout',
		    array(
		        'type' => 'radio',
		        'label' => 'General Layout',
		        'section' => 'layout_section',
		        'choices' => array(
		            'full' => 'Full',
		            'box' => 'Boxed'
		        ),
		    )
		);
	
	// Responsive?
    	$wp_customize->add_setting(
		    'tb_webpaint_responsive',
		    array(
		        'default' => 'yes',
		        'transport' => 'postMessage'
		    )
		);
		 
		$wp_customize->add_control(
		    'tb_webpaint_responsive',
		    array(
		        'type' => 'radio',
		        'label' => 'Responsive Design',
		        'section' => 'layout_section',
		        'choices' => array(
		            'yes' => 'Yes',
		            'no' => 'No'
		        ),
		    )
		);
		
	// Background Image
		$wp_customize->add_setting( 'tb_webpaint_background-image' ,array(
		        'transport' => 'postMessage',
		    ));
		$wp_customize->add_control(
		    new WP_Customize_Image_Control(
		        $wp_customize,
		        'tb_webpaint_background-image',
		        array(
		            'label' => 'Boxed Background Image',
		            'section' => 'layout_section',
		            'settings' => 'tb_webpaint_background-image'
		        )
		    )
		);
		
	 // Back Color
		$wp_customize->add_setting(
		    'tb_webpaint_background-color',
		    array(
		        'default' => '#ccc',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_background-color',
		        array(
		            'label' => 'Boxed Background Color',
		            'section' => 'layout_section',
		            'settings' => 'tb_webpaint_background-color',
		        )
		    )
		);
    
    // Highlight Color
		$wp_customize->add_setting(
		    'tb_webpaint_highlight-color',
		    array(
		        'default' => '#ff6760',
		        'sanitize_callback' => 'sanitize_hex_color',
		        'transport' => 'postMessage',
		    )
		);
		$wp_customize->add_control(
		    new WP_Customize_Color_Control(
		        $wp_customize,
		        'tb_webpaint_highlight-color',
		        array(
		            'label' => 'Highlight Color',
		            'section' => 'layout_section',
		            'settings' => 'tb_webpaint_highlight-color',
		        )
		    )
		); 
	
	// Body Headline Font
		$wp_customize->add_setting(
		    'tb_webpaint_font-url',
		    array(
		        'default' => 'http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic',
		        'transport' => 'postMessage',
		        'sanitize_callback' => 'url_sanitize'
		    )
		);
		$wp_customize->add_control(
		    'tb_webpaint_font-url',
		    array(
		        'label' => 'Main Font URL',
		        'section' => 'layout_section',
		        'type' => 'text',
		    )
		);

	// Body Headline Font Family
		$wp_customize->add_setting(
		    'tb_webpaint_font-family',
		    array(
		        'default' => 'font-family: Lato, sans-serif;',
		        'transport' => 'postMessage',
		        'sanitize_callback' => 'esc_sanitize'
		    )
		);
		$wp_customize->add_control(
		    'tb_webpaint_font-family',
		    array(
		        'label' => 'Main Font Family',
		        'section' => 'layout_section',
		        'type' => 'text',
		    )
		); 
	
		
   if ( $wp_customize->is_preview() && ! is_admin() ){
    	add_action( 'wp_footer', 'layout_customizer_preview', 21);
    }
    
}
add_action( 'customize_register', 'layout_customizer' );

function layout_customizer_preview() {
   ?>
    <script type="text/javascript">
        ( function() {
            wp.customize('tb_webpaint_highlight-color',function( value ) {
                value.bind(function(to) {
                	jQuery("<link/>", {
								id : "customizer_highlight",
								rel: "stylesheet",
								type: "text/css",
								href: "http://www.thunderbuddies4life.com/webpaint/wp-content/themes/stark/style/css/color/customizer.php?highlight="+to.replace("#", "")
							}).appendTo("footer");
                });
            });
            
            wp.customize('tb_webpaint_layout',function( value ) {
                value.bind(function(to) {
                	jQuery("body").attr("class",to+"-layout");
                });
            });
            
            wp.customize('tb_webpaint_background-color',function( value ) {
                value.bind(function(to) {
                	jQuery("body").css("background-color",to);
                });
            });
            
            wp.customize('tb_webpaint_background-image',function( value ) {
                value.bind(function(to) {
                	jQuery(".box-layout").css("background-image","url("+to+")");
                });
            });
            
            wp.customize('tb_webpaint_font-url',function( value ) {
                value.bind(function(to) {
                	jQuery("#tb_googlefont_style-css").attr("href",to);
                });
            });
            
            wp.customize('tb_webpaint_font-family',function( value ) {
                value.bind(function(to) {
                	to = to.replace("font-family:","");
                	to = to.replace("'","\'");
                	to = to.replace(";","");
                	jQuery("body").css("font-family",to);
                });
            });
            
            
        } )( jQuery )
    </script>
   
<?php
}  // End function example_customize_preview()
?>