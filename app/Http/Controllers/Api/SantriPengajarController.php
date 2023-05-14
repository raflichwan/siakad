<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use App\Models\Santripengajar;
use Illuminate\Http\Request;

class SantriPengajarController extends Controller
{

    public function index()
    {
        $santripengajar = Santripengajar::get();
        return [
            "msg" => "tesd",
            "data" => $santripengajar
        ];
    }

    public function show(Santripengajar $santripengajar)
    {
        return [
            "data" => $santripengajar
        ];
    }

    public function store(Request $request)
    {

        $vaUpdate = array(
            "no_identitas" => $request->no_identitas,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tanggal_lahir" => $request->tanggal_lahir,
            "kelas" => $request->kelas,
            "no_hp" => $request->no_hp,
            "type" => $request->type
        );

        $santripengajar = Santripengajar::create($vaUpdate);
        return [
            "status" => 1,
            "data" => $santripengajar
        ];
    }

    public function update(Request $request, Santripengajar $santripengajar)
    {

        $vaUpdate = array(
            "no_identitas" => $request->no_identitas,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tanggal_lahir" => $request->tanggal_lahir,
            "kelas" => $request->kelas,
            "no_hp" => $request->no_hp,
            "type" => $request->type
        );

        $santripengajar = Santripengajar::where('no_identitas', $request->no_identitas)->update($vaUpdate);
        return [
            "status" => 1,
            "data" => $santripengajar,
            "msg" => "Santri & Pengajar updated successfully"
        ];
    }

    public function destroy(Santripengajar $santripengajar)
    {
        $santripengajar->delete();
        return [
            "status" => 1,
            "data" => $santripengajar,
            "msg" => "Blog deleted successfully"
        ];
    }
}
