<?php
/**
 * @var $criteria
 * @var $nasabah
 * @var $head
 * @var $ranking
 * @var $namaKriteria
 * @var $namaNasabah
 * @var $periode
 */
?>
<div class="header bg-success pb-6">
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
                    <h3 class="mb-0">Periode</h3>
                    <p class="text-sm mb-0">
                        Pilih periode nasabah
                    </p>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <form action="<?= BASE_PATH; ?>/perhitungan" method="GET">
                            <div class="form-group">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input value="<?= isset($_GET["periode"]) && !empty($_GET["periode"]) ? date("Y-m-d", strtotime($_GET['periode'])) : ''; ?>" name="periode" class="form-control" placeholder="Periode ..." type="date">
                                </div>
                                <button class="btn btn-success btn-sm mt-2" type="submit">
                                    Pilih
                                </button>
                                <a href="<?= BASE_PATH; ?>/perhitungan" class="btn btn-info btn-sm mt-2" type="submit">
                                    Tampil Semua
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Matriks Awal</h3>
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
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Nama</th>
                                        <?php foreach ($namaKriteria as $nama) { ?>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1"><?= $nama; ?></th>
                                        <?php } ?>
                                    </tr>
                                    </thead>
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
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Nama</th>
                                        <?php if (count($namaKriteria) > 0) { ?>
                                            <?php foreach ($namaKriteria as $nama) { ?>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1"><?= $nama; ?></th>
                                            <?php } ?>
                                        <?php } ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; foreach ($namaNasabah as $nasabah => $value) { ?>
                                        <tr role="row" class="even">
                                            <td class="sorting_1"><?= ++$i; ?></td>
                                            <td class="sorting_1"><?= $nasabah; ?></td>
                                            <?php if (count($namaKriteria) > 0) { ?>
                                                <?php foreach ($value['normalization'] as $nilai) { ?>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1"><?= $nilai; ?></th>
                                                <?php } ?>
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
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Total Nilai</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Keterangan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; foreach ($ranking as $nasabah => $value) { ?>
                                        <tr role="row" class="even">
                                            <td class="sorting_1"><?= ++$i; ?></td>
                                            <td class="sorting_1"><?= $nasabah; ?></td>
                                            <td class="sorting_1"><?= $namaNasabah[$nasabah]['result']; ?></td>
                                            <td class="sorting_1 text <?= $namaNasabah[$nasabah]['layak'] ? 'text-success' : 'text-danger' ?>"><?= $namaNasabah[$nasabah]['layak'] ? 'Layak' : 'Tidak Layak'; ?></td>
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
