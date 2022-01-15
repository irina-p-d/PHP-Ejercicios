# Ejercicios PHP de exercism.org

## Requiered

- PHP 8.0
- Composer installed

## Install

- composer install

## Run Tests

- vendor/bin/phpunit
or
- composer test

### Resuelve ejercicio "Robot Simulator" de Exercism:

Write a robot simulator.

A robot factory's test facility needs a program to verify robot movements.

The robots have three possible movements:

turn right
turn left
advance
Robots are placed on a hypothetical infinite grid, facing a particular direction (north, east, south, or west) at a set of {x,y} coordinates, e.g., {3,8}, with coordinates increasing to the north and east.

The robot then receives a number of instructions, at which point the testing facility verifies the robot's new position, and in which direction it is pointing.

The letter-string "RAALAL" means:
Turn right
Advance twice
Turn left
Advance once
Turn left yet again
Say a robot starts at {7, 3} facing north. Then running this stream of instructions should leave it at {9, 4} facing west.


### Resuelve ejercicio "Anagram" de Exercism:
Instructions
An anagram is a rearrangement of letters to form a new word. Given a word and a list of candidates, select the sublist of anagrams of the given word.

Given "listen" and a list of candidates like "enlists" "google" "inlets" "banana" the program should return a list containing "inlets".

The skipped tests near the bottom of the anagram_test.php are Stretch Goals, they are optional. They require the usage of mb_string functions, which aren't installed by default with every version of PHP.

