<?php

function result($n, $d){
	$struct = array();
	$number = 0;

	foreach($n as $fucknkey => $fucknvalue){
		$struct[$fucknvalue] = true;
	}

	foreach($struct as $fuckskey => $fucksvalue){
		if(!empty($struct[$fuckskey + $d]) and $struct[$fuckskey + $d] === true){
			$number++;
		}
	}

	return $number;
}

$a = [1,5,3,4,2];
echo "<pre>";
print_r(result($a, 2));
echo "</pre>";


/*$difference = explode(' ', fgets($_fp));
$difference = $difference[1];
$numbers = explode(' ', fgets($_fp));

fwrite(STDOUT, result($numbers, $difference));*/

//javascript
/*function result(numbers, difference){
	var struct = {},
		number = 0;

	for(var i in numbers){
		struct[numbers[i]] = true;
	}

	for(var i in struct){
		if(struct[i + difference]){
			number++;
		}
	}

	return number;
}*/