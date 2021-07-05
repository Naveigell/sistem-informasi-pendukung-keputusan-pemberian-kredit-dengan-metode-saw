<?php
namespace App\Models;

class PerhitunganModel extends Model {
    public function getAll()
    {
        return $this->query(
            "SELECT * FROM cln_nasabah 
                LEFT JOIN pengajuan ON pengajuan.id_cln_nsb = cln_nasabah.id_cln_nsb
                INNER JOIN kriteria ON kriteria.id_kriteria = pengajuan.id_kriteria
                INNER JOIN sub_kriteria ON sub_kriteria.id_subkriteria = pengajuan.id_subkriteria"
        );
    }
}