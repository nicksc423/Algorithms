<?php 
	//Reddit programming challenge, rules found at: https://www.reddit.com/r/dailyprogrammer/comments/3r7wxz/20151102_challenge_239_easy_a_game_of_threes/

	$number = 31337357;
	threeify($number);

	function threeify($number) {
		while($number != 1) {
			if($number % 3 == 0) {
				echo $number." 0<br>";
				$number = $number / 3;
			}
			if($number % 3 == 1) {
				echo $number." -1<br>";
				$number = ($number -1) / 3;
			} else if ($number % 3 == 2) {
				echo $number." 1<br>";
				$number = ($number +1) / 3;
			}
		}
		echo "1";
	}
 ?>