<?php


namespace src\Script;


class ViewData
{

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var Game
     */
    private $game = null;

    /**
     * @var Script
     */
    private $script = null;

    /**
     * ViewData constructor.
     * @param Script $script
     * @param Game $game
     */
    function __construct(Script $script, Game $game)
    {
        $this->game = $game;
        $this->script = $script;
    }

    /**
     * @return $this
     */
    public function prepare (): self
    {
        for ($k = 0; $k < 3; $k++) {
            $socialPack = $this->game->socialGet($_GET['user_id']);
            if ($this->game->isCorrectPack($socialPack, $_GET['user_id'])) {
                $this->script->setUserModel(json_decode($socialPack[0][0][1], true));
                $this->data = $this->script->renderHtml();
                break;
            }

            usleep(.5 * 1000 * 1000);
        }
        return $this;
    }

    /**
     * @return array
     */
    public function get (): array
    {
        return $this->data;
    }
}