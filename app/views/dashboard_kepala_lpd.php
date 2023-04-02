<?php
/**
 * @var $nasabah
 * @var $kriteria
 * @var $sub_kriteria
 * @var $time_period
 * @var $profesi
 * @var $income
 * @var $expend
 * @var $age
 * @var $guarantee
 * @var $total_layak
 * @var $total_tidak_layak
 * @var array $graphs
 */
?>
<div class="header bg-primary pb-6">
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
                <div class="col-4">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Jumlah nasabah</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $nasabah; ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total diterima</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $total_layak; ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="fa fa-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total ditolak</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $total_tidak_layak; ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="fa fa-times"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $index = 0;
?>
<?php foreach ($graphs as $key => $graph): ?>
    <div class="container-fluid mt-0">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-default">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Grafik</h6>
                                <h5 class="h3 text-white mb-0">Jumlah nasabah yang diterima berdasarkan <?= strtolower($key); ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="graph-<?= $index++; ?>" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script src="<?php echo BASE_PATH; ?>/public/assets/vendor/chart.js/dist/Chart.min.js"></script>
<?php $index = 0; foreach ($graphs as $key => $graph): ?>
    <script>
        new Chart(document.getElementById('graph-<?= $index++; ?>').getContext('2d'), {
            type: 'pie',
            data: {
                labels: <?= json_encode(array_keys($graph)); ?>,
                datasets: [{
                    label: 'Total nasabah',
                    data: <?= json_encode(array_values($graph)); ?>,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                    ],
                    borderColor: "#ddd",
                    borderWidth: 2,
                }]
            },
            options: {
                tooltips: {
                    mode: 'label',
                    callbacks: {
                        label: function(item, data) {
                            const index = item.index;
                            const value = data.datasets[0].data[index];
                            const label = data.labels[index];

                            const total = data.datasets[0].data.reduce(function (total, current) {
                                return total + current;
                            }, 0);

                            return  label + " : " + Math.round((value / total) * 100) + " %";
                        }
                    }
                },
                legend: {
                    labels: {
                        fontColor: 'white'
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            display: false
                        },
                    }],
                    xAxes: [{
                        ticks: {
                            display: false
                        },
                    }],
                },
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
<?php endforeach; ?>