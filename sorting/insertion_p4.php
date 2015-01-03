<?php
/* Head ends here */
function  insertionSort( $ar) {
    $p = 1;
    $shifts = 0;
    while ($p <= count($ar) - 1) {
        $j = $p;
        $key = $ar[$p];
        while ($j > 0 && $ar[$j - 1] > $key) {
            $ar[$j] = $ar[$j-1];
            $j--;
            $shifts++;
        }
        $ar[$j] = $key;
        //echo implode(' ', $ar).PHP_EOL;
        $p++;
    }
    echo $shifts;
}
/* Tail starts here */
$fp = fopen("php://stdin", "r");
fscanf($fp, "%d", $m);
$ar = array();
$s=fgets($fp);
$ar = explode(' ', $s);
for($i=0;$i < count($ar);$ar[$i++]+=0);
insertionSort($ar);