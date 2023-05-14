<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penjengukan;
use Illuminate\Http\Request;

class PenjengukanController extends Controller
{
    public function index()
    {
        $Penjengukan = Penjengukan::get();
        return [
            "msg" => "tesd",
            "data" => $Penjengukan
        ];
    }

    public function show(Penjengukan $Penjengukan)
    {
        return [
            "data" => $Penjengukan
        ];
    }

    public function store(Request $request)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "nama_santri" => $request->nama_santri,
            "tanggal_penjengukan" => $request->tanggal_penjengukan,
            "keterangan" => $request->keterangan
        );

        $Penjengukan = Penjengukan::create($vaUpdate);
        return [
            "status" => 1,
            "data" => $Penjengukan
        ];
    }

    public function update(Request $request, Penjengukan $Penjengukan)
    {

        $vaUpdate = array(
            "id" => $request->id,
            "nama_santri" => $request->nama_santri,
            "tanggal_penjengukan" => $request->tanggal_penjengukan,
            "keterangan" => $request->keterangan
        );

        $Penjengukan = Penjengukan::where('id', $request->id)->update($vaUpdate);
        return [
            "status" => 1,
            "data" => $Penjengukan,
            "msg" => "Santri & Pengajar updated successfully"
        ];
    }

    public function destroy(Penjengukan $Penjengukan)
    {
        $Penjengukan->delete();
        return [
            "status" => 1,
            "data" => $Penjengukan,
            "msg" => "Blog deleted successfully"
        ];
    }
}
