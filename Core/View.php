<?php

namespace Core;

class View
{
    public static function renderBasic($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view";
        if(is_readable($file))
        {
            require $file;
        }
        else
        {
            throw new \Exception("$file not found.");
        }
    }

    public static function render($template, $args = [])
    {
        static $twig = null;

        if($twig === null)
        {
            $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
            $twig = new \Twig\Environment($loader);
        }

        $template .= ".php";
        
        echo $twig->render($template, $args);
    }
}