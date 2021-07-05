<?php
namespace App\Controllers;

class DashboardController extends Controller {
    public function index()
    {
        view('includes/layout', [
            "content"       => "dashboard"
        ]);
    }
}