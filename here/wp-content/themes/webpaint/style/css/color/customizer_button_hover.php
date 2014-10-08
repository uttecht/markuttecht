<?php
header("Content-Type: text/css; charset=utf-8");
	
	/* COLORS */
	if (!isset($_GET["highlight"]) || empty($_GET["highlight"])) {

		$highlightcolor = "#616161";
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
a.button:hover, .filter li a:hover, .forms fieldset .btn-submit:hover, .wpcf7-form .wpcf7-submit:hover, #comment-form .btn-submit:hover, .page-navi ul li a:hover, .page-navi ul li a.current {
    background-color: <?php echo $highlightcolor; ?>;
}
a.button.gray, .filter li a.active {
	background-color: <?php echo $highlightcolor; ?>;
}