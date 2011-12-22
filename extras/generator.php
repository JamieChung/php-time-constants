<?php

header("Content-type: text/plain");

echo '<?php'.chr(10).chr(10);

$fh = fopen('../php-time-constants.php', 'w+');
fwrite($fh, '<?php'.chr(10).chr(10));
$header = <<<EOF
/**
 * PHP Time Constants
 *
 * A helpful collection of time constants with their values in seconds. 
 * It saves time when developing an application and having to do the time
 * conversions using math by hand. #firstworldpains
 *
 * @author Jamie Chung <me@jamiechung.me>
 * @twitter @jamiechung
 * @github https://github.com/JamieChung/php-time-constants 
 * @copyright 2011
 * 
 * Feel free to use code, just please contribute your changes back to me.
 * 
 * Usage: T_{value of time}_{unit of time}
 *
 * Example: 5 minutes in seconds
 * echo T_5_SECONDS;
 *
 * Example: 1 month in seconds
 * echo T_1_MONTH;
 * 
 * Example: 2 weeks in seconds
 * echo T_2_WEEKS;
 * 
 */


EOF;

fwrite($fh, $header);
echo $header;

// SECONDS
foreach ( range(0, 100) as $num )
{
	write_constant($num, 'SECOND', $num);
	
}

// MINUTES
foreach ( range(0, 100) as $num )
{
	$val = T_60_SECONDS * $num;
	write_constant($num, 'MINUTE', $val);
}

// HOURS
foreach ( range(0, 100) as $num )
{
	$val = T_60_MINUTES * $num;
	write_constant($num, 'HOUR', $val);
}

// DAYS
foreach ( range(0, 500) as $num )
{
	$val = T_24_HOURS * $num;
	write_constant($num, 'DAY', $val);
}

// WEEKS
foreach ( range(0, 100) as $num )
{
	$val = T_7_DAYS * $num;
	write_constant($num, 'WEEK', $val);
}

// MONTHS
foreach ( range(0, 100) as $num )
{
	$val = T_30_DAYS * $num;
	write_constant($num, 'MONTH', $val);
}

// YEARS
foreach ( range(0, 100) as $num )
{
	$val = (T_365_DAYS + T_6_HOURS) * $num;
	write_constant($num, 'YEAR', $val);
	
}

// SOLAR YEARS
foreach ( range(0, 100) as $num )
{
	$val = 31558150 * $num;
	write_constant($num, 'SOLAR_YEAR', $val);
}

/*
 * Writes the constant to file and outputs to console.
 * @param $i integer Numeration of constant to write
 * @param $constant string Name of constant
 * @param $value string Initial starting value
 *
 */
function write_constant ( $num, $constant, $val )
{
	global $fh;
	
	$string = "define('T_".$num."_".strtoupper($constant).(($num > 1) ? 'S' : '')."', ".$val.");";
	fwrite($fh, $string.chr(10));
	eval($string);
	echo $string.chr(10);	
}