<?php
namespace App\Models;

use System\Arrays\Collection;

class SawModel extends Model
{
    public function calculateEligibility(array $config)
    {
        $data = [];
        $result = $this->query("SELECT * FROM `kriteria` WHERE kriteria.nama_kriteria IN ('Pendapatan', 'Pekerjaan', 'Jaminan', 'Pengeluaran', 'Usia', 'Jangka waktu')");
        
        foreach ($result as $item) {
            if (!isset($data[$item["id_kriteria"]])) {

                $data[$item["id_kriteria"]] = [
                    "id"            => $item["id_kriteria"],
                    "nama"          => $item["nama_kriteria"],
                    "bobot"         => $item["bobot_kriteria"],
                    "value"         => in_array($item["nama_kriteria"], array_keys($config)) ? $config[$item["nama_kriteria"]] : 1,
                    "ket_kriteria"  => $item["ket_kriteria"]
                ];
            }
        }

        return $data;
    }
}
