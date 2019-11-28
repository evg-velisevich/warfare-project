<?php

ini_set("display_errors", "On");
error_reporting(E_ALL);

class Game
{
    private $auth_key = '',
            $user_id = '',
            $ch,
            $active_net = 'vk';

    /**
     * Constructor.
     * @param $id
     * @param $auth
     * @throws Exception
     */
    function __construct($id, $auth)
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
     * @param $user_id
     */
    function setUserID($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param $net
     */
    public function setActiveNet($net)
    {
        $this->active_net = $net;
    }

    /**
     * @param $userID
     * @return array
     */
    public function socialGet($userID)
    {
        $data = ['friends' => json_encode([(string)$userID])];
        return $this->gameApi('social_get', $data);
    }

    /**
     * @param $package
     * @param $params
     * @return array
     */
    public function gameApi($package, $params)
    {
        $url = 'http://' . $this->getServer() . '/' . $this->getUserID() . '/' . $this->getAuthKey() . '/' . $package;
        return $this->curlRequest($url, $params);
    }

    /**
     * @return mixed
     */
    public function getServer()
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
     * @return mixed
     */
    public function getActiveNet()
    {
        return $this->active_net;
    }

    /**
     * @return string
     */
    public function getUserID()
    {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param $auth_key
     */
    public function setAuthKey($auth_key)
    {
        $this->auth_key = $auth_key;
    }

    /**
     * @param $url
     * @param $data
     * @return array
     */
    public function curlRequest($url, $data)
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($this->ch, CURLOPT_HEADER, 0);
        curl_setopt($this->ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U;Windows NT 5.1;en-US; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.3');
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, is_array($data) ? http_build_query($data) : $data);
        $res = [
            json_decode(curl_exec($this->ch), true),
            curl_getinfo($this->ch)
        ];
        return $res;
    }

    public function isCorrectPack($pack, $userID)
    {
        return (is_array($pack) && (new Script)->getValue($pack, [0, 0, 0]) === $userID);
    }
}