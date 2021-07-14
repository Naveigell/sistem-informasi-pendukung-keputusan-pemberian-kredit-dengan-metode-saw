<?php
namespace System\Controller;

use System\Request\Request;
use System\Session\Session;

class Controller {

    protected $session;
    protected $middlewares = [];
    protected $request;
    protected $denyUnloggedUser = false;

    public function __construct()
    {
        $this->session = new Session();
        $this->request = new Request();

        if (!headers_sent()) {
            header('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
            header('Pragma','no-cache');
            header('Expires','Fri, 01 Jan 1990 00:00:00 GMT');
        }

        if ($this->denyUnloggedUser) {
            if (!isset($_SESSION["id"])) {
                redirect("/login");
            }
        }
    }
}