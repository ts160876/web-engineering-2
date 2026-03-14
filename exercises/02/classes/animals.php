<?php
//The following tables includes all common attributes for the animals:
//Name   | Species   | Birthdate  | Gender
//--------------------------------------------------------------------
//Anton  | Alligator | 1980-01-15 | male
//Gerd   | Alligator | 1993-11-15 | male
//Felix  | Cheetah   | 2018-04-05 | male
//Anna   | Giraffe   | 2019-12-04 | female
//Karl   | Giraffe   | 2005-08-23 | male
//Herta  | Hippo     | 2017-07-30 | female
//Ludwig | Hippo     | 2024-09-09 | male
//Max    | Monkey    | 2020-02-27 | male

//The following table includes all common methods for the animals:
//Method            | What should it do 
//----------------------------------------------------------------
//eat($food)        | Example: The Alligator Anton is eating beef.
//sleep()           | Example: The Alligator Anton is sleeping.
//move()            | Example: The Alligator Anton is moving.
//describe()        | Print all attributes of the animal (including 
//                  | attributes defined in subclasses).
//getProperties()   | Return all attributes of the animal as keys
//                  | and their values (i.e., as associative array).

//The following tables describes the specific attributes and methods of a species:
//Species   | Attribute, Method
//--------------------------------------------------------------------------------
//Alligator | biteForce, deathRole()
//Cheetah   | topSpeed, sprint()
//Giraffe   | neckLength, reachHighLeaves()
//Hippo     | $waterSubmergeTime, submerge()
//Monkey    | tailLength, swingFromBranch()