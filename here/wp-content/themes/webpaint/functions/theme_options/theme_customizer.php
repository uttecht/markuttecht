<?php
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function extend_customizer( $wp_customize ) {
	//any HTML output
	class tb_html_Control extends WP_Customize_Control {
	    public $type = 'html';
	 
	    public function render_content() {
	        ?>
	            <?php echo $this->label ; ?>
	        <?php
	    }
    } 
   
    //Textarea
    class tb_textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}
}
add_action( 'customize_register', 'extend_customizer' );


/**
 * Adds the Customize page to the WordPress admin area
 */
function webpaint_customizer_menu() {
    add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' );
}
add_action( 'admin_menu', 'webpaint_customizer_menu' );


/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
require_once(T_FUNCTIONS.'/theme_options/theme_customizer_general_layout.php');
require_once(T_FUNCTIONS.'/theme_options/theme_customizer_header.php');
require_once(T_FUNCTIONS.'/theme_options/theme_customizer_body.php');
require_once(T_FUNCTIONS.'/theme_options/theme_customizer_footer.php');
require_once(T_FUNCTIONS.'/theme_options/theme_customizer_elements.php');
require_once(T_FUNCTIONS.'/theme_options/theme_customizer_forms.php');
require_once(T_FUNCTIONS.'/theme_options/theme_customizer_custom_css.php');


function returnCustomizerCSS(){
	//Head
		$tb_webpaint_head_background_color = get_theme_mod( 'tb_webpaint_head-background-color', '#262626' ); 
		$tb_webpaint_head_menu_color = get_theme_mod( 'tb_webpaint_head-menu-color', '#b9b9b9' ); 
		$tb_webpaint_head_submenu_background_color = get_theme_mod( 'tb_webpaint_head-submenu-background-color', '#3d3d3d' ); 
	//Body
		$body_background_color = get_theme_mod( 'tb_webpaint_body-background-color', '#ffffff' );
		$body_darkblock_background_color = get_theme_mod( 'body-darkblock-background-color', '#f6f6f6' );
		$body_headlines_color = get_theme_mod( 'body-headlines-color', '#616161' );
		$tb_webpaint_headsubline_color = get_theme_mod( 'tb_webpaint_headsubline-color', '#979797' );
		$body_text1_color = get_theme_mod( 'body-text1-color', '#262626' );
		$body_hr_color = get_theme_mod( 'body-hr-color', '#efefef' );
	//Footer
		$footer_background_color = get_theme_mod( 'tb_webpaint_footer-background-color', '#2a2a2a' );
		$footer_headline_color = get_theme_mod( 'footer-headline-color', '#e0e0e0' );
		$footer_link_color = get_theme_mod( 'footer-link-color', '#bebebe' );
		$footer_text_color = get_theme_mod( 'footer-text-color', '#bebebe' );
	//SubFooter
		$subfooter_background_color = get_theme_mod( 'subfooter-background-color', '#262626' );
		$subfooter_link_color = get_theme_mod( 'subfooter-link-color', '#bebebe' );
		$subfooter_text_color = get_theme_mod( 'subfooter-text-color', '#bebebe' );
	//General Layout
		$tb_webpaint_background_color = get_theme_mod( 'tb_webpaint_background-color', '#ccc' );
		$tb_webpaint_background_image = get_theme_mod( 'tb_webpaint_background-image', 'style/images/bg/bg1.jpg' );
		$tb_webpaint_font_family	= str_replace("&#039;","'",get_theme_mod( 'tb_webpaint_font-family', 'font-family: Lato, sans-serif;' ));
		$highlightcolor	= get_theme_mod( 'tb_webpaint_highlight-color', '#ff6760' );
		$highlightcolor_rgb = HexToRGB($highlightcolor);
	//Elements
		$tb_webpaint_testimonial_quote_color = get_theme_mod( 'tb_webpaint_testimonial-quote-color', '#d0d0d0' );
		$tb_webpaint_tabs_background_color = get_theme_mod( 'tb_webpaint_tabs-background-color', '#f9f9f9' );
		$tb_webpaint_tabs_link_color = get_theme_mod( 'tb_webpaint_tabs-link-color', '#616161' );
		$tb_webpaint_tabs_border_color = get_theme_mod( 'tb_webpaint_tabs-border-color', '#e7e7e7' );
		$tb_webpaint_toggles_background_color = get_theme_mod( 'tb_webpaint_toggles-background-color', '#f9f9f9' );
		$tb_webpaint_toggles_link_color = get_theme_mod( 'tb_webpaint_toggles-link-color', '#616161' );
		$tb_webpaint_toggles_border_color = get_theme_mod( 'tb_webpaint_toggles-border-color', '#e7e7e7' );
		$tb_webpaint_pricetable_border_color = get_theme_mod( 'tb_webpaint_pricetable-border-color', '#e9e9e9' );
		$tb_webpaint_pricetable_background_color = get_theme_mod( 'tb_webpaint_pricetable-background-color', '#f6f6f6' );
		$tb_webpaint_button_color = get_theme_mod( 'tb_webpaint_button-color', '#ffffff' );
		$tb_webpaint_button_hover_color = get_theme_mod( 'tb_webpaint_button-hover-color', '#616161' );
		$tb_webpaint_blockquote_color = get_theme_mod( 'tb_webpaint_blockquote-color', '#efefef' );
		$tb_webpaint_2ndhighlight_color = get_theme_mod( 'tb_webpaint_2ndhighlight-color', '#fefac7' );
		$tb_webpaint_code_border_color = get_theme_mod( 'tb_webpaint_code-border-color', '#e7e7e7' );
		$tb_webpaint_code_back_color = get_theme_mod( 'tb_webpaint_code-back-color', '#f7f7f7' );
	//Forms
		$tb_webpaint_forms_text_color = get_theme_mod( 'tb_webpaint_forms-text-color', '#616161' );
		$tb_webpaint_forms_input_background_color = get_theme_mod( 'tb_webpaint_forms-input-background-color', '#f9f9f9' );
		$tb_webpaint_forms_input_border_color = get_theme_mod( 'tb_webpaint_forms-input-border-color', '#e7e7e7' );
		$tb_webpaint_forms_input_border_color_focus = get_theme_mod( 'tb_webpaint_forms-input-border-color-focus', '#cccccc' );
		 
	return "
	<style>
		/* Forms */
			.forms fieldset .text-input, .wpcf7-form input, .wpcf7-form textarea, .forms fieldset .text-area, .searchform input, #comment-form input, #comment-form textarea,#comments .message { border: 1px solid $tb_webpaint_forms_input_border_color }
			.forms fieldset .text-input[type=text], .wpcf7-form input[type=text], .wpcf7-form textarea, .forms fieldset .text-area, .searchform input[type=text], #comment-form input[type=text], #comment-form textarea { color: $tb_webpaint_forms_text_color }
			.forms fieldset .text-input, .wpcf7-form input, .wpcf7-form textarea, .forms fieldset .text-area, .searchform input, #comment-form input, #comment-form textarea,#comments .message { background-color: $tb_webpaint_forms_input_background_color }
			.forms fieldset .text-input:focus, .wpcf7 input:focus, .forms fieldset .text-area:focus, .wpcf7 textarea:focus, .searchform input:focus, #comment-form input:focus, #comment-form textarea:focus { border: 1px solid $tb_webpaint_forms_input_border_color_focus }
		/* Elements */
			.normtabs .tab { background-color: $tb_webpaint_tabs_background_color ; border: 1px solid $tb_webpaint_tabs_border_color }
			.normtabs .tab a { color: $tb_webpaint_tabs_link_color }
			.normtabs .panel-container { border-top: 1px solid $tb_webpaint_tabs_border_color }
			.testimonials:before { color: $tb_webpaint_testimonial_quote_color;	}
			.testimonials .tab a { background-color: $tb_webpaint_testimonial_quote_color; }
			.toggle h4.title,.togglebox { background-color: $tb_webpaint_toggles_background_color ; border: 1px solid $tb_webpaint_toggles_border_color }
			.toggle h4.title { color: $tb_webpaint_toggles_link_color }
			.pricing .plan { border: 1px solid $tb_webpaint_pricetable_border_color }
			.pricing .plan li:nth-child(2n), .pricing .plan h4, .pricing .select { background-color: $tb_webpaint_pricetable_background_color }
			a.button, .forms fieldset .btn-submit, #comment-form .btn-submit, .wpcf7-form .wpcf7-submit, .filter li a, .page-navi ul li a { color: $tb_webpaint_button_color }
			a.button:hover, .filter li a:hover, .forms fieldset .btn-submit:hover, .wpcf7-form .wpcf7-submit:hover, #comment-form .btn-submit:hover, .page-navi ul li a:hover, .page-navi ul li a.current { background-color: $tb_webpaint_button_hover_color}
			a.button.gray, .filter li a.active { background-color: $tb_webpaint_button_hover_color }
			blockquote p { border-left: 2px solid $tb_webpaint_blockquote_color }
			.lite2	{ $tb_webpaint_2ndhighlight_color }
			pre { border: 1px solid $tb_webpaint_code_border_color ; background: $tb_webpaint_code_back_color }
			
		/* Header */
			header { background-color: $tb_webpaint_head_background_color }
			.menu ul li a { color: $tb_webpaint_head_menu_color } 
			.menu ul li ul li { background-color: $tb_webpaint_head_submenu_background_color }
		
		/* Body */
			.light-wrapper,.tab.active { background: $body_background_color}
			.dark-wrapper { background-color: $body_darkblock_background_color }
			body,.box-wrapper .box p { color: $body_text1_color }
			.light-wrapper h1, .light-wrapper h2, .light-wrapper h3, .light-wrapper h4, .light-wrapper h5, .light-wrapper h6, .light-wrapper p.description,.box-wrapper .box h3,.box-wrapper .box i.special { color: $body_headlines_color } 
			hr,.post { border-bottom: 2px solid $body_hr_color }
			.sidebox { border-top: 2px solid $body_hr_color }
			h4 span, .progress-bar li em,#comments .info .meta { color: $tb_webpaint_headsubline_color }
			
		/* Footer */
			footer { background-color: $footer_background_color }
			footer, footer p.description { color: $footer_text_color }
			footer a, .black-wrapper a { color: $footer_link_color }
			footer h1, footer h2, footer h3, footer h4, footer h5, footer h6 { color: $footer_headline_color }
		
		/* Subfooter */	
			.subfooter-wrapper { background-color: $subfooter_background_color; color: $subfooter_text_color }
			.subfooter-wrapper a { color: $subfooter_link_color }
			
		/* General Layout */	
			.box-layout { background: transparent url($tb_webpaint_background_image) repeat fixed; }
			.box-layout { background-color: $tb_webpaint_background_color }
			body { $tb_webpaint_font_family background-color: $tb_webpaint_background_color}
			a,.highlight {
			    color: $highlightcolor;
			}
			.menu ul li a.current
			{ color: $highlightcolor !important;
			}
			.menu ul li.active ul li a, .menu ul li.current ul li a {
			  color: #dfdfdf !important;
			}
			
			#tiny > li.current-menu-ancestor > a {  color: $highlightcolor !important; }
			
			h2.post-title a:hover {
			    color: $highlightcolor
			}
			a.button,
			.forms fieldset .btn-submit,
			.comment-form .btn-submit,
			.filter li a,
			.page-navi ul li a {
			    background-color: $highlightcolor;
			}
			ul li:before {
			    color: $highlightcolor;
			}
			#tiny > li.current-menu-ancestor > a , #tiny .current > a{
				color: $highlightcolor !important;
			}
			.lite1 {
			    color: $highlightcolor;
			    border-bottom: 1px dotted $highlightcolor;
			}
			.menu ul li.active a,
			.menu ul li a:hover,
			.menu ul li a.selected {
			    color: $highlightcolor
			}
			.menu ul li ul:before {
			    border-bottom: 5px solid $highlightcolor;
			}
			.menu ul li ul li:first-child {
			    border-top: 2px solid $highlightcolor
			}
			.menu ul li ul li a:hover {
			    background-color: $highlightcolor;
			}
			.box-wrapper .box:hover i.special {
			    color: $highlightcolor;
			}
			.box-wrapper .box:hover p,
			.box-wrapper .box:hover h3 {
			    color: $highlightcolor;
			}
			footer a:hover {
			    color: $highlightcolor
			}
			.subfooter-wrapper a:hover {
			    color: $highlightcolor
			}
			ul.contact-info li i {
			    color: $highlightcolor;
			}
			.post .info .date {
			    background: $highlightcolor;
			}
			.post-list h6 a:hover {
			    color: $highlightcolor
			}
			.related-wrapper h2 a:hover {
			    color: $highlightcolor
			}
			#comments .info h2 a:hover {
			    color: $highlightcolor
			}
			#comments a.reply-link:hover {
			    color: $highlightcolor
			}
			.tab a.active,
			.tab a:hover {
			    color: $highlightcolor
			}
			.parallax .testimonials .author,.testimonials .author {
			    color: $highlightcolor;
			}
			.testimonials .tab a.active,
			.testimonials .tab a:hover {
			    background: $highlightcolor;
			}
			.toggle h4.title:hover,
			.toggle h4.title.active {
			    color: $highlightcolor
			}
			.tp-caption .colored {
			    color: $highlightcolor
			}
			.tp-bullets.simplebullets.round .bullet.selected,
			.tp-bullets.simplebullets.round .bullet:hover {
			    background-color: $highlightcolor
			}
			.tparrows:hover {
			    background-color: $highlightcolor;
			}
			.touchcarousel .touchcarousel-item .link:hover {
			    background-color: $highlightcolor;
			}
			.touchcarousel .touchcarousel-item .caption a:hover {
				color: $highlightcolor;
			}
			.touch-carousel .scrollbar {
			    background-color: $highlightcolor !important;
			}
			.fancybox-close:hover,
			.fancybox-prev span:hover,
			.fancybox-next span:hover {
			    background: $highlightcolor !important;
			}
			.meter > span {
			    background-color: $highlightcolor;
			}
			.pricing .plan h4 span {
			    color: $highlightcolor;
			}
			.portfolio-detail-view .closebutton:hover,
			.portfolio-detail-view-remove .closebutton:hover {
			    background: $highlightcolor;
			}
			.carousel .item .link:hover,
			.portfolio-detail-view .single .link:hover {
			    background-color: $highlightcolor;
			}
			.carousel-control:hover {
			    background-color: $highlightcolor;
			}
			.items li a .overlay,
			.overlay a .more {
			    background-color: rgba( ".$highlightcolor_rgb['r'].",".$highlightcolor_rgb['g'].",".$highlightcolor_rgb['b'].", 0.92);
			}
			.widget .menu ul li a {
			    color: $highlightcolor;
			}
			.widget .menu ul li ul li a {
				font-size: 14px;
				color: $highlightcolor;
			}
			}
			footer .widget .menu ul li.active a,
			footer .widget .menu ul li a:hover,
			footer .widget .menu ul li a.selected,
			footer .widget .menu ul li.active ul li a,
			footer .widget .menu ul li.active ul li a:hover {
				color: $highlightcolor;
			}
			
			a.button, .forms fieldset .btn-submit, #comment-form .btn-submit, .wpcf7-form .wpcf7-submit, .filter li a, .page-navi ul li a { background-color: $highlightcolor }
			
			
			".get_theme_mod( 'tb_webpaint_customcss', '' )."
	</style>";
}


//Sanatize Callbacks
function textonly_sanitize( $input ) {
    return wp_filter_nohtml_kses( $input );
}

function esc_sanitize ( $input ) {
	return esc_html($input);
}

function url_sanitize ( $input ) {
	return esc_url($input);
}

?>