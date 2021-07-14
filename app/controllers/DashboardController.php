<?php
namespace App\Controllers;

class DashboardController extends Controller {

    protected $denyUnloggedUser = true;

    public function index()
    {
        view('includes/layout', [
            "content"       => "dashboard"
        ]);
    }
}