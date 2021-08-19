<div class="header bg-success pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tambah Kriteria</h6>
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
                        <h3 class="mb-0">Input data kriteria</h3>
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
                        <?php if (flashHas('error')) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Error!</strong> <?php echo flashGet('error'); ?>
                            </div>
                        <?php } ?>
                        <form action="<?= BASE_PATH; ?>/criteria/create" method="post" class="needs-validation" novalidate="">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="name">Nama Kriteria</label>
                                    <input name="name" type="text" class="form-control <?= flashHas('error-name') ? 'is-invalid' : ''; ?>" id="name" placeholder="Masukkan nama kriteria ...">
                                    <div class="invalid-feedback">
                                        <?= flashGet('error-name')[0] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label d-block" for="name">Keterangan Kriteria</label>
                                    <div class="custom-control custom-radio mb-3 d-inline-block">
                                        <input value="Cost" name="property" class="custom-control-input" id="customRadio5" type="radio">
                                        <label class="custom-control-label" for="customRadio5">Cost</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-3 d-inline-block ml-3">
                                        <input value="Benefit" name="property" class="custom-control-input" id="customRadio6" type="radio">
                                        <label class="custom-control-label" for="customRadio6">Benefit</label>
                                    </div>
                                    <?php if (flashHas('error-property')) { ?>
                                        <div class="text text-danger text-xs">
                                            <?= flashGet('error-property')[0] ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="weight">Bobot kriteria</label>
                                    <input name="weight" type="number" class="form-control <?= flashHas('error-weight') ? 'is-invalid' : ''; ?>" id="weight" placeholder="Masukkan bobot ...">
                                    <div class="invalid-feedback">
                                        <?= flashGet('error-weight')[0] ?>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
