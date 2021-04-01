<?php

// Create array
// 배열 생성
$fruits = ["Banana", "Apple", "Orange"];

// Print the whole array
// 배열 정보 출력
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// // Get element by index
// // 배열 인덱스별 출력
// echo $fruits[1].'<br>';

// // Set element by index
// // 배열 인덱스 초기화
// $fruits[0] = 'Peach';
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// // Check if array has element at index 2
// // 배열 인덱스 세팅 확인
// isset($fruits[2]);

// // Append element
// // 배열 뒤에 삽입
// $fruits[] = 'Banana';
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// // Print the length of the array
// // 배열 갯수 파악
// echo count($fruits).'<br>';

// // Add element at the end of the array
// // 배열 뒤에 삽입
// array_push($fruits, 'foo');
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// // Remove element from the end of the array
// // 마지막 배열 삭제
// echo array_pop($fruits);
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// // Add element at the beginning of the array
// // 맨 처음 배열에 요소 추가
// array_unshift($fruits, 'bar');
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// // Remove element from the beginning of the array
// // 맨 처음 요소 삭제
// echo array_shift($fruits);

// // Split the string into an array
// // 문자열 배열로 변환
// $string = "Banana,Apple,Peach";
// echo '<pre>';
// var_dump(explode(",", $string));
// echo '</pre>';

// // Combine array elements into string
// // 배열을 문자열로 변환
// echo implode("&", $fruits);

// // Check if element exist in the array
// // 배열에 요소가 있는지 판별
// echo '<pre>';
// var_dump(in_array('Mango', $fruits));
// echo '</pre>';

// // Search element index in the array
// // 배열에 요소의 인덱스를 출력
// echo '<pre>';
// var_dump(array_search('Apple', $fruits));
// echo '</pre>';

// // Merge two arrays
// // 배열 합치기
// $vegetables = ["potato", "cucumber"];
// echo '<pre>';
// var_dump(array_merge($fruits, $vegetables));
// var_dump([...$fruits, ...$vegetables]);
// echo '</pre>';

// // Sorting of array (Reverse order also)
// // 배열 정렬 오름차순
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// sort($fruits); // 오름차순
// rsort($fruits); // 내림차순

// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// https://www.php.net/manual/en/ref.array.php

// ============================================
// Associative arrays
// ============================================

// Create an associative array
// 키 값 형태 배열 생성
$person = [
    'name' => 'Brad',
    'surname' => 'Traversy',
    'age' => 30,
    'hobbies' => ['Tennis', 'Video Games']
];
echo '<pre>';
var_dump($person);
echo '</pre>';

// Get element by key
// 키 가져오기
echo $person['name'].'<br>';


// Set element by key
// 키 세팅하기
$person['channel'] = 'TraversyMedia';
echo '<pre>';
var_dump($person);
echo '</pre>';

// Null coalescing assignment operator. Since PHP 7.4

// if (!isset($person['address'])){
//     $person['address'] = 'unknown';
// }

// ?? 논리연산 isset과 동일한 역할
// $person['address'] = $person['address'] ?? 'unknown';

// 위의 논리와 동일
$person['address'] ??= 'unknown';

echo '<pre>';
var_dump($person);
echo '</pre>';

// Check if array has specific key

// Print the keys of the array
// 키를 배열로 출력
echo '<pre>';
var_dump(array_keys($person));
echo '</pre>';

// Print the values of the array
// 값을 배열로 출력
echo '<pre>';
var_dump(array_values($person));
echo '</pre>';

// Sorting associative arrays by values, by keys
asort($person); // 키 오름차순 정렬
ksort($person); // 키 내림차순 정렬
echo '<pre>';
var_dump($person);
echo '</pre>';

// Two dimensional arrays

$todos = [
    ['title' => 'Todo title 1', 'completed' => true],
    ['title' => 'Todo title 2', 'completed' => false]
];
echo '<pre>';
var_dump($todos);
echo '</pre>';