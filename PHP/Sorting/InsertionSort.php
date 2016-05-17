<?php 

	function insertionSort($arr, $maxIndex, $iteration) {
		if($iteration == $maxIndex-1) {
	        //base case: we are at the last element
	        // echo "<h1>Iteration ".$iteration."</h1>";
	        // echo var_dump($arr);
	        return $arr;
	    }
	    else {
	        $sorted = insertionSort($arr, $maxIndex, $iteration+1);
	        $element = $arr[$iteration];
	        // All elements to the right of index $i are assumed to be sorted.
	        // Now we just have to figure out where $el fits in the sorted array
	        for($i = $iteration+1; $i<$maxIndex; $i++){
	            if($element > $sorted[$i]){
	                // $el is bigger, swap so $el moves to the right in the array.
	                $sorted[$i-1] = $sorted[$i];
	                $sorted[$i] = $element;
	            }
	        }
	        // echo "<h1>Iteration ".$iteration."</h1>";
	        // echo var_dump($sorted);
	        return $sorted;
	    }
	}

	function populateArray($arr) {
		for($i=0; $i<10; $i++) {
			$num = rand(0,100);
			array_push($arr, $num);
		}
		return $arr;
	}

	$arr = array();
	$arr = populateArray($arr);
	$sorted = insertionSort($arr, count($arr), 0);
	echo var_dump($arr);
	echo "<br>";
	echo var_dump($sorted);

 ?>