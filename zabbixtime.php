<?php 

$lines = file($argv[1]);
$days = 0;
$hours = 0;
$minute = 0;
$second = 0;
foreach ($lines as  $value) {
	$time = explode(" ", $value);
	// var_dump($time);
	foreach ($time as $v) {
		// var_dump($v);
		if (strpos($v, "d") > 0) {
			$days += intval($v);
		}

		if (strpos($v, "h") > 0) {
			$hours += intval($v);
			
		}

		if (strpos($v, "m") > 0) {
			$minute += intval($v);
		}

		if (strpos($v, "s") > 0) {
			$second += intval($v);
		}
		
	}
}

if ($second>59) {
	$m = (int) floor($second / 60);
	$second = $second - ($m*60);
	$minute+=$m;
	$m = 0;
}


if ($minute>59) {
	$m = (int) floor($minute / 60);
	$minute = $minute - ($m*60);
	$hours+=$m;
	$m=0;
}


if ($hours>24) {
	$m = (int) floor($hours / 24);
	$hours =  $hours- ($m*24) ;
	$days+=$m;
	$m=0;
}
echo "Days:" . $days ."\n";
echo "Hours:" . $hours."\n";
echo "Minutes:" . $minute."\n";
echo "Second:" . $second."\n";

?>