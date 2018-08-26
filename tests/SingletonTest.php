<?php

use App\TestSingleton;
use App\Inheriter;

class SingletonTest extends PHPUnit\Framework\TestCase
{
    public function testSingleton()
    {
        $exmplSingleton = TestSingleton::getInstance();
        $exmpliheriter = new Inheriter();

        $this->assertInstanceOf('\App\TestSingleton', $exmplSingleton);
        $this->assertObjectHasAttribute('instance', $exmplSingleton);

        $this->assertInstanceOf('\App\Inheriter', $exmpliheriter);
        $this->assertObjectNotHasAttribute('instance', $exmpliheriter);
    }
}