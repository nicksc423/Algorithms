<?php 
	function mergesort($arr) {
		if(count($arr) == 1) {
			return $arr;
		} 

		$mid = floor(count($arr)/2);
		$left = array_slice($arr, 0, $mid);
		$right = array_slice($arr, $mid);

		$left = mergesort($left);
		$right = mergesort($right);

		return merge($left, $right);
	}

	function merge($left, $right) {
		$result = array();

		while(count($left) > 0 && count($right) > 0) {
			if($left[0] > $right[0]) {
				$result[] = $right[0];
				$right = array_slice($right, 1);
			} else {
				$result[] = $left[0];
				$left = array_slice($left, 1);
			}
		}

		while (count($left) > 0) {
       		$result[] = $left[0];
        	$left = array_slice($left, 1);
    	}

    	while (count($right) > 0) {
        	$result[] = $right[0];
        	$right = array_slice($right, 1);
    	}

		return $result;
	}

	function populateArray() {
		$arr = array();
		for($i=0; $i<10; $i++) {
			$num = rand(0,1000);
			array_push($arr, $num);
		}
		return $arr;
	}

	var_dump(mergesort(populateArray()));
 ?>