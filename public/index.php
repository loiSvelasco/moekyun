<?php

/**
 * --------------------------
 * PHP Version: 8.1.10
 * Author: Louis Velasco
 * --------------------------
 */

/**
 * --------------------------
 * Composer
 * --------------------------
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * --------------------------
 * PHPDotEnv
 * --------------------------
 */
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

/**
 * --------------------------
 * Class Autoloader
 * --------------------------
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
 * --------------------------
 * Debugging & Error Handling
 * --------------------------
 */
use Tracy\Debugger;

if($_ENV['ENVIRONMENT'] === 'dev')
{
    Debugger::enable();
    Debugger::$dumpTheme = 'dark';
    Debugger::$showBar = true; 

    Sage::enabled(true);
}
else
{
    error_reporting(E_ALL);
    set_error_handler('Core\Error::errorHandler');
    set_exception_handler('Core\Error::exceptionHandler');
}


/**
 * --------------------------
 * Router 
 * --------------------------
 */
$router = new Core\Router();

/**
 * --------------------------
 * Default routers to accomodate query strings
 * this routing table is very strict, i.e.,
 * if a leading forward-slash is missing, it will return 404
 * the ones below are the default to accomodate the error.
 * --------------------------
 */
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/', ['action' => 'index']);
$router->add('{controller}', ['action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{action}/');
$router->add('{controller}/{action}/{id:\d+}');
$router->add('{controller}/{action}/{id:\d+}/');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);


/**
 * For custom routes that have more than 1 params, in this example, the params are "track" and "status"
 * this will only match if it has the same number of params in the url, otherwise, it will match with
 * an applicable route listed above.
 * 
 * ! CURRENTLY NOT WORKING, MIGHT FIX IT SOON
 * 
 * $router->add('{controller}/{action}/{track:[a-zA-Z0-9-]+}/{status:[a-zA-Z0-9-]+}');
 *
 */

/**
 * --------------------------
 * Additional routes should be added below this line,
 * never before the default ones to avoid router confusion.
 * --------------------------
 */


/**
 * --------------------------
 * Run the router
 * --------------------------
 */
$router->dispatch($_SERVER['QUERY_STRING']);
