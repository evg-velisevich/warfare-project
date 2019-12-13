<?php


namespace src\Script;

ini_set("display_errors", "On");
error_reporting(E_ALL);

class ViewData extends App
{

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var Game|null
     */
    private $game = null;

    /**
     * @var App|null
     */
    private $app = null;

    /**
     * @var Script|null
     */
    private $script = null;

    /**
     * @return $this
     * @throws \Exception
     */
    public function prepare (): self
    {
        if ($this->getApp()->isGet()) {
            for ($k = 0; $k < 3; $k++) {
                $socialPack = $this->getGame()->socialGet($_GET['user_id']);
                if ($this->getGame()->isCorrectPack($socialPack, $_GET['user_id'])) {
                    $this->getScript()->setUserModel(json_decode($socialPack[0][0][1], true));
                    $this->data = $this->getScript()->renderHtml();
                    break;
                }

                usleep(1.01 * 1000 * 1000);
            }
        }

        return $this;
    }

    /**
     * @return Script
     */
    private function getScript ()
    {
        if ($this->script === null) {
            $this->script = new Script();
        }

        return $this->script;
    }

    /**
     * @return Game
     * @throws \Exception
     */
    private function getGame ()
    {
        if ($this->game === null) {
            $this->game = new Game("415593668", "b497fa458ca25f40fc1d43fcdce9aee1");
        }

        return $this->game;
    }

    /**
     * @return App
     */
    private function getApp ()
    {
        if ($this->app === null) {
            $this->app = new App();
        }

        return $this->app;
    }

    /**
     * @return array
     */
    public function get (): array
    {
        return $this->data;
    }
}