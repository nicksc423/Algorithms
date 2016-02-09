<?php 
	$var1 = 4354643567;
	$var2 = 546;
	$total = 1;
	$counter = 0;
	for ($i=0; $i < $var2; $i++) { 
		$total *=$var1;
		if($total > 10 ) {
			$total = $total % 10;
		}
	}
	echo "the value in the ones position of ".$var1." pow ".$var2." is: ".$total;
 ?>