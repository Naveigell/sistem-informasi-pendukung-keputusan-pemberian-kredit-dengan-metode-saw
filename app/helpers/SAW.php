<?php
namespace App\Helpers;

use App\Models\CriteriaModel;
use App\Models\PerhitunganModel;
use System\Arrays\Collection;
use System\Arrays\SimpleAdditiveWeighting;

class SAW
{
    /**
     * If the key is empty, remove the key and value
     *
     * @param array $data
     */
    public static function removeNullOrEmptyValue(array &$data)
    {
        foreach ($data as $key => $value) {
            if (empty($key)) {
                unset($data[$key]);
            }
        }
    }

    /**
     * Remove numeric key and keep word key
     *
     * @param array $data
     */
    public static function removeNasabahNumericKey(array &$data)
    {
        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                if (is_numeric($k)) {
                    unset($data[$key][$k]);
                }
            }
        }
    }

    /**
     * Add data into nasabah which contains nasabah data
     *
     * @param array $data
     */
    public static function addNasabahData(array &$data)
    {
        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                if (is_numeric($k)) {
                    $data[$key]["data"] = $v;
                }
            }
        }
    }

    /**
     * Parse the periode from given url
     *
     * @return array
     */
    public static function parsePeriode()
    {
        $month = null;
        $year = null;

        if (isset($_GET["periode"]) && !empty($_GET["periode"])) {
            $periode = explode("-", $_GET["periode"]);
            $month = $periode[1];
            $year = $periode[0];
        }

        return [
            "month" => $month,
            "year"  => $year
        ];
    }

    public static function parseKuota()
    {
        $quota = -1;
        if (isset($_GET["kuota"]) && !empty($_GET["kuota"])) {
            $quota = $_GET["kuota"];
        }

        return $quota;
    }

    /**
     * Calculate ranking, nasabah name and criteria
     *
     * @return array
     */
    public static function calculateRanking()
    {
        $periode = self::parsePeriode();
        $quota = self::parseKuota();

        $model = new PerhitunganModel();
        $nasabah = $model->getAll($periode["month"], $periode["year"]);
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
            $namaNasabah[$key]['nilai_fields'] = (is_null($nilai) ? 1 : $nilai);

            $combined = [];
            if (count($nama) === count($nilai)) {
                $combined = array_combine($nama, $nilai);
            }

            self::removeNullOrEmptyValue($combined);

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

            $namaNasabah[$key]['nilai_fields'] = array_values($combined);
            if (count($value) > 0) {
                $namaNasabah[$key]['id'] = $value[0][0];
            }
        }

        self::addNasabahData($namaNasabah);
        self::removeNasabahNumericKey($namaNasabah);

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
        $transpose = (new Collection(SimpleAdditiveWeighting::normalizationResult()))->transpose();
        foreach ($namaNasabah as $key => $value) {
            // $t is mean transpose
            $t = count($transpose) <= 0 ? 0 : $transpose[$i++];
            $namaNasabah[$key]['normalization'] = is_array($t) ? $t : [$t]; // check if $t is an array, if not, put it into an array
        }
        self::removeNasabahNumericKey($namaNasabah);

        // calculate and get the result
        SimpleAdditiveWeighting::calculate();
        $result = SimpleAdditiveWeighting::result();

        $i = 0;
        // add the result into nasabah
        foreach ($namaNasabah as $key => $value) {
            $namaNasabah[$key]['result'] = is_null($result) || count($result) <= 0 ? 0 : $result[$i++];
        }

        // remove unused array in nasabah
        self::removeNasabahNumericKey($namaNasabah);

        // sort $namaNasabah by id
        $namaNasabah = (new Collection($namaNasabah))->sortByKey('id');

        // splice nasabah by given quota
        if ($quota > -1) {
            $namaNasabah = array_slice($namaNasabah, -$quota, count($namaNasabah));
        }

        // sort the ranking
        $ranking = (new Collection($namaNasabah))->sortByKey('result', Collection::SORT_DESC);

        return [
            "ranking"       => $ranking,
            "namaNasabah"   => $namaNasabah,
            "namaKriteria"  => $namaKriteria,
        ];
    }
}