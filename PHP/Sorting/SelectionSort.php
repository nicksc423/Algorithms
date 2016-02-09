<?php 
	$arr = array();
	$arr = populateArray($arr);

	echo "<h2> Unsorted Array </h2>";
	foreach ($arr as $value) {
		echo "<p>".$value."</p>";
	}

	selectionSort($arr, 0, count($arr)-1);
	
	//TODO: Fix the recursion

	function populateArray($arr) {
		for($i=0; $i<100; $i++) {
			$num = rand(0,10000);
			array_push($arr, $num);
		}
		return $arr;
	}

	function selectionSort($arr, $start, $end) {
		if($start < $end) {
			//set initial values
			$min = $arr[$start];
			$minLocation = $start;
			$max = $arr[$start];
			$maxLocation = $start;

			//iterate through and reassign
			for($i=$start; $i<= $end; $i++) {
				if($arr[$i] > $max) {
					$max = $arr[$i];
					$maxLocation = $i;
				}
				if($arr[$i] < $min) {
					$min = $arr[$i];
					$minLocation = $i;
				}
			}

			//sort min
			$tempValue = $arr[$start];
			$arr[$start] = $min;
			$arr[$minLocation] = $tempValue;
			//if the max value got moved, reassign its location
			if($maxLocation == $start) {
				$maxLocation = $minLocation;
			}

			//set max
			$tempValue = $arr[$end];
			$arr[$end] = $max;
			$arr[$maxLocation] = $tempValue;

			//iterate
			$start++;
			$end--;

			//recurse
			selectionSort($arr, $start, $end);
		} else {
			//we are done, print the array!
			echo "<h2> Sorted Array </h2>";
			foreach ($arr as $value) {
				echo "<p>".$value."</p>";
			}
		}
	}
 ?>