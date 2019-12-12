<?php


use src\Script\Formatter;
use PHPUnit\Framework\TestCase;

class FormatterTest extends TestCase
{

    public function testGetPlurals()
    {
        $plurals = ['d' => ['день', 'дня', 'дней'], 'h' => ['час', 'часа', 'часов'], 'm' => ['минута', 'минуты', 'минут'], 's' => ['секунда', 'секунды', 'секунд']];

        $class = new Formatter();

        $this->assertEquals($plurals, $class->getPlurals());
    }

    public function testTs2date()
    {
        $class = new Formatter();

        print $class->ts2date(time());

        $this->expectOutputString(date("d.m.Y в H:i:s"));
    }

    public function testPlural()
    {
        $class = new Formatter();

        print $class->plural(2);

        $this->expectOutputString('1');
    }

    public function testAsDuration()
    {
        $class = new Formatter();

        $this->assertEquals('10 секунд', $class->asDuration(10));
    }

    public function testNumFormat()
    {
        $class = new Formatter();

        $this->assertEquals('10 000', $class->numFormat(10000));
    }
}
