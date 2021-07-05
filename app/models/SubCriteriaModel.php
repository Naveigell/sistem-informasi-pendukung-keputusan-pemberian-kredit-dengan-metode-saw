<?php
namespace App\Models;


class SubCriteriaModel extends Model {
    protected $table = 'sub_kriteria';

    public function selectWhereId($id)
    {
        return $this->query("SELECT * FROM $this->table WHERE id_kriteria=?", [$id]);
    }
}