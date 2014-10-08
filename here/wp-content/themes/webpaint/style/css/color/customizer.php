<?php
header("Content-Type: text/css; charset=utf-8");
	
	/* COLORS */
	if (!isset($_GET["highlight"]) || empty($_GET["highlight"])) {

		$highlightcolor = "#ff6760";
	} else {

		$highlightcolor = "#".$_GET["highlight"];
	}
	
	function HexToRGB($hex) {
		$hex = ereg_replace("#", "", $hex);
		$color = array();
 
		if(strlen($hex) == 3) {
			$color['r'] = hexdec(substr($hex, 0, 1) . $r);
			$color['g'] = hexdec(substr($hex, 1, 1) . $g);
			$color['b'] = hexdec(substr($hex, 2, 1) . $b);
		}
		else if(strlen($hex) == 6) {
			$color['r'] = hexdec(substr($hex, 0, 2));
			$color['g'] = hexdec(substr($hex, 2, 2));
			$color['b'] = hexdec(substr($hex, 4, 2));
		}
 
		return $color;
	}
	
	$highlightcolor_rgb = HexToRGB($highlightcolor);


	/* SOCIALS */
	/*$socialarray = get_option_tree('value_footersocials', '', false, true );
	if(!is_array($socialarray)){ $socialarray = array(); }
	$sarrl = sizeof($socialarray);
	$socialcontainerwidth = ($sarrl * 27) - 3;
	$socialcontainermargin = round($socialcontainerwidth/2);
	*/

	/* GOOGLE FONT */
	$headlinefontfamily = $themeoptions['stark_font_headlinefamily'];

	/* SUBMENU */
	$submenuwidth = $themeoptions['stark_submenuwidth'];

	/* Theme Layout */
	$stark_themelayout = $themeoptions['stark_themelayout'];
?>
a,.highlight {
    color: <?php echo $highlightcolor; ?>;
}
h2.post-title a:hover {
    color: <?php echo $highlightcolor; ?>
}
a.button,
.forms fieldset .btn-submit,
.comment-form .btn-submit,
.filter li a,
.page-navi ul li a {
    background-color: <?php echo $highlightcolor; ?>;
}
ul li:before  {
    color: <?php echo $highlightcolor; ?>;
}
#tiny > li.current-menu-ancestor > a , #tiny .current a{
	color: <?php echo $highlightcolor; ?> !important;
}
.lite1 {
    color: <?php echo $highlightcolor; ?>;
    border-bottom: 1px dotted <?php echo $highlightcolor; ?>;
}
.menu ul li.active a,
.menu ul li a:hover,
.menu ul li a.selected {
    color: <?php echo $highlightcolor; ?>
}
.menu ul li ul:before {
    border-bottom: 5px solid <?php echo $highlightcolor; ?>;
}
.menu ul li ul li:first-child {
    border-top: 2px solid <?php echo $highlightcolor; ?>
}
.menu ul li ul li a:hover {
    background-color: <?php echo $highlightcolor; ?>;
}
.box-wrapper .box:hover i.special {
    color: <?php echo $highlightcolor; ?>;
}
.box-wrapper .box:hover p,
.box-wrapper .box:hover h3 {
    color: <?php echo $highlightcolor; ?>;
}
footer a:hover {
    color: <?php echo $highlightcolor; ?>
}
.subfooter-wrapper a:hover {
    color: <?php echo $highlightcolor; ?>
}
ul.contact-info li i {
    color: <?php echo $highlightcolor; ?>;
}
.post .info .date {
    background: <?php echo $highlightcolor; ?>;
}
.post-list h6 a:hover {
    color: <?php echo $highlightcolor; ?>
}
.related-wrapper h2 a:hover {
    color: <?php echo $highlightcolor; ?>
}
#comments .info h2 a:hover {
    color: <?php echo $highlightcolor; ?>
}
#comments a.reply-link:hover {
    color: <?php echo $highlightcolor; ?>
}
.tab a.active,
.tab a:hover {
    color: <?php echo $highlightcolor; ?>
}
#testimonials .author {
    color: <?php echo $highlightcolor; ?>;
}
#testimonials .tab a.active,
#testimonials .tab a:hover {
    background: <?php echo $highlightcolor; ?>;
}
.toggle h4.title:hover,
.toggle h4.title.active {
    color: <?php echo $highlightcolor; ?>
}
.tp-caption .colored {
    color: <?php echo $highlightcolor; ?>
}
.tp-bullets.simplebullets.round .bullet.selected,
.tp-bullets.simplebullets.round .bullet:hover {
    background-color: <?php echo $highlightcolor; ?>
}
.tparrows:hover {
    background-color: <?php echo $highlightcolor; ?>;
}
.touchcarousel .touchcarousel-item .link:hover {
    background-color: <?php echo $highlightcolor; ?>;
}
.touchcarousel .touchcarousel-item .caption a:hover {
	color: <?php echo $highlightcolor; ?>;
}
.touch-carousel .scrollbar {
    background-color: <?php echo $highlightcolor; ?> !important;
}
.fancybox-close:hover,
.fancybox-prev span:hover,
.fancybox-next span:hover {
    background: <?php echo $highlightcolor; ?> !important;
}
.meter > span {
    background-color: <?php echo $highlightcolor; ?>;
}
.pricing .plan h4 span {
    color: <?php echo $highlightcolor; ?>;
}
.portfolio-detail-view .closebutton:hover,
.portfolio-detail-view-remove .closebutton:hover {
    background: <?php echo $highlightcolor; ?>;
}
.carousel .item .link:hover,
.portfolio-detail-view .single .link:hover {
    background-color: <?php echo $highlightcolor; ?>;
}
.carousel-control:hover {
    background-color: <?php echo $highlightcolor; ?>;
}
.items li a .overlay,
.overlay a .more {
    background-color: rgba(<?php echo $highlightcolor_rgb["r"]; ?>,<?php echo $highlightcolor_rgb["g"]; ?>,<?php echo $highlightcolor_rgb["b"]; ?>, 0.92);
}