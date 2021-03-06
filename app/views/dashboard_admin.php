<?php
/**
 * @var $nasabah
 * @var $kriteria
 * @var $sub_kriteria
 * @var $grafik
 */
?>
<div class="header bg-success pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total kriteria</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $kriteria; ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-collection"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <a href="<?= BASE_PATH; ?>/criteria" class="text-nowrap text text-dark">Lihat kriteria</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total sub kriteria</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $sub_kriteria; ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-ungroup"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <a href="<?= BASE_PATH; ?>/criteria" class="text-nowrap text text-dark">Lihat sub kriteria</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total nasabah</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $nasabah; ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-circle-08"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <a href="<?= BASE_PATH; ?>/nasabah" class="text-nowrap text text-dark">Lihat nasabah</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-default">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Grafik</h6>
                            <h5 class="h3 text-white mb-0">
                                Jumlah nasabah tiap periode
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="graph-1" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo BASE_PATH; ?>/public/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script>
    const monthName = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    const graph = <?= json_encode($grafik) ?>;
    const labels = graph.map(function (item) {
        const date = new Date(item.periode);
        return monthName[date.getMonth()] + " " + item._year;
    });
    const total = graph.map(function (item) {
        return item._total;
    });

    let ctx = document.getElementById('graph-1').getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels,
            datasets: [{
                label: 'Total nasabah',
                data: total,
                backgroundColor: "#ffffff22",
                borderColor: "#ddd",
                borderWidth: 2,
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: 'white'
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        userCallback: function(label, index, labels) {
                            // when the floored value is the same as the value we have a whole number
                            if (Math.floor(label) === label) {
                                return label;
                            }

                        },
                        fontColor: "#fff",
                    },
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "#fff",
                    },
                }],
            },
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>