<?php
header("Content-Type: text/css; charset=utf-8");
	
	/* COLORS */
	if (!isset($_GET["highlight"]) || empty($_GET["highlight"])) {

		$highlightcolor = "#cccccc";
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
?>
.forms fieldset .text-input:focus, .wpcf7 input:focus, .forms fieldset .text-area:focus, .wpcf7 textarea:focus, .searchform input:focus, #comment-form input:focus, #comment-form textarea:focus {
border: 1px solid <?php echo $highlightcolor; ?>;
}