<?php

namespace Core;

use View;
abstract class Controller
{
    protected $route_params = [];

    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

    public function __call($name, $args)
    {
        $method = $name . 'Action';
        $args['id'] = $this->route_params['id'];
        if(method_exists($this, $method))
        {
            if($this->before() !== false)
            {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        }
        else
        {
            throw new \Exception("Method $method not found in controller " . get_class($this));
        }
    }

    public function getPost($name = '')
    {
        if($name !== '')
        {
            if(!isset($_POST[$name]))
            {
                throw new \Exception("Post data '$name' does not exist.");
            }
            
            return $_POST[$name];
        }
        else
        {
            return $_POST;
        }

    }

    public function validatePost()
    {
        $errors = [];

        if(!isset($_POST))
        {
            throw new \Exception("No posted data.");
        }
        
        foreach($_POST as $key => $value)
        {
            if($value == "")
            {
                $errors[] = "$key is required.";
            }
        }
        
        return $errors;
    }

    protected function before()
    {
        
    }

    protected function after()
    {

    }
}