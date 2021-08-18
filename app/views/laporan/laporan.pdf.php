<?php

/**
 * @var $data
 * @var $periode
 */
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
<style>
    * {
        font-family:Open Sans,sans-serif;
    }

    .container {
        width: 100%;
        text-align: center;
    }

    .content {
        display: inline-block;
        width: 100%;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid;
        padding: 12px;
    }

    th {
        font-weight: bolder;
    }
</style>
<div class="container">
    <h2>
        Usulan calon
        <?php if (is_null($periode["year"])) { ?>

        <?php } else { ?>
            bulan <?= $periode["month_name"]; ?> <?= $periode["year"]; ?>
        <?php } ?>
    </h2>
    <div class="content">
        <table>
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No KK</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>No Telp</th>
                <th>Agama</th>
                <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0; foreach ($data as $key => $value) { ?>
                <tr>
                    <td><?= ++$i; ?></td>
                    <td><?= $value["data"]["nama_nsb"]; ?></td>
                    <td><?= $value["data"]["no_kk"]; ?></td>
                    <td><?= $value["data"]["tempat_lahir"]; ?></td>
                    <td><?= $value["data"]["tgl_lahir"]; ?></td>
                    <td><?= $value["data"]["jenis_kelamin"]; ?></td>
                    <td><?= $value["data"]["no_tlp"]; ?></td>
                    <td><?= $value["data"]["agama"]; ?></td>
                    <td><?= $value["layak"] ? "<b>Layak</b>": "Tidak Layak"; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>