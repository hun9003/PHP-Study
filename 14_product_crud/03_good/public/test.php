<?php
function func_test(String $argc=null){
    echo 'FUNC => '.$argc;
    echo PHP_EOL;
}

echo "TEST CASE 1";
echo PHP_EOL;

call_user_func('func_test', '1111');

echo "TEST CASE 2";
echo PHP_EOL;

call_user_func('func_test');

echo "TEST CASE 3";
echo PHP_EOL;
func_test('33333');

echo "TEST CASE 4";
echo PHP_EOL;
// func_test([]);