<?php


use src\Script\Ajax;
use PHPUnit\Framework\TestCase;

class AjaxTest extends TestCase
{

    public function testGetResponse()
    {
        $class = (new Ajax())->getResponse();
        $this->assertArrayHasKey('response', $class);
    }

    public function testGetReady()
    {
        $class = new Ajax();
        $class->setResponse(['test' => true]);

        $this->assertInternalType('string', $class->getReady());
    }

    public function testGetViewData()
    {
        $class = (new Ajax())->getViewData();
        $this->assertNotEmpty($class);
    }
}
