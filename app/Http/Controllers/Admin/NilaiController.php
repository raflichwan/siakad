<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library\Services\Template;
use App\Models\JadwalPelajaran;
use App\Models\KelasMaster;
use App\Models\MataPelajaranMaster;
use App\Models\Nilai;
use App\Models\Santri;
use App\Models\Santripengajar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    public function nilaisantri($id = '')
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#nilaisantri').addClass('active');
        $('#example1').DataTable() ;";
        $data['data'] = Santripengajar::with(['kelas_masters'])
            ->where('kelas', $id)
            ->get()->toArray();

        $noIndentitas = Auth::user()->no_identitas;
        $kelas = KelasMaster::select("kelas_masters.id", "kelas_masters.keterangan")->leftjoin('jadwal_pelajarans', 'jadwal_pelajarans.kelas_id', 'kelas_masters.id')
            ->whereNotNull('kelas_masters.keterangan')
            ->where("no_identitas", $noIndentitas)
            ->groupBy('kelas_masters.id')
            ->groupBy('kelas_masters.keterangan')
            ->get();
        // dd($kelas);
        $data['kelas'] = $kelas;
        $data['mapel'] = MataPelajaranMaster::get();
        $data['nilai'] = Nilai::with('santripengajars')->where('mapel_id', 1)->get();
        // dd($data);
        return view('admin.inputnilai', $data);
    }
    public function export($id = '', $idmapel = '')
    {
        $data = Santripengajar::select('no_identitas', 'nama')
            ->where('kelas', $id)
            ->get()->toArray();
        $kelas = KelasMaster::where('id', $id)->first();
        $mapel = MataPelajaranMaster::where('id', $idmapel)->first();
        foreach ($data as $key => $value) {
            $data[$key]['kitab'] = "0";
            $data[$key]['ujiantulis'] = "0";
        }
        return Excel::download(new UsersExport($data), $kelas->keterangan . "-" . $mapel->nama_mapel . ".csv", \Maatwebsite\Excel\Excel::CSV);
    }

    public function import(Request $request)
    {
        $data = $request->all();
        $periode = $data['tahun'] . $data['bulan'];
        $mapel = $data['mapel'];
        if ($request->hasFile('nilai')) {
            $file = $request->file('nilai');

            $name = $file->hashName(); // Generate a unique, random name...
            $extension = $file->extension(); // Determine the file's extension based on the file's MIME type...

            $path = $request->file('nilai')->storeAs(
                'image',
                "coba.csv"
            );
        }
        $n = 0;
        $file = fopen('storage/' . $path, "r");
        while (($data = fgetcsv($file, 200, ",")) !== FALSE) {
            $n++;
            if ($n == 1) {
                continue;
            }

            Nilai::where('periode', $periode)
                ->where('no_identitas', $data[0])
                ->where('mapel_id', $mapel)->delete();
            $vaNilai[] = array("periode" => $periode, "mapel_id" => $mapel, "no_identitas" => $data[0], "kitab" => $data[2], "tulis" => $data[3]);
        }
        Nilai::insert($vaNilai);
        return redirect('nilaisantri');
    }
}
