<div class="header bg-success pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tambah Nasabah</h6>
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
                        <h3 class="mb-0">Input data nasabah</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <p class="mb-0">
                                    Masukkan data nasabah seperti nama, nomor kk dan nik
                                </p>
                            </div>
                        </div>
                        <hr>
                        <?php if (flashHas('error')) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Error!</strong> <?php echo flashGet('error'); ?>
                            </div>
                        <?php } ?>
                        <form action="<?= BASE_PATH; ?>/nasabah/create" method="post" class="needs-validation" novalidate="">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="nama">Nama Nasabah</label>
                                    <input name="nama" type="text" class="form-control <?= flashHas('error-nama') ? 'is-invalid' : ''; ?>" id="nama" placeholder="Masukkan nama nasabah ...">
                                    <div class="invalid-feedback">
                                        <?= flashGet('error-nama')[0] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="no_kk">Nomor KK</label>
                                    <input name="no_kk" type="text" class="form-control <?= flashHas('error-no_kk') ? 'is-invalid' : ''; ?>" id="no_kk" placeholder="Masukkan nomor kk ...">
                                    <div class="invalid-feedback">
                                        <?= flashGet('error-no_kk')[0] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="nik">NIK</label>
                                    <input name="nik" type="number" class="form-control <?= flashHas('error-nik') ? 'is-invalid' : ''; ?>" id="nik" placeholder="Masukkan nik ...">
                                    <div class="invalid-feedback">
                                        <?= flashGet('error-nik')[0] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="tempat_lahir">Tempat Lahir</label>
                                    <input name="tempat_lahir" type="text" class="form-control <?= flashHas('error-tempat_lahir') ? 'is-invalid' : ''; ?>" id="tempat_lahir" placeholder="Masukkan tempat lahir ...">
                                    <div class="invalid-feedback">
                                        <?= flashGet('error-tempat_lahir')[0] ?>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="tanggal_lahir">Tanggal Lahir</label>
                                    <input name="tanggal_lahir" type="date" class="form-control <?= flashHas('error-tanggal_lahir') ? 'is-invalid' : ''; ?>" id="tanggal_lahir" placeholder="Masukkan tanggal lahir ...">
                                    <div class="invalid-feedback">
                                        <?= flashGet('error-tanggal_lahir')[0] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="alamat">Alamat</label>
                                    <textarea class="form-control <?= flashHas('error-alamat') ? 'is-invalid' : ''; ?>" resize="none" name="alamat" id="alamat" cols="30" rows="10"></textarea>
                                    <div class="invalid-feedback">
                                        <?= flashGet('error-alamat')[0] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="agama">Agama</label>
                                    <select class="form-control <?= flashHas('error-agama') ? 'is-invalid' : ''; ?>" name="agama" id="agama">
                                        <option value="Hindu">Hindu</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Buddha">Buddha</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= flashGet('error-agama')[0] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="email">Email</label>
                                    <input name="email" type="email" class="form-control <?= flashHas('error-email') ? 'is-invalid' : ''; ?>" id="email" placeholder="Masukkan email ...">
                                    <div class="invalid-feedback">
                                        <?= flashGet('error-email')[0] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="no_telepon">No Telepon</label>
                                    <input name="no_telepon" type="text" class="form-control <?= flashHas('error-no_telepon') ? 'is-invalid' : ''; ?>" id="no_telepon" placeholder="Masukkan no telepon ...">
                                    <div class="invalid-feedback">
                                        <?= flashGet('error-no_telepon')[0] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control <?= flashHas('error-jenis_kelamin') ? 'is-invalid' : ''; ?>" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= flashGet('error-jenis_kelamin')[0] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="periode">Periode</label>
                                    <input name="periode" type="date" class="form-control <?= flashHas('error-periode') ? 'is-invalid' : ''; ?>" id="periode" placeholder="Masukkan periode ...">
                                    <div class="invalid-feedback">
                                        <?= flashGet('error-periode')[0] ?>
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
