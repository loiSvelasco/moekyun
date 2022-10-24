<?php

/**
 * 
 * PHP Version: 8.1.10
 * Author: Louis Velasco
 * 
 */

/**
 * Composer (Twig, Kint, PhpDotEnv)
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Kint
 */
Kint::$aliases[] = 'dd';
function dd(...$vars) { return die(Kint::dump(...$vars)); }

/**
 * PhpDotEnv
 */
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

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

/**
 * Set the routers
 */
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/', ['action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{action}/{id:\d+}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

/**
 * Dispatch the router
 */
$router->dispatch($_SERVER['QUERY_STRING']);
