<?php

namespace src\Script;

class App extends UserModel
{

    /**
     * @var string the name of the POST parameter that is used to indicate if a request is a PUT, PATCH or DELETE
     * request tunneled through POST. Defaults to '_method'.
     * @see getMethod()
     */
    public $methodParam = '_method';

    /**
     * @var array collection of request headers.
     */
    private $headers;

    /**
     * Returns the method of the current request (e.g. GET, POST, HEAD, PUT, PATCH, DELETE).
     * @return string request method, such as GET, POST, HEAD, PUT, PATCH, DELETE.
     * The value returned is turned into upper case.
     */
    public function getMethod()
    {
        if (
            isset($_POST[$this->methodParam])
            // Never allow to downgrade request from WRITE methods (POST, PATCH, DELETE, etc)
            // to read methods (GET, HEAD, OPTIONS) for security reasons.
            && !in_array(strtoupper($_POST[$this->methodParam]), ['GET', 'HEAD', 'OPTIONS'], true)
        ) {
            return strtoupper($_POST[$this->methodParam]);
        }
        if ($this->hasHeader('X-Http-Method-Override')) {
            return strtoupper($this->getHeader('X-Http-Method-Override'));
        }
        if (isset($_SERVER['REQUEST_METHOD'])) {
            return strtoupper($_SERVER['REQUEST_METHOD']);
        }
        return 'GET';
    }

    /**
     * @return array|null
     */
    public function getHeaders()
    {
        if ($this->headers === null) {
            $this->headers = [];
            if (function_exists('getallheaders')) {
                $headers = getallheaders();
                foreach ($headers as $name => $value) {
                    $this->headers[$name] = $value;
                }
            } elseif (function_exists('http_get_request_headers')) {
                $headers = http_get_request_headers();
                foreach ($headers as $name => $value) {
                    $this->headers[$name] = $value;
                }
            } else {
                foreach ($_SERVER as $name => $value) {
                    if (strncmp($name, 'HTTP_', 5) === 0) {
                        $name = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))));
                        $this->headers[$name] = $value;
                    }
                }
            }
        }

        return $this->headers;
    }

    /**
     * @param $header
     * @return bool
     */
    private function hasHeader ($header)
    {
        return in_array($header, $this->getHeaders());
    }

    /**
     * @param $header
     * @return mixed|null
     */
    private function getHeader ($header)
    {
        if ($this->hasHeader($header)) {
            return $this->getHeaders()[$header];
        }

        return null;
    }

    /**
     * @return bool
     */
    public function isGet ()
    {
        return $this->getMethod() === 'GET';
    }

    /**
     * @return bool
     */
    public function isAjax ()
    {
        return $this->getHeader('X-Requested-With') === 'XMLHttpRequest';
    }
}