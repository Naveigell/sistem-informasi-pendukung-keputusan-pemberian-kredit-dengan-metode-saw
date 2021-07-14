<div class="main-content" style="position: relative; height: 100vh; display: flex; justify-content: center; align-items: center;">
     Header
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9" style="top: 0; bottom: 0; left: 0; right: 0; position: fixed;">
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container" style="height: 100%; ">
        <div class="row" style="height: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <div class="header-body text-center mb-2">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h1 class="text-white">Sistem Informasi Pendukung Keputusan</h1>
                        <p class="text-lead text-white">Silakan masukkan username dan password agar dapat mengakses sistem</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <h2>Masuk</h2>
                        </div>
                        <form role="form" action="<?= BASE_PATH; ?>/login" method="post">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input name="username" class="form-control" placeholder="Username" type="text" />
                                </div>
                                <?php if (flashHas('error-username')) { ?>
                                    <span class="text text-danger" style="font-size: 14px;">
                                        <?= flashGet('error-username')[0]; ?>
                                    </span>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input name="password" class="form-control" placeholder="Password" type="password" />
                                </div>
                                <?php if (flashHas('error-password')) { ?>
                                    <span class="text text-danger" style="font-size: 14px;">
                                        <?= flashGet('error-password')[0]; ?>
                                    </span>
                                <?php } ?>
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id=" customCheckLogin" type="checkbox" />
                                <label class="custom-control-label" for=" customCheckLogin">
                                    <span class="text-muted">Remember me</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>