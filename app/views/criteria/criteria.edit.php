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
                    <h6 class="h2 text-white d-inline-block mb-0">Edit kriteria</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                <!-- Custom form validation -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Edit data kriteria</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <p class="mb-0">
                                    Masukkan data kriteria seperti nama kriteria dan bobot
                                </p>
                            </div>
                        </div>
                        <hr>
                        <?php if (errorHas('error')) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Error!</strong> <?php echo errorGet('error'); ?>
                            </div>
                        <?php } ?>
                        <form action="/criteria/update" method="post" class="needs-validation" novalidate="">
                            <input type="text" hidden value="<?= $_GET['id'] ?>" name="id">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="name">Nama Kriteria</label>
                                    <input name="name" value="<?= $criteria[0]['nama_kriteria']; ?>" type="text" class="form-control" id="name" placeholder="Masukkan nama kriteria ...">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label d-block" for="name">Keterangan Kriteria</label>
                                    <div class="custom-control custom-radio mb-3 d-inline-block">
                                        <input value="Cost" <?= $criteria[0]['ket_kriteria'] == 'Cost' ? 'checked' : '' ?> name="property" class="custom-control-input" id="customRadio5" type="radio">
                                        <label class="custom-control-label" for="customRadio5">Cost</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-3 d-inline-block ml-3">
                                        <input value="Benefit" <?= $criteria[0]['ket_kriteria'] == 'Benefit' ? 'checked' : '' ?> name="property" class="custom-control-input" id="customRadio6" type="radio">
                                        <label class="custom-control-label" for="customRadio6">Benefit</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="weight">Bobot kriteria</label>
                                    <input name="weight" value="<?= $criteria[0]['bobot_kriteria']; ?>" type="number" class="form-control" id="weight" placeholder="Masukkan bobot ...">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Edit data sub kriteria</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <p class="mb-0">
                                    Masukkan data sub kriteria dan nilainya
                                </p>
                            </div>
                        </div>
                        <hr>
                        <form action="/criteria/update-sub-criteria" method="post" class="needs-validation" novalidate="">
                            <input type="text" hidden name="id" value="<?= $_GET['id']; ?>">
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