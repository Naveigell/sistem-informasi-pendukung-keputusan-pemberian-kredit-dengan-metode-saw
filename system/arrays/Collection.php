<?php
namespace System\Arrays;

class Collection {
    private $collections = [];
    const SORT_ASC = "ASCENDING";
    const SORT_DESC = "DESCENDING";

    public function __construct($array = [])
    {
        $this->collections = $array;
    }

    public function countKey($key = '')
    {
        $arr = [];
        foreach ($this->collections as $collection) {
            if (!isset($arr[$collection[$key]])) {
                $arr[$collection[$key]] = 0;
            }
            $arr[$collection[$key]]++;
        }

        return $arr;
    }

    public function countKeyIf($key = '', $condition = false)
    {
        $arr = [];
        foreach ($this->collections as $collection) {
            if (isset($arr[$collection[$key]])) {
                if ($arr[$collection[$key]] == $condition) {
                    $arr[$collection[$key]]++;
                }
            } else {
                $arr[$collection[$key]] = 0;
            }
        }

        return $arr;
    }

    public function setDefault(array $array, $default)
    {
        foreach ($array as $item) {
            if (!array_key_exists($item, $this->collections)) {
                $this->collections[$item] = $default;
            }
        }

        return $this->collections;
    }

    public function groupBy($key = '')
    {
        $arr = [];
        foreach ($this->collections as $collection) {
            if (!isset($arr[$collection[$key]])) {
                $arr[$collection[$key]] = [];
            }
            array_push($arr[$collection[$key]], $collection);
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

    public function sort($type = self::SORT_ASC)
    {
        $temp = $this->collections;
        if ($type === self::SORT_ASC) {
            ksort($temp);
        } elseif ($type === self::SORT_DESC) {
            krsort($temp);
        }

        return $temp;
    }

    public function sortByKey($key, $type = self::SORT_ASC)
    {
        $temp = $this->collections;
        uasort($temp, function ($current, $next) use ($key, $type) {
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