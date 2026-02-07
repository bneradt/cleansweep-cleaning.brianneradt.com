<?php
	$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
	$wp_load = $absolute_path[0] . 'wp-load.php';
	require_once($wp_load);
	header('Content-type: text/css');
	header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
	require 'css-main.php';
?>