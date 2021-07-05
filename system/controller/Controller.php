<?php
namespace System\Controller;

use System\Request\Request;
use System\Session\Session;

class Controller {
    protected $session;
    protected $middlewares = [];
    protected $request;

    public function __construct()
    {
        $this->session = new Session();
        $this->request = new Request();
    }
}