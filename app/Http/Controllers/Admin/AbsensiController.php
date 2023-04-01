<?php

namespace App\Http\Controllers\Admin;

use Absensis;
use App\Http\Controllers\Controller;
use App\Library\Services\Template;
use App\Models\Absen;
use App\Models\Santripengajar;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function show()
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#absen').addClass('active');
        $('#example1').DataTable() ;
        $('#example2').DataTable() ;
        $('#summernoteedit').summernote();
        $('#summernote').summernote();";
        $data['data'] = Santripengajar::select("santripengajars.no_identitas", "santripengajars.nama", "santripengajars.alamat", "santripengajars.no_hp")->leftjoin('absens', 'absens.no_identitas', 'santripengajars.no_identitas')
            ->whereNull('absens.no_identitas')
            ->where("type", "p")->get()->toArray();
        $data['absen'] = Absen::with(['santripengajars'])->get();
        return view('admin.absen', $data);
    }
    public function createedit(Request $request) // Insert data wajit variabel reqeuest
    {
        $vaUpdate = array();
        $data = $request->all();
        // dd($data);
        foreach ($data['no_identitas'] as $value) {
            $vaUpdate[] = array("no_identitas" => $value, "tanggal" => date('Y-m-d'), "jenis" => $data['type']);
        }
        // dd($vaUpdate);

        Absen::insert($vaUpdate);

        // return redirect('artikeladmin');
    }

    public function destory($id)
    {
        Absen::where('id', $id)->delete();

        return redirect('artikeladmin');
    }

    public function laporan(Request $request)
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#laporan').addClass('menu-is-opening menu-open');
        $('#webNavlaporan').addClass('active');
        $('#laporanabsensi').addClass('active');
        $('#example1').DataTable() ;";

        // $data['kelas'] = KelasMaster::get();
        // $vaJadwal = array();
        // $data['data'] = JadwalPelajaran::where('kelas_id', $id_kelas)->with(['kelas', 'mapel', 'pengajar'])->get()->toArray();

        $data1 = $request->all();
        if (isset($data1['bulan'])) {
            $nstartTime = $data1['tahun'] . "-" . $data1['bulan'] . "-01";
            $startTime = strtotime($nstartTime);
            $endTime = strtotime(date("Y-m-t", strtotime($nstartTime)));
        } else {
            $startTime = strtotime(date("Y-m-01"));
            $endTime = strtotime(date("Y-m-t"));
        }
        $absen = Absen::get();
        $pengajar = Santripengajar::where("type", "p")->get();
        foreach ($absen as $value) {
            $vaHadir[$value->no_identitas][$value->tanggal] = $value->jenis;
        }
        foreach ($pengajar as $value) {
            for ($i = $startTime; $i <= $endTime; $i = $i + 86400) {
                $thisDate = date('Y-m-d', $i);
                $vaAbsen[$value->no_identitas][$thisDate] = isset($vaHadir[$value->no_identitas][$thisDate]) ? $vaHadir[$value->no_identitas][$thisDate] : "<i class='fas fa-check'></i>";
            }
        }
        $data['pengajar'] = $pengajar;
        $data['absen'] = $vaAbsen;
        return view('admin.laporan.absensi', $data);
    }
}
