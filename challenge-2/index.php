<?php

echo "Enter number range: ";
$handle = fopen ("php://stdin","r");
$n = fgets($handle);
$a = [];
for ($i=0; $i < $n; $i++) { 
    $a[] = rand(0, $n-1);
}

$duplication = [];
$arr = [];
foreach ($a as $key => $value) {
    $arr[ $value ] = isset($arr[ $value ]) ? $arr[ $value ] + 1 : 1;
}

foreach ($arr as $key => $value) {
    if( $value > 1 ){
        $duplication[] = $key; 
    }
}

echo implode(',', $duplication) . " is common in the set of " . implode(',', $a);