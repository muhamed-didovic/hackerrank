<?php

class Lego
{

    private $modulo = 1000000007;

    private $wall = array();
    
    private $n, $m;
    
    private $times = 0;

    public function __construct()
    {
    
    }
    
    private function printWall()
    {
        for ($i = 1; $i <= $this->n; $i++) {
            for ($j = 1; $j <= $this->m; $j++) {
                echo $this->wall[$i][$j];
            }
            echo PHP_EOL;
        }
    }
    
    private function checkWall()
    {
        for ($i = 1; $i <= $this->n; $i++) {
            for ($j = 1; $j <= $this->m; $j++) {
                if ($this->wall[$i][$j] == '[ ]') {
                    return false;
                }
            }
        }
     
        $cuts = array();
        
        for ($i = 1; $i <= $this->n; $i++) {
            $cuts[$i] = array();
            $v = $this->wall[$i][1];
            $count = 0;
            for ($j = 2; $j <= $this->m; $j++) {
                $count++;
                $intVal = str_replace(array('[',']'), '', $v);
                if ( ($v !== $this->wall[$i][$j]) || $v == '[1]' || ($count == $intVal)) {
                    $cuts[$i][] = $j - 1;
                    $v = $this->wall[$i][$j];
                    $count = 0;
                }
            }
        }

        $canCut = false;

        if (count($cuts) >= 2) {
            $intersection = $cuts[1];
            for ($i = 2; $i <= count($cuts); $i++) {
                $intersection = array_intersect($intersection, $cuts[$i]);
            }
            if (count($intersection)) {
                $canCut = true;
            }
        } else if (count($cuts) == 1) {
            if (count($cuts[1])) {
                $canCut = true;
            }
        }
        
        if ($canCut) {
            return false;
        }

        $this->times++;

    }
    
    private function recursiveWall($i, $j)
    {
        if ($i > $this->n || $j > $this->m) {
            return;
        }
        
        for ($l = 1; $l <= 4; $l++) {
            if ($j + $l - 1 <= $this->m) {
                for ($t = $j; $t <= $this->m; $t++) {
                    $this->wall[$i][$t] = '[ ]';
                }
                
                for ($k = 1; $k <= $l; $k++) {
                    $this->wall[$i][$j + $k - 1] = '['.$l.']';
                }
                
                $this->checkWall();
                
                if ($this->wall[$i][$this->m] != '[ ]') {
                    for ($t = 1; $t <= $this->m; $t++) {
                        $this->wall[$i+1][$t] = '[ ]';
                    }
                    $this->recursiveWall($i + 1, 1);
                    for ($t = 1; $t <= $this->m; $t++) {
                        $this->wall[$i+1][$t] = '[ ]';
                    }
                } else {
                    $j += $l;
                    $this->recursiveWall($i, $j);
                    $j -= $l;
                }
            }
        }
    }
    
    public function buildWall($n, $m)
    {
        $this->n = $n;
        $this->m = $m;
        
        $this->times = 0;
        
        for ($i = 1; $i <= $n; $i++) {
            for ($j = 1; $j <= $m; $j++) {
                $this->wall[$i][$j] = '[ ]';
            }
        }
        
        $this->recursiveWall(1,1);
        
        echo ($this->times % $this->modulo ). PHP_EOL;
    }


}

$fp = fopen(__DIR__ . '/inputs/lego_blocks.txt', "r");
//$fp = fopen("php://stdin", "r");
fscanf($fp, "%d", $t);

$lego = new Lego();
for ($i = 0; $i < $t; $i++) {
    fscanf($fp, "%d %d", $n, $m);
    $lego->buildWall($n, $m);
}

