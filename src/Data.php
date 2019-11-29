<?php

namespace src\Script;

class Data
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * Data constructor.
     */
    function __construct()
    {
        $this->load();
    }

    /**
     * Loader DataFile
     */
    public function load(): void
    {
        $this->data = json_decode(file_get_contents('../data/data.json'), true);
    }

    /**
     * @param $key
     * @return array
     */
    public function get($key): array
    {
        return array_key_exists($key, $this->data) ? $this->data[$key] : [];
    }
}