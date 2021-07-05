<?php
namespace App\Controllers;

use App\Libraries\Collection;
use App\Libraries\SimpleAdditiveWeighting;
use App\Models\CriteriaModel;
use App\Models\PerhitunganModel;

class PerhitunganController extends Controller {
    public function index()
    {
        $model = new PerhitunganModel();
        $nasabah = $model->getAll();
        $collection = new Collection($nasabah);
        $namaKriteria = new CriteriaModel();
        $namaKriteria = (new Collection($namaKriteria->all()))->pluck('nama_kriteria');

        $bobotKriteria = new CriteriaModel();
        $bobotKriteria = (new Collection($bobotKriteria->all()))->pluck('bobot_kriteria');

        $keteranganKriteria = new CriteriaModel();
        $keteranganKriteria = (new Collection($keteranganKriteria->all()))->pluck('ket_kriteria');

        $namaNasabah = $collection->groupBy('nama_nsb');
//        echo "<pre>";
        foreach ($namaNasabah as $key => $value) {
            $c = new Collection($namaNasabah[$key]);
            $namaNasabah[$key]['nilai_fields'] = $c->pluck('nilai');
            if (count($namaNasabah[$key]['nilai_fields']) < count($namaKriteria)) {
                array_push($namaNasabah[$key]['nilai_fields'], 1);
            }
        }
        $row = new Collection($namaNasabah);
        $values = [];

        $plucked = $row->pluck('nilai_fields');

        foreach ($plucked as $key => $value) {
            foreach ($value as $k => $v) {
                if (!isset($values[$k])) {
                    $values[$k] = [$v];
                } else {
                    array_push($values[$k], $v);
                }
            }
        }

        for ($i = 0; $i < count($values); $i++) {
            SimpleAdditiveWeighting::addData($values[$i], $bobotKriteria[$i], strtoupper($keteranganKriteria[$i]));
        }

        SimpleAdditiveWeighting::normalize();

        $i = 0;
        $transpose = (new Collection(SimpleAdditiveWeighting::normalizationResult(SimpleAdditiveWeighting::ONLY_DATA)))->transpose();
        foreach ($namaNasabah as $key => $value) {
            $namaNasabah[$key]['normalization'] = $transpose[$i++];
        }
        SimpleAdditiveWeighting::calculate();
        $result = SimpleAdditiveWeighting::result();

        $i = 0;
        foreach ($namaNasabah as $key => $value) {
            $namaNasabah[$key]['result'] = $result[$i++];

            foreach ($value as $k => $v) {
                if (is_numeric($k)) {
                    unset($namaNasabah[$key][$k]);
                }
            }
        }

        $ranking = (new Collection($namaNasabah))->sortByKey('result');

//        echo "<pre/>";

        view('includes/layout', [
            'content'       => "perhitungan/perhitungan.index",
            'head'          => 5,
            'namaKriteria'  => $namaKriteria,
            'namaNasabah'   => $namaNasabah,
            'rangking'      => $ranking,
        ]);
    }
}