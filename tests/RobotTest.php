<?php

namespace Tests;


use PHPUnit\Framework\TestCase;
use App\Robot;

class RobotTest extends TestCase {

   
    /**
     * A robot is created with a position and a direction
     */
    public function testCreate(): void
    {
        // Robots are created with a position and direction
        $robot = new Robot([0, 0], Robot::DIRECTION_NORTH);
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_NORTH, $robot->direction);
        // Negative positions are allowed
        $robot = new Robot([-1, -1], Robot::DIRECTION_SOUTH);
        $this->assertEquals([-1, -1], $robot->position);
        $this->assertEquals(Robot::DIRECTION_SOUTH, $robot->direction);
    }
    /**
     * Rotate the robot's direction 90 degrees clockwise
     */
    public function testTurnRight(): void
    {
        $robot = new Robot([0, 0], Robot::DIRECTION_NORTH);
        // Change the direction from north to east
        $robot->turnRight();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_EAST, $robot->direction);
        // Change the direction from east to south
        $robot->turnRight();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_SOUTH, $robot->direction);
        // Change the direction from south to west
        $robot->turnRight();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_WEST, $robot->direction);
        // Change the direction from west to north
        $robot->turnRight();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_NORTH, $robot->direction);
    }
    /**
     * Rotate the robot's direction 90 degrees counterclockwise
     */
    public function testTurnLeft(): void
    {
        $robot = new Robot([0, 0], Robot::DIRECTION_NORTH);
        // Change the direction from north to west
        $robot->turnLeft();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_WEST, $robot->direction);
        // Change the direction from west to south
        $robot->turnLeft();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_SOUTH, $robot->direction);
        // Change the direction from south to east
        $robot->turnLeft();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_EAST, $robot->direction);
        // Change the direction from east to north
        $robot->turnLeft();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_NORTH, $robot->direction);
    }
    /**
     * Move the robot forward 1 space in the direction it is pointing
     */
    public function testAdvance(): void
    {
        // Increases the y coordinate by one when facing north
        $robot = new Robot([0, 0], Robot::DIRECTION_NORTH);
        $robot->advance();
        $this->assertEquals([0, 1], $robot->position);
        $this->assertEquals(Robot::DIRECTION_NORTH, $robot->direction);
        // Decreases the y coordinate by one when facing south
        $robot = new Robot([0, 0], Robot::DIRECTION_SOUTH);
        $robot->advance();
        $this->assertEquals([0, -1], $robot->position);
        $this->assertEquals(Robot::DIRECTION_SOUTH, $robot->direction);
        // Increases the x coordinate by one when facing east
        $robot = new Robot([0, 0], Robot::DIRECTION_EAST);
        $robot->advance();
        $this->assertEquals([1, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_EAST, $robot->direction);
        // Decreases the x coordinate by one when facing west
        $robot = new Robot([0, 0], Robot::DIRECTION_WEST);
        $robot->advance();
        $this->assertEquals([-1, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_WEST, $robot->direction);
    }
    /**
     * Where R = Turn Right, L = Turn Left and A = Advance,
     * the robot can follow a series of instructions
     * and end up with the correct position and direction
     */
    public function testInstructions(): void
    {
        // Instructions to move west and north
        $robot = new Robot([0, 0], Robot::DIRECTION_NORTH);
        $robot->instructions('LAAARALA');
        $this->assertEquals([-4, 1], $robot->position);
        $this->assertEquals(Robot::DIRECTION_WEST, $robot->direction);
        // Instructions to move west and south
        $robot = new Robot([2, -7], Robot::DIRECTION_EAST);
        $robot->instructions('RRAAAAALA');
        $this->assertEquals([-3, -8], $robot->position);
        $this->assertEquals(Robot::DIRECTION_SOUTH, $robot->direction);
        // Instructions to move east and north
        $robot = new Robot([8, 4], Robot::DIRECTION_SOUTH);
        $robot->instructions('LAAARRRALLLL');
        $this->assertEquals([11, 5], $robot->position);
        $this->assertEquals(Robot::DIRECTION_NORTH, $robot->direction);
    }
    /*public function testMalformedInstructions(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $robot = new Robot([0, 0], Robot::DIRECTION_NORTH);
        $robot->instructions('LARX');
    }*/
    /**
     * Optional instructions chaining
     */
    public function testInstructionsChaining(): void
    {
        $robot = new Robot([0, 0], Robot::DIRECTION_NORTH);
        $robot->turnLeft()
            ->advance()
            ->advance()
            ->advance()
            ->turnRight()
            ->advance()
            ->turnLeft()
            ->advance();
        $this->assertEquals([-4, 1], $robot->position);
        $this->assertEquals(Robot::DIRECTION_WEST, $robot->direction);
    }
   
   
   
   
   
   
   
   
   
   
   
   
    /*  public function test_fizz_if_divisible_by_three(): void {
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
    } */
   
}
