<?php
namespace App\Libraries;

class SimpleAdditiveWeighting {
    private static $data = [];
    private static $normalize = [];
    private static $result = [];

    public static $test;

    const CRITERIA_COST = 'COST';
    const CRITERIA_BENEFIT = 'BENEFIT';

    const SORT_ASC = 'ASCENDING';
    const SORT_DESC = 'DESCENDING';

    const ONLY_DATA = 'ONLY_DATA';

    public function __construct($data = [])
    {
        self::$data = $data;
    }

    public static function data()
    {
        return self::$data;
    }

    public static function addData($data = [], $weight = 1, $criteria = self::CRITERIA_BENEFIT)
    {
        array_push(self::$data, [
            'criteria'      => $criteria,
            'data'          => $data,
            'weight'        => $weight
        ]);

        self::$normalize = self::$data;
    }

    public static function result()
    {
        return self::$result;
    }

    public static function sort($type = self::SORT_ASC)
    {
        $temp = self::$result;
        if ($type === self::SORT_ASC) {
            sort($temp);
        } else if ($type === self::SORT_DESC) {
            rsort($temp);
        }
        return $temp;
    }

    public static function calculate()
    {
        $tempData = [];
        self::$data = self::$normalize;

        //looping masing" data menjadi items
        //
        foreach (self::$data as $items) {
            $values = [];
            foreach ($items['data'] as $item) {
                array_push($values, round($item * $items['weight'], 3));//hasil perkalian masukan ke variabel value
            }

            array_push($tempData, $values);// hasil dari value masuk ke tempData
        }

        $result = [];
        //cek apakah ada datanya (>0)
        if (count($tempData) > 0) {

            for ($i = 0; $i < count($tempData[0]); $i++) { //looping array tiap nasabah
                $value = 0;
                for ($j = 0; $j < count($tempData); $j++) { //looping tiap item
                    $value += $tempData[$j][$i]; //proses penjumlahan hasil seluruhnya
                }
                array_push($result, round($value, 3));//hasilnya 3 angka belakang koma, dimasukan kedlm variabel result 
            }
        }

        self::$result = $result;
    }

    //buat liat hasil dari normalisasinya 
    public static function normalizationResult($type = self::ONLY_DATA)
    {
        if ($type === self::ONLY_DATA) {
            $plucked = [];
            foreach (self::$normalize as $collection) {
                if (array_key_exists('data', $collection)) { //mengecek apakah di colection ada data
                    array_push($plucked, $collection['data']);//masukan dalam variabel plucked
                }
            }

            return $plucked;
        }

        // mengembalikan nilai normalize
        return self::$normalize;
    }

    // proses normalisasi 
    public static function normalize()
    {
        foreach (self::$normalize as &$items) {
            $values = [];

            if ($items['criteria'] === self::CRITERIA_BENEFIT) {
                $point = max($items['data']);
                foreach ($items['data'] as $item) {
                    array_push($values, round($item / $point, 2));
                }
            } else if ($items['criteria'] === self::CRITERIA_COST) {
                $point = min($items['data']);
                foreach ($items['data'] as $item) {
                    array_push($values, round($point / $item, 2));
                }
            }

            $items['data'] = $values;
        }
    }

    public static function clear() //hanya untuk jaga"
    {
        self::$data = [];
        self::$normalize = [];
    }
}