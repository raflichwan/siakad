<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Services\Template;
use App\Models\JadwalPelajaran;
use App\Models\KelasMaster;
use App\Models\MataPelajaranMaster;
use App\Models\Pengajar;
use App\Models\Santripengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPelajaranController extends Controller
{
    public function show()
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#inputjadwal').addClass('active');
        $('#example1').DataTable() ;";
        $data['data'] = JadwalPelajaran::with(['kelas', 'mapel', 'pengajar'])->get();
        $data['kelas'] = KelasMaster::get();
        $data['mapel'] = MataPelajaranMaster::get();
        $data['santripengajar'] = Santripengajar::where('type', 'p')->get();
        return view('admin.jadwal_pelajaran', $data);
    }
    public function createedit(Request $request) // Insert data wajit variabel reqeuest
    {

        $vaUpdate = array(
            "id" => $request->id,
            "kelas_id" => $request->kelas_id,
            "mapel_id" => $request->mapel_id,
            "no_identitas" => $request->no_identitas,
            "jam" => $request->jam,
            "lama_jam" => $request->lama_jam,
            "hari" => $request->hari
        );


        // dd($cekjadwal);
        if (!JadwalPelajaran::where('jam', $request->jam)->where('hari', $request->hari)->exists()) {
            if ($request->has('edit')) {
                JadwalPelajaran::where('id', $request->id)->update($vaUpdate);
            } else {
                JadwalPelajaran::create($vaUpdate);
            }
        } else {
            echo ("sudah ada");
        }


        return redirect('jadwalpelajaran');
    }

    public function destory($id)
    {
        JadwalPelajaran::where('id', $id)->delete();

        return redirect('jadwalpelajaran');
    }

    public function laporan($id_kelas = '')
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#laporan').addClass('menu-is-opening menu-open');
        $('#webNavlaporan').addClass('active');
        $('#laporanjadwal').addClass('active');
        $('#example1').DataTable() ;";
        $data['kelas'] = KelasMaster::get();
        $vaJadwal = array();
        $data['data'] = JadwalPelajaran::where('kelas_id', $id_kelas)->with(['kelas', 'mapel', 'pengajar'])->get()->toArray();
        foreach ($data['data'] as $key => $value) {
            if (!isset($vaRow[$value['hari']])) {
                $vaRow[$value['hari']] = 0;
            }
            for ($i = 0; $i < $value['lama_jam']; $i++) {
                $vaRow[$value['hari']]++;
                $vaJadwal[$value['hari']][$vaRow[$value['hari']]] = $value['mapel']['nama_mapel'] . " || " . $value['pengajar']['nama'];
            }
        }
        $data['jadwal'] = $vaJadwal;
        return view('admin.laporan.jadwal_pelajaran', $data);
    }
    public function jadwalpengajar($id_kelas = '')
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#laporan').addClass('menu-is-opening menu-open');
        $('#webNavlaporan').addClass('active');
        $('#laporanjadwal').addClass('active');
        $('#example1').DataTable() ;";
        $data['kelas'] = KelasMaster::get();
        $vaJadwal = array();
        $noIndentitas = Auth::user()->no_identitas;
        $data['data'] = JadwalPelajaran::where('no_identitas', $noIndentitas)->with(['kelas', 'mapel', 'pengajar'])->get()->toArray();
        foreach ($data['data'] as $key => $value) {
            if (!isset($vaRow[$value['hari']])) {
                $vaRow[$value['hari']] = 0;
            }
            for ($i = 0; $i < $value['lama_jam']; $i++) {
                $vaRow[$value['hari']]++;
                $vaJadwal[$value['hari']][$vaRow[$value['hari']]] = $value['mapel']['nama_mapel'] . " || " . $value['kelas']['keterangan'];
            }
        }
        $data['jadwal'] = $vaJadwal;
        return view('pengajar.jadwal', $data);
    }

    public function jadwalsantri($id_kelas = '')
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#laporan').addClass('menu-is-opening menu-open');
        $('#webNavlaporan').addClass('active');
        $('#laporanjadwal').addClass('active');
        $('#example1').DataTable() ;";
        $data['kelas'] = KelasMaster::get();
        $vaJadwal = array();
        $noIndentitas = Auth::user()->no_identitas;
        $data['data'] = JadwalPelajaran::where('no_identitas', $noIndentitas)->with(['kelas', 'mapel', 'pengajar'])->get()->toArray();
        foreach ($data['data'] as $key => $value) {
            if (!isset($vaRow[$value['hari']])) {
                $vaRow[$value['hari']] = 0;
            }
            for ($i = 0; $i < $value['lama_jam']; $i++) {
                $vaRow[$value['hari']]++;
                $vaJadwal[$value['hari']][$vaRow[$value['hari']]] = $value['mapel']['nama_mapel'] . " || " . $value['kelas']['keterangan'];
            }
        }
        $data['jadwal'] = $vaJadwal;
        return view('pengajar.jadwal', $data);
    }
}
