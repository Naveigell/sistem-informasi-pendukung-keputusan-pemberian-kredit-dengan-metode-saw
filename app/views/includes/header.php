<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->
            <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative input-group-merge">
                    </div>
                </div>
                <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </form>
            <ul class="navbar-nav col-1">
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line" style="background-color: white !important;"></i>
                        <i class="sidenav-toggler-line" style="background-color: white !important;"></i>
                        <i class="sidenav-toggler-line" style="background-color: white !important;"></i>
                    </div>
                </div>
            </ul>
            <ul class="navbar-nav align-items-center col-9 text text-center text-white font-weight-bold justify-content-center align-content-center">
                SISTEM PENDUKUNG KEPUTUSAN KELAYAKAN PEMBERIAN KREDIT <br/>
                LPD DESA PAKRAMAN BEKUL
<!--                <li class="nav-item d-xl-none">-->
<!--                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">-->
<!--                        <div class="sidenav-toggler-inner">-->
<!--                            <i class="sidenav-toggler-line"></i>-->
<!--                            <i class="sidenav-toggler-line"></i>-->
<!--                            <i class="sidenav-toggler-line"></i>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li class="nav-item d-sm-none"></li>-->
            </ul>
            <ul class="navbar-nav align-items-center col-2">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="<?= BASE_PATH; ?>/public/assets/img/user.jpg">
                            </span>
                            <div class="media-body ml-2 d-none d-block">
                                <span class="mb-0 text-sm font-weight-bold d-block">
                                    <?php if (sessionHas("username")) {
                                        echo sessionGet("username");
                                    } ?>
                                </span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="<?= BASE_PATH; ?>/logout" class="dropdown-item">
                            <i class="fa fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>