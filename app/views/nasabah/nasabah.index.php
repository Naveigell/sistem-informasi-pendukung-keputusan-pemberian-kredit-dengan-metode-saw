<?php
/**
 * @var $criteria
 * @var $nasabah
 */
?>
<div class="header bg-primary pb-6">
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
                    <a href="<?= BASE_PATH; ?>/nasabah/insert" class="btn btn-primary btn-sm mt-3" style="color: white;"><i class="fa fa-plus"></i>&nbsp;Tambah nasabah</a>
                </div>
                <div class="card-body">
                    <?php if (flashHas('success')) { ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Success!</strong> <?php echo flashGet('success'); ?>
                        </div>
                    <?php } ?>
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
                        $(document).ready(function () {
                            const buttons = $(".button-delete");
                            for (const button of buttons) {
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
