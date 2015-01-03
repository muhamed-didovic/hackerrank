<?php
/* Head ends here */

function  partition( $ar) 
{
    if (count($ar) == 1) {
        echo $ar[0];
        return;
    }
    
    $p = $ar[0];
    $aux1 = array();
    $aux2 = array();

    for ($i = 1; $i < count($ar); $i++) {
        if ($ar[$i] < $p) {
            $aux1[] = $ar[$i];
        } else {
            $aux2[] = $ar[$i];
        }
    }
    echo trim(implode(' ', $aux1) . ' ' . $p . ' ' . implode(' ', $aux2));
}


/* Tail starts here */
$fp = fopen("php://stdin", "r");

fscanf($fp, "%d", $m);
$ar = array();
$s  = fgets($fp);
$ar = explode(' ', trim($s));
for($i=0;$i < count($ar);$ar[$i++]+=0);

partition($ar);
