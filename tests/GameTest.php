<?php


class GameTest extends PHPUnit_Framework_TestCase
{

    public function testGameApi()
    {
        include "../src/Game.php";

        $game = new Game("415593668", "b497fa458ca25f40fc1d43fcdce9aee1");
        $pack = $game->gameApi('get', ['ts' => 0]);

        $this->expectOutputString(true);

        print $pack[1]['http_code'] > 0;
    }
}
