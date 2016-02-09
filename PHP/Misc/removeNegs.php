<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script>
		function removeNegs(arr) {
			var numNegs = 0;
			for(var idx=0; idx < arr.length; idx++) {
				if(arr[idx] >= 0) {
					arr[idx-numNegs] = arr[idx];
				} else {
					numNegs++;
				}
			}

			arr.length -= numNegs
			return arr;
		}

		var nums = [-1, 0, 4, -2, 3, -8, 9];
		console.log(removeNegs(nums));
	</script>
</head>
<body>
	
</body>
</html>