<?php

/**
 * 
 * PHP Version: 8.1.10
 * Author: Louis Velasco
 * 
 */

/**
 * Twig
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Class autoloader
 */
spl_autoload_register(function($class)
{
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_readable($file))
    {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Set the character set
 */
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');


/**
 * Require the router
*/
$router = new Core\Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);


$router->dispatch($_SERVER['QUERY_STRING']);
