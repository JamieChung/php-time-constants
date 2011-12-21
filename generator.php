<?php

header("Content-type: text/plain");

echo '<?php'.chr(10).chr(10);

$fh = fopen('php-time-constants.php', 'w+');
fwrite($fh, '<?php'.chr(10).chr(10));

// Seconds
foreach ( range(0, 100) as $num )
{
	$string = "define('T_".$num."_SECOND".(($num > 1) ? 'S' : '')."', ".$num.");";
	fwrite($fh, $string.chr(10));
	if ( $num == 1 || $num == 60 ) eval($string);
	echo $string.chr(10);
	
}

// MINUTES
foreach ( range(0, 100) as $num )
{
	$val = T_60_SECONDS * $num;
	$string = "define('T_".$num."_MINUTE".(($num > 1) ? 'S' : '')."', ".$val.");";
	fwrite($fh, $string.chr(10));
	eval($string);
	echo $string.chr(10);
}

// HOURS
foreach ( range(0, 100) as $num )
{
	$val = T_60_MINUTES * $num;
	$string = "define('T_".$num."_HOUR".(($num > 1) ? 'S' : '')."', ".$val.");";
	fwrite($fh, $string.chr(10));
	
	eval($string);
	echo $string.chr(10);
}

// DAYS
foreach ( range(0, 500) as $num )
{
	$val = T_24_HOURS * $num;
	$string = "define('T_".$num."_DAY".(($num > 1) ? 'S' : '')."', ".$val.");";
	fwrite($fh, $string.chr(10));
	eval($string);
	echo $string.chr(10);
}

// WEEKS
foreach ( range(0, 100) as $num )
{
	$val = T_7_DAYS * $num;
	$string = "define('T_".$num."_WEEK".(($num > 1) ? 'S' : '')."', ".$val.");";
	fwrite($fh, $string.chr(10));
	eval($string);
	echo $string.chr(10);
}

// MONTHS
foreach ( range(0, 100) as $num )
{
	$val = T_30_DAYS * $num;
	$string = "define('T_".$num."_MONTH".(($num > 1) ? 'S' : '')."', ".$val.");";
	fwrite($fh, $string.chr(10));
	eval($string);
	echo $string.chr(10);
}

// YEAR
foreach ( range(0, 100) as $num )
{
	$val = (T_365_DAYS + T_6_HOURS) * $num;
	$string = "define('T_".$num."_YEAR".(($num > 1) ? 'S' : '')."', ".$val.");";
	fwrite($fh, $string.chr(10));
	eval($string);
	echo $string.chr(10);
}

// SOLAR YEARS
foreach ( range(0, 100) as $num )
{
	$val = 31558150 * $num;
	$string = "define('T_".$num."_SOLAR_YEAR".(($num > 1) ? 'S' : '')."', ".$val.");";
	fwrite($fh, $string.chr(10));
	eval($string);
	echo $string.chr(10);
	
}

?>