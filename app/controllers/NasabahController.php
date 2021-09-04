<?php
namespace App\Controllers;

use System\Validation\Validator;
use System\Arrays\Collection;
use App\Models\CriteriaModel;
use App\Models\NasabahModel;
use App\Models\PengajuanModel;

class NasabahController extends Controller {

    /**
     * @var Validator
     */
    private $validator;

    public function __construct()
    {
        parent::__construct();

        $this->validator = new Validator();
        $this->validator->storeToSession(true);
    }

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

    public function detail()
    {
        $nasabah = (new NasabahModel())->first($_GET['id']);
        echo json_encode($nasabah);
    }

    public function bobot()
    {
        $criteria = new CriteriaModel();
        $criterias = $criteria->getCriteriaAndSubCriteria();

        $nasabah = (new NasabahModel())->first($_GET['id']);
        $nasabahSubCriteria = (new PengajuanModel())->subCriteria($_GET['id']);
        $nasabahIdSubCriteria = (new Collection($nasabahSubCriteria))->pluck('id_subkriteria');

        $array = new Collection($criterias);
        $grouped = $array->groupBy('nama_kriteria');

        view('includes/layout', [
            'content'       => "nasabah/nasabah.bobot",
            'grouped'       => $grouped,
            'nasabah'       => $nasabah,
            'ids'           => $nasabahIdSubCriteria,
        ]);
    }

    public function edit()
    {
        $nasabah = (new NasabahModel())->first($_GET['id']);

        view('includes/layout', [
            'content'       => "nasabah/nasabah.edit",
            'nasabah'       => $nasabah,
        ]);
    }

    public function updateBobot()
    {
        $request = $this->request->getAllData();
        $model = new PengajuanModel();
        try {
            $row = $model->createPengajuan($request->id, $request->kriteria, $request->sub_kriteria);

            $this->session->set('success', 'Ubah pengajuan berhasil');
            redirect('/nasabah');
        } catch (\Exception $exception) {
            $this->session->set('error', $exception->getMessage());
            redirect('/nasabah/bobot?id='.$request->id);
        }
    }

    public function delete()
    {
        $row = (new NasabahModel())->delete(["id_cln_nsb" => $_GET['id']]);
        if ($row > 0) {
            http_response_code(201);
            echo json_encode([
                "message" => "Nasabah berhasil dihapus",
                "success" => true,
            ]);
        } else {
            http_response_code(500);
            echo json_encode([
                "message" => "Terjadi kesalahan saat menghapus nasabah",
                "success" => false,
            ]);
        }
    }

    public function update()
    {
        $this->validator->make($_POST, [
            "id"                    => ["rules" => "required|min:1"],
            "nama"                  => ["rules" => "required",],
            "no_kk"                 => ["rules" => "required",],
            "nik"                   => ["rules" => "required",],
            "tempat_lahir"          => ["rules" => "required",],
            "tanggal_lahir"         => ["rules" => "required",],
            "alamat"                => ["rules" => "required",],
            "agama"                 => ["rules" => "required|in:Hindu,Islam,Kristen,Buddha",],
            "email"                 => ["rules" => "required",],
            "no_telepon"            => ["rules" => "required",],
            "jenis_kelamin"         => ["rules" => "required|in:Pria,Wanita",],
            "periode"               => ["rules" => "required",],
        ]);
        $request        = $this->request->getAllData();

        if ($this->validator->success()) {
            $this->validator->clear();

            $nama           = $request->nama;
            $noKK           = $request->no_kk;
            $nik            = $request->nik;
            $tanggalLahir   = $request->tanggal_lahir;
            $tempatLahir    = $request->tempat_lahir;
            $alamat         = $request->alamat;
            $agama          = $request->agama;
            $email          = $request->email;
            $noTelepon      = $request->no_telepon;
            $jenisKelamin   = $request->jenis_kelamin;
            $periode        = $request->periode;

            try {
                $model = new NasabahModel();
                $row = $model->update([
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
                ], [
                    "id_cln_nsb"            => $request->id
                ]);

                $this->session->set('success', 'Ubah data nasabah berhasil');
                redirect('/nasabah');
            } catch (\Exception $exception) {
                $this->session->set('success', $exception->getMessage());
                redirect('/nasabah/edit?id='.$request->id);
            }
        } else {
            redirect('/nasabah/edit?id='.$request->id);
        }
    }

    public function create()
    {
        $this->validator->make($_POST, [
            "nama"                  => ["rules" => "required",],
            "no_kk"                 => ["rules" => "required",],
            "nik"                   => ["rules" => "required",],
            "tempat_lahir"          => ["rules" => "required",],
            "tanggal_lahir"         => ["rules" => "required",],
            "alamat"                => ["rules" => "required",],
            "agama"                 => ["rules" => "required|in:Hindu,Islam,Kristen,Buddha",],
            "email"                 => ["rules" => "required",],
            "no_telepon"            => ["rules" => "required",],
            "jenis_kelamin"         => ["rules" => "required|in:Pria,Wanita",],
            "periode"               => ["rules" => "required",],
        ]);

        if ($this->validator->success()) {
            $this->validator->clear();

            $request        = $this->request->getAllData();
            $nama           = $request->nama;
            $noKK           = $request->no_kk;
            $nik            = $request->nik;
            $tempatLahir    = $request->tempat_lahir;
            $tanggalLahir   = $request->tanggal_lahir;
            $alamat         = $request->alamat;
            $agama          = $request->agama;
            $email          = $request->email;
            $noTelepon      = $request->no_telepon;
            $jenisKelamin   = $request->jenis_kelamin;
            $periode        = $request->periode;

            $model = new NasabahModel();
            $id = $model->insert([
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
            ], true);

            if ($id > 0) {
                $this->session->set('success', 'Tambah nasabah berhasil');
                redirect('/nasabah/bobot?id='.$id);
            } else {
                $this->session->set('error', 'Terjadi kesalahan saat mengubah data');
                redirect('/nasabah/insert');
            }
        } else {
            redirect('/nasabah/insert');
        }


    }
}