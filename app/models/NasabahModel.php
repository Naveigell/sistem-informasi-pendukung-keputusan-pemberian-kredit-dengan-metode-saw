<?php
namespace App\Models;

class NasabahModel extends Model {
    protected $table = 'nasabah';
    protected $primaryKey = 'id_nsb';

    public function first($id)
    {
        $result = $this->query("SELECT * FROM $this->table WHERE id_nsb = ?", [$id]);
        if (count($result) > 0) {
            return $result[0];
        }
        return null;
    }

}