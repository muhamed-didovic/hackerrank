<?php

function pairs($k, $ar)
{
    $pairs = 0;
    foreach ($ar as $i => $el) {
        for ($j = $i + 1; $j < count($ar); $j++) {
            if (abs($ar[$j] - $ar[$i]) == $k) {
                $pairs++;
            }
        }
    }
    
    echo $pairs . PHP_EOL;
}


//$fp = fopen("php://stdin", "r");
$fp = fopen(__DIR__ . '/inputs/pairs.txt', "r");
fscanf($fp, "%d %d", $n, $k);

$ar = array();
$s=fgets($fp);

$ar = explode(' ', $s);
for ($i=0; $i < count($ar); $i++) {
    $ar[$i] = (int)$ar[$i];
}

pairs($k, $ar);