<?php
    
class Check_Insertion
{
    private $shifts;

    private $ar;
    
    private function merge($i, $mid, $j) {
        $x = $i;
        $y = $mid + 1;
        $aux = array();

        while ($x <= $mid && $y <= $j) {
            if ($this->ar[$x] <= $this->ar[$y]) {
                $aux[] = $this->ar[$x];
                $x++;
            } else {
                $aux[] = $this->ar[$y];
                $y++;
                $this->shifts += $mid - $x + 1;
            }
        }

        if ($x <= $mid) {
            for (; $x <= $mid; $x++) {
                $aux[] = $this->ar[$x];
            }
        }

        if ($y <= $j) {
            for (; $y <= $j; $y++) {
                $aux[] = $this->ar[$y];
            }
        }

        for ($k = $i; $k <= $j; $k++) {
            $this->ar[$k] = $aux[$k - $i];
        }
    }    
    
    private function mergeSort($p, $q)
    {
        if ($i < $j) {
            $mid = floor(($i + $j) / 2);
            $this->mergeSort($i, $mid);
            $this->mergeSort($mid + 1, $j);
            $this->merge($i, $mid, $j);
        }        
    }
    
    public function check($ar)
    {
        $this->ar = $ar;
        $this->shifts = 0;
        $this->mergeSort(0, count($ar) - 1);
        echo $this->shifts.PHP_EOL;
    }
}

$fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

fscanf($fp, "%d", $t);

$check = new Check_Insertion();

for($i = 0; $i < $t; $i++)
{
    fscanf($fp, "%d", $n);
    $temp = fgets($fp);
    $arr = explode(' ',$temp);    
    for($j = 0; $j < $n; $j++)
    {
        $arr[$j] = (int) $arr[$j];
    }    
    
    $check->check($arr);
}