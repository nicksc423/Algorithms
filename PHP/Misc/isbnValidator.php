<?php 
	//Reddit programming challenge, rules found at: https://www.reddit.com/r/dailyprogrammer/comments/2s7ezp/20150112_challenge_197_easy_isbn_validator/

	$isbn = generateISBN();
	validateISBN($isbn);
	

	function validateISBN($isbn) {
		$isbn = str_replace("-", "", $isbn);
		$sum = 0;

		for($i=0; $i<strlen($isbn)-1; $i++) {
			$sum += ((10-$i) * $isbn[$i]);
		}
		if($isbn[strlen($isbn)-1] == "X") {
			$sum+=10;
		} else {
			$sum += intval($isbn[strlen($isbn)-1]);
		}

		if($sum % 11 == 0) {
			echo "real ISBN";
		} else {
			echo "not correct";
		}
	}

	function generateISBN() {
		$isbn = "";
		$total = 0;
		for($i = 0; $i < 9; $i++) {
			$number = rand(0,9);
			$isbn .= $number;
			$total += $number * (10 - $i);
		}
		$modDiff = 11 - ($total % 11);
		if($modDiff == 10) {
			$isbn .= "X";
		} else {
			$isbn .= $modDiff;
		}
		return $isbn;
	}
	
 ?>