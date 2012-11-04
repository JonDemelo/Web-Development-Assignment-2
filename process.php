<?php
function mycount ($sum) {
	$numbers = str_split($sum); // break into array
	$tot = 0;
	foreach ($numbers as $tempNum) { // add array elements
    	$tot += $tempNum;
	}
	
	if($tot > 9)
		$tot = mycount($tot); // recursive call

	return $tot; // return value
} 

$str = $_GET['checked'] . $_GET['date']; //combine inputs
str_replace('0', '', $str); // remove 0's
$lucky = mycount($str); // start recursive
$lucky = (empty($lucky)) ? 'Error: Invalid Number' : 'Your lucky number is '. $lucky;
echo $lucky;
?>