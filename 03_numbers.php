<?php

// Declaring numbers
$a = 5;
$b = 4;
$c = 1.2;

// Arithmetic operations
// 변수의 연산 출력
echo ($a + $b) * $c . '<br>'; // 10.8 
echo $a - $b . '<br>'; // 1
echo $a * $b . '<br>'; // 20
echo $a / $b . '<br>'; // 1.25
echo $a % $b . '<br>'; // 1

// Assignment with math operators
// 연산 대입

// $a += $b; echo $a. '<br>'; // $a = 9
// $a -= $b; echo $a. '<br>'; // $a = 1
// $a *= $b; echo $a. '<br>'; // $a = 20
// $a /= $b; echo $a. '<br>'; // $a = 1.2
// $a %= $b; echo $a. '<br>'; // $a = 1


// Increment operator

echo $a++. '<br>'; // 출력된 뒤 연산
echo ++$a. '<br>'; // 연산된 뒤 출력

// Decrement operator
echo $a--. '<br>';
echo --$a. '<br>';


// Number checking functions
// 숫자인지 판별
is_float(1.25); // true
is_double(1.25); // true
is_int(5); // true
is_numeric("3.45"); // true
is_numeric("3g.45"); // false

// Conversion
// 형변환
$strNumber = '12.34';
$number = (float)$strNumber;
var_dump($number);
echo "<br> number : {$strNumber}";

// Number functions
// 숫자 관련 함수
echo "abs(-15) ". abs(-15) . '<br>'; // 절대값
echo "pow(2, 3) ". pow(2, 3) . '<br>'; // 2의 3승 (지수)
echo "sqrt(16) ". sqrt(16) . '<br>'; // 제곱근
echo "max(2, 3) ". max(2, 3) . '<br>'; // 최대 값
echo "min(2, 3) ". min(2, 3) . '<br>'; // 최소 값
echo "round(2.4) ". round(2.4) . '<br>'; // 반올림
echo "round(2.6) ". round(2.6) . '<br>'; // 반올림
echo "floor(2.6) ". floor(2.6) . '<br>'; // 내림
echo "ceil(2.4) ". ceil(2.4) . '<br>'; // 올림



// Formatting numbers
// 포맷팅
$number = 123456789.12345;
echo number_format($number, 2, '.' , ','); // 123,456,789.12

// php가 제공하는 함수에 대한 정보
// https://www.php.net/manual/en/ref.math.php
