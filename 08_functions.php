<?php

// Function which prints "Hello I am Zura"
// function hello()
// {
//     echo "Hello I am Zura";
// }
// hello();
// hello();
// hello();

// Function with argument
function hello($name) 
{
    return "Hello I am $name";
}
echo hello('Zura').'<br>';
echo hello('Brad').'<br>';

// Create sum of two functions
// function sum($a, $b)
// {
//     return $a + $b;
// }
// echo sum(4, 5);

// Create function to sum all numbers using ...$nums
// function sum(...$nums) // 파라미터 배열로 받기 가변인자
// {
//     $sum = 0;
//     foreach ($nums as $n) {
//         $sum += $n;
//     }
//     return $sum;
// }
// echo sum(1, 2, 3, 4, 5, 6);

// Arrow functions
function sum(...$nums) // 파라미터 배열로 받기 가변인자
{
    return array_reduce($nums, fn($carry, $n) => $carry + $n);
}
echo sum(1, 2, 3, 4, 5, 6);
