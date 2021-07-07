<?php
namespace App\Models;


class SubCriteriaModel extends Model {
    protected $table = 'sub_kriteria';

    public function selectWhereId($id)
    {
        return $this->query("SELECT * FROM $this->table WHERE id_kriteria=?", [$id]);
    }

    public function insertSubCriteria($idKriteria, $count = 5)
    {
        $sql = "INSERT INTO sub_kriteria(id_kriteria, ket, nilai) VALUES";
        for ($i = 0; $i < $count; $i++) {
            $sql .= "($idKriteria, '', 1)";

            if ($i !== $count - 1) {
                $sql .= ",";
            }
        }

        return $this->updateMultiple($sql);
    }
}