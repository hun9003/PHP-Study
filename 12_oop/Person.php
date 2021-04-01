<?php
class Person {
    public string $name;
    public string $surname;
    private ?int $age; // ? 를 넣으면 정수이지만 null값을 허용함
    public static int $counter = 0; // static

    public function __construct($name, $surname) // 생성자
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = null;
        self::$counter++;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }

    public static function getCounter()
    {
        return self::$counter;
    }
}
?>