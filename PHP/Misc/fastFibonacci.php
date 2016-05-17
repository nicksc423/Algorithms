<?php 
	function fastFibonacci($num, $dict = array("0" => 0, "1" => 1)) {
		if(!in_array(strval($num), $dict)) {
			$dict += array(strval($num) => fastFibonacci($num-1, $dict) + fastFibonacci($num-2), $dict);
		}
		return $dict[strval($num)];
	}

	function fibonacci ($num) {
		$fibs = array(0,1);
		foreach (range(2, $num+1) as $number) {
		    array_push($fibs, $fibs[$number-1] + $fibs[$number-2]);
		}
		return $fibs[$num];
	}

	echo "<h1> Regular Fibonacci </h1>";
	$start = microtime(true);
	var_dump(fibonacci(50));
	$duration = microtime(true) - $start;
	echo "<br>Duraiton:".$duration;

	echo "<h2> Worst Case Fast Fibonacci </h2>";
	$start = microtime(true);
	var_dump(fastFibonacci(50));
	$duration = microtime(true) - $start;
	echo "<br>Duraiton:".$duration;

	// echo "<h2> Best Case Fast Fibonacci </h2>";
	// $start = microtime(true);
	// $dict = fibToN(100);
	// var_dump(fastFibonacci(100, $dict));
	// $duration = microtime(true) - $start;
	// echo "<br>Duraiton:".$duration;

	// echo "<h2> Average Case Fast Fibonacci </h2>";
	// $start = microtime(true);
	// $dict = fibToN(50);
	// var_dump(fastFibonacci(8, $dict));
	// $duration = microtime(true) - $start;
	// echo "<br>Duraiton:".$duration;













 ?>