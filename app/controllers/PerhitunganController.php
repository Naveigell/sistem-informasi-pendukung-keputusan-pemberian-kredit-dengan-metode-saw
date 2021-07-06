<?php
namespace App\Controllers;

use App\Libraries\Collection;
use App\Libraries\SimpleAdditiveWeighting;
use App\Models\CriteriaModel;
use App\Models\PerhitunganModel;

class PerhitunganController extends Controller {

    private function removeNasabahNumericKey(array &$data)
    {
        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                if (is_numeric($k)) {
                    unset($data[$key][$k]);
                }
            }
        }
    }

    public function index()
    {
        $model = new PerhitunganModel();
        $nasabah = $model->getAll();
        $nasabahCollection = new Collection($nasabah);

        $namaKriteria       = new CriteriaModel();
        $kriteria           = $namaKriteria->all();
        $kriteriaCollection = new Collection($kriteria);

        $namaKriteria       = $kriteriaCollection->pluck('nama_kriteria');
        $bobotKriteria      = $kriteriaCollection->pluck('bobot_kriteria');
        $keteranganKriteria = $kriteriaCollection->pluck('ket_kriteria');

        $namaNasabah = $nasabahCollection->groupBy('nama_nsb');

        foreach ($namaNasabah as $key => $value) {
            $nilai =  (new Collection($namaNasabah[$key]))->pluck('nilai');
            $namaNasabah[$key]['nilai_fields'] = $nilai;

            // if nilai fields count length less than $namaKriteria, add default value into nilai_fields
            // the default value is 1
            if (count($namaNasabah[$key]['nilai_fields']) < count($namaKriteria)) {
                array_push($namaNasabah[$key]['nilai_fields'], 1);
            }
        }

        $namaNasabahCollection = new Collection($namaNasabah);
        $nilaiFieldsColumn = [];

        $nilaiFields = $namaNasabahCollection->pluck('nilai_fields');

        // merge nilai_fields into each column
        foreach ($nilaiFields as $key => $value) {
            foreach ($value as $k => $v) {
                if (!isset($nilaiFieldsColumn[$k])) {
                    $nilaiFieldsColumn[$k] = [$v];
                } else {
                    array_push($nilaiFieldsColumn[$k], $v);
                }
            }
        }

        // add each column into simple additive weighting library
        for ($i = 0; $i < count($nilaiFieldsColumn); $i++) {
            SimpleAdditiveWeighting::addData($nilaiFieldsColumn[$i], $bobotKriteria[$i], strtoupper($keteranganKriteria[$i]));
        }

        // normalize the data
        SimpleAdditiveWeighting::normalize();

        $i = 0;
        // get normalization result then transpose it and add into nasabah normalization
        $transpose = (new Collection(SimpleAdditiveWeighting::normalizationResult(SimpleAdditiveWeighting::ONLY_DATA)))->transpose();
        foreach ($namaNasabah as $key => $value) {
            $namaNasabah[$key]['normalization'] = $transpose[$i++];
        }

        // calculate and get the result
        SimpleAdditiveWeighting::calculate();
        $result = SimpleAdditiveWeighting::result();

        $i = 0;
        // add the result into nasabah
        foreach ($namaNasabah as $key => $value) {
            $namaNasabah[$key]['result'] = $result[$i++];
        }

        // remove unused array in nasabah
        $this->removeNasabahNumericKey($namaNasabah);

        // sort the ranking
        $ranking = (new Collection($namaNasabah))->sortByKey('result', Collection::SORT_DESC);

        view('includes/layout', [
            'content'       => "perhitungan/perhitungan.index",
            'head'          => 5,
            'namaKriteria'  => $namaKriteria,
            'namaNasabah'   => $namaNasabah,
            'ranking'       => $ranking,
        ]);
    }
}