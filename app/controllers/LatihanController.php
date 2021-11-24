<?php
namespace App\Controllers;

use App\Models\LatihanModel;
use App\Helpers\SAW;

class LatihanController extends Controller{
	
	public function index(){
		// view ('latihan',['total'=>20]); // passng data dari controller ke view 

		// $test        = new LatihanModel();
		// panggil model dan tampilkan di controler
		// echo '<pre>';
		// var_dump($test->GetAllKriteria());
		// echo '</pre>';

		// $test        = new LatihanModel();

		// view ('latihan', [
		// 	'bobot' => $test->GetAllKriteria()
		// ]);

		$data = SAW::calculateRanking();

		// echo '<pre>';
		// var_dump(SAW::calculateRanking());
		// echo '</pre>';
	}
}