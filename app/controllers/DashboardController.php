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

        $criteriaGraph = $model->criteriaGraph(array_values($ids));
        $criteriaCollection = (new Collection($criteriaGraph))->groupBy('nama_kriteria');

        $incomeCount = (new Collection($criteriaCollection["Pendapatan"]))->countKey('ket');
        $professionCount = (new Collection($criteriaCollection["Pekerjaan"]))->countKey('ket');
        $guaranteeCount = (new Collection($criteriaCollection["Jaminan"]))->countKey('ket');
        $expendCount = (new Collection($criteriaCollection["Pengeluaran"]))->countKey('ket');
        $ageCount = (new Collection($criteriaCollection["Usia"]))->countKey('ket');
        $timePeriodCount = (new Collection($criteriaCollection["Jangka waktu"]))->countKey('ket');
        

        $income = (new Collection($incomeCount))->setDefault(['≥ 15.000.000','≥ 8.000.000 - < 15.000.000','≥ 3.000.000 - < 8.000.000','<3.000.000'], 0);
        $profession = (new Collection($professionCount))->setDefault(['Pedagang', 'PNS', 'Wiraswasta', 'Tidak Tetap'], 0);
        $guarantee = (new Collection($guaranteeCount))->setDefault(['Sertifikat tanah','Sertifikat rumah ','BPKB diatas tahun 2015 ','BPKB dibawah tahun 2015 '], 0);
        $expend = (new Collection($expendCount))->setDefault(['≥10.000.000','≥6.000.000 - < 10.000.000','≥3.000.000 - < 6.00.000','<3.000.000'], 0);
        $age = (new Collection($ageCount))->setDefault(['> 50 tahun','36 tahun - 50 tahun','26 tahun - 35 tahun','21 tahun - 25 tahun'], 0);
        $timePeriod = (new Collection($timePeriodCount))->setDefault(['≥36 bulan', '≥24 bulan - <36 bulan', '≥12 bulan - < 24 bulan', '< 12 bln'], 0);

        asort($income);
        asort($profession);
        asort($guarantee);
        asort($expend);
        asort($age);
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
            "pendapatan"    => array_values($income),
            "profesi"       => array_values($profession),
            "jaminan"       => array_values($guarantee),
            "pengeluaran"   => array_values($expend),
            "age"           => array_values($age),
            "time_period"   => array_values($timePeriod),
            "total_layak"   => $layak,
            "total_tidak_layak" => $tidakLayak
        ]);
    }
}