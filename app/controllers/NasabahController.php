<?php
namespace App\Controllers;

use App\Libraries\Collection;
use App\Libraries\SimpleAdditiveWeighting;
use App\Models\CriteriaModel;
use App\Models\NasabahModel;
use App\Models\PengajuanModel;

class NasabahController extends Controller {

    public function index()
    {
        $model = new NasabahModel();
        view('includes/layout', [
            'content'       => "nasabah/nasabah.index",
            'nasabah'       => $model->all()
        ]);
    }

    public function insert()
    {
        view('includes/layout', [
            'content'       => "nasabah/nasabah.insert",
        ]);
    }

    public function bobot()
    {
        $criteria = new CriteriaModel();
        $c = $criteria->getCriteriaAndSubCriteria();

        $nasabah = (new NasabahModel())->first($_GET['id']);

        $array = new Collection($c);
        $grouped = $array->groupBy('nama_kriteria');

        view('includes/layout', [
            'content'       => "nasabah/nasabah.bobot",
            'grouped'       => $grouped,
            'nasabah'       => $nasabah
        ]);
    }

    public function updateBobot()
    {
        $request = $this->request->getAllData();
        $p = new PengajuanModel();
        $row = $p->createPengajuan($request->id, $request->kriteria, $request->sub_kriteria);
        var_dump($row);
    }

    public function create()
    {
        $request        = $this->request->getAllData();
        $nama           = $request->nama;
        $noKK           = $request->no_kk;
        $nik            = $request->nik;
        $tempatLahir    = $request->tempat_lahir;
        $tanggalLahir   = $request->tanggal_lahir;
        $alamat         = $request->alamat;
        $agama          = $request->agama;
        $email          = $request->email;
        $email          = $request->email;
        $noTelepon      = $request->no_telepon;
        $jenisKelamin   = $request->jenis_kelamin;
        $periode        = $request->periode;

        $model = new NasabahModel();
        $row = $model->insert([
            "nama_nsb"              => $nama,
            "no_kk"                 => $noKK,
            "no_nik"                => $nik,
            "tempat_lahir"          => $tempatLahir,
            "tgl_lahir"             => $tanggalLahir,
            "alamat"                => $alamat,
            "agama"                 => $agama,
            "email"                 => $email,
            "no_tlp"                => $noTelepon,
            "jenis_kelamin"         => $jenisKelamin,
            "periode"               => date("Y-m-d", strtotime($periode)),
        ]);

        var_dump($row);
    }
}