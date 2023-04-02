<?php
namespace App\Controllers;

use App\Helpers\SAW;
use App\Models\CriteriaModel;
use App\Models\DashboardModel;
use App\Models\NasabahModel;
use App\Models\SubCriteriaModel;
use System\Arrays\Collection;

class DashboardController extends Controller {

    protected $denyUnloggedUser = true;

    public function index() //method
    {
        $nasabah        = new NasabahModel();
        $kriteria       = new CriteriaModel();
        $subKriteria    = new SubCriteriaModel();
        $model          = new DashboardModel();

        $data           = SAW::calculateRanking();
        $filtered       = array_filter($data["namaNasabah"], function ($nasabah) {
            return $nasabah["layak"];
        });

        $ids            = array_map(function ($item) {
            return $item["id"];
        }, $filtered);

        $criteriaNames = array_column($kriteria->all(), 'nama_kriteria');

        $criteriaGraph = $model->criteriaGraph(array_values($ids), $criteriaNames);
        $criteriaCollection = (new Collection($criteriaGraph))->groupBy('nama_kriteria');
        $graphs = [];

        foreach ($criteriaNames as $criteriaName) {

            if (!array_key_exists($criteriaName, $criteriaCollection)) {
                continue;
            }

            $d = (new Collection($criteriaCollection[$criteriaName]))->countKey('ket');
            $graphs[$criteriaName] = (new Collection($d))->setDefault(array_keys($d), 0);
        }

        foreach ($graphs as $key => $graph) {
            $d = $graph;

            asort($d);

            $graphs[$key] = $d;
        }


        $layak = 0;
        $tidakLayak = 0;
        foreach ($data["ranking"] as $item) {
            if ($item["layak"]) {
                $layak++;
            } else {
                $tidakLayak++;
            }
        }

        view('includes/layout', [
            "content"       => sessionGet("role") == "admin" ? "dashboard_admin" : "dashboard_kepala_lpd",
            "nasabah"       => $nasabah->count(),
            "kriteria"      => $kriteria->count(),
            "sub_kriteria"  => $subKriteria->countWhereNotEmpty(),
            "grafik"        => $model->graph(),
            "graphs"        => $graphs,
            "total_layak"   => $layak,
            "total_tidak_layak" => $tidakLayak
        ]);
    }
}