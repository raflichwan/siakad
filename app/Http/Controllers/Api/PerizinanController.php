<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Perizinan;
use Illuminate\Http\Request;

class PerizinanController extends Controller
{
    public function index()
    {
        $Perizinan = Perizinan::get();
        return [
            "msg" => "tesd",
            "data" => $Perizinan
        ];
    }

    public function show(Perizinan $Perizinan)
    {
        return [
            "data" => $Perizinan
        ];
    }

    public function store(Request $request)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "no_identitas" => $request->no_identitas,
            "tanggal_permohonan" => $request->tanggal_permohonan,
            "tanggal_perizinan" => $request->tanggal_perizinan,
            "keterangan" => $request->keterangan,
            "status" => $request->status,
            "gambar" => $request->gambar,
            "lat" => $request->lat,
            "lng" => $request->lng
        );

        $Perizinan = Perizinan::create($vaUpdate);
        return [
            "status" => 1,
            "data" => $Perizinan
        ];
    }

    public function update(Request $request, Perizinan $Perizinan)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "no_identitas" => $request->no_identitas,
            "tanggal_permohonan" => $request->tanggal_permohonan,
            "tanggal_perizinan" => $request->tanggal_perizinan,
            "keterangan" => $request->keterangan,
            "status" => $request->status,
            "gambar" => $request->gambar,
            "lat" => $request->lat,
            "lng" => $request->lng
        );

        $Perizinan = Perizinan::where('id', $request->id)->update($vaUpdate);
        return [
            "status" => 1,
            "data" => $Perizinan,
            "msg" => "Santri & Pengajar updated successfully"
        ];
    }

    public function destroy(Perizinan $Perizinan)
    {
        $Perizinan->delete();
        return [
            "status" => 1,
            "data" => $Perizinan,
            "msg" => "Blog deleted successfully"
        ];
    }
}
