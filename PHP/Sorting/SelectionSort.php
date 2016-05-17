<?php 
	$arr = array();
	$arr = populateArray($arr);
	$test = sort($arr);

	############ Test Regular function ##################

	$start = microtime(true);
	$sorted = selectionSort($arr);
	$end = microtime(true);
	$duration = $end-$start;
	$correct = $test == $sorted;

	echo "<h2> Regular Selection Sort </h2>";
	echo "<p> Duration: ".$duration."</p>";
	echo "<p> should be 1: ".$correct."</p>";

	############ Test Recusive function ################

	$start = microtime(true);
	$sorted = recursiveSelectionSort($arr, 0, count($arr)-1);
	$end = microtime(true);
	$duration = $end-$start;
	$correct = $test == $sorted;
	echo "<h2> Recursive Selection Sort </h2>";
	echo "<p> Duration: ".$duration."</p>";
	echo "<p> should be 1: ".$correct."</p>";
	
	//TODO: Add recursion

	function populateArray($arr) {
		for($i=0; $i<2000; $i++) {
			$num = rand(0,10000);
			array_push($arr, $num);
		}
		return $arr;
	}

	function recursiveSelectionSort($arr, $start, $end) {
		//if start is greater than end then we hit our base case
		if($start > $end) {
			return $arr;
		}

		$min = $arr[$start];
		$minIndex = $start;
		$max = $arr[$end];
		$maxIndex = $end;

		for($i=$start; $i<= $end; $i++) {
			if($arr[$i] > $max) {
				$max = $arr[$i];
				$maxIndex = $i;
			}
			if($arr[$i] < $min) {
				$min = $arr[$i];
				$minIndex = $i;
			}
		}

		//sort min
		$tempValue = $arr[$start];
		$arr[$start] = $min;
		$arr[$minIndex] = $tempValue;
		//if the max value got moved, reassign its location
		if($maxIndex == $start) {
			$maxIndex = $minIndex;
		}

		//set max
		$tempValue = $arr[$end];
		$arr[$end] = $max;
		$arr[$maxIndex] = $tempValue;

		//iterate
		$start++;
		$end--;

		return recursiveSelectionSort($arr, $start, $end);
	}



	function selectionSort($arr) {
		$start = 0;
		$end = count($arr);
		while($start < $end) {
			//set initial values
			$min = $arr[$start];
			$minIndex = $start;
			$max = $arr[$start];
			

			//iterate through and reassign
			for($i=$start; $i<= $end; $i++) {
				if($arr[$i] > $max) {
					$max = $arr[$i];
					$maxIndex = $i;
				}
				if($arr[$i] < $min) {
					$min = $arr[$i];
					$minIndex = $i;
				}
			}

			//sort min
			$tempValue = $arr[$start];
			$arr[$start] = $min;
			$arr[$minIndex] = $tempValue;
			//if the max value got moved, reassign its location
			if($maxIndex == $start) {
				$maxIndex = $minIndex;
			}

			//set max
			$tempValue = $arr[$end];
			$arr[$end] = $max;
			$arr[$maxIndex] = $tempValue;

			//iterate
			$start++;
			$end--;
		}

		return $arr;
	}


 ?>