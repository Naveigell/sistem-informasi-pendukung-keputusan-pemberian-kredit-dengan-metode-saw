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

    public function index()
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

        $criteriaGraph = $model->criteriaGraph(array_values($ids));
        $criteriaCollection = (new Collection($criteriaGraph))->groupBy('nama_kriteria');

        $professionCount = (new Collection($criteriaCollection["Pekerjaan"]))->countKey('ket');
        $timePeriodCount = (new Collection($criteriaCollection["Jangka waktu"]))->countKey('ket');

        $profession = (new Collection($professionCount))->setDefault(['Pedagang', 'PNS', 'Wiraswasta', 'Tidak Tetap'], 0);
        $timePeriod = (new Collection($timePeriodCount))->setDefault(['>36 bulan', '≥24 bulan - < 36 bulan', '≥12 bulan - < 24 bulan', '< 12 bln'], 0);

        asort($profession);
        asort($timePeriod);

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
            "profesi"       => array_values($profession),
            "time_period"   => array_values($timePeriod),
            "total_layak"   => $layak,
            "total_tidak_layak" => $tidakLayak
        ]);
    }
}