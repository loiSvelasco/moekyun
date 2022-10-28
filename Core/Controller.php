<?php

namespace Core;

use View;
abstract class Controller
{
    /**
     * Property that stores $_SERVER['QUERY_STRING'] parameters
     *
     * @var array
     */
    protected $route_params = [];

    /**
     * Sets $route_params[] from the $_SERVER['QUERY_STRING']
     *
     * @param mixed $route_params
     * 
     */
    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

    /**
     * Magic method to run before() and after()
     *  - before() useful for checks before running the main controller->method
     *  - after() runs after the method call
     * 
     *
     * @param mixed $name
     * @param mixed $args
     * 
     * @return void
     * 
     */
    public function __call($name, $args)
    {
        $method = $name . 'Action';
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

    /**
     * [Description for getPost]
     *
     * @param string $name
     * 
     * @return $_POST
     * 
     */
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
            if(!isset($_POST))
            {
                throw new \Exception("There are no posted data.");
            }
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