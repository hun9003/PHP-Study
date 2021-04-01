<?php

// What is a variable




// Variable types

/*
    String
    Integer
    Float
    Boolean
    Null
    Array
    Object
    Resource
*/

// Declare variables

$name = 'Zura';
$age = 28;
$isMale = true;
$height = 1.85;
$salary = null;

// Print the variables. Explain what is concatenation
// 변수 출력
echo $name.'<br>';
echo $age.'<br>';
echo $isMale.'<br>'; // 브라우저에서 true 일시 1 출력 / false 일시 빈 문자열 출력
echo $height.'<br>';
echo $salary.'<br>'; // null 빈 문자열 출력

// Print types of the variables
// 변수의 타입 출력
echo gettype($name).'<br>';
echo gettype($age).'<br>';
echo gettype($isMale).'<br>';
echo gettype($height).'<br>';
echo gettype($salary).'<br>';

// Print the whole variable
// 변수의 정보 출력 타입(길이) 내용
var_dump($name, $age, $isMale, $salary, $height);

// Change the value of the variable
// 변수의 타입 변경
$name = false;

// Print type of the variable
// 변경된 변수의 타입 확인
echo gettype($name).'<br>';

// Variable checking functions
// 변수의 타입 판별
is_string($name); // false
is_int($age); // true
is_bool($isMale); // true
is_double($height); // true 


// Check if variable is defined
// 변수의 세팅 여부 확인
isset($name); // true
isset($address); // flase

// Constants
// 상수 선언
define('PI', 3.14);
echo PI.'<br>';

// Using PHP built-in constants
// PHP 내장 상수
echo SORT_ASC.'<br>'; // 오름차순 정렬
echo PHP_INT_MAX.'<br>'; // 최대 수
