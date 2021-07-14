<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\UsersModel;
use System\Validation\Validator;

class LoginController extends Controller {

    private function redirectIfLoggedIn()
    {
        if ($this->session->has("id")) {
            redirect("/");
            exit();
        }
    }

    public function login()
    {
        $this->redirectIfLoggedIn();

        view('includes/layout', [
            'content'       => "login",
            'fullscreen'    => true
        ]);
    }

    public function doLogin()
    {
        $this->redirectIfLoggedIn();

        $validator = new Validator();
        $validator->storeToSession(true);
        $validator->make($_POST, [
            "username"      => ["rules" => "required",],
            "password"      => ["rules" => "required",]
        ]);

        if (!$validator->success()) {
            redirect("/");
            exit();
        }

        $model      = new UsersModel();
        $request    = $this->request->getAllData();
        $user       = $model->getUser($request->username);
        if (count($user) > 0) {
            if (password_verify($request->password, $user[0]["password"])) {
                $this->session->set("id", $user[0]["id_user"]);
                redirect("/");
                exit();
            } else {
                $this->session->set("error-password", ["Password salah"]);
            }
        } else {
            $this->session->set("error-username", ["User tidak ditemukan"]);
        }
        redirect("/");
    }

    public function logout()
    {
        session_destroy();
    }
}