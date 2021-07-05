<?php
/**
 * @var $criteria
 * @var $nasabah
 * @var $head
 * @var $namaKriteria
 * @var $namaNasabah
 */
?>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Daftar perhitungan</h6>
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
                    <h3 class="mb-0">Perhitungan</h3>
                    <p class="text-sm mb-0">
                        Halaman ini adalah tampilan saat sistem melakukan perhitungan alternatif
                    </p>
                </div>
                <div class="table-responsive py-4">
                    <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-flush dataTable datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                                    <thead class="thead-light">
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 215.637px;">
                                            No
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Alternatif</th>
                                        <?php foreach ($namaKriteria as $nama) { ?>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1"><?= $nama; ?></th>
                                        <?php } ?>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">No</th>
                                        <th rowspan="1" colspan="1">Alternatif</th>
                                        <?php foreach ($namaKriteria as $nama) { ?>
                                            <th rowspan="1" colspan="1"><?= ucfirst($nama); ?></th>
                                        <?php } ?>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 0; foreach ($namaNasabah as $nasabah => $value) { ?>
                                        <tr role="row" class="even">
                                            <td class="sorting_1"><?= ++$i; ?></td>
                                            <td class="sorting_1"><?= $nasabah; ?></td>
                                            <?php foreach ($value['nilai_fields'] as $nilai) { ?>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1"><?= $nilai; ?></th>
                                            <?php } ?>
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
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Normalisasi</h3>
                    <p class="text-sm mb-0">
                        Halaman ini adalah tampilan saat sistem melakukan normalisasi
                    </p>
                </div>
                <div class="table-responsive py-4">
                    <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-flush dataTable datatable-basic" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                                    <thead class="thead-light">
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 215.637px;">
                                            No
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Alternatif</th>
                                        <?php foreach ($namaKriteria as $nama) { ?>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1"><?= $nama; ?></th>
                                        <?php } ?>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">No</th>
                                        <th rowspan="1" colspan="1">Alternatif</th>
                                        <?php foreach ($namaKriteria as $nama) { ?>
                                            <th rowspan="1" colspan="1"><?= ucfirst($nama); ?></th>
                                        <?php } ?>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 0; foreach ($namaNasabah as $nasabah => $value) { ?>
                                        <tr role="row" class="even">
                                            <td class="sorting_1"><?= ++$i; ?></td>
                                            <td class="sorting_1"><?= $nasabah; ?></td>
                                            <?php foreach ($value['normalization'] as $nilai) { ?>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1"><?= $nilai; ?></th>
                                            <?php } ?>
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
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Nilai Hasil</h3>
                    <p class="text-sm mb-0">
                        Halaman ini adalah tampilan saat sistem melakukan perangkingan
                    </p>
                </div>
                <div class="table-responsive py-4">
                    <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-flush dataTable datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                                    <thead class="thead-light">
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 215.637px;">
                                            No
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Alternatif</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Total Nilai</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">No</th>
                                        <th rowspan="1" colspan="1">Alternatif</th>
                                        <th rowspan="1" colspan="1">Total Nilai</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 0; foreach ($namaNasabah as $nasabah => $value) { ?>
                                        <tr role="row" class="even">
                                            <td class="sorting_1"><?= ++$i; ?></td>
                                            <td class="sorting_1"><?= $nasabah; ?></td>
                                            <td class="sorting_1"><?= $namaNasabah[$nasabah]['result']; ?></td>
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
