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
                'id_cln_nsb'        => $clnNasabah
            ]);
            $row = $this->insertMultiple("INSERT INTO pengajuan(id_kriteria, id_cln_nsb, id_subkriteria) VALUES".$sql, $bindings);

            $this->connection->commit();
        } catch (\Exception $exception) {
            $this->connection->rollBack();
        }

        return $row;
    }
}