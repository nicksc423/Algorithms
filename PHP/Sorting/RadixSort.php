<?php 
	function microtime_float()
	{
	    list($usec, $sec) = explode(" ", microtime());
	    return ((float)$usec + (float)$sec);
	}

	function populateArray() {
		$arr = array();
		for($i=0; $i<10; $i++) {
			$num = rand(0,1000);
			array_push($arr, $num);
		}
		return $arr;
	}

	function radixSort($arr) {
		//find the max number of digits in the given array
		$maxDigits = strlen((string)max($arr));

		$buckets = array();

		//iterate through the array
		for($i=1; $i<=$maxDigits; $i++) {
			//clean the bucket
			for($b=0; $b<10; $b++) {
				$buckets[$b] = [];
			}

			for ($j = 0; $j < count($arr); $j++) {
			    // Drop into the proper bucket based on the significant digit
			    $numStr = decbin($arr[$j]);
			    $numLen = strlen($numStr) ;
			    if ($numLen < $i) {
			        $bucketsIndex = 0;
			    } else {
			        $bucketsIndex = $numStr[$numLen - $i];
			    }
			    array_push($buckets[$bucketsIndex], $arr[$j]);
			}

			$k = 0;
	        foreach ($buckets as $bucket) {
	            foreach ($bucket as $value) {
	                $arr[$k] = $value;
	                $k++;
	            }
        	}
		}
		return $arr;
	}

	function binaryRadixSort($arr) {
		//calculate max number of digits in binary
		$maxDigits = strlen(decbin(max($arr)));
		//initialize buckets
		$buckets = array();
		//for the number of digits in binary
		for($i=1; $i<=$maxDigits; $i++) {
			//clean the bucket
			for($b=0; $b<2; $b++) {
				$buckets[$b] = [];
			}
			//for every object in the array
			for ($j = 0; $j < count($arr); $j++) {
				//turn the number into binary
				$number = decbin($arr[$j]);
				//add leading 0s
				while(strlen($number) < $maxDigits) {
					$number = "0".$number;
				}
				//if the position we are at is a 0
				if($number[$maxDigits-1-$i] == 0) {
					//put it in the 0 bucket
					array_push($buckets[0], $arr[$j]);
				//else it is a 1
				} else {
					//put it in the 1 bucket
					array_push($buckets[1], $arr[$j]);
				}
			}

			//resort into our array
			$k = 0;
	        foreach ($buckets as $bucket) {
	            foreach ($bucket as $value) {
	                $arr[$k] = $value;
	                $k++;
	            }
        	}
		}
		return $arr;
	}

	$arr = populateArray();

	$time_start = microtime_float();
	radixSort($arr);
	$time_end = microtime_float();

	echo "<h1>Regular Radix Sort</h1>";
	echo $time_end - $time_start."<br>";

	$time_start = microtime_float();
	binaryRadixSort($arr);
	$time_end = microtime_float();

	echo "<h1>Binary Radix Sort</h1>";
	echo $time_end - $time_start;

 ?>