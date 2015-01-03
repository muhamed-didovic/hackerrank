<?php
/* Head ends here */
function  insertionSort2( $ar) {
    $p = 1;
    while ($p <= count($ar) - 1) {
        $j = $p;
        $key = $ar[$p];
        while ($j > 0 && $ar[$j - 1] > $key) {
            $ar[$j] = $ar[$j-1];
            $j--;
        }
        $ar[$j] = $key;
        echo implode(' ', $ar).PHP_EOL;
        $p++;
    }
}
/* Tail starts here */
$fp = fopen("php://stdin", "r");

fscanf($fp, "%d", $m);
$temp = fgets($fp);
$arr = explode(' ',$temp);

for($i = 0; $i < $m; $i++)
{
    $arr[$i] = (int) $arr[$i];
}
insertionSort2($arr);

