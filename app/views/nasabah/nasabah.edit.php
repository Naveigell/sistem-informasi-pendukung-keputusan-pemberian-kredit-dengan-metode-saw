<?php
/**
 * @var $nasabah
 */

?>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Edit Nasabah</h6>
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
                        <h3 class="mb-0">Ubah data nasabah</h3>
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
                        <form action="/nasabah/update" method="post" class="needs-validation" novalidate="">
                            <input name="id" type="hidden" readonly value="<?= $_GET['id']; ?>">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="nama">Nama Nasabah</label>
                                    <input value="<?= $nasabah['nama_nsb']; ?>" name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan nama nasabah ...">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="no_kk">Nomor KK</label>
                                    <input value="<?= $nasabah['no_kk'] ?>" name="no_kk" type="text" class="form-control" id="no_kk" placeholder="Masukkan nomor kk ...">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="nik">NIK</label>
                                    <input value="<?= $nasabah['no_nik']; ?>" name="nik" type="number" class="form-control" id="nik" placeholder="Masukkan nik ...">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="tempat_lahir">Tempat Lahir</label>
                                    <input value="<?= $nasabah['tempat_lahir']; ?>" name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" placeholder="Masukkan tempat lahir ...">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="tanggal_lahir">Tanggal Lahir</label>
                                    <input value="<?= $nasabah['tgl_lahir']; ?>" name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" placeholder="Masukkan tanggal lahir ...">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="alamat">Alamat</label>
                                    <textarea class="form-control" resize="none" name="alamat" id="alamat" cols="30" rows="10"><?= $nasabah['alamat']; ?></textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="agama">Agama</label>
                                    <select class="form-control" name="agama" id="agama">
                                        <option value="Hindu">Hindu</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Buddha">Buddha</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="email">Email</label>
                                    <input value="<?= $nasabah['email']; ?>" name="email" type="email" class="form-control" id="email" placeholder="Masukkan email ...">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="no_telepon">No Telepon</label>
                                    <input value="<?= $nasabah['no_tlp']; ?>" name="no_telepon" type="text" class="form-control" id="no_telepon" placeholder="Masukkan no telepon ...">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="periode">Periode</label>
                                    <input value="<?= date("Y-m", strtotime($nasabah['periode'])); ?>" name="periode" type="month" class="form-control" id="periode" placeholder="Masukkan periode ...">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
