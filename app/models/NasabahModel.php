<?php
namespace App\Models;

class NasabahModel extends Model {
    protected $table = 'nasabah';
    protected $primaryKey = 'id_nsb';

    public function first($id) // ini gunanya untuk ngambil detail 
    {
        $result = $this->query("SELECT * FROM $this->table WHERE id_nsb = ?", [$id]);
        if (count($result) > 0) {
            return $result[0];
        }
        return null;
    }

    public function countNIK($nik)
    {
        $result = $this->query("SELECT COUNT(*) AS _total FROM $this->table WHERE no_nik = ?", [$nik]);

        if (count($result) > 0) {
            return $result[0]['_total'];
        }

        return 0;
    }

}