<?php
namespace App\Models;

class CriteriaModel extends Model {
    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';

    public function selectWhereId($id)
    {
        return $this->query("SELECT * FROM $this->table WHERE id_kriteria=?", [$id]);
    }

    public function getCriteriaAndSubCriteria() // metod
    {
        return $this->query("SELECT * FROM $this->table INNER JOIN sub_kriteria ON $this->table.id_kriteria = sub_kriteria.id_kriteria GROUP BY sub_kriteria.id_subkriteria");
    }

    public function criteriaExists($name)
    {
        return $this->query("SELECT COUNT($this->primaryKey) as _total FROM $this->table WHERE nama_kriteria = '$name'")[0]["_total"] > 0;
    }

    public function updateSubCriteria($idKriteria, $idSubKriteria, $subKriteria, $subNilai)
    {
        $nilai = [
            "cases"     => $idSubKriteria,
            "key"       => "id_subkriteria",
            "values"    => $subNilai
        ];

        $kriteria = [
            "cases"     => $idSubKriteria,
            "key"       => "id_subkriteria",
            "values"    => $subKriteria
        ];

        $string1 = $this->bulkUpdateSql($nilai['key'], $nilai);
        $ids1 = implode(',', $nilai['cases']);
        $key1 = $nilai['key']; 

        $string2 = $this->bulkUpdateSql($kriteria['key'], $kriteria, true);

        $sql = "UPDATE sub_kriteria SET nilai = (CASE $string1 END), ket = (CASE $string2 END) WHERE id_kriteria = $idKriteria AND $key1 IN($ids1)";

        return $this->updateMultiple($sql, []);
    }

    private function bulkUpdateSql($key, $data = [], $addQuotes = false)
    {
        $sql = $key;
        for ($i = 0; $i < count($data['values']); $i++) {
            $case = $data['cases'][$i];
            $value = $data['values'][$i];

            if (!$addQuotes) {
                $sql .= " WHEN $case THEN $value ";
            } else {
                $sql .= " WHEN $case THEN '$value' ";
            }
        }

        return $sql;
    }
}

//