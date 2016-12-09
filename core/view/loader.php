<?php

class Loader
{
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function load($viewName, $data)
    {
        if (file_exists($this->path.$viewName)) {
            extract($data);

            ob_start();
            include($this->path.$viewName);
            $content = ob_get_contents();
            ob_end_flush();
            return $content;
        }
        throw new Exception("View does not exist: ".$this->path.$viewName);
    }
}
