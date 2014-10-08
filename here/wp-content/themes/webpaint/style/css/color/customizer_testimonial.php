<?php
header("Content-Type: text/css; charset=utf-8");
	
	/* COLORS */
	if (!isset($_GET["highlight"]) || empty($_GET["highlight"])) {

		$highlightcolor = "#ff6760";
	} else {

		$highlightcolor = "#".$_GET["highlight"];
	}
?>
#testimonials:before {
    color: <?php echo $highlightcolor; ?>;
}

#testimonials .tab a {
	background-color: <?php echo $highlightcolor; ?>;
}