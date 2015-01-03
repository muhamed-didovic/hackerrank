<?php
/* Head ends here */
function  insertionSort( $ar) {
    $p = count($ar) - 1;
    $el = $ar[$p];

    while ($p > 0 && $el < $ar[$p - 1]) {
        $ar[$p] = $ar[$p - 1];
        $p--;
        echo implode(' ', $ar).PHP_EOL;
    }
    $ar[$p] = $el;
    echo implode(' ', $ar).PHP_EOL;
}
/* Tail starts here */
$fp = fopen("php://stdin", "r");
fscanf($fp, "%d", $m);
$ar = array();
$s=fgets($fp);
$ar = explode(' ', $s);
for($i=0;$i < count($ar);$ar[$i++]+=0);
insertionSort($ar);
