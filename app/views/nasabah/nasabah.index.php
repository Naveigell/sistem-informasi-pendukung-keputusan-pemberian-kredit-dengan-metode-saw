<?php
/**
 * @var $criteria
 * @var $nasabah
 */
?>
<div class="header bg-success pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Daftar nasabah</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Nasabah</h3>
                    <p class="text-sm mb-0">
                        Halaman ini adalah tampilan dari semua nasabah yang terdaftar di sistem
                    </p>
                    <a href="<?= BASE_PATH; ?>/nasabah/insert" class="btn btn-success btn-sm mt-3" style="color: white;"><i class="fa fa-plus"></i>&nbsp;Tambah nasabah</a>
                </div>
                <div class="card-body">
                    <?php if (flashHas('success')) { ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Success!</strong> <?php echo flashGet('success'); ?>
                        </div>
                    <?php } ?>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="detailModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail nasabah</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="http://localhost:8000/nasabah/update" method="post" class="needs-validation" novalidate="">
                                    <input name="id" type="hidden" readonly="" value="1">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-control-label" for="nama">Nama Nasabah</label>
                                            <input name="nama" type="text" class="form-control " id="nama" placeholder="Masukkan nama nasabah ..." disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-control-label" for="no_kk">Nomor KK</label>
                                            <input name="no_kk" type="text" class="form-control " id="no_kk" placeholder="Masukkan nomor kk ..." disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-control-label" for="nik">NIK</label>
                                            <input name="nik" type="number" class="form-control " id="nik" placeholder="Masukkan nik ..." disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-control-label" for="tempat_lahir">Tempat Lahir</label>
                                            <input name="tempat_lahir" type="text" class="form-control " id="tempat_lahir" placeholder="Masukkan tempat lahir ..." disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-control-label" for="tanggal_lahir">Tanggal Lahir</label>
                                            <input name="tanggal_lahir" type="date" class="form-control " id="tanggal_lahir" placeholder="Masukkan tanggal lahir ..." disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-control-label" for="alamat">Alamat</label>
                                            <textarea class="form-control " resize="none" name="alamat" id="alamat" cols="30" rows="10" disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-control-label" for="agama">Agama</label>
                                            <select class="form-control " name="agama" id="agama" disabled>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Buddha">Buddha</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-control-label" for="email">Email</label>
                                            <input name="email" type="email" class="form-control " id="email" placeholder="Masukkan email ..." disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-control-label" for="no_telepon">No Telepon</label>
                                            <input name="no_telepon" type="text" class="form-control " id="no_telepon" placeholder="Masukkan no telepon ..." disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-control " name="jenis_kelamin" id="jenis_kelamin" disabled>
                                                <option value="Pria">Pria</option>
                                                <option value="Wanita">Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-control-label" for="periode">Periode</label>
                                            <input name="periode" type="text" class="form-control " id="periode" placeholder="Masukkan periode ..." disabled>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-4">
                    <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                                    <thead class="thead-light">
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 215.637px;">
                                            No
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">NIK</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">No Telp</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Periode</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">No</th>
                                        <th rowspan="1" colspan="1">Nama</th>
                                        <th rowspan="1" colspan="1">NIK</th>
                                        <th rowspan="1" colspan="1">No Telp</th>
                                        <th rowspan="1" colspan="1">Periode</th>
                                        <th rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php for ($i = 0; $i < count($nasabah); $i++) { ?>
                                        <tr role="row" class="even">
                                            <td class="sorting_1"><?= $i + 1; ?></td>
                                            <td><?= $nasabah[$i]['nama_nsb']; ?></td>
                                            <td><?= $nasabah[$i]['no_nik']; ?></td>
                                            <td><?= $nasabah[$i]['no_tlp']; ?></td>
                                            <td><?= date('Y', strtotime($nasabah[$i]['periode'])); ?></td>
                                            <td>
                                                <a href="<?= BASE_PATH; ?>/nasabah/edit?id=<?= $nasabah[$i]['id_cln_nsb']; ?>" style="color: white;" type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp; Ubah Biodata</a>
                                                <a href="<?= BASE_PATH; ?>/nasabah/bobot?id=<?= $nasabah[$i]['id_cln_nsb'];; ?>" style="color: white;" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>&nbsp; Ubah Kriteria</a>
                                                <button style="color: white;" data-name="<?= $nasabah[$i]['nama_nsb']; ?>" data-id="<?= $nasabah[$i]['id_cln_nsb']; ?>" type="button" class="btn btn-warning btn-sm button-detail" data-toggle="modal" data-target="#detail-modal"><i class="fa fa-eye"></i>&nbsp; Detail</button>
                                                <button style="color: white;" data-name="<?= $nasabah[$i]['nama_nsb']; ?>" data-id="<?= $nasabah[$i]['id_cln_nsb']; ?>" type="button" class="btn btn-danger btn-sm button-delete"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <script>
                        const detailButtons = $(".button-detail");

                        const namaNasabah = document.getElementById('nama');
                        const noKKNasabah = document.getElementById('no_kk');
                        const nikNasabah = document.getElementById('nik');
                        const tempatLahirNasabah = document.getElementById('tempat_lahir');
                        const tanggalLahirNasabah = document.getElementById('tanggal_lahir');
                        const alamatNasabah = document.getElementById('alamat');
                        const agamaNasabah = document.getElementById('agama');
                        const emailNasabah = document.getElementById('email');
                        const noTeleponNasabah = document.getElementById('no_telepon');
                        const jenisKelaminNasabah = document.getElementById('jenis_kelamin');
                        const periodeNasabah = document.getElementById('periode');

                        for (const button of detailButtons) {
                            button.addEventListener('click', function (evt) {
                                const id = evt.target.getAttribute('data-id');

                                $.ajax({
                                    type: 'GET',
                                    url: '<?= BASE_PATH; ?>/nasabah/detail?id=' + id,
                                    success: function (response) {
                                        if (response !== null) {
                                            const res = JSON.parse(response);

                                            namaNasabah.value = res['nama_nsb'];
                                            noKKNasabah.value = res['no_kk'];
                                            nikNasabah.value = res['no_nik'];
                                            tempatLahirNasabah.value = res['tempat_lahir'];
                                            tanggalLahirNasabah.value = res['tgl_lahir'];
                                            alamatNasabah.value = res['alamat'];
                                            agamaNasabah.value = res['agama'];
                                            emailNasabah.value = res['email'];
                                            noTeleponNasabah.value = res['no_tlp'];
                                            jenisKelaminNasabah.value = res['jenis_kelamin'];
                                            periodeNasabah.value = new Date(res['periode']).getFullYear();
                                        }
                                    },
                                });
                            });
                        }
                    </script>
                    <script>
                        $(document).ready(function () {
                            const deleteButtons = $(".button-delete");

                            for (const button of deleteButtons) {
                                button.addEventListener('click', function (evt) {
                                    const id = evt.target.getAttribute('data-id');
                                    const name = evt.target.getAttribute('data-name');

                                    Swal.fire({
                                        title: `Yakin menghapus nasabah <b>${name}</b>?`,
                                        text: "Data yang dihapus tidak akan bisa dikembalikan",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Hapus',
                                        cancelButtonText: 'Batal'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $.ajax({
                                                type: 'POST',
                                                url: `<?= BASE_PATH; ?>/nasabah/delete?id=${id}`,
                                                success: function (response) {
                                                    console.log(response)
                                                    Swal.fire(
                                                        'Berhasil dihapus!',
                                                        response.message,
                                                        'success'
                                                    ).then(() => {
                                                        window.location.reload();
                                                    });
                                                }
                                            });
                                        }
                                    })
                                });
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
