<?php 
require 'datalayer.php';
$function = $_GET['action'];
$form_data = $_POST;

if (function_exists($function)) {
	$function($form_data);
	// var_dump($form_data);
}
?>