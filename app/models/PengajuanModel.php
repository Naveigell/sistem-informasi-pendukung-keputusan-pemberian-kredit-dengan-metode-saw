<?php
namespace App\Models;

class PengajuanModel extends Model {
    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';

    public function createPengajuan($clnNasabah, $kriteria = [], $subKriteria = [])
    {
        $sql = "";
        $bindings = [];

        for ($i = 0; $i < count($subKriteria); $i++) {
            $sql .= "(?,?,?)";

            if ($i !== count($subKriteria) - 1) {
                $sql .= ",";
            }

            $bindings = array_merge($bindings, [$kriteria[$i], $clnNasabah, $subKriteria[$i]]);
        }

        $this->connection->beginTransaction();
        try {
            $this->delete([
                'id_nsb'        => $clnNasabah
            ]);
            $row = $this->insertMultiple("INSERT INTO pengajuan(id_kriteria, id_nsb, id_subkriteria) VALUES".$sql, $bindings);

            $this->connection->commit(); //comit : 2 data diproses
        } catch (\Exception $exception) {
            $this->connection->rollBack(); //rollback : jika yg diisi cmn 1 data saja, dua"nya gk bakal di proses
        }

        return $row;
    }

    public function subCriteria($id_nasabah)
    {
        $result = $this->query("SELECT * FROM $this->table INNER JOIN sub_kriteria ON sub_kriteria.id_subkriteria = pengajuan.id_subkriteria WHERE id_nsb = ?", [$id_nasabah]);

        return $result;
    }
}