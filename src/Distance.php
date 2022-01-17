<?php


namespace App;
 
class Distance{
    
    function distance(string $strandA, $strandB)
    {
        if (strlen($strandA) !==  strlen($strandB))  {
            throw new  InvalidArgumentException('DNA strands must be of equal length.');
        }
        else {
        $array1 = str_split($strandA);
        $array2 = str_split($strandB);
        $hamming_distance = 0;
        foreach ($array1 as $index=>$char) {
            if ($array1[$index] !== $array2[$index]) {
                $hamming_distance++;
            }
        }
        return $hamming_distance;
        }
    }
}

