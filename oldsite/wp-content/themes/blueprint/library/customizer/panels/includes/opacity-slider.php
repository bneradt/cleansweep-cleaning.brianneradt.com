<?php 
	/* Opacity Slider */ 
	function hex2rgb($hex) {

		$hex = str_replace("#", "", $hex);

		if(strlen($hex) == 3) {
			$r = hexdec($hex[0].$hex[0]);
			$g = hexdec($hex[1].$hex[1]);
			$b = hexdec($hex[2].$hex[2]);
		} else if(strlen($hex) == 6) {
			$r = hexdec($hex[0].$hex[1]);
			$g = hexdec($hex[2].$hex[3]);
			$b = hexdec($hex[4].$hex[5]);
		} else {
			$r = '0';
			$g = '0';
			$b = '0';
		}

		return array($r, $g, $b);
	}
?>