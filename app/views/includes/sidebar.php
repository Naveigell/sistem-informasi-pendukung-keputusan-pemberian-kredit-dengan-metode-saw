<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <style>
            .navbar-brandd > img {
                width: 50%;
                height: 50%;
            }
        </style>
        <div class="sidenav-header  d-flex  align-items-center mt-5 mb-4">
            <a class="navbar-brandd text text-center d-block" href="javascript:void(0)">
                <img src="<?= BASE_PATH; ?>/public/assets/img/logo.png" class="navbar-brand-im" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <?php if(sessionHas("role")) { ?>
                        <?php if(sessionGet("role") == "admin") { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= BASE_PATH; ?>/">
                                    <i class="ni ni-shop text-primary"></i>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= BASE_PATH; ?>/criteria">
                                    <i class="ni ni-collection text-warning"></i>
                                    <span class="nav-link-text">Data Kriteria</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= BASE_PATH; ?>/nasabah">
                                    <i class="ni ni-single-02 text-green"></i>
                                    <span class="nav-link-text">Data Calon Nasabah</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= BASE_PATH; ?>/perhitungan">
                                    <i class="fa fa-cogs text-primary"></i>
                                    <span class="nav-link-text">Penilaian SAW</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= BASE_PATH; ?>/ranking">
                                    <i class="fa fa-trophy text-dark"></i>
                                    <span class="nav-link-text">Hasil Keputusan</span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= BASE_PATH; ?>/">
                                    <i class="ni ni-shop text-primary"></i>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= BASE_PATH; ?>/laporan">
                                    <i class="fa fa-file text-yellow"></i>
                                    <span class="nav-link-text">Laporan</span>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</nav>