<?php

namespace src\Script;

use Exception;

class Ajax
{

    /**
     * @var array
     */
    private $response = [
        'response' => '',
        'error' => false
    ];

    /**
     * @return string
     */
    public function getReady(): string
    {
        return json_encode($this->getResponse(), JSON_PRETTY_PRINT);
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->response;
    }

    /**
     * @param array $response
     * @return Ajax
     */
    public function setResponse(array $response): self
    {
        $this->response['response'] = $response;

        return $this;
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
        $this->setResponse((new ViewData(new Script(), new Game("415593668", "b497fa458ca25f40fc1d43fcdce9aee1")))->prepare()->get());
    }

    /**
     * @param string $error
     */
    public function setError(string $error): void
    {
        $this->response['error'] = $error;
    }
}