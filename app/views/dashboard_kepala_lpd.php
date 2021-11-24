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
</div><div class="container-fluid mt-6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-default">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Grafik</h6>
                            <h5 class="h3 text-white mb-0">Jumlah nasabah yang diterima berdasarkan Pendapatan Per Bulan</h5>
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
<div class="container-fluid mt--0">
    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-default">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Grafik</h6>
                            <h5 class="h3 text-white mb-0">
                                Jumlah nasabah yang diterima berdasarkan pekerjaan</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="graph-2" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-0">
    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-default">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Grafik</h6>
                            <h5 class="h3 text-white mb-0">Jumlah nasabah yang diterima berdasarkan jaminan</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="graph-3" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-0">
    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-default">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Grafik</h6>
                            <h5 class="h3 text-white mb-0">Jumlah nasabah yang diterima berdasarkan Pengeluaran Per Bulan</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="graph-4" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-0">
    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-default">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Grafik</h6>
                            <h5 class="h3 text-white mb-0">Jumlah nasabah yang diterima berdasarkan Usia</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="graph-5" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-0">
    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-default">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Grafik</h6>
                            <h5 class="h3 text-white mb-0">Jumlah nasabah yang diterima berdasarkan jangka waktu</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="graph-6" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo BASE_PATH; ?>/public/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script>
    let ctx2 = document.getElementById('graph-1').getContext('2d');
    let myChart2 = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ["≥ 15.000.000","≥ 8.000.000 - < 15.000.000","≥ 3.000.000 - < 8.000.000","<3.000.000"],
            datasets: [{
                label: 'Total nasabah',
                data: <?= json_encode($pendapatan); ?>,
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

<script>
    let ctx = document.getElementById('graph-2').getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Tidak Tetap", "Wiraswasta", "PNS", "Pedagang"],
            datasets: [{
                label: 'Total nasabah',
                data: <?= json_encode($profesi); ?>,
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
<script>
    let ctx3 = document.getElementById('graph-3').getContext('2d');
    let myChart3 = new Chart(ctx3, {
        type: 'pie',
        data: {
            labels: ['Sertifikat tanah','Sertifikat rumah','BPKB diatas tahun 2015 ','BPKB dibawah tahun 2015 '],
            datasets: [{
                label: 'Total nasabah',
                data: <?= json_encode($jaminan); ?>,
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
<script>
    let ctx4 = document.getElementById('graph-4').getContext('2d');
    let myChart4 = new Chart(ctx4, {
        type: 'pie',
        data: {
            labels: ['≥10.000.000','≥6.000.000 - < 10.000.000','≥3.000.000 - < 6.00.000','<3.000.000'],
            datasets: [{
                label: 'Total nasabah',
                data: <?= json_encode($pengeluaran); ?>,
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
<script>
    let ctx5 = document.getElementById('graph-5').getContext('2d');
    let myChart5 = new Chart(ctx5, {
        type: 'pie',
        data: {
            labels: ['> 50 tahun','36 tahun - 50 tahun','26 tahun - 35 tahun','21 tahun - 25 tahun'],
            datasets: [{
                label: 'Total nasabah',
                data: <?= json_encode($age); ?>,
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
<script>
    let ctx1 = document.getElementById('graph-6').getContext('2d');
    let myChart1 = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ["≥12 bulan - < 24 bulan", "< 12 bln", "≥24 bulan - < 36 bulan", ">36 bulan"],
            datasets: [{
                label: 'Total nasabah',
                data: <?= json_encode($time_period); ?>,
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