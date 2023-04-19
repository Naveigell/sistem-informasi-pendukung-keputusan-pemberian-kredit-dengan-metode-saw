<?php
namespace App\Models;

class PerhitunganModel extends Model {
    public function getAll($date = null, $month = null, $year = null)
    {
        $where = " WHERE nasabah.selesai = 0 ";
        if (!is_null($date) && !is_null($month) && !is_null($year)) {
            $where .= " AND DATE(periode) = '$year-$month-$date'";
            // 30 - 3 - 2021
        }

        return $this->query(
            "SELECT * FROM nasabah 
                LEFT JOIN pengajuan ON pengajuan.id_nsb = nasabah.id_nsb
                LEFT JOIN kriteria ON kriteria.id_kriteria = pengajuan.id_kriteria
                LEFT JOIN sub_kriteria ON sub_kriteria.id_subkriteria = pengajuan.id_subkriteria".$where
        );
    }


}