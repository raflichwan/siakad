<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Library\Services\Template;
use App\Models\Pengajar;
use App\Models\Santripengajar;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PengajarController extends Controller
{
    public function show()
    {
        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#master').addClass('menu-is-opening menu-open');
        $('#webNav').addClass('active');
        $('#pengajar').addClass('active');
        $('#example1').DataTable() ;";
        $data['data'] = Pengajar::get();
        return view('admin.master.pengajar', $data);
    }
    public function createedit(Request $request) // Insert data wajit variabel reqeuest
    {

        $vaUpdate = array(
            "nik" => $request->nik,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tanggal_lahir" => $request->tanggal_lahir,
            "no_hp" => $request->no_hp
        );

        if ($request->has('edit')) {
            Pengajar::where('nik', $request->nik)->update($vaUpdate);
        } else {
            Pengajar::create($vaUpdate);
        }

        return redirect('pengajar');
    }

    public function destory($id)
    {
        Pengajar::where('nis', $id)->delete();

        return redirect('pengajar');
    }
}
