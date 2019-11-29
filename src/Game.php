<?php

namespace src\Script;

use Exception;

class Game
{
    /**
     * @var string
     */
    private $auth_key = '';

    /**
     * @var string
     */
    private $user_id = '';

    /**
     * @var false|resource
     */
    private $ch;

    /**
     * @var string
     */
    private $active_net = 'vk';

    /**
     * Constructor.
     * @param string $id
     * @param string $auth
     * @throws Exception
     */
    function __construct(string $id, string $auth)
    {
        if (!$this->ch) $this->ch = curl_init();
        if (!$id || !$auth) {
            throw new Exception('Not have some data');
        } else {
            $this->setUserID($id);
            $this->setAuthKey($auth);
        }
    }

    /**
     * @param string $user_id
     * @return Game
     */
    function setUserID(string $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @param string $net
     * @return Game
     */
    public function setActiveNet(string $net): self
    {
        $this->active_net = $net;

        return $this;
    }

    /**
     * @param string $userID
     * @return array
     */
    public function socialGet(string $userID): array
    {
        $data = ['friends' => json_encode([$userID])];
        return $this->gameApi('social_get', $data);
    }

    /**
     * @param string $package
     * @param array $params
     * @return array
     */
    public function gameApi(string $package, array $params): array
    {
        $url = 'http://' . $this->getServer() . '/' . $this->getUserID() . '/' . $this->getAuthKey() . '/' . $package;
        return $this->curlRequest($url, $params);
    }

    /**
     * @return string
     */
    public function getServer(): string
    {
        $servers = [
            'vk' => '5.178.83.92',
            'fb' => '95.213.136.62',
            'ok' => '31.131.250.243',
            'mail' => '95.213.136.61'
        ];
        return $servers[$this->getActiveNet()];
    }

    /**
     * @return string
     */
    public function getActiveNet(): string
    {
        return $this->active_net;
    }

    /**
     * @return string
     */
    public function getUserID(): string
    {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function getAuthKey(): string
    {
        return $this->auth_key;
    }

    /**
     * @param string $auth_key
     */
    public function setAuthKey(string $auth_key): void
    {
        $this->auth_key = $auth_key;
    }

    /**
     * @param string $url
     * @param mixed $data
     * @return array
     */
    public function curlRequest(string $url, $data): array
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($this->ch, CURLOPT_HEADER, 0);
        curl_setopt($this->ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U;Windows NT 5.1;en-US; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.3');
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, is_array($data) ? http_build_query($data) : $data);
        return [
            json_decode(curl_exec($this->ch), true),
            curl_getinfo($this->ch)
        ];
    }

    /**
     * @param array $pack
     * @param $userID
     * @return bool
     */
    public function isCorrectPack(array $pack, $userID): bool
    {
        return (is_array($pack) && (new Script)->getValue($pack, [0, 0, 0]) === $userID);
    }
}