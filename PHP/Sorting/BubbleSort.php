<?php 
	function populateArray($arr) {
		for($i=0; $i<10; $i++) {
			$num = rand(0,100);
			array_push($arr, $num);
		}
		return $arr;
	}

	function bubbleSort($arr) {
		$iteration = 0;
		for($j = 0; $j < count($arr); $j++) {
			for($i = 0; $i < count($arr) - $iteration; $i++) {
				if(($i + 1) != (count($arr) - $iteration)) {
					if($arr[$i] > $arr[$i+1]) {
						$temp = $arr[$i];
						$arr[$i] = $arr[$i+1];
						$arr[$i+1] = $temp;
					}
				}
			}
			$iteration++;
		}
		return $arr;
	}


	//TODO:  Bubble sort using recursion
	
	// function recursiveBubbleSort($arr, $start, $end) {
	// 	if($start > $end) {
	// 		//we're done!
	// 	}

	// 	if($start == $end -1 ) {
	// 		//iterate to the next case
	// 		recursiveBubbleSort($arr, 0, $end-1);
	// 	} elseif($arr[$start]) {

	// 	}
	// }

	$arr = array();
	$arr = populateArray($arr);
	echo var_dump($arr);
	$arr = bubbleSort($arr);
	echo var_dump($arr);
 ?>