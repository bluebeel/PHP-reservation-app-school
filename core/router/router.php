<?php

class Router
{
    /* The Router class plays an important role in our framework.
     * It translates the controllers, actions for further process.
     * When the Router->dispatch method is called, it starts parsing the _routes value first.
     * After we found what controller and action are
     * then we process the request and dispatch the results to the clients.
     * If the url doesn't exist we call the Router->setNotFound method.
     */
    private $_routes = array();
    private $_notFound;
    private $_view;

    public function add($url, $action)
    {
        $this->_routes[$url] = $action;
    }

    public function setView($view)
    {
        $this->_view = $view;
    }

    public function setNotFound($url)
    {
        $this->_view->display("404.php");
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
