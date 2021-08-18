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
        if (sessionHas("role")) {
            if (sessionGet("role") == "admin") {
                $nasabah        = new NasabahModel();
                $kriteria       = new CriteriaModel();
                $subKriteria    = new SubCriteriaModel();
                $graph          = new DashboardModel();

                view('includes/layout', [
                    "content"       => "dashboard_admin",
                    "nasabah"       => $nasabah->count(),
                    "kriteria"      => $kriteria->count(),
                    "sub_kriteria"  => $subKriteria->count(),
                    "grafik"        => $graph->graph(),
                ]);
            } else {
                view('includes/layout', [
                    "content"       => "dashboard_kepala_lpd"
                ]);
            }
        } else {
            abort404();
        }
    }
}