<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use App\Library\Services\Template;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class PerizinanController extends Controller
{
    public function show()
    {
        $noIndentitas = Auth::user()->no_identitas;

        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#laporan').addClass('menu-is-opening menu-open');
        $('#webNav').addClass('active');
        $('#perizinansantri').addClass('active');
        $('#example1').DataTable() ;";
        $data['data'] = Perizinan::where('no_identitas', $noIndentitas)->get();
        return view('admin.transaksi.perizinan', $data);
    }

    public function createedit(Request $request) // Insert data wajit variabel reqeuest
    {

        $noIndentitas = Auth::user()->no_identitas;
        $vaUpdate = array(
            "no_identitas" => $noIndentitas,
            "tanggal_permohonan" => date("Y-m-d"),
            "tanggal_perizinan" => $request->date,
            "keterangan" => $request->keterangan,
            "status" => "0",
            "gambar" => "",
            "lat" => "",
            "lng" => "",
        );
        Perizinan::create($vaUpdate);
        return redirect('/perizinansantri');
    }

    public function destory($id)
    {
        Perizinan::where('nis', $id)->delete();

        return redirect('pengajar');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('url')) {
            $path = $request->file('url')->store('foto');
            $data = Image::make(public_path("storage/" . $path))->exif();
            if (isset($data['GPSLatitude'])) {
                $lat = eval('return ' . $data['GPSLatitude'][0] . ';')
                    + (eval('return ' . $data['GPSLatitude'][1] . ';') / 60)
                    + (eval('return ' . $data['GPSLatitude'][2] . ';') / 3600);
                $lng = eval('return ' . $data['GPSLongitude'][0] . ';')
                    + (eval('return ' . $data['GPSLongitude'][1] . ';') / 60)
                    + (eval('return ' . $data['GPSLongitude'][2] . ';') / 3600);
                $vaUpdate['gambar'] = $path;
                $vaUpdate['lat'] = "-" . $lat;
                $vaUpdate['lng'] = $lng;
                Perizinan::where("id", $request->id)->update($vaUpdate);
                return redirect("perizinansantri");
            } else {
                echo "No GPS Info";
            }
        }
    }
}
