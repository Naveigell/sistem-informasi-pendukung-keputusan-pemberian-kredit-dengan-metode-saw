<?php
/**
 * @var $criteria
 */
?>
<div class="header bg-primary pb-6">
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
                    <a href="<?= BASE_PATH; ?>/criteria/insert" class="btn btn-primary btn-sm mt-3" style="color: white;"><i class="fa fa-plus"></i>&nbsp;Tambah kriteria</a>
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
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Bobot</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Keterangan</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">No</th>
                                        <th rowspan="1" colspan="1">Nama</th>
                                        <th rowspan="1" colspan="1">Bobot</th>
                                        <th rowspan="1" colspan="1">Keterangan</th>
                                        <th rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($criteria); $i++) { ?>
                                            <tr role="row" class="even">
                                                <td class="sorting_1"><?= $i + 1; ?></td>
                                                <td><?= $criteria[$i]['nama_kriteria']; ?></td>
                                                <td><?= $criteria[$i]['bobot_kriteria']; ?></td>
                                                <td><?= $criteria[$i]['ket_kriteria']; ?></td>
                                                <td>
                                                    <a href="<?= BASE_PATH; ?>/criteria/edit?id=<?= $criteria[$i]['id_kriteria'] ?>" style="color: white;" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>&nbsp; Ubah</a>
                                                    <a style="color: white;" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp; Hapus</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
