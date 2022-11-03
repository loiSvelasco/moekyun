<?php

namespace Core;

use Session;

class Navigator
{
    private $to;
    private $response;
    private $alert;

    public function redirect(string $url, int $code = 200)
    {
        $this->to = "Location: " . $_ENV['BASE_URL'] . "/$url";
        $this->response = $code;
        return $this;
    }

    public function alert(string $type, string $icon, string $msg)
    {
        // alert layout here
        return $this;
    }

}