<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Services\Template;
use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function show()
    {

        $data = Template::getadmin();
        array_push($data['pilihCss'], "dataTables1", "dataTables2");
        array_push($data['pilihJs'], "dataTables1", "dataTables2", "dataTables3", "dataTables4");

        $data['jsTambahan'] = " 
        $('#master').addClass('menu-is-opening menu-open');
        $('#webNav').addClass('active');
        $('#santri').addClass('active');
        $('#example1').DataTable() ;";
        $data['data'] = Santri::get();
        return view('admin.master.santri', $data);
    }
    public function createedit(Request $request) // Insert data wajit variabel reqeuest
    {

        $vaUpdate = array(
            "nis" => $request->nis,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tanggal_lahir" => $request->tanggal_lahir,
            "kelas" => $request->kelas,
            "no_hp" => $request->no_hp
        );

        if ($request->has('edit')) {
            Santri::where('nis', $request->nis)->update($vaUpdate);
        } else {
            Santri::create($vaUpdate);
        }

        return redirect('santri');
    }

    public function destory($id)
    {
        Santri::where('nis', $id)->delete();

        return redirect('santri');
    }


    public function index()
    {
        $santri = Santri::get();
        return [
            "data" => $santri
        ];
    }
    public function readapi(Santri $santri)
    {
        return [
            "data" => $santri
        ];
    }

    public function store(Request $request)
    {
        $vaUpdate = array(
            "nis" => $request->nis,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tanggal_lahir" => $request->tanggal_lahir,
            "kelas" => $request->kelas,
            "no_hp" => $request->no_hp
        );

        $santri = Santri::create($vaUpdate);
        return [
            "status" => 1,
            "data" => $santri
        ];
    }
}
