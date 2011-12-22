<?php

// This simple test script assumes the constants provided by the @twitter/time_constant github repo to be true.

require '../php-time-constants.php';
echo '<pre>';

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

echo 'No output? Then we are golden!';
