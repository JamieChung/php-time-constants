<?php

echo '<pre>';

require 'php-time-constants.php';

foreach ( file('twitter-time-constants.txt') as $line )
{
	$parts = explode('=', $line);
	$constant = trim($parts[0]);
	$value = trim($parts[1]);

	if ( constant($constant) != $value )
	{
		echo 'Invalid: ('.$constant.') '.constant($constant).' != Twitter Constant: '.$value.chr(10);	
	}
}

