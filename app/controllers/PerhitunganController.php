<?php
namespace App\Controllers;

use App\Helpers\SAW;

class PerhitunganController extends Controller {

    protected $denyUnloggedUser = true;

    public function index()
    {
        $data = SAW::calculateRanking();

        view('includes/layout', [
            'content'       => "perhitungan/perhitungan.index",
            'namaKriteria'  => $data["namaKriteria"],
            'namaNasabah'   => $data["namaNasabah"],
            'ranking'       => $data["ranking"],
            'periode'       => isset($_GET["periode"]) && !empty($_GET["periode"]) ? $_GET["periode"] : ""
        ]);
    }
}