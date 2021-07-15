<?php
namespace App\Controllers;

use App\Helpers\SAW;
use Dompdf\Dompdf;

class LaporanController extends Controller
{
    public function laporan()
    {
        $data = SAW::calculateRanking();

        view('includes/layout', [
            'content'       => "laporan/laporan.index",
            'namaKriteria'  => $data["namaKriteria"],
            'namaNasabah'   => $data["namaNasabah"],
            'ranking'       => $data["ranking"],
            'periode'       => isset($_GET["periode"]) && !empty($_GET["periode"]) ? $_GET["periode"] : "",
            'kuota'         => isset($_GET["kuota"]) && !empty($_GET["kuota"]) ? $_GET["kuota"] : "",
        ]);
    }

    /**
     * Generate pdf
     */
    public function generatePDF()
    {
        ob_start();
        $dompPdf = new Dompdf();

        $periode = SAW::parsePeriode();
        setlocale(LC_TIME, 'id_ID.utf-8');
        $periode["month_name"] = strftime("%B", strtotime("1-".$periode["month"]."-".$periode["year"]));
        $data = SAW::calculateRanking()["ranking"];

        view('laporan/laporan.pdf', [
            "data"      => $data,
            "periode"   => $periode
        ]);

        $html = ob_get_contents();
        ob_get_clean();
        $dompPdf->loadHtml($html);

        $dompPdf->setPaper('A4', 'landscape');
        $dompPdf->render();
        $dompPdf->stream("usulan_calon_".uniqid());
        exit();
    }
}