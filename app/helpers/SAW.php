<?php
namespace App\Helpers;

use App\Libraries\SimpleAdditiveWeighting;
use App\Models\CriteriaModel;
use App\Models\PerhitunganModel;
use System\Arrays\Collection;

class SAW 
{
    const ELIGIBILITY_MARGIN = 43.75;

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
        $date = null;
        $month = null;
        $year = null;

        if (isset($_GET["periode"]) && !empty($_GET["periode"])) {
            $periode = explode("-", $_GET["periode"]);
            $year = $periode[0];
            $month = $periode[1];
            $date = $periode[2];
        }

        return [
            "date"  => $date,
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
     * 
     *
     * @return array
     */
    public static function calculateRanking()
    {
        $periode = self::parsePeriode();
        $quota = self::parseKuota();

        // mengambil data nasabah beserta kriteria dan nilai sub kriterianya
        $model = new PerhitunganModel();
        $nasabah = $model->getAll($periode['date'],$periode['month'],$periode["year"]);
        $nasabahCollection = new Collection($nasabah);

        $namaKriteria       = new CriteriaModel();
        $kriteria           = $namaKriteria->all();
        $kriteriaCollection = new Collection($kriteria);

        
        $namaKriteria       = $kriteriaCollection->pluck('nama_kriteria');
        $bobotKriteria      = $kriteriaCollection->pluck('bobot_kriteria');
        $keteranganKriteria = $kriteriaCollection->pluck('ket_kriteria');

        
        $namaNasabah = $nasabahCollection->groupBy('nama_nsb');

        // $key = nama dari nasabah
        foreach ($namaNasabah as $key => $value) {
            $collection = new Collection($value);
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

        // tambahkan ["data"]
        self::addNasabahData($namaNasabah);
        // hilangkan angka pada array
        self::removeNasabahNumericKey($namaNasabah);

        $namaNasabahCollection = new Collection($namaNasabah);
        $nilaiFieldsColumn = []; //field untuk normalisasi 
        $nilaiFields = $namaNasabahCollection->pluck('nilai_fields');

        // menyatukan nilai fields dari seluruh nasabah menjadi satu kolom
        // $key = nilai dari masing masing fields
        // merge nilai_fields into each column
        foreach ($nilaiFields as $key => $value) {
            foreach ($value as $k => $v) {
                // jika yang pertama tidak di set
                // maka nilai pertama dijadikan acuan
                if (!isset($nilaiFieldsColumn[$k])) {
                    $nilaiFieldsColumn[$k] = [$v];
                } else {
                    // setelah itu nilai selanjutnya pada
                    // index yang berbeda akan menyesuaikan
                    // dengan hasil yang telah di set
                    array_push($nilaiFieldsColumn[$k], $v);
                }
            }
        }

        // dari masing masing nilai fields yang sudah dijadikan dalam satu kolom akan dimasukkan
        // kedalam simple additive weighting
        // add each column into simple additive weighting library
        for ($i = 0; $i < count($nilaiFieldsColumn); $i++) {//untuk looping saat dimasukan kdlm simpleadditivew
            SimpleAdditiveWeighting::addData($nilaiFieldsColumn[$i], $bobotKriteria[$i], strtoupper($keteranganKriteria[$i]));
        }

        // normalize the data
        SimpleAdditiveWeighting::normalize();

        $i = 0;
        // get normalization result then transpose it and add into nasabah normalization
        $transpose = (new Collection(SimpleAdditiveWeighting::normalizationResult()))->transpose();

        // kriteria yang awalnya dikelompolkkan menjadi 1 kolom akan diubah menjadi 1 baris sesuai data dari tiap data nasabah tersebut
        foreach ($namaNasabah as $key => $value) {
            // $t is mean transpose
            $t = count($transpose) <= 0 ? 0 : $transpose[$i++];
            $namaNasabah[$key]['normalization'] = is_array($t) ? $t : [$t]; // check if $t is an array, if not, put it into an array
        }

        self::removeNasabahNumericKey($namaNasabah);

        //prefrensi
        // calculate and get the result
        SimpleAdditiveWeighting::calculate();
        $result = SimpleAdditiveWeighting::result();

        $i = 0;
        // add the result into nasabah
        //  hasil result yang telah dijumlahkan dalam simple additive weighting nilainya dimasukan berdasarkan nasabah 
        foreach ($namaNasabah as $key => $value) {
            // $r is result
            $r = is_null($result) || count($result) <= 0 ? 0 : $result[$i++];
            $namaNasabah[$key]['result'] = $r;
            $namaNasabah[$key]['layak'] = $r >= self::ELIGIBILITY_MARGIN;
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

        if (!is_null($periode['date']) && !is_null($periode['month']) && !is_null($periode['year'])) {
            $namaNasabah = array_filter($namaNasabah, function ($item) use ($periode) {
                return date('d-m-Y', strtotime($item['data']['periode'])) == $periode["date"] . '-' . $periode["month"] . '-' . $periode["year"];
            });

            $ranking = array_filter($ranking, function ($item) use ($periode) {
                return date('d-m-Y', strtotime($item['data']['periode'])) == $periode["date"] . '-' . $periode["month"] . '-' . $periode["year"];
            });
        }

        return [
            "ranking"       => $ranking,
            "namaNasabah"   => $namaNasabah,
            "namaKriteria"  => $namaKriteria,
        ];
    }
}