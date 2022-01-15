<?php

namespace Tests;

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase {

    public function test_fizz_if_divisible_by_three(): void {
        $numb = 3;
        $fizzBuzz = new FizzBuzz();
        $result = $fizzBuzz->getFizzBuzz($numb);
        $this->assertEquals("Fizz", $result);
    }
       
    public function test_buzz_if_divisible_by_five(): void {
        $numb = 5;
        $fizzBuzz = new FizzBuzz();
        $result = $fizzBuzz->getFizzBuzz($numb);
        $this->assertEquals("Buzz", $result);
    }

    public function test_fizzbuzz_if_divisible_by_three_and_five(): void {
        $numb = 15;
        $fizzBuzz = new FizzBuzz();
        $result = $fizzBuzz->getFizzBuzz($numb);
        $this->assertEquals("FizzBuzz", $result);
    }
    
   public function test_printNumbers() {
        $arrayList = [];
        for ($numb = 1; $numb <= 100; $numb++) {
            array_push($arrayList, "$numb");
        }
        $resultArray = [];
        $fizzBuzz = new FizzBuzz();
        foreach ($arrayList as $numb) {
              array_push($resultArray, $fizzBuzz->getFizzBuzz($numb));
        }
        $List = $fizzBuzz->printNumbers($resultArray);
        $this->assertContains("Fizz", $List);         
    }

    public function test_fizz_if_contains_three(): void {
        $numb = 53;
        $fizzBuzz = new FizzBuzz();
        $result = $fizzBuzz->getFizzBuzz($numb);
        $this->assertEquals("Fizz", $result);
    }

    public function test_fizz_if_contains_five(): void {
        $numb = 665;
        $fizzBuzz = new FizzBuzz();
        $result = $fizzBuzz->getFizzBuzz($numb);
        $this->assertEquals("Buzz", $result);
    }
   
}
