<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Library\Services\Template;
use App\Models\KelasMaster;
use App\Models\Santripengajar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class SantripengajarMasterController extends Controller
{
    public function show()
    {

        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#master').addClass('menu-is-opening menu-open');
        $('#webNav').addClass('active');
        $('#santripengajar').addClass('active');
        $('#example1').DataTable() ;";
        $data['data'] = Santripengajar::with(['kelas_masters'])->get()->toArray();
        // dd($data['data']);
        return view('admin.master.santri_pengajar', $data);
    }
    public function createedit(Request $request) // Insert data wajit variabel reqeuest
    {

        $vaUpdate = array(
            "no_identitas" => $request->no_identitas,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tanggal_lahir" => $request->tanggal_lahir,
            "kelas" => $request->kelas_id,
            "no_hp" => $request->no_hp,
            "type" => $request->type
        );

        if ($request->type == 'P') {
            $level = "2";
        } else {
            $level = "3";
        }

        $vaUser = array(
            "name" => $request->nama,
            "email" => $request->email,
            "password" => Hash::make("abc123"),
            "level" => $level,
            "no_identitas" => $request->no_identitas
        );

        if ($request->has('edit')) {
            Santripengajar::where('no_identitas', $request->no_identitas)->update($vaUpdate);
        } else {
            Santripengajar::create($vaUpdate);
            User::create($vaUser);
        }

        return redirect('santripengajar');
    }

    public function destory($id)
    {
        Santripengajar::where('no_identitas', $id)->delete();

        return redirect('santripengajar');
    }

    public function viewsantripengajar($id)
    {

        //Select * from where jenis_pelanggaran  ='ID'
        if ($id == "S") {
            $data['kelas'] = KelasMaster::get();
            $data['data'] = Santripengajar::where("type", $id)->get();
            return view('admin.transaksi.input_kelas_option', $data);
        }
    }

    public function datapengajar()
    {

        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#master').addClass('menu-is-opening menu-open');
        $('#webNav').addClass('active');
        $('#santripengajar').addClass('active');
        $('#example1').DataTable() ;";
        $noIndentitas = Auth::user()->no_identitas;
        $data['data'] = Santripengajar::where('no_identitas', $noIndentitas)->first();

        return view('pengajar.data', $data);
    }

    public function datasantri()
    {

        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#master').addClass('menu-is-opening menu-open');
        $('#webNav').addClass('active');
        $('#santripengajar').addClass('active');
        $('#example1').DataTable() ;";
        $noIndentitas = Auth::user()->no_identitas;
        $data['data'] = Santripengajar::where('no_identitas', $noIndentitas)->first();
        // dd($data);
        return view('santri.data', $data);
    }
}
