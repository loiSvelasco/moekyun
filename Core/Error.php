<?php

namespace Core;

class Error
{
    public static function errorHandler($level, $message, $file, $line)
    {
        if(error_reporting() !== 0 )
        {
            throw new \Exception($message, 0, $level, $file, $line);
        }
    }

    public static function exceptionHandler($exception)
    {
        $code = $exception->getCode();
        
        if($code !== 404)
        {
            $code = 500;
        }
        
        http_response_code($code);
        
        if($_ENV['ENVIRONMENT'] == 'dev')
        {
            View::render("errors", [
                'exception' => get_class($exception),
                'message' => $exception->getMessage(),
                'trace' => $exception->getTrace(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine()
            ]);
        }
        else
        {
            $log = dirname(__DIR__) . '/logs/' . date('Y-m-d') . '.txt';
            ini_set('error_log', $log);
            
            $msg = "<h3>Fatal Error:</h3>";
            $msg .= "<p>Uncaught Exception: <strong>" . get_class($exception) . "</strong>.</p>";
            $msg .= "<p>" . $exception->getMessage() . "</p>";
            $msg .= "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
            $msg .= "<p>Thrown in: " . $exception->getFile() . " on line " . $exception->getLine() . "</p>";

            error_log($msg);

            View::render("$code");
        }
    }
}