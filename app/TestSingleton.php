<?php

namespace App;

class TestSingleton
{
    private static $instance;
    private $testVariable = '';

    //empty private constructor
    private function __construct() {}

    // public function that creates only one instance of TestSingleton class
    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    // seter for $testVariable
    public function setSomething($val)
    {
        $this->testVariable = $val;
    }
    // geter for $testVariable
    public function getSomething()
    {
        return $this->testVariable;
    }
}

// create instance of TestSingleton class using getInstance static method
$instance = TestSingleton::getInstance();
var_dump($instance);

// class that inherits TestSingleton class
class Inheriter extends TestSingleton
{
    public $greeting;

    // public constructor that sets value of $newVariable
    public function __construct()
    {
        $this->greeting = 'Hello world!';
    }
}

// this code below does not work because instance Inheriter class has no access to private $instance property

//$one = Inheriter::getInstance();
//var_dump($one);

// create instance of Inheriter class
$test = new Inheriter();
var_dump($test);

// echoing $greeting
echo $test->greeting . '<br>';

// setting new value to $testVariable
$test->setSomething('Hurra!');

// getting current value of $testVariable
echo $test->getSomething() . '<br>';

$test->setSomething('Nie ma!');
echo $test->getSomething() . '<br>';



