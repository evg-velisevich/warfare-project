<?php

namespace src\Script;

use Exception;

ini_set("display_errors", "On");
error_reporting(E_ALL);

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
     * @var ViewData|null
     */
    private $viewData = null;

    /**
     * @return string
     */
    public function getReady(): string
    {
        $response = $this->getResponse();

        if (!$response['response']) {
            $response['error'] = 'Данные не получены, либо ошибка игрового сервера';
        }

        return json_encode($response, JSON_PRETTY_PRINT);
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
     * @throws Exception
     */
    public function startRender(): void
    {
        $this->setResponse($this->getViewData()->prepare()->get());
    }

    /**
     * @return ViewData|null
     */
    public function getViewData ()
    {
        if ($this->viewData === null) {
            $this->viewData = new ViewData();
        }

        return $this->viewData;
    }

    /**
     * @param string $error
     */
    public function setError(string $error): void
    {
        $this->response['error'] = $error;
    }
}