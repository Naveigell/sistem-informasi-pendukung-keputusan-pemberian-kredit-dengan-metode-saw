<?php
namespace App\Models;


class SubCriteriaModel extends Model {
    protected $table = 'sub_kriteria';
    protected $primaryKey = 'id_subkriteria';

    public function selectWhereId($id)
    {
        return $this->query("SELECT * FROM $this->table WHERE id_kriteria=?", [$id]);
    }

    public function countWhereNotEmpty()
    {
        $query = $this->connection->prepare("SELECT COUNT($this->primaryKey) AS _total FROM $this->table WHERE ket != ''");
        $query->execute();
        return (int) $query->fetch()["_total"];
    }

    public function insertSubCriteria($idKriteria, $count = 4)
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