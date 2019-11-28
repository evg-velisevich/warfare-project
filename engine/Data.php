<?php


class Data
{
    protected $data = [];

    function __construct()
    {
        $this->load();
    }

    public function load(): void
    {
        $this->data = json_decode(file_get_contents('../data/data.json'), true);
    }

    public function get($key): array
    {
        return array_key_exists($key, $this->data) ? $this->data[$key] : [];
    }
}