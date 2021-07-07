<?php
namespace App\Controllers;

use App\Libraries\Collection;
use App\Libraries\SimpleAdditiveWeighting;
use App\Models\CriteriaModel;
use App\Models\PerhitunganModel;

class PerhitunganController extends Controller {

    private function removeNullOrEmptyValue(array &$data)
    {
        foreach ($data as $key => $value) {
            if (empty($key)) {
                unset($data[$key]);
            }
        }
    }

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
            $collection = new Collection($namaNasabah[$key]);
            $nilai      = $collection->pluck('nilai');
            $nama       = $collection->pluck('nama_kriteria');
            $namaNasabah[$key]['nilai_fields'] = $nilai;

            $combined = [];
            if (count($nama) === count($nilai)) {
                $combined = array_combine($nama, $nilai);
            }

            if (count($namaKriteria) > count($combined)) {
                foreach ($namaKriteria as $namaKey) {
                    $find = array_search($namaKey, array_keys($combined));
                    if ($find === false) {
                        $combined[$namaKey] = "1";
                    }
                }
            } else {
                foreach ($combined as $item) {
                    $index = array_search($item, $namaKriteria);
                    if ($index >= 0) {
                        unset($combined[$index]);
                    }
                }
            }

            $this->removeNullOrEmptyValue($combined);
//            dump($key);
//            dump($combined);

            $namaNasabah[$key]['nilai_fields'] = array_values($combined);

//            dump("-------------------");
        }

//        dump($namaNasabah);

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
        $this->removeNasabahNumericKey($namaNasabah);

//        dump($namaNasabah);

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