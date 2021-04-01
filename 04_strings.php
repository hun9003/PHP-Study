<?php

// Create simple string

$name = 'Zura';
$string = 'Hello I am '.$name.'. I am 28';
$string2 = "Hello I am $name, I am 28";
echo $string.'<br>';
echo $string2.'<br>';

// String concatenation
echo 'Hello '. ' World'.' and PHP'.'<br>';

// String functions
// 문자열 함수

$string = "       Hello World        ";

echo "1 - " . strlen($string) . '<br>'; //26 문자열 길이
echo "2 - " . trim($string) . '<br>'; // 공백 제거
echo "3 - " . ltrim($string) . '<br>'; // 왼쪽 공백 제거
echo "4 - " . rtrim($string) . '<br>'; // 오른쪽 공백 제거
echo "5 - " . str_word_count($string) . '<br>'; // 단어의 갯수
echo "6 - " . strrev($string) . '<br>'; // 문자열을 반대로
echo "7 - " . strtoupper($string) . '<br>'; // 대문자로 변환
echo "8 - " . strtolower($string) . '<br>'; // 소문자로 변환
echo "9 - " . ucfirst('hello') . '<br>'; // 맨 첫글자 대문자
echo "10 - " . lcfirst('HELLO') . '<br>'; // 맨 첫글자 소문자
echo "11 - " . ucwords('hello world') . '<br>'; // 단어의 첫 글자 대문자
echo "12 - " . strpos($string, 'world') . '<br>'; // 문자열이 몇번째에 있는지 반환 (대소문자 구분)
echo "13 - " . stripos($string, 'world') . '<br>'; // 문자열이 몇번째에 있는지 반환 (대소문자 구분x)
echo "14 - " . substr($string, 8, 6) . '<br>'; // 문자열 자르기 (8번째부터 6글자까지)
echo "15 - " . str_replace('World', 'PHP', $string) . '<br>'; // 문자열 변환 World 를 PHP로(대소문자 구분)
echo "16 - " . str_ireplace('world', 'PHP', $string) . '<br>'; // 문자열 변환 World 를 PHP로(대소문자 구분x)

// Multiline text and line breaks
$longText = "
    Hello, my name is <b>Zura</b>
    I am <b>27</b>,
    I love my daughter
";

// Multiline text and reserve html tags
// 자동 줄바꿈
echo "1 - ".$longText. '<br>';
echo "2 - ".nl2br($longText). '<br>'; // 자동 줄바꿈
echo "3 - ".htmlentities($longText). '<br>'; // html 태그 적용x
echo "4 - ".nl2br(htmlentities($longText)). '<br>'; // html 태그 적용x
echo html_entity_decode('&lt;b&gt;27&lt;/b&gt;'); // html 디코딩

// https://www.php.net/manual/en/ref.strings.php