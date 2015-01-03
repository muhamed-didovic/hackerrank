<?php

function myRegex($string) 
{
    $patterns = array(
        array('pattern' => '#^hackerrank(.*)hackerrank$#', 'display' => 0), // starts and ends with hackerrank        
        array('pattern' => '#^hackerrank$#', 'display' => 0), // starts and ends with hackerrank                
        array('pattern' => '#^hackerrank#', 'display' => 1), // start with hackerrank
        array('pattern' => '#hackerrank$#', 'display' => 2), // ends with hackerrank
    );
    $found = -1;
    foreach ($patterns as $pattern) {
        preg_match($pattern['pattern'], $string, $matches);
        if ($matches) {
            $found = $pattern['display'];
            break;
        }
    }
    echo $found.PHP_EOL;
}
    
$fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

fscanf($fp, "%d", $m);

for($i = 0; $i < $m; $i++)
{
    $string = fgets($fp);
    myRegex($string);
}
