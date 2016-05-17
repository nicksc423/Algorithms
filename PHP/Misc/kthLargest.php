<?php
	//I DONT KNOW
	function kthLargest($arr, $k) {
		$left = 0;
		$right = count($arr)-1;
		while(true) {
			$pivIndex = ($left+$right)/2;
			$newPiv = partition($arr, $left, $right, $pivIndex);
			if($newPiv == $k) {
				return $arr[$newPiv];
			} elseif($newPiv < $k) {
				$left = $newPiv+1;
			} else {
				$right = $newPiv-1;
			}
		}
	}

	function partition($arr, $left, $right, $pivot) {
		$pivValue = $arr[$pivot];
		swap($arr, $pivot, $right);
		$storePos = $left;
		for($i=$left; $i<$right; $i++) {
			if($arr[$i] < $pivValue) {
				swap($arr, $i, $storePos);
				$storePos++;
			}
		}
		swap($list, $storePos, $right);
		return $storePos;
	}

	function swap($arr, $a, $b) {
		$temp = $arr[$a];
		$arr[$a] = $arr[$b];
		$arr[$b] = $temp;
	}
 ?>

 