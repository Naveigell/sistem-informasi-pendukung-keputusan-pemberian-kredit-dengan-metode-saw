<?php
namespace App\Controllers;

use App\Helpers\SAW;

class RankingController extends Controller
{
    public function ranking()
    {
        $data = SAW::calculateRanking();

        view('includes/layout', [
            'content'       => "ranking/ranking.index",
            'namaKriteria'  => $data["namaKriteria"],
            'namaNasabah'   => $data["namaNasabah"],
            'ranking'       => $data["ranking"],
            'periode'       => isset($_GET["periode"]) && !empty($_GET["periode"]) ? $_GET["periode"] : ""
        ]);
    }
}