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
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
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
    // overriding getInstance parent method in order to evade using Singleton pattern in inheriting classes
    public static function getInstance()
    {
        return new self();
    }
}
//create instance od Inheriter class using getInstance method but because it has been overridden the Singleton pattern doesn't work here anymore. It simply creates new instance of Inheriter class using static method.
$one = Inheriter::getInstance();
var_dump($one);

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



