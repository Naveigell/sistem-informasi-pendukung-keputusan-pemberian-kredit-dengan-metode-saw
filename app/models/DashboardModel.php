<?php
namespace App\Models;

class DashboardModel extends Model
{
    protected $table = "cln_nasabah";
    protected $primaryKey = "id_cln_nsb";
    // SELECT cln_nasabah.periode, COUNT(cln_nasabah.id_cln_nsb) AS _total, YEAR(periode) AS _year, MONTH(periode) AS _month FROM `cln_nasabah` WHERE 1 GROUP BY periode

    public function graph()
    {
        return $this->query("SELECT cln_nasabah.periode, COUNT(cln_nasabah.id_cln_nsb) AS _total, YEAR(periode) AS _year, MONTH(periode) AS _month FROM `cln_nasabah` WHERE 1 GROUP BY periode");
    }
}