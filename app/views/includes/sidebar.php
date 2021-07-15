<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="<?= BASE_PATH; ?>/public/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
            </a>
            <div class=" ml-auto ">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_PATH; ?>/">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_PATH; ?>/criteria">
                            <i class="ni ni-collection text-warning"></i>
                            <span class="nav-link-text">Kriteria</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_PATH; ?>/nasabah">
                            <i class="ni ni-single-02 text-green"></i>
                            <span class="nav-link-text">Nasabah</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_PATH; ?>/perhitungan">
                            <i class="fa fa-cogs text-primary"></i>
                            <span class="nav-link-text">Perhitungan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_PATH; ?>/ranking">
                            <i class="fa fa-trophy text-dark"></i>
                            <span class="nav-link-text">Ranking</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_PATH; ?>/laporan">
                            <i class="fa fa-file text-yellow"></i>
                            <span class="nav-link-text">Laporan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>