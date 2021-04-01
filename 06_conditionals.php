<?php

$age = 20;
$salary = 300000;

// Sample if
// 조건문 예제
// if ($age === 20) {
//     echo "1";
// }

// // Without circle braces
// // 중괄호 생략
// if ($age === 20) echo "1";

// // Sample if-else
// // if ~ else 문 예제
// if ($age > 20) {
//     echo "1";
// } else {
//     echo "2";
// }

// Difference between == and ===
// if ($age === 20) {
//     echo "1".'<br>';
// }
// if ($age == '20') {
//     echo "2".'<br>';
// } // 문자열로 해도 인식

$age == 20; // true
$age == '20'; // true

$age === 20; // true
$age === '20'; // false 데이터타입까지 일치해야 함

// if AND
if ($age > 20 && $salary === 300000) {
    echo "Do somthing";
}

// if OR
if ($age > 20 || $salary === 300000) {
    echo "Do somthing";
}

// Ternary if
// 삼항 연산자
echo $age < 22 ? 'Young' : 'Old'; 

// Short ternary
$myAge = $age ?: '18'; // myAge가 age와 같으면 그대로 대임 아니면 18을 대입
echo '<pre>';
var_dump($myAge);
echo '</pre>';

// Null coalescing operator
$myName = isset($name) ? $name : 'John';
$myName = $name ?? 'John';

// switch
$userRole = 'admin';
switch ($userRole) {
    case 'admin':
        echo 'admin';
        break;
    case 'editor':
        echo 'editor';
        break;
    case 'user':
        echo 'user';
        break;
    default:
        echo 'Invalid role';
}