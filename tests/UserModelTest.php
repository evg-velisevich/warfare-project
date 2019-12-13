<?php


use src\Script\UserModel;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    public function testSetModel()
    {
        $class = new UserModel();
        $expected = ['model' => 'self'];
        $class->setModel($expected);

        $this->assertEquals($expected, $class->getModel());
    }

    public function testHas()
    {
        $class = new UserModel();
        $expected = ['model' => 'self'];
        $class->setModel($expected);

        $this->assertTrue($class->has('self'));
    }

    public function testSet()
    {
        $class = new UserModel();
        $class->set('model', 'value');

        $this->assertTrue($class->has('value'));
    }

    public function testGetModel()
    {
        $this->assertCount(0, (new UserModel())->getModel());
    }

    public function testGet()
    {
        $class = new UserModel();
        $class->set('model', 'value');

        $this->assertEquals('value', $class->getKey('model'));
    }
}
