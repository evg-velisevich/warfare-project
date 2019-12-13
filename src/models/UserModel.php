<?php


namespace src\Script;

ini_set("display_errors", "On");
error_reporting(E_ALL);

class UserModel
{

    /**
     * @var array
     */
    protected $model = [];

    /**
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public function getKey ($key, $default = null)
    {
        return array_key_exists($key, $this->getModel()) ? $this->getModel()[$key] : $default;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set ($key, $value)
    {
        $this->model[$key] = $value;

        return $this;
    }

    /**
     * @param $value
     * @return bool
     */
    public function has ($value)
    {
        return in_array($value, $this->getModel());
    }

    /**
     * @return array
     */
    public function getModel ()
    {
        return $this->model;
    }

    /**
     * @param array $model
     * @return UserModel
     */
    public function setModel (array $model): self
    {
        $this->model = $model;
        return $this;
    }
}