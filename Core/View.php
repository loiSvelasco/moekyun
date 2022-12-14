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
            $twig->addGlobal('session', session());
             
            $twig->addFunction(
                new \Twig\TwigFunction('getenv', function ($key) {
                    return $_ENV[$key];
                })
            );

            $twig->addFunction(
                new \Twig\TwigFunction('copyright', function () {
                    $fromYear = $_ENV['FROM_YR'];
                    $thisYear = (int)date('Y');
                    return $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');
                })
            );

            $twig->addFunction(
                new \Twig\TwigFunction('url_for', function ($folderName, $fileName) {
                    $url = $_ENV['BASE_URL'];
                    return "$url/$folderName/$fileName";
                })
            );

            // $twig->addFunction(
                // new \Twig\TwigFunction('flash', function ($key) {
                    // $flashMsg = session($key);
                    // session()->destroy($key);
                    // return $flashMsg;
                // })
            // );
        }

        $template .= ".php";
        
        echo $twig->render($template, $args);
    }
}