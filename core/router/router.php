<?php

class Router
{
    private $_routes = array();
    private $_notFound;

    public function add($url, $action)
    {
        $this->_routes[$url] = $action;
    }

    public function setNotFound($url)
    {
        echo "404 - $url was not found!";
    }

    public function dispatch()
    {
        foreach ($this->_routes as $url => $action) {
            if ($url == strtok($_SERVER["REQUEST_URI"], '?')) {
                return $action();
            }
        }
        call_user_func_array($this->setNotFound(strtok($_SERVER["REQUEST_URI"], '?')));
    }
}
