<?php

class Ajax
{

    public $response = [
        'response' => '',
        'error' => false
    ];

    /**
     * Ajax constructor.
     */
    public function __construct()
    {
        $this->__autoload();
    }

    /**
     * Load all classes
     */
    public function __autoload(): void
    {
        $classNames = ["Script", "Game", "Data"];
        foreach ($classNames as $className) {
            if (file_exists($className . '.php')) {
                require_once($className . '.php');
            }
        }
    }

    /**
     * Print a ready JSON
     */
    public function printResponse(): void
    {
        print_r(json_encode($this->getResponse(), JSON_PRETTY_PRINT));
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->response;
    }

    /**
     * @param $response
     */
    public function setResponse($response): void
    {
        $this->response['response'] = $response;
    }

    /**
     * @return bool
     */
    public function isValidRequest(): bool
    {
        return isset($_GET) && array_key_exists('user_id', $_GET) && is_numeric($_GET['user_id']);
    }

    /**
     * @throws Exception
     */
    public function startRender(): void
    {
        $game = new Game("415593668", "b497fa458ca25f40fc1d43fcdce9aee1");
        $script = new Script();

        $game->setActiveNet('vk');

        for ($k = 0; $k < 3; $k++) {
            $socialPack = $game->socialGet($_GET['user_id']);
            if ($game->isCorrectPack($socialPack, $_GET['user_id'])) {
                $script->setUserModel(json_decode($socialPack[0][0][1], true));
                $this->setResponse($script->renderHtml());
                break;
            } else {
                $this->setError('Информация не получена...');
                usleep(.5 * 1000 * 1000);
            }
        }
    }

    /**
     * @param $error
     */
    public function setError($error): void
    {
        $this->response['error'] = $error;
    }
}