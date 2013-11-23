<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function pp($data, $die = FALSE)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
	if ($die)
		exit;
}