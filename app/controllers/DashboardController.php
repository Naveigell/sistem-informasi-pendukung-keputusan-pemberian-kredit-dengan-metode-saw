<?php
namespace App\Controllers;

use App\Models\CriteriaModel;
use App\Models\DashboardModel;
use App\Models\NasabahModel;
use App\Models\SubCriteriaModel;

class DashboardController extends Controller {

    protected $denyUnloggedUser = true;

    public function index()
    {
        $nasabah        = new NasabahModel();
        $kriteria       = new CriteriaModel();
        $subKriteria    = new SubCriteriaModel();
        $graph          = new DashboardModel();

        view('includes/layout', [
            "content"       => "dashboard",
            "nasabah"       => $nasabah->count(),
            "kriteria"      => $kriteria->count(),
            "sub_kriteria"  => $subKriteria->count(),
            "grafik"        => $graph->graph(),
        ]);
    }
}