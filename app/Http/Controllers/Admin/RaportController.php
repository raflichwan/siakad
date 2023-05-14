<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Services\Template;
use App\Models\KelasMaster;
use App\Models\Nilai;
use App\Models\Santripengajar;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RaportController extends Controller
{
    public function show()
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#laporan').addClass('menu-is-opening menu-open');
        $('#webNavlaporan').addClass('active');
        $('#laporanraport').addClass('active');
        $('#example1').DataTable() ;";
        $data['data'] = Santripengajar::get();
        $data['kelas'] = KelasMaster::get();
        return view('admin.laporan.raport', $data);
    }
    //admin
    public function pdf(Request $request)
    {
        $data = $request->all();

        if (Auth::user()->level == '3') {
            $noIdentitas = Auth::user()->no_identitas;
            $dataKelas = Santripengajar::where("no_identitas", $noIdentitas)->first();
            $data['kelas'] = $dataKelas->kelas;
        }
        $periode = $data['tahun'] . $data['semester'];
        $data['santri'] = Santripengajar::with(['kelas_masters'])
            ->where('kelas', $data['kelas']);
        if (isset($noIdentitas)) {
            $data['santri'] = $data['santri']->where('no_identitas', $noIdentitas);
        }

        $data['santri'] = $data['santri']->get();

        $nilai  = Nilai::with(['santripengajars', 'mapel'])
            ->where('periode', $periode)->get()->toarray();
        foreach ($nilai as $value) {
            if ($value['santripengajars']['kelas'] == $data['kelas']) {
                $cek = true;
                if (isset($noIdentitas)) {

                    $cek = $value['santripengajars']['no_identitas'] == $noIdentitas;
                }
                if ($cek) {

                    $vaNilai[$value['no_identitas']][$value['mapel_id']] = $value;
                }
            }
        }
        $data['nilai'] = @$vaNilai;

        $request->session()->put('data', $data);
        $pdf = PDF::loadView('admin.laporan.raport_pdf', $data);
        echo json_encode("oke");
        // return $pdf->stream();
        // return view('admin.laporan.raport_pdf', $data);
    }
    public function download(Request $request)
    {
        $data = $request->session()->get('data');
        $pdf = PDF::loadView('admin.laporan.raport_pdf', $data);
        return $pdf->stream();
    }

    //santri
    public function pdfsantri(Request $request)
    {
        $data = $request->all();
        $periode = $data['tahun'] . $data['semester'];
        $data['santri'] = Santripengajar::with(['kelas_masters'])
            ->where('kelas', $data['kelas'])->get();
        $nilai  = Nilai::with(['santripengajars', 'mapel'])
            ->where('periode', $periode)->get()->toarray();
        foreach ($nilai as $value) {
            if ($value['santripengajars']['kelas'] == $data['kelas']) {
                $vaNilai[$value['no_identitas']][$value['mapel_id']] = $value;
            }
        }
        $data['nilai'] = $vaNilai;

        $request->session()->put('data', $data);
        $pdf = PDF::loadView('admin.laporan.raport_pdf', $data);
        echo json_encode("oke");
        // return $pdf->stream();
        // return view('admin.laporan.raport_pdf', $data);
    }
    public function downloadsantri(Request $request)
    {
        $data = $request->session()->get('data');
        $pdf = PDF::loadView('admin.laporan.raport_pdf', $data);
        return $pdf->stream();
    }
}
