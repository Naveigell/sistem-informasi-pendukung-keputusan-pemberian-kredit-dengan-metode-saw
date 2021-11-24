<?php
/**
 * @var $criteria
 */
?>
<div class="header bg-success pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Daftar kriteria</h6>
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
                    <h3 class="mb-0">Kriteria</h3>
                    <p class="text-sm mb-0">
                        Halaman ini adalah tampilan dari semua kriteria yang terdaftar di sistem
                    </p>
                    <a href="<?= BASE_PATH; ?>/criteria/insert" class="btn btn-success btn-sm mt-3" style="color: white;"><i class="fa fa-plus"></i>&nbsp;Tambah kriteria</a>
                </div>
                <div class="card-body">
                    <?php if (flashHas('success')) { ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Success!</strong> <?php echo flashGet('success'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="table-responsive">
                    <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                                    <thead class="thead-light">
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" aria-sort="ascending" aria-label="" style="width: 20px;">
                                            No
                                        </th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Nama</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Bobot</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Keterangan</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php for ($i = 0; $i < count($criteria); $i++) { ?>
                                        <tr role="row" class="even">
                                            <td class="sorting_1 text-center"><?= $i + 1; ?></td>
                                            <td class="col-3"><?= $criteria[$i]['nama_kriteria']; ?></td>
                                            <td class="text-center"><?= $criteria[$i]['bobot_kriteria']; ?></td>
                                            <td class="text-center"><?= $criteria[$i]['ket_kriteria']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= BASE_PATH; ?>/criteria/edit?id=<?= $criteria[$i]['id_kriteria'] ?>" style="color: white;" type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i>&nbsp; Ubah</a>
                                                <button style="color: white;" data-name="<?= $criteria[$i]['nama_kriteria']; ?>" data-id="<?= $criteria[$i]['id_kriteria']; ?>" type="button" class="btn btn-danger btn-sm button-delete"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
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
                                        title: `Yakin menghapus kriteria <b>${name}</b>?`,
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
                                                url: `<?= BASE_PATH; ?>/criteria/delete?id=${id}`,
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
