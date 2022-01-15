<?php

namespace App;

class FizzBuzz {

      public function getFizzBuzz($numb) {
        if($numb%3==0 && $numb%5==0) {
            return "FizzBuzz";
        } 
        if(($numb%3==0) || (str_contains($numb, '3'))) {
            return "Fizz";
        }
        if(($numb%5==0) || (str_contains($numb, '5'))){
            return "Buzz"; 
        }  
        return $numb;
    }
 
    
    public function printNumbers ($resultArray) : array {
        return $resultArray;

    }
 }


   