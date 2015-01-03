<?php

function  quickSort( $ar) 
{
    if (count($ar) <= 1) {
        return $ar;
    }
    
    $el = $ar[0];
    
    $ar1 = array();
    $ar2 = array();
    foreach ($ar as $k => $v) {
        if ($v < $el) {
            $ar1[] = $v;
        } else if ($v > $el){
            $ar2[] = $v;
        }
    }

    $ar1 = quickSort($ar1);
    $ar2 = quickSort($ar2);
    
    $sorted = array_merge($ar1, array($el), $ar2);
    
    echo implode(' ', $sorted) . PHP_EOL;
    
    return $sorted;
}


//$fp = fopen("php://stdin", "r");
$fp = fopen( __DIR__ . "/inputs/qs_p2.txt", "r");

fscanf($fp, "%d", $m);

$s  = fgets($fp);
$ar = explode(' ', trim($s));
for($i=0; $i < count($ar); $ar[$i++]+=0);

quickSort($ar);
