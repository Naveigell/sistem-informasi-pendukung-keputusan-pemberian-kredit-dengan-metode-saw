<?php
namespace App\Libraries;

class Collection {
    private $collections = [];
    const SORT_ASC = "ASCENDING";
    const SORT_DESC = "DESCENDING";

    public function __construct($array = [])
    {
        $this->collections = $array;
    }

    public function groupBy($key = '')
    {
        $arr = [];
        foreach ($this->collections as $collection) {
            if (isset($arr[$collection[$key]])) {
                array_push($arr[$collection[$key]], $collection);
            } else {
                $arr[$collection[$key]] = [];
                array_push($arr[$collection[$key]], $collection);
            }
        }

        return $arr;
    }

    public function pluck($key)
    {
        $plucked = [];
        foreach ($this->collections as $collection) {
            if (array_key_exists($key, $collection)) {
                array_push($plucked, $collection[$key]);
            }
        }

        return $plucked;
    }

    public function sortByKey($key, $type = self::SORT_ASC)
    {
        $temp = $this->collections;
        uasort($temp, function ($current, $next) use ($key, $type) {
            error_log($current[$key]);
            if ($type === self::SORT_ASC) {
                return $current[$key] > $next[$key];
            }
            return $current[$key] < $next[$key];
        });

        return $temp;
    }

    public function transpose()
    {
        if (count($this->collections) <= 0) {
            return $this->collections;
        }

        array_unshift($this->collections, null);
        return call_user_func_array('array_map', $this->collections);
    }
}