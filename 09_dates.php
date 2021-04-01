<?php

// Print current date
echo date('Y-m-d H:i:s').'<br>';

// Print yesterday
// 날짜 연산 (어제)
echo date('Y-m-d H:i:s', time() - 60 * 60 * 24).'<br>';

// Different format: https://www.php.net/manual/en/function.date.php
// 날짜 포맷 월 일 년
echo date('F j y, H:i:s').'<br>';

// Print current timestamp
// 타임스탬프
echo time().'<br>';

// Parse date: https://www.php.net/manual/en/function.date-parse.php
$parsedDate = date_parse('2021-03-29 09:00:00');
echo '<pre>';
var_dump($parsedDate);
echo '</pre>';

// Parse date from format: https://www.php.net/manual/en/function.date-parse-from-format.php
$dateString = 'February 4 2020 12:45:35';

$parsedDate = date_parse_from_format('F j y H:i:s', $dateString);
echo '<pre>';
var_dump($parsedDate);
echo '</pre>';
