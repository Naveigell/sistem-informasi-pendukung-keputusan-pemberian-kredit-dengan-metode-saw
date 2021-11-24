<?php
namespace App\Models;

class LatihanModel extends Model{
	protected $table ="kriteria";
	protected $primaryKey ="id_kriteria";

	public function GetAllKriteria(){
		return $this->query("SELECT * FROM $this->table");
	}
}