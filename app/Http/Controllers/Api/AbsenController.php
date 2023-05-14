<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{

    public function index()
    {
        $absen = Absen::get();
        return [
            "msg" => "tesd",
            "data" => $absen
        ];
    }

    public function show(Absen $absen)
    {
        return [
            "data" => $absen
        ];
    }

    public function store(Request $request)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "no_identitas" => $request->no_identitas,
            "tanggal" => $request->tanggal,
            "keterangan" => $request->keterangan,
            "jenis" => $request->jenis
        );

        $absen = absen::create($vaUpdate);
        return [
            "status" => 1,
            "data" => $absen
        ];
    }

    public function update(Request $request, Absen $absen)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "no_identitas" => $request->no_identitas,
            "tanggal" => $request->tanggal,
            "keterangan" => $request->keterangan,
            "jenis" => $request->jenis
        );


        $absen = Absen::where('id', $request->id)->update($vaUpdate);

        return [
            "status" => 1,
            "data" => $absen,
            "msg" => "Santri & Pengajar updated successfully"
        ];
    }

    public function destroy(Absen $absen)
    {
        $absen->delete();
        return [
            "status" => 1,
            "data" => $absen,
            "msg" => "Blog deleted successfully"
        ];
    }
}
