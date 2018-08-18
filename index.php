<?php

namespace Singleton;

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

$instance = TestSingleton::getInstance();
var_dump($instance);

// class that inherits TestSingleton class and contains $greeting field as well as public constructor
class Inheriter extends TestSingleton
{
    public $greeting;

    // public constructor that sets value of $newVariable
    public function __construct()
    {
        $this->greeting = 'Hello world!';
    }
}

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



