<?php
/**
 * @var $criteria
 * @var $nasabah
 * @var $grouped
 */
?>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Ubah Bobot Nasabah</h6>
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
                        <h3 class="mb-0">Input data bobot nasabah</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <?php if (!is_null($nasabah)) { ?>
                            <div class="row">
                                <div class="col-lg-8">
                                    <p class="mb-0">
                                        Masukkan data bobot untuk <strong style="font-weight: bold;"><?= $nasabah['nama_nsb'] ?></strong>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                        <hr>
                        <?php if (flashHas('error')) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Error!</strong> <?php echo flashGet('error'); ?>
                            </div>
                        <?php } ?>
                        <form action="/nasabah/bobot" method="post" class="needs-validation" novalidate="">
                            <input type="text" hidden name="id" value="<?= $_GET['id']; ?>">
                            <div class="row">
                                <?php foreach ($grouped as $key => $value) { ?>
                                    <div class="col-md-3 mb-3">
                                        <input type="text" name="kriteria[]" hidden value="<?= $value[0]['id_kriteria']; ?>">
                                        <label class="form-control-label" for="sub_kriteria"><?= ucfirst($key); ?></label>
                                        <select class="form-control" name="sub_kriteria[]" id="sub_kriteria">
                                            <?php foreach ($value as $item) { ?>
                                                <option value="<?= $item['id_subkriteria']; ?>"><?= $item['ket']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
