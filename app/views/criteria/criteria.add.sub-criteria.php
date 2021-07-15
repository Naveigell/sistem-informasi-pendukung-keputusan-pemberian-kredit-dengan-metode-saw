<?php
/**
 * @var $criteria
 * @var $subCriteria
 */
?>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tambah sub kriteria</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Tambah data sub kriteria</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <p class="mb-0">
                                    Tambahkan data sub kriteria dari
                                    <strong style="font-weight: bold;"><?= $criteria[0]['nama_kriteria']; ?> &nbsp; </strong>
                                    dan nilainya
                                </p>
                            </div>
                        </div>
                        <hr>
                        <form action="<?= BASE_PATH; ?>/criteria/update-sub-criteria" method="post" class="needs-validation" novalidate="">
                            <input type="text" hidden readonly name="id" value="<?= $_GET['id']; ?>">
                            <?php for ($i = 0; $i < count($subCriteria); $i++) { ?>
                                <input type="text" hidden readonly name="id_subkriteria[]" value="<?= $subCriteria[$i]['id_subkriteria']; ?>">
                            <?php } ?>
                            <?php for ($i = 0; $i < count($subCriteria); $i++) { ?>
                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <input value="<?= $subCriteria[$i]['ket']; ?>" name="sub-kriteria[]" class="form-control" type="text" id="sub-kriteria-<?= $i; ?>" placeholder="Masukkan keterangan sub kriteria ke - <?= $i + 1; ?>">
                                    </div>
                                    <label for="sub-kriteria-nilai-<?= $i; ?>" class="col-md-1 col-form-label form-control-label">Nilai : </label>
                                    <div class="col-md-1">
                                        <input value="<?= $subCriteria[$i]['nilai']; ?>" name="sub-nilai[]" class="form-control" type="number" id="sub-kriteria-nilai-<?= $i; ?>" placeholder="">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php for ($i = count($subCriteria); $i < 5; $i++) { ?>
                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <input value="" name="sub-kriteria[]" class="form-control" type="text" id="sub-kriteria-<?= $i; ?>" placeholder="Masukkan keterangan sub kriteria ke - <?= $i + 1; ?>">
                                    </div>
                                    <label for="sub-kriteria-nilai-<?= $i; ?>" class="col-md-1 col-form-label form-control-label">Nilai : </label>
                                    <div class="col-md-1">
                                        <input value="" name="sub-nilai[]" class="form-control" type="number" id="sub-kriteria-nilai-<?= $i; ?>" placeholder="">
                                    </div>
                                </div>
                            <?php } ?>
                            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>