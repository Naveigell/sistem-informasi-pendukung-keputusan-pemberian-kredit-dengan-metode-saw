<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\UsersModel;

class LoginController extends Controller {
    public function login()
    {
        $model = new UsersModel();
//        $model->getUsers();

//        var_dump($this->request->getAllData());
        view('login');
    }

    public function doLogin()
    {
        var_dump($this->request->getAllData());
    }
}