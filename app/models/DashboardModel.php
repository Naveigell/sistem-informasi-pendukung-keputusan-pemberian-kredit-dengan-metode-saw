<?php
namespace App\Models;

class DashboardModel extends Model
{
    protected $table = "nasabah";
    protected $primaryKey = "id_nsb";
    // SELECT cln_nasabah.periode, COUNT(cln_nasabah.id_cln_nsb) AS _total, YEAR(periode) AS _year, MONTH(periode) AS _month FROM `cln_nasabah` WHERE 1 GROUP BY periode

    // profession graph
    // SELECT * FROM `pengajuan` INNER JOIN kriteria ON kriteria.id_kriteria = pengajuan.id_kriteria INNER JOIN sub_kriteria ON sub_kriteria.id_subkriteria = pengajuan.id_subkriteria WHERE (kriteria.nama_kriteria = 'pekerjaan' OR kriteria.nama_kriteria = 'jangka waktu') AND sub_kriteria.ket != '' ORDER BY id_cln_nsb ASC

    public function graph()
    {
        return $this->query("SELECT nasabah.periode, COUNT(nasabah.id_nsb) AS _total, YEAR(periode) AS _year, MONTH(periode) AS _month FROM `nasabah` GROUP BY YEAR(periode), MONTH(periode)");
    }

    public function criteriaGraph(array $ids = [])
    {
        $inQuery = implode(',', array_fill(0, count($ids), '?'));
        $sql = "SELECT * FROM `pengajuan` 
                    INNER JOIN kriteria ON kriteria.id_kriteria = pengajuan.id_kriteria 
                    INNER JOIN sub_kriteria ON sub_kriteria.id_subkriteria = pengajuan.id_subkriteria 
                    WHERE pengajuan.id_nsb IN($inQuery) AND (kriteria.nama_kriteria = 'pekerjaan' OR kriteria.nama_kriteria = 'jangka waktu'OR kriteria.nama_kriteria = 'usia'OR kriteria.nama_kriteria = 'pendapatan'OR kriteria.nama_kriteria = 'pengeluaran'OR kriteria.nama_kriteria = 'jaminan') AND sub_kriteria.ket != ''";

        return $this->query($sql, $ids);
    }
}