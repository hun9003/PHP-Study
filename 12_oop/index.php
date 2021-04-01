<?php

// What is class and instance
require_once "Person.php";
require_once "Student.php";
// Create Person class in Person.php


// Create instance of Person

// Using setter and getter

// $p = new Person("Brad", "Traversy");
// $p->setAge(27);
// echo '<pre>';
// var_dump($p);
// echo '</pre>';
// echo $p->getAge();


// $p2 = new Person('John', 'Smith');

// echo '<pre>';
// var_dump($p2);
// echo '</pre>';
// echo Person::getCounter();
// echo $p->name.'<br>';

$student = new Student("Brad", 'Traversy', '1234');
echo '<pre>';
var_dump($student);
echo '</pre>';