<?php

class View
{
    private $data = array();

    public function __construct($loader)
    {
        $this->loader = $loader;
    }

    public function display($viewName)
    {
        $this->loader->load($viewName, $this->data);
    }

    public function assign($variable, $value)
    {
        $this->data[$variable] = $value;
    }
}
