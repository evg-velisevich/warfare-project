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
    private $server = '5.178.83.92';

    /**
     * Constructor.
     * @param string $id
     * @param string $auth
     * @throws Exception
     */
    function __construct(string $id, string $auth)
    {
        $this->ch = curl_init();

        $this->setUserID($id)
             ->setAuthKey($auth);
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
     * @param string $userID
     * @return array
     */
    public function socialGet(string $userID): array
    {
        $data = [
            'friends' => json_encode([$userID])
        ];
        return $this->gameApi('social_get', $data);
    }

    /**
     * @param string $package
     * @param array $params
     * @return array
     */
    public function gameApi(string $package, array $params): array
    {
        $url = 'http://' . $this->server . '/' . $this->getUserID() . '/' . $this->getAuthKey() . '/' . $package;
        return $this->curlRequest($url, $params);
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
     * @return Game
     */
    public function setAuthKey(string $auth_key): self
    {
        $this->auth_key = $auth_key;

        return $this;
    }

    /**
     * @param string $url
     * @param mixed $data
     * @return array
     */
    public function curlRequest(string $url, $data): array
    {
        curl_setopt_array($this->ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U;Windows NT 5.1;en-US; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.3',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => http_build_query($data),
        ]);
        $result = [
            json_decode(curl_exec($this->ch), true),
            curl_getinfo($this->ch)
        ];

        curl_close($this->ch);

        return $result;
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