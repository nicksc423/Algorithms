<?php 
	//Reddit programming challenge, rules found at: https://www.reddit.com/r/dailyprogrammer/comments/341c03/20150427_challenge_212_easy_r%C3%B6varspr%C3%A5ket/

	$string = "hello world";

	$regexConsonant = "/[b-df-hj-np-tv-xz]/";
	for($i=0;$i<strlen($string); $i++) {
		if(preg_match($regexConsonant, $string[$i]) > 0 ) {
			echo $string[$i]."o".$string[$i];
		} else {
			echo $string[$i];
		}
	}
	echo "<br>";
	$robberSpeak = "hohelollolo wowororloldod";
	for($i=0;$i<strlen($robberSpeak); $i++) {
		if(preg_match($regexConsonant, $robberSpeak[$i]) > 0 ) {
			echo $robberSpeak[$i];
			$i++;
			$i++;
		} else {
			echo $robberSpeak[$i];
		}
	}

 ?>