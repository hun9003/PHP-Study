<?php
// Magic constants
echo __DIR__.'<br>'; // 경로 디렉토리까지
echo __FILE__.'<br>'; // 경로 파일까지
echo __LINE__.'<br>'; // 자신의 줄 라인 출력 // 5

// Create directory
//mkdir('test'); // 폴더 생성

// Rename directory
//rename('test', 'test2'); // 생성된 폴더 이름 바꾸기

// Delete directory
//rmdir('test2'); // 폴더 삭제

// Read files and folders inside directory
// echo file_get_contents('lorem.txt'); // 파일 생성

$files = scandir('./'); // 경로 배열로 담기
echo '<pre>';
var_dump($files);
echo '</pre>';

// file_get_contents, file_put_contents
echo file_get_contents('lorem.txt'); // 파일 내용 가져오기
// file_put_contents('sample.txt', 'Some Content'); // 파일 생성후 해당 내용 삽입

// file_get_contents from URL
// $usersJson = file_get_contents('https://jsonplaceholder.typicode.com/users'); // json 파일 가져오기
// echo $usersJson;
// $users = json_decode($usersJson, true); // json파일 디코딩
// echo '<pre>';
// var_dump($users);
// echo '</pre>';

file_exists('sample.txt'); // true 파일 있는지 여부
is_dir('test'); // 특정 파일이 디렉토리인지 아닌지 여부

// 파일 관련 함수 정보 사이트
// https://www.php.net/manual/en/book.filesystem.php

// file_exists
// is_dir
// filemtime
// filesize
// disk_free_space
// file