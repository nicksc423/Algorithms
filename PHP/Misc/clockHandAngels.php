<?php 
	$seconds = 43199;

	$hours = floor($seconds/3600);
	$seconds -= $hours * 3600;
	$minutes = floor($seconds/60);
	$seconds -= $minutes * 60;
	$hours = $hours%12;

	$hours = .5 * (60 * $hours + $minutes);
	$minutes = .1 * (60 * $minutes + $seconds);
	$seconds = $seconds * 6;
	echo $hours.", ".$minutes.", ".$seconds;
 ?>