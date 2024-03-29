<?php
function customcss_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'customcss_section',
        array(
            'title' => 'Custom CSS',
            'description' => 'Insert Custom CSS lines here',
            'priority' => 41,
        )
    );
    
    $wp_customize->add_setting( 'tb_webpaint_customcss',array(
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'textonly_sanitize') );
	$wp_customize->add_control(
	    new tb_textarea_Control(
	        $wp_customize,
	        'tb_webpaint_customcss',
	        array(
	            'label' => 'Custom CSS',
	            'section' => 'customcss_section',
	            'settings' => 'tb_webpaint_customcss'
	        )
	    )
	);	
        	
   if ( $wp_customize->is_preview() && ! is_admin() ){
    	add_action( 'wp_footer', 'customcss_customizer_preview', 21);
    }
    
}
add_action( 'customize_register', 'customcss_customizer' );

function customcss_customizer_preview() {
   ?>
    <script type="text/javascript">
        ( function() {
            wp.customize('tb_webpaint_customcss',function( value ) {
                value.bind(function(to) {
                	jQuery("#customizercss").text(to);
                });
            }); 
        } )( jQuery )
    </script>
<?php
}  // End function example_customize_preview()

?>