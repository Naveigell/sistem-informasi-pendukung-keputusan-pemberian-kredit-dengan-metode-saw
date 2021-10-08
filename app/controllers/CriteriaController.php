<?php
namespace App\Controllers;

use App\Models\CriteriaModel;
use App\Models\SubCriteriaModel;
use System\Validation\Validator;

class CriteriaController extends Controller {

    protected $denyUnloggedUser = true;

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
        $model = new CriteriaModel();

        view('includes/layout', [
            'content'       => "criteria/criteria.index",
            "criteria"      => $model->all()
        ]);
    }

    public function edit()
    {
        $id = $this->request->getAllParams()->id;
        $criteria       = new CriteriaModel();
        $subCriteria    = new SubCriteriaModel();

        view('includes/layout', [
            'content'       => "criteria/criteria.edit",
            'criteria'      => $criteria->selectWhereId($id),
            'subCriteria'   => $subCriteria->selectWhereId($id),
        ]);
    }

    public function insert()
    {
        view('includes/layout', [
            'content'   => "criteria/criteria.insert"
        ]);
    }

    public function update()
    {
        $request        = $this->request->getAllData();

        $this->validator->make($_POST, [
            "id"            => ["rules" => "required",],
            "name"          => ["rules" => "required",],
            "weight"        => ["rules" => "required",],
            "property"      => ["rules" => "required",],
        ]);

        if ($this->validator->success()) {
            $this->validator->clear();

            $nama           = $request->name;
            $bobot          = $request->weight;
            $keterangan     = $request->property;

            $model = new CriteriaModel();

            $data = [
                "nama_kriteria"         => $nama,
                "bobot_kriteria"        => $bobot,
                "ket_kriteria"          => $keterangan,
            ];

            try {
                $row = $model->update($data, [
                    "id_kriteria"       => $request->id
                ]);

                $this->session->set('success', 'Ubah kriteria berhasil');
                redirect('/criteria');
            } catch (\Exception $exception) {
                $this->session->set('error', $exception->getMessage());
                redirect('/criteria/edit?id='.$request->id);
            }
        } else {
            $this->session->set('error', 'Validasi gagal');
            redirect('/criteria/edit?id='.$request->id);
        }
    }

    public function delete()
    {
        $row = (new CriteriaModel())->delete(["id_kriteria" => $_GET['id']]);
        if ($row > 0) {
            http_response_code(201);
            echo json_encode([
                "message" => "Kriteria berhasil dihapus",
                "success" => true,
            ]);
        } else {
            http_response_code(500);
            echo json_encode([
                "message" => "Terjadi kesalahan saat menghapus kriteria",
                "success" => false,
            ]);
        }
    }

    public function updateSubCriteria()
    {
        $request        = (array) $this->request->getAllData();
        $id             = $request['id'];
        $subKriteria    = $request['sub-kriteria'];
        $subNilai       = $request['sub-nilai'];
        $idSubCriteria  = $request['id_subkriteria'];

        if (count($subKriteria) === count($subNilai)) {
            try {
                $model = new CriteriaModel();
                $row = $model->updateSubCriteria($id, $idSubCriteria, $subKriteria, $subNilai);

                $this->session->set('success', 'Ubah sub kriteria berhasil');
                redirect('/criteria');
            } catch (\Exception $exception) {
                $this->session->set('error', $exception->getMessage());
                redirect('/criteria/edit?id='.$id);
            }
        }
    }

    public function createSubCriteria()
    {
        $id = $this->request->getAllParams()->id;
        $criteria       = new CriteriaModel();
        $subCriteria    = new SubCriteriaModel();

        view('includes/layout', [
            'content'       => "criteria/criteria.add.sub-criteria",
            'criteria'      => $criteria->selectWhereId($id),
            'subCriteria'   => $subCriteria->selectWhereId($id),
        ]);
    }

    public function create()
    {
        $request    = $this->request->getAllData();

        $this->validator->make($_POST, [
            "name"          => ["rules" => "required",],
            "weight"        => ["rules" => "required",],
            "property"      => ["rules" => "required",],
        ]);

        if ($this->validator->success()) {
            $this->validator->clear();

            $nama       = $request->name;
            $bobot      = $request->weight;
            $keterangan = $request->property;

            try {
                $criteria = new CriteriaModel();

                if ($criteria->criteriaExists($nama)) {
                    $this->session->set('error', 'Sudah ada kriteria dengan nama yang sama');
                    redirect('/criteria/insert');
                }

                $subCriteria = new SubCriteriaModel();
                $id = $criteria->insert([
                    "nama_kriteria"         => $nama,
                    "bobot_kriteria"        => $bobot,
                    "ket_kriteria"          => $keterangan,
                ], true);

                $row = $subCriteria->insertSubCriteria($id);

                $this->session->set('success', 'Tambah kriteria berhasil');
                redirect('/criteria/sub-criteria?id='.$id);
            } catch (\Exception $exception) {
                $this->session->set('error', $exception->getMessage());
                redirect('/criteria/insert');
            }
        } else {
            redirect('/criteria/insert');
        }
    }
}