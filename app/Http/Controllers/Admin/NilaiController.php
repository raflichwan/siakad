<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library\Services\Template;
use App\Models\KelasMaster;
use App\Models\Nilai;
use App\Models\Santri;
use App\Models\Santripengajar;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    public function datasantri($id = '')
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#inputnilai').addClass('active');
        $('#example1').DataTable() ;";
        $data['data'] = Santripengajar::with(['kelas_masters'])
            ->where('kelas', $id)
            ->get()->toArray();
        $data['kelas'] = KelasMaster::get();
        $data['nilai'] = Nilai::with('santripengajars')->where('mapel_id', 1)->get();
        // dd($data);
        return view('admin.inputnilai', $data);
    }
    public function export($id = '')
    {
        $data = Santripengajar::select('no_identitas', 'nama')
            ->where('kelas', $id)
            ->get()->toArray();
        foreach ($data as $key => $value) {
            $data[$key]['kitab'] = "0";
            $data[$key]['ujiantulis'] = "0";
        }
        return Excel::download(new UsersExport($data), 'nilai.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function import(Request $request)
    {
        $data = $request->all();
        $periode = $data['tahun'] . $data['bulan'];
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
            $vaNilai[] = array("periode" => $periode, "mapel_id" => 1, "no_identitas" => $data[0], "kitab" => $data[2], "tulis" => $data[3]);
        }
        Nilai::where('periode', $periode)
            ->where('mapel_id', 1)->delete();
        Nilai::insert($vaNilai);
        return redirect('datasantri');
    }
}
