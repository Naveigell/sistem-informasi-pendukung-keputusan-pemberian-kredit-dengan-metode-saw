<?php
/**
 * @var $content
 * @var $data
 * @var $fullscreen
 * @var $grafik
 */
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <!-- Favicon -->
    <link rel="icon" href="<?php echo BASE_PATH; ?>/public/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <script src="<?php echo BASE_PATH; ?>/public/assets/vendor/jquery/dist/jquery.min.js"></script>
    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/public/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/public/assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/public/assets/css/argon.min_v%3D1.2.1.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/public/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/public/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/public/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Argon CSS -->
    <!-- End Google Tag Manager -->
</head>

<body>
<?php if (isset($fullscreen)) {
    if (!$fullscreen) view('includes/sidebar');
} else {
    view('includes/sidebar');
} ?>
<div class="main-content" id="panel">
    <?php if (isset($fullscreen)) {
        if (!$fullscreen) view('includes/header');
    } else {
        view('includes/header');
    } ?>
    <?php require_once("app/views/$content.php"); ?>
</div>
<script src="<?php echo BASE_PATH; ?>/public/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo BASE_PATH; ?>/public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo BASE_PATH; ?>/public/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="<?php echo BASE_PATH; ?>/public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?php echo BASE_PATH; ?>/public/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<script src="<?php echo BASE_PATH; ?>/public/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="<?php echo BASE_PATH; ?>/public/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE_PATH; ?>/public/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo BASE_PATH; ?>/public/assets/vendor/chart.js/dist/Chart.min.js"></script>
<!--<script src="--><?php //echo BASE_PATH; ?><!--/public/assets/vendor/chart.js/dist/Chart.extension.js"></script>-->

<script src="<?php echo BASE_PATH; ?>/public/assets/js/argon-1.2.1.js"></script>

<script src="<?php echo BASE_PATH; ?>/public/assets/js/demo.min.js"></script>
<script>
    $(document).ready(function () {
        $('.datatable-basic').DataTable();
    });
</script>
</body>

</html>