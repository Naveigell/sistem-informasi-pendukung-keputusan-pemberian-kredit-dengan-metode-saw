<?php
namespace App\Models;

class CriteriaModel extends Model {
    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';

    public function selectWhereId($id)
    {

        return $this->query("SELECT * FROM $this->table WHERE id_kriteria=?", [$id]);
    }

    public function getCriteriaAndSubCriteria()
    {
        return $this->query("SELECT * FROM $this->table INNER JOIN sub_kriteria ON $this->table.id_kriteria = sub_kriteria.id_kriteria GROUP BY sub_kriteria.id_subkriteria");
    }

    public function updateSubCriteria($idKriteria, $subKriteria, $subNilai)
    {
        $sql = "";
        $bindings = [];

        for ($i = 0; $i < count($subKriteria); $i++) {
            $kriteria   = $subKriteria[$i];
            $nilai      = $subNilai[$i];

            $sql .= "(?,?,?)";

            if ($i !== count($subKriteria) - 1) {
                $sql .= ",";
            }

            $bindings = array_merge($bindings, [$idKriteria, $kriteria, $nilai]);
        }

        $this->connection->beginTransaction();
        try {
            $this->delete([
                "id_kriteria"       => $idKriteria
            ], 'sub_kriteria');
            $row = $this->insertMultiple("INSERT INTO sub_kriteria(id_kriteria, ket, nilai) VALUES".$sql, $bindings);

            $this->connection->commit();
        } catch (\Exception $exception) {
            $this->connection->rollBack();
        }

        return $row;
    }
}