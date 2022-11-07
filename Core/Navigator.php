<?php

namespace Core;

use Core\Session;

class Navigator
{
    private $to;
    private $response;
    private $alertMsg;
    private $alertType;

    public function redirect(string $url, int $code = 200)
    {
        $this->to = "Location: " . $_ENV['BASE_URL'] . "/$url";
        $this->response = $code;
        return $this;
    }

    public function alert(string $type, string $msg)
    {
        // $session = new Session();
        // $session->set($type, $msg);
        session()->set($type, $msg);
        return $this;
    }

    public function go()
    {
        header($this->to, $this->response);
    }

}